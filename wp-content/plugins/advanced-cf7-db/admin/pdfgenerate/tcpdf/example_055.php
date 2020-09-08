<?php
//============================================================+
// File name   : example_055.php
// Begin       : 2009-10-21
// Last Update : 2010-08-08
//
// Description : Example 055 for TCPDF class
//               Display all characters available on core fonts.
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
 * Display all characters available on core fonts.
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML Forms
 * @author Nicola Asuni
 * @since 2009-10-21
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 055');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 055', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// array of core font names
$core_fonts = array('courier', 'helvetica', 'times', 'symbol', 'zapfdingbats');

$html = <<<EOF
<style>
.link       { color:#ce9900; text-decoration:none; }
.link:hover { color:#217661; }
.link1      { text-decoration:none; color:#cc9900; }
.link1:hover{ color:#217661; }
.link2      { font-family:Arial, Helvetica, sans-serif; font-size:13px; text-decoration:none; color:#ffffff; }
.link2:hover{ color:#217661; }
</style>
<table cellpadding="0" cellspacing="0" border="0"  style="width:700px; margin:0 auto;"><tr><td>
	<table cellpadding="0" cellspacing="0" border="0"  width="100%">
			<tr>
					<td width="50%" height="97" bgcolor="#217661">
					<img src="../images/logo-1.gif" alt="" border="0" style="margin-left:16px;"/></td>
					<td  width="50%" align="right" valign="top" style="background-color:#217661;">
						<table cellpadding="0" cellspacing="0" border="0" style="padding-right:16px;">
							<tr>
								<td bgcolor="#217661" height="97" width="25" align="left"><img src="../images/phone.jpg" alt="" border="0" /></td>
								<td bgcolor="#217661" height="97" width="147" style="padding-left:0px;">
									<img src="../images/call_us-now.gif" alt="" border="0"  />
									<span style="display:block; text-align:right; font-family:Times New Roman, Times, serif; font-size:40px;color:#FFFFFF;">020 8882 8575</span>
								</td>
							</tr>
						</table>
					</td>
			</tr>
			<tr>
				<td style="background-color:#FFFFFF;" style="border:1px solid #dadada; padding:4px;">
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td height="97" width="519" align="left">
								<img src="../images/midbar-1.jpg" alt="" border="0" />
							</td>
							<td  height="95" width="180" valign="middle" style="background-color:#b89985; padding-right:9px; line-height:18px;">
								<table cellpadding="0" cellspacing="0" border="0" style="margin:16px 0;">
									<tr>
										<td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:40px; color:#ffffff;">
											<strong style="display:inline-block; margin-bottom:9px;">September 2010</strong>
										</td>
									</tr>
									<tr>
										<td valign="top">
												<img src="../images/arrow1.gif" alt="" border="0"/>
											</td>
											<td style="font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#ffffff;">
												<a href="#" title="Ghana High Commission Upgrade Queue Systom" class="link2">Ghana High Commission Upgrade Queue Systom</a>
											</td>
									</tr>
									<tr>
										<td valign="top">
												<img src="../images/arrow1.gif" alt="" border="0" style="margin:5px 10px 0 0;" />
											</td>
											<td>
												<a href="#" title="Lonsto exhibit at IRRV in Harrowgate, 28th Sept-1st Oct 2010" class="link2">Lonsto exhibit at IRRV in Harrowgate,<br /> 28th Sept-1st Oct 2010</a>
											</td>
									</tr>
									<tr>
										<td valign="top">
											<img src="../images/arrow1.gif" alt="" border="0"/>
										</td>
										<td>
											<a href="#" title="Palace of Westminster selects Lonsto to provide Queue Management" class="link2">Palace of Westminster selects Lonsto to provide Queue Management</a>
										</td>
									</tr>
									<tr>
										<td valign="top">
											<img src="../images/arrow1.gif" alt="" border="0" style="margin:5px 10px 0 0;" />
										</td>
										<td>
											<a href="#" title="The Co-operative Bank rolls out communication systoms" class="link2">The Co-operative Bank rolls out communication systoms</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
    		<td>
					<table cellpadding="0" cellspacing="0" border="0" style="margin:10px 0;">
						<tr>
							<td width="520" valign="top" style="border-right:1px solid #dadada; padding-right:10px;">
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
									<tr>
										<td width="530" style="border-bottom:1px solid #dadada;">
											<strong style="font-family:Arial, Helvetica, sans-serif; font-size:70px; color:#d09f12;">Ghana High Commission Upgrade Queue Systom</strong>
											<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:10px 0;">
												<tr>
													<td width="113" valign="top">
															<img src="../images/template-img1.jpg" alt="" border="0" />
													</td>
													<td>
														<span style="display:block; margin-bottom:20px; font-family:Arial, Helvetica, sans-serif; font-size:20px;">Lonsto have worked with the Ghana High Commission (GHC) for many years and recently were approached to upgrade the queue management system to create a professional and cohesive queue management process providing multiple services.</span>
														<span style="display:block; margin-bottom:12px;font-family:Arial, Helvetica, sans-serif; font-size:20px;" >The implimentation of a Touch screen Kiosk, LCD Digital Signage,Counter LCDs and Keypads has allowed GHC...</span>
														<a href="#" title="View full history" style="margin-right:10px;"><img src="../images/view-full-story-btn.gif" alt="" border="0" /></a>
                            <a href="#" title="Forward this article" style="margin-right:10px;"><img src="../images/forward-this-article-btn.gif" alt="" border="0" /></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td width="530" style="border-bottom:1px solid #dadada; padding-top:15px;">
											<strong style="font-family:Arial, Helvetica, sans-serif; font-size:70px; color:#d09f12;">Lonsto exhibit at IRRV in Harrowgate, 28th Sept-1st Oct 2010</strong>
											<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:10px 0;">
												<tr>
													<td width="113" valign="top">
														<img src="../images/template-img2.jpg" alt="" border="0" />
													</td>
													<td>
														<span style="display:block; margin-bottom:20px;font-family:Arial, Helvetica, sans-serif; font-size:20px;">Lonsto are pleased to announce that we will demonstrating our products and services at the up and coming IRRV Conference and Exhibition in Harrogate HIC, 28th September - 1st October 2010.</span>
														<span style="display:block; margin-bottom:12px;font-family:Arial, Helvetica, sans-serif; font-size:20px;">This represents an opportunity for our existing and prospective customers to view demonstrations of our wide range of products including the newly added range of Ticket Printers, Touch Screen ...</span>
														<a href="#" title="View full history" style="margin-right:10px;"><img src="../images/view-full-story-btn.gif" alt="" border="0" /></a>
														<a href="#" title="Forward this article" style="margin-right:10px;"><img src="../images/forward-this-article-btn.gif" alt="" border="0" /></a>
                          </td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td width="530" style="border-bottom:1px solid #dadada; padding-top:15px;">
											<strong style="font-family:Arial, Helvetica, sans-serif; font-size:70px; color:#d09f12;">Palace of Westminster selects Lonsto to provide Queue Management</strong>
											<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:10px 0;">
												<tr>
													<td width="113" valign="top">
														<img src="../images/template-img3.jpg" alt="" border="0" />
													</td>
													<td>
														<span style="display:block; margin-bottom:20px; font-family:Arial, Helvetica, sans-serif; font-size:20px;">Lonsto, who celebrate their forty year anniversary this year have secured an order to supply the Houses of Parliament with a cutting edge queue management system.</span>
														<span style="display:block; margin-bottom:12px; font-family:Arial, Helvetica, sans-serif; font-size:20px;">The system will be used to manage the tours that are conducted at the Houses of Parliament. More than 250,000 visitors from around the world visit the Palace of Westminster throughout the year...</span>
														<a href="#" title="View full history" style="margin-right:10px;"><img src="../images/view-full-story-btn.gif" alt="" border="0" /></a>
                            <a href="#" title="Forward this article" style="margin-right:10px;"><img src="../images/forward-this-article-btn.gif" alt="" border="0" /></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td width="530" style="border-bottom:1px solid #dadada; padding-top:15px;">
											<strong style="font-family:Arial, Helvetica, sans-serif; font-size:70px; color:#d09f12;">The Co-operative Bank rolls out communication systoms</strong>
											<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:10px 0;">
												<tr>
													<td width="113" valign="top">
														<img src="../images/template-img4.jpg" alt="" border="0" />
													</td>
													<td>
														<strong style="display:block;font-family:Arial, Helvetica, sans-serif; font-size:20px;">As part of an ongoing customer service initiative, The Co-operative Bank has installed the new Quail Digital wireless communication system &#8722; Q D Retail &#8722; at one of its largest, flagship locations in Balloon Street, Manchester.</strong>
														<span style="display:block; margin-bottom:12px;font-family:Arial, Helvetica, sans-serif; font-size:20px;">The system is the first in the retail sector to have done away with the battery belt pack. It comprises lightweight headsets and keypads which allow staff - including meeters and greeters and...</span>
														<a href="#" title="View full history" style="margin-right:10px;"><img src="../images/view-full-story-btn.gif" alt="" border="0" /></a>
                            <a href="#" title="Forward this article" style="margin-right:10px;"><img src="../images/forward-this-article-btn.gif" alt="" border="0" /></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td width="530" style="padding-top:15px;">
											<table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#878787; line-height:13px;">
												<tr>
													<td valign="top">
														<strong style="display:block;">Email sent by:</strong>
															<span style="display:block;">Lonsto International Limited</span>
															<span style="display:block;">Address: Lonsto Hpuse, 276 Chase Road, Southgate, London N14 6HA</span>
															<span style="display:block;">Phone:+44 (0)20 8882 8575</span>
															<span style="display:block;">Web: <a href="http://www.lonsto.co.uk" class="link" title="http://www.lonsto.co.uk">http://www.lonsto.co.uk</a></span>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
							<td width="169" valign="top">
							</td>
						</tr>
					</table>
				</td>
			</tr>
	</table>
</td></tr></table>
EOF;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_055.pdf', 'D');

//============================================================+
// END OF FILE                                                
//============================================================+
