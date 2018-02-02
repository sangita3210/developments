<?php

$trackurl = '';

global $DB;
	
if ($COURSE->id != 1 ){

    //Add course category name
    if ($category = $DB->get_record('course_categories',array('id'=>$COURSE->category))){
        $trackurl .= '/' . urlencode($category->name);
    }

    //Add course name
    $trackurl .= '/' . urlencode($COURSE->shortname);
} else {
	$trackurl = $SITE->shortname;
}

//Use navigation bar to get items
$navbar = $OUTPUT->page->navbar->get_items();

//remove first item (home)
$first = array_shift($navbar);

foreach ($navbar as $item) {
    //get section name
    if ($item->type == "30") {
        $trackurl .= '/' . urlencode($item->title) ;
    }
    //get activity type
    if ($item->type == "40") {
        $trackurl .= '/' . urlencode($item->text) ;
        $trackurl .= '/' . urlencode($item->title) ;
    }
    //get action type
    if ($item->type == "60") {
        $trackurl .= '/' . urlencode($item->title) ;
    }
}

?>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');


	ga('create', '<?php echo $PAGE->theme->settings->analyticsid;?>', 
	{
		'cookieDomain': '<?php echo preg_replace("(https?://)", "", $CFG->wwwroot);?>',
		'cookieExpires': '<?php echo $CFG->sessiontimeout;?>'
	});

    ga('send', 'pageview' );

</script>