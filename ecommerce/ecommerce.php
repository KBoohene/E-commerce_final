<?php
require('../fpdf.php');
include_once("adb.php");

class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('logo.png',10,6,50);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(40,10,'Core Store Report',0,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


	function getCustomers($adb) {
	    $strQuery="Select * from customers ";
	    $result = $adb->query($strQuery);
	    // print_r($result);
	    return $result;
	}


	function getCustomersArray(){
      	$arrayData = array();
      	$adb = new adb();
      	$textData = "";

	      $result=$this->getCustomers($adb);
	      $count=0;
	      $length =$result->num_rows;

	      while($count<$length){
	        $arrayData[$count]=$result->fetch_assoc();

	        $textData .= $arrayData[$count]['cno'];
	        $textData .= ";";
	        $textData .= $arrayData[$count]['cname'];
	        $textData .= ";";
	        $textData .= $arrayData[$count]['street'];
	        $textData .= ";";
	        $textData .= $arrayData[$count]['zip'];
	        $textData .= ";";
	        $textData .= $arrayData[$count]['phone'];

	        $arrayData[$count] = $textData;
	        $textData = "";
	        $count++;
	      }

	      // print_r($arrayData);

	    return $arrayData;
	}

	// Colored table
	function CustomerTable($header, $array_data)
	{
		// $lines = file($file);
		$data = array();

		foreach($array_data as $line)
			$data[] = explode(';',trim($line));

		// Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		$w = array(35, 55, 35, 25, 40);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
			$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
			$this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
			$this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
			// $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
			// $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetTitle("Report", true);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

//for displaying the table
// Column headings
$customerHeader = array('Customer No', 'Customer Name', 'Street', 'Zip', 'Phone No');
// Table Data
$customerData = $pdf->getCustomersArray();

$pdf->Cell(40,10,'Customer Information'); // Add Some text
$pdf->Ln(); // Break line
$pdf->CustomerTable($customerHeader, $customerData); // Create table
$pdf->Ln(); 
$pdf->Output('I','Core_Store_Report', false);
?>
