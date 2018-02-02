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
    $PAGE->set_url($CFG->wwwroot . '/local/scorm_script/scorm_script1.php');
    $title = get_string('pluginname', 'local_scorm_script');
    $PAGE->set_title($title);
    $PAGE->set_heading($title);
    $PAGE->navbar->add($title);
    echo $OUTPUT->header();
    $mform = new local_scorm_script_form();
    if ($mform->is_cancelled()){
      redirect(new moodle_url('/local/scorm_script/scorm_script.php', array()));
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
    while ($line = $cir->next()) {
        $linenum++;
        if(empty($line)) {
            continue;
        }
            //$coumln = count($line);
        $c []= $line; 
    }
        //taking data from csv file check data is exist in csv then processed 
    if($c){
        foreach ($c as $key => $value) {
            if($key == 'userid'){
                $c2 = $value;
            }
        }
        foreach ($c as $value) {
            $c3[] = array_combine($c2, $value);
        }
        unset($c3[0]);
            //1st find name of the scorm  
        $array = [];
            print_object($c3);die();
        $users = array();
        foreach ($c3 as $vc3) {
            $users[$vc3['userid']] =  $vc3;
        }
        $i = 1;
        $modname = '';
        $array1 = [];
        foreach ($users as $key => $user) {
            for($i;$i<4;$i++){
                $modname1 = 'm'.$i.'module';
                $modname[$modname1] = $user[$modname1];
            }
                //course id stored here 
            $courseid = $user['courseid'];
                //all module id stored here 
            $modname1 = implode(',',$modname);
        }
        //here we need to check user is alredy attempted scorm then  update scorm_scoes_track table
            //print_object($array);
        $userids = array();
        foreach($users as $key2=>$value2){
            $userids[]=$value2['userid'];
        }
            //print_object($userids);
        $uids = implode(',',$userids);
            //check in scorm exist  or not 
            //print_object($modname1);die();
        $sql2 = 'SELECT id,userid,scormid
        from {scorm_scoes_track}
        WHERE userid in ('.$uids.') and scormid in('.$modname1.') and attempt =1';
        $exists = $DB->get_records_sql($sql2);
        //print_object($sql2);die();
        $storeids= array();
        $storesmid = array();
        if($exists){
            foreach($exists as $ids => $exist){
                    //print_object($exist);
                $storeids[] = $exist->userid;
                //$storesmid[] = $exist->scormid;

            }
        }
        //print_object($userids);
        //print_object($storeids);
        //these userids not attempted scorm 
        $array_diff = array_diff($userids, $storeids);
        //print_object($array_diff);die();
        $record = array();
        $record1 = array();

        if($array_diff){
            //foreach ($array_diff as $key => $value) {
                foreach($users  as $ukey => $uvalue){
                    if(in_array($uvalue['userid'], $array_diff)){
                        //print_object($uvalue);
                        $insert1 = new stdClass();
                        $insert1->userid=$uvalue['userid'];
                        $insert1->scormid=$uvalue['m1module'];
                        $insert1->scoid = 5;
                        $insert1->attempt = 1;
                        $insert1->element = 'x.start.time';
                        $insert1->value=time($uvalue['m1date']);
                        $insert1->timemodified = time();
                        $record[] = $insert1;   
                    }
                }
            }
        if($storeids){
            foreach($exists as $existvalue){
                foreach($users as  $user){
                    if( $existvalue->userid==$user['userid']){
                            //print_object($user);
                        $update1 = new stdClass();
                        $update1->id = $existvalue->id;
                        $update1->userid = $user['userid'];
                        $update1->value = 'prashant';
                        $record1[] =$update1; 
                    }
                }
            }
        }
        //}
        //print_object($record1);
        if($record){
            $DB->insert_records('scorm_scoes_track', $record);
                echo '<div class="alert alert-success">
                Inserting data in table
            </div>';
        }
        //print_object($record1);die();
        $flag = 0;
        if($record1){
            foreach($record1 as $rec1){ 
                $enroltable =$DB->update_record('scorm_scoes_track',$rec1,true);
                $flag++;
            }
            if($flag!=0){ 
                echo '<div class="alert alert-success">
                Updated data is Successfully!!
                </div>';
            }
        }
    }
}
    $mform->display();
    echo $OUTPUT->footer();
