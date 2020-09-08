<?php
if ( !defined( 'ABSPATH' ) ) {
exit;
}
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2010-08-08
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */
require 'tcpdf/config/lang/eng.php';
require 'tcpdf/tcpdf.php';

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$this->Image(get_template_directory_uri() . '/images/logo-pdf.jpg', 172, 5, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		 $this->SetFont('helvetica', 'B', 8);
		// Title
		$this->Cell(0, 250, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {

		//$image_file = get_template_directory_uri() . '/images/fsa-logo.jpg';
       // $this->Image($image_file, 14, 283, 10, '', 'JPG', '', 'T', false, 35, '', false, false, 0, false, false, false);

		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'T', 7);

		//$this->Cell(0, 0, 'Mayfair FX is a trading name of The Currency Cloud Ltd – registered in England and Wales, registration number 6323311.', 0, 0, 'C');
       // $this->Ln();
       // $this->Cell(0,0,'Authorised by the Financial Conduct Authority (FRN 531019) for the provision of payment services.', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		//$this->Ln();
       // $this->Cell(0,0,'Registered with HM Revenue & Customs as a Money Services Business “MSB” (Reg. No. 12272696).', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		//$this->Ln();
		//$this->Ln();
        //$this->Cell(195,0,'Corporate Terms & Conditions – Version 03032011', 0, false, 'R', 0, '', 0, false, 'M', 'M');
	}
}