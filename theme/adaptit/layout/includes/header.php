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

/* LOGO Image */
$haslogo = (!empty($PAGE->theme->settings->logo));

/* Logo settings */
if ($haslogo) {
    $logourl = $PAGE->theme->setting_file_url('logo', 'logo');
} else {
    $logourl = $OUTPUT->pix_url('logo', 'theme');
}

/* Social Media Settings */
$hastwitter = (empty($PAGE->theme->settings->twitter)) ? false : $PAGE->theme->settings->twitter;
$hasfacebook = (empty($PAGE->theme->settings->facebook)) ? false : $PAGE->theme->settings->facebook;
$hasgoogleplus = (empty($PAGE->theme->settings->googleplus)) ? false : $PAGE->theme->settings->googleplus;
$haslinkedin = (empty($PAGE->theme->settings->linkedin)) ? false : $PAGE->theme->settings->linkedin;
$hasyoutube = (empty($PAGE->theme->settings->youtube)) ? false : $PAGE->theme->settings->youtube;
$hasflickr = (empty($PAGE->theme->settings->flickr)) ? false : $PAGE->theme->settings->flickr;
$haspinterest = (empty($PAGE->theme->settings->pinterest)) ? false : $PAGE->theme->settings->pinterest;
$hasinstagram = (empty($PAGE->theme->settings->instagram)) ? false : $PAGE->theme->settings->instagram;
$hasskype = (empty($PAGE->theme->settings->skype)) ? false : $PAGE->theme->settings->skype;
$hasrss = (empty($PAGE->theme->settings->rss)) ? false : $PAGE->theme->settings->rss;

$twitter = $PAGE->theme->settings->twitter;
$facebook = $PAGE->theme->settings->facebook;
$googleplus = $PAGE->theme->settings->googleplus;
$linkedin = $PAGE->theme->settings->linkedin;
$youtube = $PAGE->theme->settings->youtube;
$flickr = $PAGE->theme->settings->flickr;
$pinterest = $PAGE->theme->settings->pinterest;
$instagram = $PAGE->theme->settings->instagram;
$skype = $PAGE->theme->settings->skype;
$rss = $PAGE->theme->settings->rss;

// If any of the above social networks are true, sets this to true.
$hassocialnetworks = ($hasfacebook || $hastwitter || $hasgoogleplus || $hasflickr || $hasinstagram || $haslinkedin || $haspinterest || $hasskype || $hasrss || $hasyoutube ) ? true : false;

/* Header widget settings */
$hasheaderwidget = (!empty($PAGE->theme->settings->headerwidget));
$headerwidget = $PAGE->theme->settings->headerwidget;
/* Header phone settings */
$hasheaderphone = (!empty($PAGE->theme->settings->headerphone));
$headerphone = $PAGE->theme->settings->headerphone;
/* Header email settings */
$hasheaderemail = (!empty($PAGE->theme->settings->headeremail));
$headeremail = $PAGE->theme->settings->headeremail;
?>
<header id="page-header" class="header clearfix">
    <div class="top-bar">
        <div class="container-fluid">    
            <?php if ($hassocialnetworks && $PAGE->theme->settings->enabletopbarsocial) { ?>
                <ul class="social-icons col-md-6 col-sm-6 col-xs-12 hidden-xs">
                    <?php if ($hastwitter) { ?>
                        <li><a href="<?php echo $twitter ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if ($hasfacebook) { ?>
                        <li><a href="<?php echo $facebook ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if ($hasgoogleplus) { ?>
                        <li><a href="<?php echo $googleplus ?>"><i class="fa fa-google-plus"></i></a></li> 
                    <?php } ?>
                    <?php if ($haslinkedin) { ?>
                        <li><a href="<?php echo $linkedin ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if ($hasskype) { ?>
                        <li><a href="<?php echo 'skype:' . $skype . '?call' ?>"><i class="fa fa-skype"></i></a></li>
                    <?php } ?>
                    <?php if ($hasyoutube) { ?>
                        <li><a href="<?php echo $youtube ?>"><i class="fa fa-youtube"></i></a></li>
                    <?php } ?>
                    <?php if ($hasflickr) { ?>
                        <li><a href="<?php echo $flickr ?>"><i class="fa fa-flickr"></i></a></li>
                    <?php } ?>
                    <?php if ($hasinstagram) { ?>
                        <li><a href="<?php echo $instagram ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                    <?php if ($haspinterest) { ?>
                        <li><a href="<?php echo $pinterest ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>

                    <?php if ($hasrss) { ?>   
                        <li class="row-end"><a href="<?php echo $rss ?>"><i class="fa fa-rss"></i></a></li>   
                    <?php } ?>          
                </ul><!--//social-icons-->
            <?php } ?>
            <?php if ($hasheaderphone || $hasheaderemail) { ?>
                <div class="contact pull-left">
                    <?php if ($hasheaderphone) { ?>
                        <p class="phone"><i class="fa fa-phone"></i><?php echo $headerphone ?></p>
                    <?php } ?>
                    <?php if ($hasheaderemail) { ?>
                        <p class="email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $headeremail ?>"><?php echo $headeremail ?></a></p>
                    <?php } ?>
                </div><!--//contact-->
            <?php } ?>
            <div class="logininfo-container pull-right">

                <?php if ($hasheaderwidget) { ?>
                    <div class="header-widget">
                        <?php echo $headerwidget ?>
                    </div>
                <?php } ?>



                <?php echo $PAGE->headingmenu ?>
                <?php echo $OUTPUT->login_info() ?>
                <?php if (isloggedin()) : ?>
                    <?php echo $OUTPUT->user_picture($USER); ?>
                <?php endif; ?>
            </div>        
        </div>      
    </div><!--//top-bar-->    
    <div class="header-main container-fluid">
        <h1 class="logo col-md-4 col-sm-4 col-xs-12">
            <a href="<?php echo $CFG->wwwroot ?>"><img id="logo" src="<?php echo $logourl ?>" alt="<?php echo $SITE->shortname; ?>" /></a>
        </h1><!--//logo-->           
        <div class="info col-md-8 col-sm-8 col-xs-12">           



            <nav role="navigation" class="main-nav">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target="#nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button><!--//nav-toggle-->
                    </div><!--//navbar-header-->
                    <div id="nav-collapse" class="nav-collapse collapse">
                        <?php echo $OUTPUT->custom_menu();
                         ?>              
                    </div>
                </div>
            </nav>





        </div><!--//info-->
    </div><!--//header-main-->
</header>
