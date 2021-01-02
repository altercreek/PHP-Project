
<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
include('functions.php');
ob_clean();
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$data_list_personal_info=get_personal_info($_GET['id']);
ob_clean();
$html='
<div class="row-fluid">
	<div class="row-fluid" id="second_part" >
	<div class="row-fluid" >
                                       <div class="row-fluid" style="height:200px;">
										<div class="span2">
										<div style="height:170px;">
										<img src="asset/custom/nova.jpg"    id="image" style="height:150px;top:20px;" />
										
										</div>
										<p style="font-size:18px;color:white;background-color:black;text-align:center;"><b>ESTD:</b>&nbsp&nbsp1988</p>
										
										
											</div>
										<div class="span8">
										<div >
										<P style="font-size:22px;text-align:center;">NOVA INTERNATIONAL SCHOOL & COLLEGE</P>
										<h4 style="text-align:center;">(NISC)</h4>
										<h5 style="text-align:center;"><b>Road no:</b>10,&nbsp<b>Adabor</b>,&nbsp<b>Muhammodpur</b>,&nbsp<b>Dhaka</b></h5>
										<h5 style="text-align:center;"><b>www.abc.com</b>&nbsp&nbsp&nbsp<b>abc@aaa.com</b></h5>
										
										</div >
										
										
										<div >
										
										
										</div >
										<div >
										
										<legend style="font-size:22px;text-align:center;"><b>Student  Information </b></legend>
										</div >
										</div>
                                        <div class="span2">
										<img src="'.$data_list_personal_info['_image_location'].'"  style="height:150px;width:150px;top:20px; border-radius: 10px;border: 2px solid #888888;" >
											<br><br>
											<p style="font-size:14px;color:white;background-color:black;"><b>Student ID:</b>&nbsp'.$data_list_personal_info['_uniq_id'].'</p>
										
										
										
										
										</div>							
										</div>							
										
</div>'

	
	
	
	

	// Print text using writeHTMLCell()
	$pdf->writeHTMLCell(0,$html, 0, 1, 0, true, '', true);

	// ---------------------------------------------------------

	// Close and output PDF document
	// This method has several options, check the source code documentation for more information.
	$pdf->Output('example_001.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+
