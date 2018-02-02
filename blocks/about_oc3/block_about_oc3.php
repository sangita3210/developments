  <?php
/**
/**
 * *************************************************************************
 * *                       aboutaboutoc3 - ABout aboutaboutoc3 block                          **
 * *************************************************************************
 * @package     block - #60: Home Page - Messaging                                                   **
 * *************************************************************************
 * ************************************************************************ */
        class block_about_oc3 extends block_base
        {
            /**
             * Init the block
             */
            function init()
            {
                $this->title = get_string('pluginname', 'block_about_oc3');
               // print_object($this);
            }
            function get_content() {
                global $USER, $CFG, $DB;
                //require_once('../config.php');
                if ($this->content !== null) {
                    return $this->content;
                }
                $this->content = new stdClass();

                $sql = $DB->get_record('blocks_about_oc3',array());
                //print_object($sql);
                $result = '';
                include_once($CFG->dirroot.'/blocks/about_oc3/lib.php');
                $imagesss = oc3_images($sql->image); 
                //print_object($imagesss);
                $logo =  '<img src="'.$imagesss.'" style="width:220px;height:200px;" class="img-thumbnail">';
                //print_object($logo);
                               //$logo =  'https://i2.wp.com/cdn.jotfor.ms/assets/img/v4/avatar/Podo-Avatar2-04.png?ssl=1';
                $text = '';
                $text .= "<div class='card style='width: 20rem;'>";
                $text .= $logo;
                $text .= " <div class='card-block'>";
                $text .= '<h4 class="card-title">'.$sql->name.'</h4>';
                $text .= '<p class="card-text">'.$sql->description.'</p>';
                if(isloggedin()) {
                    $text .= '<a href='.$sql->login_button_link.' class="btn btn-primary">'.$sql->login_button_name.'</a>';
                } else {
                    $text .= '<a href='.$sql->not_login_button_link.' class="btn btn-primary">'.$sql->not_login_button_name.'</a>';
                }
                $text .= "</div>";
                $text .= "</div>";
                //$this->content->text = '';
                $this->content->text = $text;
                $this->content->footer = '';
                return $this->content;
            }
            public function has_config() {
                return true;
            }
        }
