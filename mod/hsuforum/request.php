<?php


require(__DIR__.'/../../config.php');
require_once($CFG->dirroot.'/mod/hsuforum/lib.php');

$id      = required_param('id', PARAM_INT);             // the forum to subscribe or unsubscribe to
$user    = optional_param('user', 0, PARAM_INT);        // userid of the user to subscribe, defaults to $USER
$sesskey = optional_param('sesskey', null, PARAM_RAW);  // sesskey
$request = optional_param('requestid', null, PARAM_RAW);  // sesskey

$url = new moodle_url('/mod/hsuforum/subscribe.php', array('id'=>$id));

$PAGE->set_url($url);

$forum   = $DB->get_record('hsuforum', array('id' => $id), '*', MUST_EXIST);
$course  = $DB->get_record('course', array('id' => $forum->course), '*', MUST_EXIST);
$cm      = get_coursemodule_from_instance('hsuforum', $forum->id, $course->id, false, MUST_EXIST);
$context = context_module::instance($cm->id);

if ($user) {
    require_sesskey();
    if (!has_capability('mod/hsuforum:managesubscriptions', $context)) {
        print_error('nopermissiontosubscribe', 'hsuforum');
    }
    $user = $DB->get_record('user', array('id' => $user), '*', MUST_EXIST);
} else {
    $user = $USER;
}

require_login($course, false, $cm);
if($request == 1){
    $returnto = optional_param('backtoindex',0,PARAM_INT)
    ? "index.php?id=".$course->id
    : "view.php?f=$id";
    $newrequest = new stdClass();
    $newrequest->userid = $USER->id;
    $newrequest->forumid = $id;
    $newrequest->status = 1;
    $new_request = $DB->insert_record('hsuforum_requests',$newrequest);
    if($new_request){
        redirect($returnto,get_string('request_confirm', 'mod_hsuforum'),null,\core\output\notification::NOTIFY_SUCCESS);
    }
}
if($request == 2){
    $returnto = optional_param('backtoindex',0,PARAM_INT)
    ? "subscribers.php?id=".$id
    : "subscribers.php?id=$id";
    $adminrequest = new stdClass();
    $adminrequest->userid = $user->id;
    $adminrequest->forum = $id;

    $exist_request = $DB->get_record('hsuforum_requests',array('userid'=>$user->id,'forumid'=>$id));
    $exist = $DB->get_record('hsuforum_subscriptions',array('userid'=>$user->id,'forum'=>$id));
    if(!$exist && $exist_request){
        $admin_request = $DB->insert_record('hsuforum_subscriptions',$adminrequest);
        if($admin_request){
            $update = new stdClass();
            $update->id = $exist_request->id;
            $update->status = 2;
            $update = $DB->update_record('hsuforum_requests',$update);
            redirect($returnto,get_string('subscription_confirm', 'mod_hsuforum'),null,\core\output\notification::NOTIFY_SUCCESS);
        } 
    } 
}
if($request == 3){
    $returnto = optional_param('backtoindex',0,PARAM_INT)
    ? "subscribers.php?id=".$id
    : "subscribers.php?id=$id";
    $exist_request = $DB->get_record('hsuforum_requests',array('userid'=>$user->id,'forumid'=>$id));
    $exist = $DB->get_record('hsuforum_subscriptions',array('userid'=>$user->id,'forum'=>$id));
    if($exist && $exist_request){
        $admin_request_subscription = $DB->delete_records('hsuforum_subscriptions',array('userid'=>$user->id,'forum'=>$id));
        if($admin_request_subscription){
            $admin_request = $DB->delete_records('hsuforum_requests',array('userid'=>$user->id,'forumid'=>$id));
            redirect($returnto,get_string('delete_confirm', 'mod_hsuforum'),null,\core\output\notification::NOTIFY_SUCCESS);
        }
    } 
}

