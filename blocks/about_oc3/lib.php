<?php

function blocks_about_oc3_pluginfile($course, $birecord_or_cm, $context, $filearea, $args, $forcedownload, array $options=array()) {
    global $DB, $CFG;

    if ($context->contextlevel != CONTEXT_SYSTEM) {
        send_file_not_found();
    }

    if ($context->get_course_context(false)) {
    } else if ($CFG->forcelogin) {
    } else {
        $parentcontext = $context->get_parent_context();
        if ($parentcontext->contextlevel === CONTEXT_COURSECAT) {
            $category = $DB->get_record('course_categories', array('id' => $parentcontext->instanceid), '*', MUST_EXIST);
            if (!$category->visible) {
                require_capability('moodle/category:viewhiddencategories', $parentcontext);
            }
        }
    }

    if ($filearea !== 'content') {
        send_file_not_found();
    }

    $fs = get_file_storage();

    $filename = array_pop($args);
    $filepath = '/';
    $itemid  = $args['0'];
   
    if (!$file = $fs->get_file($context->id, 'blocks_about_oc3', 'content', $itemid, $filepath, $filename) or $file->is_directory()) {
       
        send_file_not_found();
    }

    $managerobj = new \core\session\manager();
    $managerobj->write_close();
       
    send_stored_file($file, 60*60, 0, $forcedownload, $options);
}

function oc3_images($imageobj) {
    global $CFG;
    $fs = get_file_storage();
    $context = context_system::instance();
    $files = $fs->get_area_files($context->id, 'blocks_about_oc3', 'content', $imageobj, 'id', false);
    //print_object($files);

    foreach ($files as $file) {
        $filename = $file->get_filename();

        if (!$filename <> '.') {
            $url = moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(), $file->get_filearea(), $imageobj, $file->get_filepath(), $filename);
            //print_object($url);
            return $url;
        }
    }
}