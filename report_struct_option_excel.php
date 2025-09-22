<?php
ini_set("include_path", 'phpexcel/');
require_once 'PHPExcel.php';
require_once 'PHPExcel/IOFactory.php';
$path_to_root="..";
include_once "add_struct.class.php";

$reslt = $objstruct->display();
$row_project = mysql_fetch_assoc($reslt);
$objPHPExcel = new PHPExcel();

$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//$objPHPExcel->getActiveSheet()->mergeCells('A1:G1');

$sharedStyle1 = new PHPExcel_Style();
$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(13);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(1);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(9);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(6);

	$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(6);

	$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(6);

	$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(6);

	$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(22);
$sharedStyle1->applyFromArray(
		array('fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FFFFFF00')
		),
				'font'=>array(
						'name'=>'Times New Roman',
						'size'=>14,
						'bold'=>true
				),
				'alignment'=>array(
						'horizontal'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
				),


		  'borders' => array(
		  		'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
		  		'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
		  		'left'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
		  		'top'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
		  )
		));

$totalformat=
array(
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>11,
				'bold'=>true
		),
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT
		),


		'borders' => array(
				'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'left'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'top'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
		)
);
$totalborder=
array(
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>13,
				'bold'=>true
		),
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT
		),
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT
		),
		'numberformat'=>array(
				'code'=>PHPExcel_Style_NumberFormat::FORMAT_NUMBER_00
		),

		'borders' => array(
				'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'left'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
				'top'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
		)
);

$companyformat = array(
		'borders' => array(
				'outline' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => 'FF000000'),
				),
		),
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>11,
				'bold'=>true
		),
);

$tableheader = array(
		'borders' => array(
				'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => 'FF000000'),
				),

				'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
		),
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER

		),
		'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'0091D3'),
		),

		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>11,
				'bold'=>true
		),
);
$tableheader1 = array(
		'borders' => array(
				'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => 'FF000000'),
				),
				'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'00CBD3'),
				),
				'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
		),

	'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
		),

		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>13,
				'bold'=>true

		),
);
$tableheader3 = array(
		'borders' => array(
				'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => 'FF000000'),
				),

				'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
		),


		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>13,
				'bold'=>true
		),
);
$datacell = array(
		'borders' => array(
				'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array('argb' => 'FF000000'),
				),

				'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),

		),



		'font'=>array(
				'name'=>'Arial',
				'size'=>13,

		),
);
$tableborder = array(
		'borders' => array(


				'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
		),



		'font'=>array(
				'name'=>'Arial',
				'size'=>11,
				'bold'=>true
		),
);

$datacell_border = array(
		'borders' => array(


				'bottom'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
				'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
		),

		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT
		),

		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>10,


		),
		'numberformat'=>array(
				'code'=>PHPExcel_Style_NumberFormat::FORMAT_NUMBER_00
		),
);


$center1=
array(
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT

		),
		'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'FFFF00'),
		),
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>11,
				'bold'=>true
		)
);

$center2=
array(
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT

		),
		'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'F82A14'),
		),
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>11,
				'bold'=>true
		)
);

$center=
array(
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
		),

);

$center3=
array(
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT

		),
		'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'BC8F88'),
		),
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>8,
				'bold'=>true
		)
);
$center4=
array(
		'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT

		),
		'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'FFFFFF'),
		),
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>8,
				'bold'=>true
		)
);

$imageborder = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_DOUBLE
		),
	),
);

$border1 = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_DOUBLE
		),
	),
	'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER

		),
		'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>11,
				'bold'=>true
		)
);

$border2= array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_DOUBLE
		),
	),
	'alignment'=>array(
				'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER

		),
		'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
		),
		'font'=>array(
				'name'=>'Times New Roman',
				'size'=>11,
				'bold'=>false
		)
);


//$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($tableheader);
	$i=4;
	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTop(array(4,11));
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':AE'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "RISK BASED INSPECTION REGISTER");
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':AE'.$i);
	$i++;
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':AE'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "TM ANALYSIS WITH ANTICIPATED THICKNESS REMAINING LIFE");
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':W'.$i);
	$i++;

	$objPHPExcel->getActiveSheet()->mergeCells('AA'.$i.':AE'.($i+2));

	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "Project:");
	$objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':H'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$i.':H'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$row_project['project']);

	$objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':L'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "System Description:");
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$i.':V'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i,$row_project['tank']);

	$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Y'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('W'.$i.':Y'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, "Year of Build:");
	$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':Z'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('Z'.$i.':Z'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i,$row_project['year']);
	$i++;
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "Job:");
	$objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':H'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$i.':H'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$row_project['jobno']);

	$objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':L'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "Drawing Refence No.:");
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$i.':V'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i,$row_project['reference']);


	$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Y'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('W'.$i.':Y'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, "Date of last Survey	:");
	$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':Z'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('Z'.$i.':Z'.$i)->applyFromArray($tableheader1);
	if($row_project['date_of_sarvey']!='0000-00-00')
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i,date('d/m/Y',strtotime($row_project['date_of_sarvey'])));
	$i++;
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "Project Location:");
	$objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':H'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$i.':H'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$row_project['location']);

	$objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':L'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "Project incharge:");
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$i.':V'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i,$row_project['incharge']);

	$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Y'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('W'.$i.':Y'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, "Survey	Date:");
	$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':AA'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('Z'.$i.':AA'.$i)->applyFromArray($tableheader1);
	if($row_project['sarveydate']!='0000-00-00')
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i,date('d/m/Y',strtotime($row_project['sarveydate'])));
/*
	$objPHPExcel->getActiveSheet()->getStyle('A2:B2')->applyFromArray($tableheader);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', "From:".$from);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:B2');

	$objPHPExcel->getActiveSheet()->getStyle('C2:J2')->applyFromArray($tableheader);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', "TO:".$to);
	$objPHPExcel->getActiveSheet()->mergeCells('C2:D2');
*/
//$result = db_query($sql);
$i++;

$previous_dimension = 0;

//$objPHPExcel->getActiveSheet()->getColumnDimension ('Q')->setVisible(false);
//$objPHPExcel->getActiveSheet()->getColumnDimension ('R')->setVisible(false);
//$objPHPExcel->getActiveSheet()->getColumnDimension ('S')->setVisible(false);

$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':A'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('B'.$i.':B'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('C'.$i.':C'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('D'.$i.':D'.($i+1))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('D'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('E'.$i.':E'.($i+1))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('E'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('F'.$i.':F'.($i+1))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('F'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('G'.$i.':G'.($i+1))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('G'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('H'.($i+1).':H'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('Z'.$i.':Z'.($i+2))->applyFromArray($tableheader3);

//$objPHPExcel->getActiveSheet()->getStyle('G'.($i+1))->applyFromArray($tableheader3);

//$objPHPExcel->getActiveSheet()->getStyle('W'.$i)->applyFromArray($tableborder);
$objPHPExcel->getActiveSheet()->getStyle('A'.($i+1).':AE'.($i+1))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->getStyle('A'.($i+2).':AE'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':A'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':A'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "Items");
$objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':B'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, "Material");

$objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':C'.($i+2));

$objPHPExcel->getActiveSheet()->getStyle('C'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, "Gas/Liquid/Content");
$objPHPExcel->getActiveSheet()->mergeCells('D'.$i.':D'.($i+2));

$objPHPExcel->getActiveSheet()->getStyle('D'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, "Installation Date");
$objPHPExcel->getActiveSheet()->mergeCells('E'.$i.':E'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, "Size ( OD in Inch)");

$objPHPExcel->getActiveSheet()->getStyle('E'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('F'.$i.':F'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('F'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, "NDE Method");
$objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':G'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, "Pressure rating (Psig)");
$objPHPExcel->getActiveSheet()->getStyle('G'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('H'.$i.':H'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('H'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, "Allowable Stress");
$objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':I'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('I'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "Condition (New/ Replaced / Repaired/ Existing)");

//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, "Previous Guaged Thickness");
$objPHPExcel->getActiveSheet()->mergeCells('J'.($i).':J'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.($i), "Schedule");
//$objPHPExcel->getActiveSheet()->mergeCells('I'.($i+1).':I'.($i+2));

$objPHPExcel->getActiveSheet()->getStyle('K'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('K'.($i).':K'.($i+1));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.($i), "Temp rating");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.($i+2), "(F)");
$objPHPExcel->getActiveSheet()->mergeCells('L'.($i).':L'.($i+1));
$objPHPExcel->getActiveSheet()->getStyle('L'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, "Wall Thickness");
//$objPHPExcel->getActiveSheet()->mergeCells('J'.($i+1).':J'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($i+2), "(mm)");
$objPHPExcel->getActiveSheet()->mergeCells('M'.($i).':M'.($i+2));

$objPHPExcel->getActiveSheet()->getStyle('M'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.($i), "Corrosion Allowance (mm)");
$objPHPExcel->getActiveSheet()->mergeCells('N'.$i.':R'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$i, "Previous Gauged Thickness (mm)");
$objPHPExcel->getActiveSheet()->mergeCells('N'.($i+1).':N'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('N'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.($i+1), "3 O' CLOCK");

$objPHPExcel->getActiveSheet()->getStyle('O'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('O'.($i+1).':O'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.($i+1), "6 O' CLOCK");

$objPHPExcel->getActiveSheet()->getStyle('P'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('P'.($i+1).':P'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.($i+1), "9 O' CLOCK");
//$objPHPExcel->getActiveSheet()->mergeCells('O'.$i.':P'.$i);
//$objPHPExcel->getActiveSheet()->getStyle('O'.$i)->getAlignment()->setWrapText(true);
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$i, "Anticipated Thickness in mm");

$objPHPExcel->getActiveSheet()->getStyle('Q'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('Q'.($i+1).':Q'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.($i+1), "12 O' CLOCK");
$objPHPExcel->getActiveSheet()->mergeCells('R'.($i+1).':R'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('R'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.($i+1), "Minimum Measured Thickness");
//$objPHPExcel->getActiveSheet()->mergeCells('Q'.$i.':Y'.$i);
$objPHPExcel->getActiveSheet()->mergeCells('S'.($i+1).':S'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('S'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.($i+1), "(Diminution in %)");
$objPHPExcel->getActiveSheet()->mergeCells('T'.($i).':W'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.$i, "Present Gauged Thickness");
$objPHPExcel->getActiveSheet()->mergeCells('T'.($i+1).':T'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('T'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.($i+1), "3 O' CLOCK");
$objPHPExcel->getActiveSheet()->getStyle('U'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('U'.($i+1).':U'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U'.($i+1), "6 O' CLOCK");
$objPHPExcel->getActiveSheet()->getStyle('V'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('V'.($i+1).':V'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.($i+1), "9 O' CLOCK");
$objPHPExcel->getActiveSheet()->getStyle('W'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('W'.($i+1).':W'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.($i+1), "12 O' CLOCK");

$objPHPExcel->getActiveSheet()->getStyle('X'.($i+1))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('X'.($i+1).':X'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.($i+1), "Minimum Measured Thickness");
$objPHPExcel->getActiveSheet()->mergeCells('Y'.($i).':Y'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('Y'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y'.($i), "Required Minimum Thickness");
$objPHPExcel->getActiveSheet()->mergeCells('Z'.($i).':Z'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('Z'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.($i), "Difference in Tck (Mean Tck -Dsg Tck)");
$objPHPExcel->getActiveSheet()->mergeCells('AA'.($i).':AA'.($i+2));
$objPHPExcel->getActiveSheet()->getStyle('AA'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA'.($i), "Corrosion Rate per year");
$objPHPExcel->getActiveSheet()->mergeCells('AB'.($i).':AB'.($i));
$objPHPExcel->getActiveSheet()->getStyle('AB'.($i+2))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AB'.($i+2), "Remaining Life");
$objPHPExcel->getActiveSheet()->getStyle('AC'.$i.':AD'.($i+2))->applyFromArray($tableheader3);
$objPHPExcel->getActiveSheet()->mergeCells('AC'.$i.':AD'.($i));
$objPHPExcel->getActiveSheet()->getStyle('AC'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.$i, "Estimated Renewal");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.($i+1), "<5 Years");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD'.($i+1), "bet 5 & 9");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.($i+2), "Est. Length in (mm)");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD'.($i+2), "Est. Length in (mm)");
$objPHPExcel->getActiveSheet()->mergeCells('AE'.($i).':AE'.($i+2));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE'.($i), "Remarks");
//while ($row = db_fetch($result)) {



//}

$i = $i+3;
$arr_project = $objstruct->get_stuct_option();
$total_ton1=0;
$total_ton2=0;
$count_row = 1;
foreach($arr_project as $key=>$value) {
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($datacell);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $value['item']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $value['material_type']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $value['material']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $value['install_date']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $value['od_size']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $value['nde']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $value['pressure']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $value['allowable_stress']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, $value['conditions']);

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, $value['schedules']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i, $value['temperature']);

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $value['wall_tickness']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i, $value['corrosion']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$i, $value['thickness1']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$i, $value['thickness2']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$i, $value['thickness3']);


	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$i, $value['thickness4']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.$i, $value['mean_thickness1']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.$i, $value['diminution1']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.$i, $value['thickness5']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U'.$i, $value['thickness6']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$i, $value['thickness7']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, $value['thickness8']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X'.$i, $value['mean_thickness2']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y'.$i, $value['design_thickness']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i, $value['diff_thickness']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA'.$i, $value['corrosion_rate']);
	if(is_numeric($value['remain_life']) && $value['remain_life']<5) {
		$objPHPExcel->getActiveSheet()->getStyle('AB'.$i)->applyFromArray($center2);
	}
	if($value['remain_life']>=5 && $value['remain_life']<=9) {
		$objPHPExcel->getActiveSheet()->getStyle('AB'.$i)->applyFromArray($center1);
	}
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AB'.$i, $value['remain_life']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.$i, $value['length1']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD'.$i, $value['length2']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE'.$i, $value['remarks']);
	$total_ton1=$total_ton1+$value['length1'];
	$total_ton2=$total_ton2+$value['length2'];
	if($count_row%60==0) {
		$objPHPExcel->getActiveSheet()->setBreak('A'.$i, PHPExcel_Worksheet::BREAK_ROW);
	}
	$count_row++;
	$i++;
}
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($datacell);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i,'Legent');
// Rename worksheet

$objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':N'.$i);
$objPHPExcel->getActiveSheet()->mergeCells('O'.$i.':Z'.$i);
$objPHPExcel->getActiveSheet()->getStyle('O'.$i.':AB'.$i)->applyFromArray($center4);
$objPHPExcel->getActiveSheet()->getStyle('AC'.$i.':AD'.$i)->applyFromArray($center3);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.$i, '<5 Years');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD'.$i, 'bet 5 & 9');
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($datacell);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($datacell);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($center1);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i,'');
$objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':N'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, 'Send Report to Corporate Engineering.  Monitor every 2 to 3 years');
$objPHPExcel->getActiveSheet()->mergeCells('O'.$i.':AB'.($i+1));
$objPHPExcel->getActiveSheet()->getStyle('O'.$i.':AB'.$i)->applyFromArray($center);
$objPHPExcel->getActiveSheet()->getStyle('AC'.$i.':AD'.$i)->applyFromArray($center);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.$i, '');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD'.$i, '');
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($datacell);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i)->applyFromArray($datacell);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($center2);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i,'');
$objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':N'.$i);
$objPHPExcel->getActiveSheet()->getStyle('B'.($i))->getAlignment()->setWrapText(true);

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, 'Send Report to Corporate Engineering with an REA within 1 week');

$objPHPExcel->getActiveSheet()->mergeCells('O'.$i.':Z'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$i, '');
$objPHPExcel->getActiveSheet()->getStyle('AC'.$i.':AD'.$i)->applyFromArray($center4);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC'.$i, $total_ton1);
$objPHPExcel->getActiveSheet()->getStyle('AD'.$i)->applyFromArray($center4);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD'.$i, $total_ton2);
$rslt = $objstruct->displayImageDetails($_REQUEST['project_id']);
$row_img = mysql_fetch_assoc($rslt);

$path1 = 'upload_images/'.$row_img['image1'];
$path2 = 'upload_images/'.$row_img['image2'];
$path3 = 'upload_images/'.$row_img['image3'];
$path4 = 'upload_images/'.$row_img['image4'];
$path5 = 'upload_images/'.$row_img['image5'];
$path6 = 'upload_images/'.$row_img['image6'];
$path7 = 'upload_images/'.$row_img['image7'];
$path8 = 'upload_images/'.$row_img['image8'];
$path9 = 'upload_images/'.$row_img['image9'];
$path10 = 'upload_images/'.$row_img['image10'];
$path11 = 'upload_images/'.$row_img['image11'];
$path12 = 'upload_images/'.$row_img['image12'];
$path13 = 'upload_images/'.$row_img['image13'];
$path14 = 'upload_images/'.$row_img['image14'];
$path15 = 'upload_images/'.$row_img['image15'];
$path16 = 'upload_images/'.$row_img['image16'];

$i=$i+5;
$objPHPExcel->getActiveSheet()->setBreak('A'.$i, PHPExcel_Worksheet::BREAK_ROW);
//$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTop(array(0,0));
$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':AE'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "RISK BASED INSPECTION REGISTER");
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':AE'.$i);
	$i++;
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':AE'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AE'.$i)->applyFromArray($tableheader);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "TM ANALYSIS WITH ANTICIPATED THICKNESS REMAINING LIFE");
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	/*$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':W'.$i);
	$i++;
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "Project:");
	$objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':H'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$i.':H'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$row_project['project']);

	$objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':L'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "Tank/Space Description:");
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$i.':V'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i,$row_project['tank']);

	$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Y'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('W'.$i.':Y'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, "Year of Build:");
	$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':Z'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('Z'.$i.':Z'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i,$row_project['year']);
	$i++;
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "Job:");
	$objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':H'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$i.':H'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$row_project['jobno']);

	$objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':L'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "Drawing Refence No.:");
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$i.':V'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i,$row_project['reference']);

	$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Y'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('W'.$i.':Y'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, "Date of last Survey	:");
	$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':Z'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('Z'.$i.':Z'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i,date('d/m/Y',strtotime($row_project['date_of_sarvey'])));
	$i++;
	$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':Z'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, "Project Location:");
	$objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':H'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('C'.$i.':H'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$row_project['location']);

	$objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':L'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "Project incharge:");
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$i.':V'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('M'.$i.':V'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i,$row_project['incharge']);

	$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Y'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('W'.$i.':Y'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, "Survey	Date:");
	$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':Z'.$i);
	$objPHPExcel->getActiveSheet()->getStyle('Z'.$i.':Z'.$i)->applyFromArray($tableheader1);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i,date('d/m/Y',strtotime($row_project['sarveydate'])));
//$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AM4')->applyFromArray($center);*/
$i=$i+2;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':AE'.($i))->applyFromArray($tableheader);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':AE'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), 'COATING CONDITION OF PIPING');
$i=$i+2;

if(!empty($row_img['image1']) && is_file($path1)) {
	$objDrawing1 = new PHPExcel_Worksheet_Drawing();
	$objDrawing1->setName('PHPExcel logo');
	$objDrawing1->setDescription('PHPExcel logo');
	$objDrawing1->setPath($path1);       // filesystem reference for the image file
	$objDrawing1->setHeight($row_img['height']);
	$objDrawing1->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing1->setCoordinates('A'.($i+1));    // pins the top-left corner of the image to cell D24
	$objDrawing1->setOffsetX(50);
	$objDrawing1->setOffsetY(15);
	$objDrawing1->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':F'.($i+12))->applyFromArray($imageborder);

}

//$objPHPExcel->getActiveSheet()->getStyle('V'.$i.':Z'.$i)->applyFromArray($tableheader3);
if(!empty($row_img['image2'])) {
	$objDrawing2 = new PHPExcel_Worksheet_Drawing();
	$objDrawing2->setName('PHPExcel logo');
	$objDrawing2->setDescription('PHPExcel logo');
	$objDrawing2->setPath($path2);       // filesystem reference for the image file
	$objDrawing2->setHeight($row_img['height']);
	$objDrawing2->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing2->setCoordinates('I'.($i+1));    // pins the top-left corner of the image to cell D24
	//$objDrawing2->setOffsetX(15);
	$objDrawing2->setOffsetY(15);
	$objDrawing2->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('G'.($i).':P'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image3'])) {
	$objDrawing3 = new PHPExcel_Worksheet_Drawing();
	$objDrawing3->setName('PHPExcel logo');
	$objDrawing3->setDescription('PHPExcel logo');
	$objDrawing3->setPath($path3);       // filesystem reference for the image file
	$objDrawing3->setHeight($row_img['height']);
	$objDrawing3->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing3->setCoordinates('R'.($i+1));    // pins the top-left corner of the image to cell D24
	$objDrawing3->setOffsetX(30);
	$objDrawing3->setOffsetY(15);
	$objDrawing3->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('Q'.($i).':Y'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image4'])) {
	$objDrawing4 = new PHPExcel_Worksheet_Drawing();
	$objDrawing4->setName('PHPExcel logo');
	$objDrawing4->setDescription('PHPExcel logo');
	$objDrawing4->setPath($path4);       // filesystem reference for the image file
	$objDrawing4->setHeight($row_img['height']);
	$objDrawing4->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing4->setCoordinates('AA'.($i+1));    // pins the top-left corner of the image to cell D24
	$objDrawing4->setOffsetX(15);
	$objDrawing4->setOffsetY(15);
$objDrawing4->setWorksheet($objPHPExcel->getActiveSheet());
$objPHPExcel->getActiveSheet()->getStyle('Z'.($i).':AE'.($i+12))->applyFromArray($imageborder);
}
$i++;
$i = $i+13;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':F'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':F'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['title1']);

$objPHPExcel->getActiveSheet()->getStyle('G'.($i).':P'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':P'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $row_img['title2']);

$objPHPExcel->getActiveSheet()->getStyle('Q'.($i).':Y'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('Q'.$i.':Y'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$i, $row_img['title3']);


$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':AE'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i, $i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i, $row_img['title4']);
$objPHPExcel->getActiveSheet()->getStyle('Z'.($i).':AE'.($i+2))->applyFromArray($imageborder);
$i++;

$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':F'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['description1']);

$objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':P'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $row_img['description2']);

$objPHPExcel->getActiveSheet()->mergeCells('Q'.$i.':Y'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$i, $row_img['description3']);


$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':AE'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i, $row_img['description4']);

//$i = $i+$row_img['height'];
/*$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':C'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), 'RATING');
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('D'.($i).':K'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, 'OBSERVATIONS');
$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':Z'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('L'.($i).':Z'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($i), 'RECOMMENDATIONS');
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':Z'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('A'.($i))->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getStyle('L'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':C'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), $row_img['rating1']);
$objPHPExcel->getActiveSheet()->mergeCells('D'.($i).':K'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row_img['observations1']);
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('L'.($i).':Z'.($i));
$objPHPExcel->getActiveSheet()->getStyle('L'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($i), $row_img['recommendations1']);*/


$i=$i+2;

//$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AM4')->applyFromArray($center);
if(!empty($row_img['image5'])) {
	$objDrawing5 = new PHPExcel_Worksheet_Drawing();
	$objDrawing5->setName('PHPExcel logo');
	$objDrawing5->setDescription('PHPExcel logo');
	$objDrawing5->setPath($path5);       // filesystem reference for the image file
	$objDrawing5->setHeight($row_img['height']);
	$objDrawing5->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing5->setCoordinates('A'.($i));    // pins the top-left corner of the image to cell D24
	$objDrawing5->setOffsetX(50);
	$objDrawing5->setOffsetY(15);
	$objDrawing5->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':F'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image6'])) {
	$objDrawing6 = new PHPExcel_Worksheet_Drawing();
	$objDrawing6->setName('PHPExcel logo');
	$objDrawing6->setDescription('PHPExcel logo');
	$objDrawing6->setPath($path6);       // filesystem reference for the image file
	$objDrawing6->setHeight($row_img['height']);
	$objDrawing6->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing6->setCoordinates('I'.($i));    // pins the top-left corner of the image to cell D24
	$objDrawing6->setOffsetY(15);
	$objDrawing6->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('G'.($i).':P'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image7'])) {
	$objDrawing7 = new PHPExcel_Worksheet_Drawing();
	$objDrawing7->setName('PHPExcel logo');
	$objDrawing7->setDescription('PHPExcel logo');
	$objDrawing7->setPath($path7);       // filesystem reference for the image file
	$objDrawing7->setHeight($row_img['height']);
	$objDrawing7->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing7->setCoordinates('R'.($i));    // pins the top-left corner of the image to cell D24
	//$objDrawing7->setOffsetX(30);
	$objDrawing7->setOffsetY(15);
	$objDrawing7->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('Q'.($i).':Y'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image8'])) {
	$objDrawing8 = new PHPExcel_Worksheet_Drawing();
	$objDrawing8->setName('PHPExcel logo');
	$objDrawing8->setDescription('PHPExcel logo');
	$objDrawing8->setPath($path8);       // filesystem reference for the image file
	$objDrawing8->setHeight($row_img['height']);
	$objDrawing8->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing8->setCoordinates('AA'.($i));    // pins the top-left corner of the image to cell D24
	//$objDrawing8->setOffsetX(15);
	$objDrawing8->setOffsetY(15);
	$objDrawing8->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('Z'.($i).':AE'.($i+12))->applyFromArray($imageborder);
}
$i = $i+13;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':F'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':F'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['title5']);

$objPHPExcel->getActiveSheet()->getStyle('G'.($i).':P'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':P'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $row_img['title6']);

$objPHPExcel->getActiveSheet()->getStyle('Q'.($i).':Z'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('Q'.$i.':Z'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$i, $row_img['title7']);


$objPHPExcel->getActiveSheet()->mergeCells('AA'.$i.':AE'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA'.$i, $i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA'.$i, $row_img['title8']);
$objPHPExcel->getActiveSheet()->getStyle('AA'.($i).':AE'.($i+2))->applyFromArray($imageborder);
$i++;

$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':F'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['description5']);

$objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':P'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $row_img['description6']);

$objPHPExcel->getActiveSheet()->mergeCells('Q'.$i.':Y'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$i, $row_img['description7']);


$objPHPExcel->getActiveSheet()->mergeCells('Z'.$i.':AE'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z'.$i, $row_img['description8']);

$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':F'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':F'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), 'RATING');
$objPHPExcel->getActiveSheet()->getStyle('G'.($i).':P'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('G'.($i).':P'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, 'OBSERVATIONS');
$objPHPExcel->getActiveSheet()->getStyle('Q'.($i).':AE'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('Q'.($i).':AE'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.($i), 'RECOMMENDATIONS');
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':F'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->getStyle('G'.($i).':P'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('Q'.($i).':AE'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('A'.($i))->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getStyle('N'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':F'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), $row_img['rating2']);
$objPHPExcel->getActiveSheet()->mergeCells('G'.($i).':P'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $row_img['observations2']);
$objPHPExcel->getActiveSheet()->getStyle('G'.($i).':P'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('Q'.($i).':AE'.($i));
$objPHPExcel->getActiveSheet()->getStyle('Q'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.($i), $row_img['recommendations2']);
$i=$i+2;
/*$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':AE'.($i))->applyFromArray($tableheader);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':E'.($i));*/
$objPHPExcel->getActiveSheet()->setBreak('A'.$i, PHPExcel_Worksheet::BREAK_ROW);
//$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(array(4,8));
/*$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), 'STRUCTURAL ASSESSMENT OF PLATING');

$i=$i+2;

//$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AM4')->applyFromArray($center);
if(!empty($row_img['image9'])) {
	$objDrawing9 = new PHPExcel_Worksheet_Drawing();
	$objDrawing9->setName('PHPExcel logo');
	$objDrawing9->setDescription('PHPExcel logo');
	$objDrawing9->setPath($path9);       // filesystem reference for the image file
	$objDrawing9->setHeight($row_img['height']);
	$objDrawing9->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing9->setCoordinates('A'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing9->setOffsetX(15);
	$objDrawing9->setOffsetY(15);
	$objDrawing9->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image10'])) {
	$objDrawing10 = new PHPExcel_Worksheet_Drawing();
	$objDrawing10->setName('PHPExcel logo');
	$objDrawing10->setDescription('PHPExcel logo');
	$objDrawing10->setPath($path10);       // filesystem reference for the image file
	$objDrawing10->setHeight($row_img['height']);
	$objDrawing10->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing10->setCoordinates('D'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing10->setOffsetX(15);
	$objDrawing10->setOffsetY(15);
	$objDrawing10->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image11'])) {
	$objDrawing11 = new PHPExcel_Worksheet_Drawing();
	$objDrawing11->setName('PHPExcel logo');
	$objDrawing11->setDescription('PHPExcel logo');
	$objDrawing11->setPath($path11);       // filesystem reference for the image file
	$objDrawing11->setHeight($row_img['height']);
	$objDrawing11->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing11->setCoordinates('L'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing11->setOffsetX(15);
	$objDrawing11->setOffsetY(15);
	$objDrawing11->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':V'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image12'])  && is_file($path12)) {
	$objDrawing12 = new PHPExcel_Worksheet_Drawing();
	$objDrawing12->setName('PHPExcel logo');
	$objDrawing12->setDescription('PHPExcel logo');
	$objDrawing12->setPath($path12);       // filesystem reference for the image file
	$objDrawing12->setHeight($row_img['height']);
	$objDrawing12->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing12->setCoordinates('W'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing12->setOffsetX(15);
	$objDrawing12->setOffsetY(15);
	$objDrawing12->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('W'.($i).':Z'.($i+12))->applyFromArray($imageborder);
}
$i = $i+13;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':C'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['title9']);

$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('D'.$i.':K'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row_img['title10']);

$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':V'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('L'.$i.':V'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $row_img['title11']);


$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Z'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, $i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, $row_img['title12']);
$objPHPExcel->getActiveSheet()->getStyle('W'.($i).':Z'.($i+2))->applyFromArray($imageborder);
$i++;

$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':C'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['description9']);

$objPHPExcel->getActiveSheet()->mergeCells('D'.$i.':K'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row_img['description10']);

$objPHPExcel->getActiveSheet()->mergeCells('L'.$i.':V'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $row_img['description11']);


$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Z'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, $row_img['description12']);
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':C'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), 'RATING');
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('D'.($i).':K'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, 'OBSERVATIONS');
$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':Z'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('L'.($i).':Z'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($i), 'RECOMMENDATIONS');
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':Z'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('A'.($i))->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getStyle('L'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':C'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), $row_img['rating3']);
$objPHPExcel->getActiveSheet()->mergeCells('D'.($i).':K'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row_img['observations3']);
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('L'.($i).':Z'.($i));
$objPHPExcel->getActiveSheet()->getStyle('L'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($i), $row_img['recommendations3']);
$i=$i+2;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':Z'.($i))->applyFromArray($tableheader);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':Z'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), 'STRUCTURAL ASSESSMENT OF INTERNALS');
$i=$i+2;
//$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AM4')->applyFromArray($center);
if(!empty($row_img['image13'])) {
	$objDrawing13 = new PHPExcel_Worksheet_Drawing();
	$objDrawing13->setName('PHPExcel logo');
	$objDrawing13->setDescription('PHPExcel logo');
	$objDrawing13->setPath($path13);       // filesystem reference for the image file
	$objDrawing13->setHeight($row_img['height']);
	$objDrawing13->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing13->setCoordinates('A'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing13->setOffsetX(15);
	$objDrawing13->setOffsetY(15);
	$objDrawing13->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image14'])) {
	$objDrawing14 = new PHPExcel_Worksheet_Drawing();
	$objDrawing14->setName('PHPExcel logo');
	$objDrawing14->setDescription('PHPExcel logo');
	$objDrawing14->setPath($path14);       // filesystem reference for the image file
	$objDrawing14->setHeight($row_img['height']);
	$objDrawing14->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing14->setCoordinates('D'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing14->setOffsetX(15);
	$objDrawing14->setOffsetY(15);
	$objDrawing14->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image15'])) {
	$objDrawing15 = new PHPExcel_Worksheet_Drawing();
	$objDrawing15->setName('PHPExcel logo');
	$objDrawing15->setDescription('PHPExcel logo');
	$objDrawing15->setPath($path15);       // filesystem reference for the image file
	$objDrawing15->setHeight($row_img['height']);
	$objDrawing15->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing15->setCoordinates('L'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing15->setOffsetX(15);
	$objDrawing15->setOffsetY(15);
	$objDrawing15->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':V'.($i+12))->applyFromArray($imageborder);
}
if(!empty($row_img['image16'])) {
	$objDrawing16 = new PHPExcel_Worksheet_Drawing();
	$objDrawing16->setName('PHPExcel logo');
	$objDrawing16->setDescription('PHPExcel logo');
	$objDrawing16->setPath($path16);       // filesystem reference for the image file
	$objDrawing16->setHeight($row_img['height']);
	$objDrawing16->setWidth($row_img['width']);               // sets the image height to 36px (overriding the actual image height);
	$objDrawing16->setCoordinates('W'.$i);    // pins the top-left corner of the image to cell D24
	$objDrawing16->setOffsetX(15);
	$objDrawing16->setOffsetY(15);
	$objDrawing16->setWorksheet($objPHPExcel->getActiveSheet());
	$objPHPExcel->getActiveSheet()->getStyle('W'.($i).':Z'.($i+12))->applyFromArray($imageborder);
}
$i++;
$i = $i+13;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':C'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['title13']);

$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('D'.$i.':K'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row_img['title14']);

$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':V'.($i+2))->applyFromArray($imageborder);
$objPHPExcel->getActiveSheet()->mergeCells('L'.$i.':V'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $row_img['title15']);


$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Z'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, $i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, $row_img['title16']);
$objPHPExcel->getActiveSheet()->getStyle('W'.($i).':Z'.($i+2))->applyFromArray($imageborder);
$i++;

$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':C'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row_img['description13']);

$objPHPExcel->getActiveSheet()->mergeCells('D'.$i.':K'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row_img['description14']);

$objPHPExcel->getActiveSheet()->mergeCells('L'.$i.':V'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $row_img['description15']);


$objPHPExcel->getActiveSheet()->mergeCells('W'.$i.':Z'.$i);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W'.$i, $row_img['description16']);
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':C'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), 'RATING');
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('D'.($i).':K'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, 'OBSERVATIONS');
$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':Z'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->mergeCells('L'.($i).':Z'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($i), 'RECOMMENDATIONS');
$i++;
$objPHPExcel->getActiveSheet()->getStyle('A'.($i).':C'.($i))->applyFromArray($border1);
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('L'.($i).':Z'.($i))->applyFromArray($border2);
$objPHPExcel->getActiveSheet()->getStyle('A'.($i))->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getStyle('L'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('A'.($i).':C'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i), $row_img['rating4']);
$objPHPExcel->getActiveSheet()->mergeCells('D'.($i).':K'.($i));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row_img['observations4']);
$objPHPExcel->getActiveSheet()->getStyle('D'.($i).':K'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->mergeCells('L'.($i).':Z'.($i));
$objPHPExcel->getActiveSheet()->getStyle('L'.($i))->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.($i), $row_img['recommendations4']);*/
$objPHPExcel->getActiveSheet() ->getPageMargins()->setTop(1)->setRight(0.25)->setLeft(0.55)->setBottom(1.25);
$objPHPExcel->getActiveSheet()->setTitle('Struct Option');
$objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea('A1:AE'.($i));
$objPHPExcel->getActiveSheet()->getPageSetup()->setPrintAreaByColumnAndRow(0,1,31,$i);
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Set Orientation, size and scaling
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(false);
$objPHPExcel->getActiveSheet()->getPageSetup()->setScale('72');
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="RBI_Report"'.'".xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('RBI_Report.xls');;
$file = 'RBI_Report.xls';
if (file_exists($file)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma:public');
	header('Content-Length:' . filesize($file));
	ob_clean();
	flush();
	readfile($file);
	unlink($file);
	exit;
}
exit;