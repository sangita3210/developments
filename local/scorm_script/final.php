    <?php
    // This file is part of Moodle - http://moodle.org/
    //
    // Moodle is free software: you can redistribute it and/or modify
    // it under the terms of the GNU General Public License as published by
    // the Free Software Foundation, either version 3 of the License, or
    // (at your option) any later version.
    //
    // Moodle is distributed in the hope that it will be useful,
    // but WITHOUT ANY WARRANTY; without even the implied warranty of
    // MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    // GNU General Public License for more details.
    //
    // You should have received a copy of the GNU General Public License
    // along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

    /**
     * 
     *
     * @package    local_scorm_script
     * @copyright   Dhruv Infoline Pvt Ltd   
     * @license     http://lmsofindia.com
     * @author     Prashant Yallatti <prashant@elearn10.com>
     * 
     */
    require_once('../../config.php');
    require_once('scorm_script_form.php');
    require_once($CFG->libdir . '/formslib.php');
    require_once($CFG->libdir.'/csvlib.class.php');

    core_php_time_limit::raise(60*60); // 1 hour should be enough
    raise_memory_limit(MEMORY_HUGE);

    require_login(0, false);
    //require_capability('moodle/site:supporttool', context_system::instance());
    $context = context_system::instance();
    $PAGE->set_context($context);
    $PAGE->set_pagelayout('admin');
    $PAGE->set_url($CFG->wwwroot . '/local/scorm_script/final.php');
    $title = get_string('pluginname', 'local_scorm_script');
    $PAGE->set_title($title);
    $PAGE->set_heading($title);
    $PAGE->navbar->add($title);
    echo $OUTPUT->header();
    $mform = new local_scorm_script_form();
    if ($mform->is_cancelled()){
      redirect(new moodle_url('/local/scorm_script/final.php', array()));
  } else if ($data = $mform->get_data()) {
        //print_object($data);
        //csv data import code here 
    global $CFG,$DB,$USER;
    $iid = csv_import_reader::get_new_iid('uploaduser');
    $cir = new csv_import_reader($iid, 'uploaduser');
    $content = $mform->get_file_content('csvfiledata');
    $readcount = $cir->load_csv_content($content, $data->encoding, $data->delimiter_name);
    $csvloaderror = $cir->get_error();
        // print_object($content);
        //read data from clv
    $cir->init();
    $linenum = 1;
        // init upload progress tracker
    $validation = array();
    $c = array();
    $c2 = array();
    $flag = 0;
    while ($line = $cir->next()) {
        $linenum++;
        if(empty($line)) {
            continue;
        }
        $c []= $line; 
    }
        //taking data from csv file check data is exist in csv then processed 
    if($c){
        foreach ($c as $key => $value) {
            if($key == 'username'){
                $c2 = $value;
            }
        }
        foreach ($c as $value) {
            $c3[] = array_combine($c2, $value);
        }
        unset($c3[0]);
            //1st find name of the scorm  
        $array = [];
        //store userid and scorm id here
        $userids = array();
        $scormids = array(); 
        $record = array();
        $record1 = array();
        foreach ($c3 as $key2 => $value2) {
            print_object($value2);
                $useridfromname = $DB->get_record('user',array('username'=>$value2['username']));
                $sql2 = 'SELECT id,userid,scormid, attempt, element, value
                from {scorm_scoes_track} 
                WHERE userid = '.$useridfromname->id.' and scormid = '.$value2['m1module'].' and attempt = 1' ;
                $useridsexists = $DB->get_records_sql($sql2);
            print_object($useridsexists);
                if($useridsexists){
                    $attempt = '';
                    $value = '';
                    $update = array();
                    foreach ($useridsexists as $key11 => $value11) {

                        if($value11->attempt == 1){
                            $attempt = 2;
                        }
                        if($value11->element == 'x.start.time'){
                            $value = time($value2['m1date']);
                        }
                        if($value11->element == 'cmi.core.exit'){
                            $value = 'complete';
                        }
                        if($value11->element == 'cmi.core.lesson_status'){
                            $value = 'completed';
                        }
                        if($value11->element == 'cmi.core.total_time'){
                            $value = '0'.$value2['m1hours'].':'.$value2['m1min'].':00';
                        }
                        $update_array = array(
                                            'id'=>$key11,
                                            'userid'=>$value11->userid,
                                            'scormid'=>$value11->scormid,
                                            'attempt'=>$attempt,
                                            'value' => $value
                                            );
                        $update = $DB->update_record('scorm_scoes_track',$update_array);
                        if($update){
                            $flag = 1;
                        }
                    }
                }else{
                    $scoidpass = $DB->get_record('scorm_scoes',array('scorm' =>$value2['m1module'],  'scormtype' => 'sco'));
                    $scorecords = $DB->get_records('scorm_scoes_track',
                        array('scormid'=>$value2['m1module'],'userid'=>$useridfromname->id));
                    if (!$scorecords) {
                        $scoid = $scoidpass->id;
                        $insert1 = new stdClass();
                        $insert1->userid=$useridfromname->id;
                        $insert1->scormid=$value2['m1module'];
                        $insert1->scoid = $scoid;
                        $insert1->attempt = 1;
                        $insert1->element = 'x.start.time';
                        $insert1->value=time($value2['m1date']);
                        //print_object($value2['m1date']);
                        $insert1->timemodified = time();
                        $record1[] = $insert1;

                        $insert1 = new stdClass();
                        $insert1->userid=$useridfromname->id;
                        $insert1->scormid=$value2['m1module'];
                        $insert1->scoid = $scoid;
                        $insert1->attempt = 1;
                        $insert1->element = 'cmi.core.exit';
                        $insert1->value='complete';
                        $insert1->timemodified = time();
                        $record1[] = $insert1;

                        $insert1 = new stdClass();
                        $insert1->userid=$useridfromname->id;
                        $insert1->scormid=$value2['m1module'];
                        $insert1->scoid = $scoid;
                        $insert1->attempt = 1;
                        $insert1->element = 'cmi.core.lesson_status';
                        $insert1->value='completed';
                        $insert1->timemodified = time();
                        $record1[] = $insert1;

                        $insert1 = new stdClass();
                        $insert1->userid=$useridfromname->id;
                        $insert1->scormid=$value2['m1module'];
                        $insert1->scoid = $scoid;
                        $insert1->attempt = 1;
                        $insert1->element = 'cmi.core.total_time';
                        $insert1->value = '0'.$value2['m1hours'].':'.$value2['m1min'].':00';
                        $insert1->timemodified = time();
                        $record1[] = $insert1;
                    } 
                }
            }
        if($record1){
            foreach($record1 as $insert){
                $inserted = $DB->insert_record('scorm_scoes_track', $insert,true);
                if($inserted){
                    $flag = 2;
                }
            }
        }
        if($flag == 1){
            echo '<div class="alert alert-success">Records Updated</div>';
        }else if($flag == 2){
             echo '<div class="alert alert-success">Records Inserted</div>';
        }else{
            echo '<div class="alert alert-success">Sorry action is not take place!!!</div>';
        }
    }
}
$mform->display();
echo $OUTPUT->footer();
