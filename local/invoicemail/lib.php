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
 * @package   local_paypalwork
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright Copyright (c) 2012 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @author Mark Nielsen
 */

defined('MOODLE_INTERNAL') || die();
require_once("$CFG->libdir/pdflib.php");
require_once("$CFG->libdir/filelib.php");
require_once ($CFG->libdir . '/tcpdf/tcpdf.php');  

function local_invoicemail_extend_navigation(global_navigation $nav) {
    global $CFG, $PAGE, $DB;
    $coursename = get_string('pluginname','local_invoicemail');
        $url = '#';
        $flat = new flat_navigation_node(navigation_node::create($coursename, $url), 0);
        $flat->key = 'invoicemail';
        $nav->add_node($flat);
        $flat->showinflatnavigation = true;
              
        $pqr = $nav->add(get_string('history_title','local_invoicemail'), $CFG->wwwroot.'/local/invoicemail/history.php'); 
        
        $pqr->showinflatnavigation = true;
}

// this function gives email body...
function invoicemail_mail_body($tid,$status) {
	global $CFG,$DB,$USER;
	
    $trans_items = $DB->get_record('enrol_paypal',array('txn_id'=>$tid));
    $items = '';
    $total = 0;
    $username = $USER->firstname.' '.$USER->lastname;
    $useremail = $USER->email;
    $coursename = $trans_items->item_name;
    $total = $trans_items->txn_id;
    $user_details = '<u>'.get_string('userdetail','local_invoicemail').'</u>';
    $transaction_details = '<u>'.get_string('itemdetail','local_invoicemail').'<u>';
    $config = get_config('local_invoicemail');
    $messagefooter = $config->footermsg;
    
  
        $html = '<div><b>Hi '.$username.'</b><br>';
        $msgbody= get_string('mailbody','local_invoicemail'); 
        $html .= '<p>'.$msgbody.'</p>';           
        $html .= '<div><p><b>'.$messagefooter.'</b></p></div>';         
   

     return $html;           

}

// this fuction gives the pdf...
function pdf_download($data,$savevalue,$mailto) {    
    global $CFG,$DB,$USER;
    

        $items = '';
        $total = 0;
        $fullname = $USER->firstname.' '.$USER->lastname.' ('.$USER->email.')';
        $transaction_details = '<u>'.get_string('itemdetail','local_invoicemail').'<u>';
      
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);

        $pagetitle = $filename = get_string('invoice','local_invoicemail').'_'.$data;
        $pdf->SetTitle($pagetitle);
        $invoicesubhead = get_string('invoiceid','local_invoicemail').$data;
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $fullname, $invoicesubhead);

        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, '20', PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->AddPage();
        
       


        $html = '<div style="background-color:#0078c5;color:#fff;font-size:20px;font-weight: bolder;padding: 6px;border-top: 1px solid #ddd;"><span style="text-align: left;padding-left: 20px;">'.get_string('paypalinvoicetext','local_invoicemail').'</span></div>';
        $html .= '<div class="col-md-12">
                    <div style="background-color:#f5f5f5;color:#333;font-size:14px;font-weight:bolder;
                    border: 1px solid #ddd;line-height: 20px;">
                        <span style="text-align: left"><bolder>'.get_string('ordersummary','local_invoicemail').'</bolder></span>
                    </div>
                    <table style="border: 1px solid #ddd;">

                        <thead>
                            <tr style="background-color: #ddd;">
                                <td><strong>Course Name</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Totals</strong></td>
                            </tr>
                        </thead>
            
                       <tbody>';
      
                            $item = $DB->get_record('enrol_paypal',array('txn_id' =>$data));
                            $insid = $item->instanceid; 
                            $price = $DB->get_record('enrol',array('id'=> $insid));
                            $cprice = $price->cost .  $price->currency;
                            $coursename = html_writer::tag('span', $item->item_name,
                                             array());
                            $cost = '<span class="cost">'.$item->receiver_id.'</span>';
                            $total = $cprice;
                            $html .='<tr>
                                    <td>'.$coursename.'</td>
                                    <td class="text-center">'.$cprice.'</td>
                                    <td class="text-center">1</td>
                                    <td class="text-right">'.$cprice.'</td>
                                </tr>';

                             $subtotal = '00'; 
                            
                             $html .='<tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right">'.$subtotal.'</td>
                            </tr>  
                            <hr> 
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right">'.$total.'</td>
                            </tr>
                           </tbody>
                    </table>
                </div>';  
                    
               $imagedir = "local/invoicemail/pix";
                $imageLocation = $CFG->dirroot . '/' . $imagedir.'/*.jpg';
                $image = glob($imageLocation);  
                $l1 = explode('.', $image[0]); 
                $l2 = explode('/', $l1[0]);
                foreach ($l2 as $l3) {
                    $l4 = $l3; 
                }
                
                $path = "$CFG->dirroot/local/invoicemail/pix";
                $imageLocation = $path . '/'.$l4.'.'.$l1[1];
                $logo =  '<img src= "'.$imageLocation.'" width="120" height="60"/>';
              
                $invoicetext = $DB->get_record('config_plugins',array('plugin'=>'local_invoicemail','name'=>'invoicetext'),'value');
                if($invoicetext){
                    $address = $invoicetext->value;
                }else{
                    $address = '';
                }
                $html .= '<table style="border-bottom: 1px solid #ddd;padding-bottom:5px">
                            <thead>
                                <tr>
                                    <td style="width:150px;">'.$logo.'</td>
                                    <td style="width:50px;"></td>
                                    <td>'.$address.'</td>
                                </tr>
                            </thead>
                          </table>';
                      
                                             
        $companyname = get_string('companyname','local_invoicemail');
        $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
        
        $pdf->Write(5, $companyname, '');  

        $filename = 'invoice_'.$data.'.pdf';
                         
        $filelocation = $CFG->dataroot.'/temp/';  

        $fileNL = $filelocation."\\".$filename;

        if($savevalue == 1)
         {
           
           $filecontents = $pdf->Output($fileNL, 'I');
           return send_file($filecontents, $filename, 0, 0, true, false, 'application/pdf');
         }else if($mailto==true){
            $filecontents = $pdf->Output($fileNL, 'F');
            $uid = $USER->id;
            $uservalue = $DB->get_record('user',array('id' => $uid));
            $sender =get_admin();
            if(!empty($uservalue->email)){
                $paypalvalue = $DB->get_record('enrol_paypal',array('txn_id' =>$data));
                $status = $paypalvalue->payment_status;
                $messagesubject = get_string('mailsubject','local_invoicemail');
                $messagebody = invoicemail_mail_body($data,$status);
                $messageuser =  $messagebody ;

                if (!empty($messageuser) && !empty($sender->email)){

                    
                     email_to_user($uservalue, $sender, $messagesubject , '', $messageuser,  $fileNL, $filename);
                }
                  
             }   
         }   
        

        
}

