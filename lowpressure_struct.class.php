<?php
session_start();
ini_set('display_errors', '0');
class struct_option {

	function __construct() {
		$this->dbhost = "localhost";
		$this->dbuser = "erp";
		$this->dbpass = "aries12171219";
		$this->dbname = "hiles";
		$this->port=3306;
	//	$this->socket="/tmp/mysql.sock";
		$this->project_no =0;
		$this->dbcon = mysqli_connect(
			$this->dbhost,
			$this->dbuser,
			$this->dbpass,
			$this->dbname,   // database name goes here
			$this->port     // port here
			//$this->socket    // optional socket
		) or die("Error in mysql connection");
		$this->selecteddb = mysqli_select_db($this->dbcon,$this->dbname);
		if(empty($_SESSION['userid']) && basename($_SERVER['PHP_SELF'])!='index.php') {
			header('location:./');
		}
		if(!empty($_REQUEST['project_id'])) {
			$rslt_pr = $this->display();
			$row_table = mysqli_fetch_assoc($rslt_pr);
			$this->project_no =$row_table['project_no'];
			$sql_table = "CREATE TABLE IF NOT EXISTS  ".$this->project_no."_lowpressure_image_details (
			 id int(10) NOT NULL AUTO_INCREMENT,
			 project_id int(10) NOT NULL,
			 title1 varchar(255) DEFAULT NULL,
			 description1 text,
			 image1 varchar(255) DEFAULT NULL,
			 title2 varchar(255) DEFAULT NULL,
			 description2 text NOT NULL,
			 image2 varchar(255) NOT NULL,
			 title3 varchar(255) NOT NULL,
			 description3 text NOT NULL,
			 image3 varchar(255) NOT NULL,
			 title4 varchar(255) NOT NULL,
			 description4 text NOT NULL,
			 image4 varchar(255) NOT NULL,
			 rating1 varchar(255) NOT NULL,
			 observations1 text NOT NULL,
			 recommendations1 text NOT NULL,
			 title5 varchar(255) NOT NULL,
			 description5 text NOT NULL,
			 image5 varchar(255) NOT NULL,
			 title6 varchar(255) NOT NULL,
			 description6 text NOT NULL,
			 image6 varchar(255) NOT NULL,
			 title7 varchar(255) NOT NULL,
			 description7 text NOT NULL,
			 image7 varchar(255) NOT NULL,
			 title8 varchar(255) NOT NULL,
			 description8 text NOT NULL,
			 image8 varchar(255) NOT NULL,
			 rating2 varchar(255) NOT NULL,
			 observations2 text NOT NULL,
			 recommendations2 text NOT NULL,
			 title9 varchar(50) NOT NULL,
			 description9 text NOT NULL,
			 image9 varchar(255) NOT NULL,
			 title10 varchar(50) NOT NULL,
			 description10 text NOT NULL,
			 image10 varchar(255) NOT NULL,
			 title11 varchar(50) NOT NULL,
			 description11 text NOT NULL,
			 image11 varchar(255) NOT NULL,
			 title12 varchar(50) NOT NULL,
			 description12 text NOT NULL,
			 image12 varchar(255) NOT NULL,
			 rating3 varchar(50) NOT NULL,
			 observations3 text NOT NULL,
			 recommendations3 text NOT NULL,
			 title13 varchar(50) NOT NULL,
			 description13 text NOT NULL,
			 image13 varchar(255) NOT NULL,
			 title14 varchar(50) NOT NULL,
			 description14 text NOT NULL,
			 image14 varchar(255) NOT NULL,
			 title15 varchar(50) NOT NULL,
			 description15 text NOT NULL,
			 image15 varchar(255) NOT NULL,
			 title16 varchar(50) NOT NULL,
			 description16 text NOT NULL,
			 image16 varchar(255) NOT NULL,
			 rating4 varchar(15) NOT NULL,
			 observations4 text NOT NULL,
			 recommendations4 text NOT NULL,
			 height int(10) NOT NULL,
			 width int(10) NOT NULL,
			 PRIMARY KEY (id)
			) ";
			mysqli_query($this->dbcon,$sql_table);
			$sql_table = "CREATE TABLE IF NOT EXISTS  ".$this->project_no."_lowpressure_struct_option (
						id int(10) NOT NULL AUTO_INCREMENT,
						 project_id int(10) NOT NULL DEFAULT '0',
						 item varchar(255) DEFAULT NULL,
						 material_type varchar(255) DEFAULT NULL,
						 material varchar(255) DEFAULT NULL,
						 non_severe_corr BOOLEAN NOT NULL DEFAULT FALSE,
						 install_date varchar(255) DEFAULT NULL,
						 od_size double(20,2) DEFAULT '0.00',
						 nde varchar(255) DEFAULT NULL,
						 pressure double(20,2) DEFAULT '0.00',
						 allowable_stress double(20,0) DEFAULT '0.00',
						 quality_factor DOUBLE(20,2) NOT NULL,
						 weld_factor DOUBLE(20,2) NOT NULL,
						 coefficient DOUBLE(20,2) NOT NULL,
						 conditions varchar(255) DEFAULT NULL,
						 schedules varchar(255) DEFAULT NULL,
						 temperature double(20,2) DEFAULT '0.00',
						 wall_tickness double(20,2) DEFAULT '0.00',
						 corrosion double(20,2) DEFAULT '0.00',
						 thickness1 double(20,1) DEFAULT '0.00',
						 thickness2 double(20,1) DEFAULT '0.00',
						 thickness3 double(20,1) DEFAULT '0.00',
						 thickness4 double(20,1) DEFAULT '0.00',
						 thickness5 double(20,1) DEFAULT '0.00',
						 thickness6 double(20,1) DEFAULT '0.00',
						 thickness7 double(20,1) DEFAULT '0.00',
						 thickness8 double(20,1) DEFAULT '0.00',
						 corrosion_rate double(20,2) DEFAULT '0.00',
						 length1 double(20,2) DEFAULT '0.00',
						 length2 double(20,2) DEFAULT '0.00',
						 remarks text,
						 sort_order bigint(20) NOT NULL,
						 PRIMARY KEY (id)
						)";
						mysqli_query($this->dbcon,$sql_table);

		}
		if(!empty($_REQUEST['doAction'])) {
			switch($_REQUEST['doAction']) {
				case 'Add_New_Project':
					header('location:lowpressure_struct_option.php');
					break;
				case"AddProject":
					$sql_ins = "INSERT IGNORE INTO rbi_low_pressure_project_details(	project,jobno,location,	tank,reference,incharge,year,date_of_sarvey,sarveydate)
					VALUES('".addslashes($_REQUEST['txtproject'])."',
					'".addslashes($_REQUEST['txtjobno'])."',
					'".addslashes($_REQUEST['txtlocation'])."',
					'".addslashes($_REQUEST['txttank'])."',
					'".addslashes($_REQUEST['txtreference'])."',
					'".addslashes($_REQUEST['txtincharge'])."',
					'".addslashes($_REQUEST['txtyear'])."',
					'".addslashes($_REQUEST['text_date_of_sarvey'])."',
					'".addslashes($_REQUEST['txtsarveydate'])."'
					)";
					mysqli_query($this->dbcon,$sql_ins);
					$project_id = mysqli_insert_id($this->dbcon);
					$maxno = $this->getMaxProject();
					$maxno++;
					$sql_upd = "UPDATE rbi_low_pressure_project_details SET project_no=". $maxno." WHERE id=".$project_id;
					mysqli_query($this->dbcon,$sql_upd);
					$sql_table = "CREATE TABLE IF NOT EXISTS  ".$maxno."_lowpressure_struct_option (
						id int(10) NOT NULL AUTO_INCREMENT,
						 project_id int(10) NOT NULL DEFAULT '0',
						 item varchar(255) DEFAULT NULL,
						 material_type varchar(255) DEFAULT NULL,
						 material varchar(255) DEFAULT NULL,
						 non_severe_corr BOOLEAN NOT NULL DEFAULT FALSE,
						 install_date varchar(255) DEFAULT NULL,
						 od_size double(20,2) DEFAULT '0.00',
						 nde varchar(255) DEFAULT NULL,
						 pressure double(20,2) DEFAULT '0.00',
						 allowable_stress double(20,0) DEFAULT '0.00',
						 quality_factor DOUBLE(20,2) NOT NULL,
						 weld_factor DOUBLE(20,2) NOT NULL,
						 coefficient DOUBLE(20,2) NOT NULL,
						 conditions varchar(255) DEFAULT NULL,
						 schedules varchar(255) DEFAULT NULL,
						 temperature double(20,2) DEFAULT '0.00',
						 wall_tickness double(20,2) DEFAULT '0.00',
						 corrosion double(20,2) DEFAULT '0.00',
						 thickness1 double(20,1) DEFAULT '0.00',
						 thickness2 double(20,1) DEFAULT '0.00',
						 thickness3 double(20,1) DEFAULT '0.00',
						 thickness4 double(20,1) DEFAULT '0.00',
						 thickness5 double(20,1) DEFAULT '0.00',
						 thickness6 double(20,1) DEFAULT '0.00',
						 thickness7 double(20,1) DEFAULT '0.00',
						 thickness8 double(20,1) DEFAULT '0.00',
						 corrosion_rate double(20,2) DEFAULT '0.00',
						 length1 double(20,2) DEFAULT '0.00',
						 length2 double(20,2) DEFAULT '0.00',
						 remarks text,
						 sort_order bigint(20) NOT NULL,
						 PRIMARY KEY (id)
						)";
						mysqli_query($this->dbcon,$sql_table);

					header('location:lowpressure_struct_option.php?project_id='.$project_id);
					break;
				case 'UpdateProject':
					 $sql_update = "UPDATE IGNORE rbi_low_pressure_project_details
					SET project = '".addslashes($_REQUEST['txtproject'])."',
					jobno='".addslashes($_REQUEST['txtjobno'])."',
					location = '".addslashes($_REQUEST['txtlocation'])."',
					tank = '".addslashes($_REQUEST['txttank'])."',
					reference = '".addslashes($_REQUEST['txtreference'])."',
					incharge = '".addslashes($_REQUEST['txtincharge'])."',
					year = '".addslashes($_REQUEST['txtyear'])."',
					date_of_sarvey = '".addslashes($_REQUEST['text_date_of_sarvey'])."',
					sarveydate = '".addslashes($_REQUEST['txtsarveydate'])."'
					WHERE id = '".$_REQUEST['project_id']."'
					";
					mysqli_query($this->dbcon,$sql_update);
					 $sql_sel = "SELECT count(id) no FROM ".$this->project_no."_lowpressure_image_details WHERE  project_id = '".$_REQUEST['project_id']."'";
					$rslt = mysqli_query($this->dbcon,$sql_sel);
					$row =  mysqli_fetch_assoc($rslt);
					if($row['no']>0) {
						$this->updateImageDetails();

					}
					else {
						$image_id = $this->insertImageDetails();
					}
					$this->addImage();
					header('location:lowpressure_project_listing.php');
					break;
				case 'CopyProject':
					$project_id = $_REQUEST['project_id'];
					$sql_sel = "SELECT p.* FROM  rbi_low_pressure_project_details p  WHERE p.id=".$project_id;
					$result = mysqli_query($this->dbcon,$sql_sel);
					$row = mysqli_fetch_assoc($result);
					$sql_ins = "INSERT IGNORE INTO rbi_low_pressure_project_details(	project,jobno,location,	tank,reference,incharge,year,date_of_sarvey,sarveydate,copy_id)
					VALUES('".addslashes($row['project'])."',
					'".addslashes($row['jobno'])."',
					'".addslashes($row['location'])."',
					'".addslashes($row['tank'])."',
					'',
					'".addslashes($row['incharge'])."',
					'".addslashes($row['year'])."',
					'".addslashes($row['date_of_sarvey'])."',
					'".addslashes($row['sarveydate'])."',
					'".$project_id."'
					)";
					mysqli_query($this->dbcon,$sql_ins);
					$project_id = mysqli_insert_id($this->dbcon);
					$sql_sel = "SELECT p.*,s.* FROM ".$this->project_no."_lowpressure_struct_option s LEFT JOIN rbi_low_pressure_project_details p ON s.project_id=p.id WHERE s.project_id=".$_REQUEST['project_id'];

					$result1 = mysqli_query($this->dbcon,$sql_sel);

					$project_id = mysqli_insert_id($this->dbcon);
					$maxno = $this->getMaxProject();
					$maxno++;

					$sql_upd = "UPDATE rbi_low_pressure_project_details SET project_no=". $maxno." WHERE id=".$project_id;
					mysqli_query($this->dbcon,$sql_upd);

					$sql_table = "CREATE TABLE IF NOT EXISTS  ".$maxno."_lowpressure_struct_option (
						 id int(10) NOT NULL AUTO_INCREMENT,
						 project_id int(10) NOT NULL DEFAULT '0',
						 item varchar(255) DEFAULT NULL,
						 material_type varchar(255) DEFAULT NULL,
						 material varchar(255) DEFAULT NULL,
						 non_severe_corr BOOLEAN NOT NULL DEFAULT FALSE,
						 install_date varchar(255) DEFAULT NULL,
						 od_size double(20,2) DEFAULT '0.00',
						 nde varchar(255) DEFAULT NULL,
						 pressure double(20,2) DEFAULT '0.00',
						 allowable_stress double(20,0) DEFAULT '0.00',
						 quality_factor DOUBLE(20,2) NOT NULL,
						 weld_factor DOUBLE(20,2) NOT NULL,
						 coefficient DOUBLE(20,2) NOT NULL,
						 conditions varchar(255) DEFAULT NULL,
						 schedules varchar(255) DEFAULT NULL,
						 temperature double(20,2) DEFAULT '0.00',
						 wall_tickness double(20,2) DEFAULT '0.00',
						 corrosion double(20,2) DEFAULT '0.00',
						 thickness1 double(20,1) DEFAULT '0.00',
						 thickness2 double(20,1) DEFAULT '0.00',
						 thickness3 double(20,1) DEFAULT '0.00',
						 thickness4 double(20,1) DEFAULT '0.00',
						 thickness5 double(20,1) DEFAULT '0.00',
						 thickness6 double(20,1) DEFAULT '0.00',
						 thickness7 double(20,1) DEFAULT '0.00',
						 thickness8 double(20,1) DEFAULT '0.00',
						 corrosion_rate double(20,2) DEFAULT '0.00',
						 length1 double(20,2) DEFAULT '0.00',
						 length2 double(20,2) DEFAULT '0.00',
						 remarks text,
						 sort_order bigint(20) NOT NULL,
						 PRIMARY KEY (id)
						)";
						mysqli_query($this->dbcon,$sql_table);

					while($row1 = mysqli_fetch_assoc($result1)) {
						print $sql_ins = "INSERT IGNORE INTO ".$maxno."_lowpressure_struct_option(project_id,item,material_type,material,non_severe_corr,install_date,
		od_size,
		nde,pressure,allowable_stress,quality_factor,weld_factor,coefficient,conditions,schedules,wall_tickness,corrosion,thickness1,thickness2,
		thickness3,thickness4,thickness5,thickness6,thickness7,thickness8,length1,length2,remarks,sort_order,	corrosion_rate)
							VALUES('".addslashes($project_id)."',
							'".addslashes($row1['item'])."',
							'".addslashes($row1['material_type'])."',
							'".addslashes($row1['material'])."',
							'".addslashes($row1['non_severe_corr'])."',
							'".addslashes($row1['install_date'])."',
							'".addslashes($row1['od_size'])."',
							'".addslashes($row1['nde'])."',
							'".addslashes($row1['pressure'])."',
							'".addslashes($row1['allowable_stress'])."',
							'".addslashes($row1['quality_factor'])."',
							'".addslashes($row1['weld_factor'])."',
							'".addslashes($row1['coefficient'])."',
							'".addslashes($row1['conditions'])."',
							'".addslashes($row1['schedules'])."',
							'".addslashes($row1['wall_tickness'])."',
							'".addslashes($row1['corrosion'])."',
							'".addslashes($row1['thickness1'])."',
							'".addslashes($row1['thickness2'])."',
							'".addslashes($row1['thickness3'])."',
							'".addslashes($row1['thickness4'])."',
							'".addslashes($row1['thickness5'])."',
							'".addslashes($row1['thickness6'])."',
							'".addslashes($row1['thickness7'])."',
							'".addslashes($row1['thickness8'])."',
							'".addslashes($row1['length1'])."',
							'".addslashes($row1['length2'])."',
							'".addslashes($row1['remarks'])."',
							'".addslashes($row1['sort_order'])."',
							'".addslashes($row1['corrosion_rate'])."'
							)";
							mysqli_query($this->dbcon,$sql_ins);
					}
					//header('location:lowpressure_struct_option.php?project_id='.$project_id);
					break;
				case 'CopyBlankProject':
					$project_id = $_REQUEST['project_id'];
					$sql_sel = "SELECT p.* FROM  project_details p  WHERE p.id=".$project_id;
					$result = mysqli_query($this->dbcon,$sql_sel);
					$row = mysqli_fetch_assoc($result);
					$sql_ins = "INSERT IGNORE INTO project_details(	project,jobno,location,	tank,reference,incharge,year,date_of_sarvey,sarveydate,copy_id)
					VALUES('".addslashes($row['project'])."',
					'".addslashes($row['jobno'])."',
					'".addslashes($row['location'])."',
					'".addslashes($row['tank'])."',
					'',
					'".addslashes($row['incharge'])."',
					'".addslashes($row['year'])."',
					'".addslashes($row['date_of_sarvey'])."',
					'".addslashes($row['sarveydate'])."',
					'".$project_id."'
					)";
					mysqli_query($this->dbcon,$sql_ins);
					$project_id = mysqli_insert_id($this->dbcon);
					$sql_sel = "SELECT p.*,s.* FROM ".$this->project_no."_lowpressure_struct_option s LEFT JOIN project_details p ON s.project_id=p.id WHERE s.project_id=".$_REQUEST['project_id'];

					$result1 = mysqli_query($this->dbcon,$sql_sel);
					$project_id = mysqli_insert_id($this->dbcon);
					$maxno = $this->getMaxProject();
					$maxno++;

					$sql_upd = "UPDATE rbi_low_pressure_project_details SET project_no=". $maxno." WHERE id=".$project_id;
					mysqli_query($this->dbcon,$sql_upd);

					$sql_table = "CREATE TABLE IF NOT EXISTS  ".$maxno."_lowpressure_struct_option (
						id int(10) NOT NULL AUTO_INCREMENT,
						 project_id int(10) NOT NULL DEFAULT '0',
						 item varchar(255) DEFAULT NULL,
						 material_type varchar(255) DEFAULT NULL,
						 material varchar(255) DEFAULT NULL,
						 non_severe_corr BOOLEAN NOT NULL DEFAULT FALSE,
						 install_date varchar(255) DEFAULT NULL,
						 od_size double(20,2) DEFAULT '0.00',
						 nde varchar(255) DEFAULT NULL,
						 pressure double(20,2) DEFAULT '0.00',
						 allowable_stress double(20,0) DEFAULT '0.00',
						 quality_factor DOUBLE(20,2) NOT NULL,
						 weld_factor DOUBLE(20,2) NOT NULL,
						 coefficient DOUBLE(20,2) NOT NULL,
						 conditions varchar(255) DEFAULT NULL,
						 schedules varchar(255) DEFAULT NULL,
						 temperature double(20,2) DEFAULT '0.00',
						 wall_tickness double(20,2) DEFAULT '0.00',
						 corrosion double(20,2) DEFAULT '0.00',
						 thickness1 double(20,1) DEFAULT '0.00',
						 thickness2 double(20,1) DEFAULT '0.00',
						 thickness3 double(20,1) DEFAULT '0.00',
						 thickness4 double(20,1) DEFAULT '0.00',
						 thickness5 double(20,1) DEFAULT '0.00',
						 thickness6 double(20,1) DEFAULT '0.00',
						 thickness7 double(20,1) DEFAULT '0.00',
						 thickness8 double(20,1) DEFAULT '0.00',
						 corrosion_rate double(20,2) DEFAULT '0.00',
						 length1 double(20,2) DEFAULT '0.00',
						 length2 double(20,2) DEFAULT '0.00',
						 remarks text,
						 sort_order bigint(20) NOT NULL,
						 PRIMARY KEY (id)
						)";
						mysqli_query($this->dbcon,$sql_table);

					while($row1 = mysqli_fetch_assoc($result1)) {
						$sql_ins = "INSERT IGNORE INTO ".$maxno."_lowpressure_struct_option(project_id,item,material_type,material,install_date,
		od_size,
		nde,pressure,allowable_stress,conditions,schedules,wall_tickness,corrosion,thickness1,thickness2,
		thickness3,thickness4,thickness5,thickness6,thickness7,thickness8,length1,length2,remarks,sort_order,	corrosion_rate)
							VALUES('".addslashes($project_id)."',
							'".addslashes($row1['item'])."',
							'".addslashes($row1['material_type'])."',
							'".addslashes($row1['material'])."',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'".addslashes($row1['sort_order'])."',
							''
							)";
							mysqli_query($this->dbcon,$sql_ins);
					}
					header('location:lowpressure_struct_option.php?project_id='.$project_id);
					break;
				case'DeleteStruct':
					$project_id = $_REQUEST['project_id'];
					$struct_id = $_REQUEST['struct_id'];
					$sql_del = "DELETE FROM ".$this->project_no."_lowpressure_struct_option WHERE id=".$struct_id;
					mysqli_query($this->dbcon,$sql_del);
					header('location:lowpressure_struct_option.php?project_id='.$project_id);
					break;
				case 'DeleteProject':
					$project_id = $_REQUEST['project_id'];
					 $sql_del1 = "DROP TABLE ".$this->project_no."_lowpressure_struct_option";
					mysqli_query($this->dbcon,$sql_del1);
					 $sql_del2 = "DROP TABLE ".$this->project_no."_lowpressure_image_details";
					mysqli_query($this->dbcon,$sql_del2);
					 $sql_del3 = "DELETE FROM rbi_low_pressure_project_details WHERE id=".$project_id;
					mysqli_query($this->dbcon,$sql_del3);
					header('location:lowpressure_project_listing.php');
					break;
				case'Update_Sortorder':
					$project_id = $_REQUEST['project_id'];
					$sql="SELECT id FROM ".$this->project_no."_lowpressure_struct_option WHERE project_id=".$project_id;
					$result = mysqli_query($this->dbcon,$sql);
					$sort_order=1;
					while($row = mysqli_fetch_assoc($result)) {
						$sql_update = "UPDATE ".$this->project_no."_lowpressure_struct_option SET sort_order=".$sort_order." where id=".$row['id'];
						mysqli_query($this->dbcon,$sql_update);
						$sort_order++;
					}
					break;
				case"login":
					if(strtolower($_REQUEST['userInput'])=='ut'&&strtolower($_REQUEST['passwordInput'])=='aries2020'){
						$_SESSION['userid']=1;
						header('location:lowpressure_project_listing.php');
					}
					else {
						header('location:./?flagErr=Y');
					}
					break;
				case'logout':
					unset($_SESSION['userid']);
					header('location:./');
					break;
				case"DeleteImage":
					$sqlimg = "SELECT image".$_REQUEST['image_no']." image FROM ".$this->project_no."_lowpressure_image_details WHERE project_id=".$_REQUEST['project_id'];
					$rslt = mysqli_query($this->dbcon,$sqlimg);
					$row_img = mysqli_fetch_assoc($rslt);
					$sqldel = "UPDATE ".$this->project_no."_lowpressure_image_details SET image".$_REQUEST['image_no']."='' WHERE project_id=".$_REQUEST['project_id'];
					$rslt = mysqli_query($this->dbcon,$sqldel);
					unlink('upload_low_pressure_img/'.$row_img['image']);
					break;
			}
		}
	}

	function display() {
		if(!empty($_REQUEST['project_id'])) {
			$project_id = $_REQUEST['project_id'];
			$sql_sel = "SELECT p.* FROM  rbi_low_pressure_project_details p  WHERE p.id=".$project_id;
			$result = mysqli_query($this->dbcon,$sql_sel);
			return $result;
		}
	}

	function get_stuct_option() {
		$project_id = $_REQUEST['project_id'];
		$rslt1 = $this->display();
		$row_res = mysqli_fetch_assoc($rslt1);
		$table_no = $row_res['project_no'];
		$sql_sel = "SELECT p.*,s.* FROM ".$table_no."_lowpressure_struct_option s
		LEFT JOIN rbi_low_pressure_project_details p
		ON s.project_id=p.id
		WHERE s.project_id=".$project_id." order by s.sort_order";
		$result = mysqli_query($this->dbcon,$sql_sel);
		//$struct_option = "";
		while($row = mysqli_fetch_assoc($result)) {
			if(empty($row['item'])) $row['item'] = '';
			if(empty($row['material_type'])) $row['material_type'] = '';
			if(empty($row['material'])) $row['material'] = '';
			if(empty($row['install_date'])) $row['install_date'] = '';
			if(empty($row['od_size'])) $row['od_size'] = '';
			if(empty($row['nde'])) $row['allowance'] = '';
			if(empty($row['pressure']) && $row['pressure']!='0.00') $row['pressure'] = '-';
			if(empty($row['allowable_stress']) && $row['allowable_stress']!='0.00') $row['allowable_stress'] = '-';
			if(empty($row['conditions'])) $row['conditions'] = '';
			if(empty($row['schedules'])) $row['schedules'] = '';
			if(empty($row['temperature'])) $row['temperature'] = '';
			if(empty($row['wall_tickness'])) $row['wall_tickness'] = '';
			if(empty($row['corrosion'])) $row['corrosion'] = '';
			if(empty($row['thickness1']) && $row['thickness1']=='0.00') $row['thickness1'] = '-';
			if(empty($row['thickness2']) && $row['thickness2']=='0.00') $row['thickness2'] = '-';
			if(empty($row['thickness3']) && $row['thickness3']=='0.00') $row['thickness3'] = '-';
			if(empty($row['thickness4']) && $row['thickness4']=='0.00') $row['thickness4'] = '-';
			if(empty($row['thickness5']) && $row['thickness5']=='0.00') $row['thickness5'] = '-';
			if(empty($row['thickness6']) && $row['thickness6']=='0.00') $row['thickness6'] = '-';
			if(empty($row['thickness7']) && $row['thickness7']=='0.00') $row['thickness7'] = '-';
			if(empty($row['thickness8']) && $row['thickness8']=='0.00') $row['thickness8'] = '-';
			if(empty($row['corrosion_rate'])) $row['corrosion_rate'] = '0';
			if(empty($row['length1'])) $row['length1'] = '';
			if(empty($row['length2'])) $row['length2'] = '';
			if(empty($row['remarks'])) $row['remarks'] = '';
			if(is_numeric($row['thickness1'])) $thickness1 = ($row['thickness1']/25.4);
			if(is_numeric($row['thickness2'])) $thickness2 = ($row['thickness2']/25.4);
			if(is_numeric($row['thickness3'])) $thickness3 = ($row['thickness3']/25.4);
			if(is_numeric($row['thickness4'])) $thickness4 = ($row['thickness4']/25.4);
			if(is_numeric($row['thickness5'])) $thickness5 = ($row['thickness5']/25.4);
			if(is_numeric($row['thickness6'])) $thickness6 = ($row['thickness6']/25.4);
			if(is_numeric($row['thickness7'])) $thickness7 = ($row['thickness7']/25.4);
			if(is_numeric($row['thickness8'])) $thickness8 = ($row['thickness8']/25.4);
			$arrThick =array();
			$i=0;
			if(is_numeric($thickness1) && !empty($thickness1)) {
				$arrThick[$i++]=$thickness1;
			}
			if(is_numeric($thickness2) && !empty($thickness2)) {
				$arrThick[$i++]=$thickness2;
			}
			if(is_numeric($thickness3) && !empty($thickness3)) {
				$arrThick[$i++]=$thickness3;
			}
			if(is_numeric($thickness4) && !empty($thickness4)) {
				$arrThick[$i++]=$thickness4;
			}
			$arrThick1 =array();
			$i=0;
			if(is_numeric($thickness5) && !empty($thickness5)) {
				$arrThick1[$i++]=$thickness5;
			}
			if(is_numeric($thickness6) && !empty($thickness6)) {
				$arrThick1[$i++]=$thickness6;
			}
			if(is_numeric($thickness7)&& !empty($thickness7)) {
				$arrThick1[$i++]=$thickness7;
			}
			if(is_numeric($thickness8)&& !empty($thickness8)) {
				$arrThick1[$i++]=$thickness8;
			}
			// $row['mean_thickness1'] = round((min($arrThick))*25.4,2);
			// $row['mean_thickness2'] = round((min($arrThick1))*25.4,2);
			$row['mean_thickness1'] = !empty($arrThick) ? round(min($arrThick) * 25.4, 2) : 0;
            $row['mean_thickness2'] = !empty($arrThick1) ? round(min($arrThick1) * 25.4, 2) : 0;
			if($row['pressure']=='0.00') {
				$row['pressure']="";
			}
			if($row['od_size']=='0.000') {
				$row['od_size']="";
			}


			if(!is_numeric($row['mean_thickness1'])) {
				$row['mean_thickness1'] = "-";
			}
			if(!is_numeric($row['mean_thickness2'])) {
				$row['mean_thickness2'] = "-";
			}
			if(empty($row['wall_tickness'])) {
				$wall_tickness=0;
			}
			else $wall_tickness=$row['wall_tickness'];
			if(!is_numeric($row['wall_tickness'])) {
				$wall_tickness=0;
			}
			else $wall_tickness=$row['wall_tickness'];
			if(!is_numeric($row['mean_thickness1'])) {
				$mean_thickness1=0;
			}
			else $mean_thickness1=$row['mean_thickness1'];
			$row['diminution1'] = round((($wall_tickness-$mean_thickness1)/100)*1000,2);//round((($wall_tickness-$mean_thickness1)/100)*1000,2);


			if(!is_numeric($row['mean_thickness2'])) {
				$mean_thickness2=0;
			}
			else $mean_thickness2=$row['mean_thickness2'];

			if(empty($row['od_size']) || !is_numeric($row['od_size'])) {
				$od_size=0;
			}
			else $od_size=$row['od_size'];

			if(empty($row['pressure']) || !is_numeric($row['pressure'])) {
				$pressure=0;
			}
			else $pressure=$row['pressure'];

			if(empty($row['allowable_stress']) || !is_numeric($row['allowable_stress'])) {
				$allowable_stress=0;
			}
			else $allowable_stress=$row['allowable_stress'];
			$row['quality_factor'] =1;
			if(empty($row['quality_factor']) || !is_numeric($row['quality_factor'])) {
				$quality_factor=1;
			}
			else $quality_factor=$row['quality_factor'];
			$row['weld_factor']=1;
			if(empty($row['weld_factor']) || !is_numeric($row['weld_factor'])) {
				$weld_factor=1;
			}
			else $weld_factor=$row['weld_factor'];

			if(empty($row['coefficient']) || !is_numeric($row['coefficient'])) {
				$coefficient=0;
			}
			else $coefficient=$row['coefficient'];



			if(!empty($pressure) && $pressure>0) {
				//$row['design_thickness']= round(((($od_size)-(2*$row['corrosion']))/2)/(1/((1.155* $pressure)/$allowable_stress))-1,2);
				$row['design_thickness']= ($pressure*$od_size)/(2*(($allowable_stress*$quality_factor*$weld_factor)));
				/*$row['design_thickness']= ($pressure*$od_size)/(2*(($allowable_stress*$quality_factor*$weld_factor)+($pressure*$coefficient)));*/
				//((($od_size)-(2*($row['corrosion']/25.4)))/2);
				//round(((($od_size)-(2*($row['corrosion']/25.4)))/2)/(1-$exponent),2);
			}

			if($row['temperature']<400 && $od_size>=0.5 && $od_size<=1 && $row['design_thickness']<1.8) {

						$row['design_thickness'] = 0.07;
			}
			if($row['temperature']<400 && $od_size>.5 && $od_size<=2 && $row['design_thickness']<0.07) {

						$row['design_thickness'] = 0.07;
					}
					if($row['temperature']<400 && $od_size>2 && $od_size<3 && $row['design_thickness']<0.07) {

						$row['design_thickness'] = 0.07;
					}
					if($row['temperature']<400 && $od_size>=3 && $od_size<4 && $row['design_thickness']<0.08) {

						$row['design_thickness'] = 0.08;
					}

					if($row['temperature']<400 && $od_size>=4 && $od_size<6 && $row['design_thickness']<0.09) {
						$row['design_thickness'] = 0.09;
					}
					if($row['temperature']<400 && $od_size>=6 && $od_size<=19 && $row['design_thickness']<0.11) {

						$row['design_thickness']=0.11;
					}
					if($row['temperature']<400 && $od_size>=20 && $od_size<=25 && $row['design_thickness']<0.12) {

						$row['design_thickness']=0.12;
					}

			$row['diff_thickness']= ($mean_thickness2/25.4)-$row['design_thickness'];

			if(!empty($mean_thickness2)) {
			$row['remain_life']= $row['diff_thickness']/($row['corrosion_rate']/25.4);
			}
			else $row['remain_life']="";
				if(empty($row['non_severe_corr'])) {
					$row['non_severe_corr'] = 'false';
				}
				else {
					$row['non_severe_corr'] = 'true';
				}
				$row['design_thickness'] = round($row['design_thickness']*25.4,2);
				// $row['diff_thickness'] = round($row['diff_thickness']*25.4,2);
				// $row['remain_life']= round($row['remain_life'],2);
				$row['diff_thickness'] = is_numeric($row['diff_thickness']) ? round($row['diff_thickness'] * 25.4, 2) : 0;
                $row['remain_life']    = is_numeric($row['remain_life'])    ? round($row['remain_life'], 2) : 0;
				//$row['remain_life'] = $row['remain_life']*25.4;

				$struct_option[] = array(
					'struct_id'=>$row['id'],
					'item'=>(empty($row['item'])?'':$row['item']),
					'material_type'=>(empty($row['material_type'])?'':$row['material_type']),
					'material'=>(empty($row['material'])?'':$row['material']),
					'non_severe_corr'=>($row['non_severe_corr']),
					'install_date'=>(empty($row['install_date'])?'':$row['install_date']),
					'od_size'=>(($row['od_size']=='')?'':$row['od_size']),
					'nde'=>(($row['nde']=='')?'':$row['nde']),
					'pressure'=>(empty($row['pressure'])?'':$row['pressure']),
					'allowable_stress'=>(empty($row['allowable_stress'])?'':$row['allowable_stress']),
					'quality_factor'=>(empty($row['quality_factor'])?'':$row['quality_factor']),
					'weld_factor'=>(empty($row['weld_factor'])?'':$row['weld_factor']),
					'coefficient'=>(empty($row['coefficient'])?'':$row['coefficient']),
					'conditions'=>$row['conditions'],
					'schedules'=>$row['schedules'],
					'temperature'=>(($row['temperature']=='0.00')?'-':$row['temperature']),
					'wall_tickness'=>(($row['wall_tickness']=='0.00')?'-':$row['wall_tickness']),
					'corrosion'=>(($row['corrosion']=='0.00')?'-':$row['corrosion']),
					'thickness1'=>(($row['thickness1']=='0.00')?'-':$row['thickness1']),
					'thickness2'=>(($row['thickness2']=='0.00')?'-':$row['thickness2']),
					'thickness3'=>(($row['thickness3']=='0.00')?'-':$row['thickness3']),
					'thickness4'=>(($row['thickness4']=='0.00')?'-':$row['thickness4']),
					'mean_thickness1'=>(($row['mean_thickness1']=='0.00')?'-':$row['mean_thickness1']),
					'diminution1'=>$row['diminution1'],
					'thickness5'=>(($row['thickness5']=='0.00')?'-':$row['thickness5']),
					'thickness6'=>(($row['thickness6']=='0.00')?'-':$row['thickness6']),
					'thickness7'=>(($row['thickness7']=='0.00')?'-':$row['thickness7']),
					'thickness8'=>(($row['thickness8']=='0.00')?'-':$row['thickness8']),
					'mean_thickness2'=>(($row['mean_thickness2']=='0.00')?'-':$row['mean_thickness2']),
					'design_thickness'=>(($row['design_thickness']=='0.00')?'-':$row['design_thickness']),
					'diff_thickness'=>(($row['diff_thickness']=='0.00')?'':$row['diff_thickness']),
					'corrosion_rate'=>(($row['corrosion_rate']=='0.00')?'':$row['corrosion_rate']),
					'remain_life'=>(($row['remain_life']=='0.00')?'':$row['remain_life']),
						'length1'=>(($row['length1']=='0.00')?'':$row['length1']),
						'length2'=>(($row['length2']=='0.00')?'':$row['length2']),
						'remarks'=>$row['remarks'],
						'delete_struct'=>"<a href=\"javascript:deleteStuct('".$row['project_id']."','".$row['id']."');\"><img src=\"images/b_drop.png\"/></a>",
						'add_struct'=>"<a href=\"javascript:add_struct('".$row['project_id']."','".$row['sort_order']."');\"><img src=\"images/add.png\"/></a>",
					);
		}

		return $struct_option;
	}

	/*Function for inserting image details*/
	function insertImageDetails() {
		 $sql_ins = "INSERT IGNORE INTO ".$this->project_no."_lowpressure_image_details (project_id,title1,description1,title2,description2,title3,description3,title4,description4,rating1,observations1, recommendations1,title5,description5,title6,description6,title7,description7,title8,description8,rating2,observations2,recommendations2
		 ,title9,description9,title10,description10,title11,description11,title12,description12,rating3,observations3, recommendations3,title13,description13,title14,description14,title15,description15,title16,description16,rating4,observations4,
		 recommendations4,height,width)
		VALUES('".addslashes($_REQUEST['project_id'])."',
		'".addslashes($_REQUEST['txttitle1'])."',
		'".addslashes($_REQUEST['txtdescription1'])."',
		'".addslashes($_REQUEST['txttitle2'])."',
		'".addslashes($_REQUEST['txtdescription2'])."',
		'".addslashes($_REQUEST['txttitle3'])."',
		'".addslashes($_REQUEST['txtdescription3'])."',
		'".addslashes($_REQUEST['txttitle4'])."',
		'".addslashes($_REQUEST['txtdescription4'])."',
		'".addslashes($_REQUEST['txtrating1'])."',
		'".addslashes($_REQUEST['txtobservations1'])."',
		'".addslashes($_REQUEST['txtrecommendations1'])."',
		'".addslashes($_REQUEST['txttitle5'])."',
		'".addslashes($_REQUEST['txtdescription5'])."',
		'".addslashes($_REQUEST['txttitle6'])."',
		'".addslashes($_REQUEST['txtdescription6'])."',
		'".addslashes($_REQUEST['txttitle7'])."',
		'".addslashes($_REQUEST['txtdescription7'])."',
		'".addslashes($_REQUEST['txttitle8'])."',
		'".addslashes($_REQUEST['txtdescription8'])."',
		'".addslashes($_REQUEST['txtrating2'])."',
		'".addslashes($_REQUEST['txtobservations2'])."',
		'".addslashes($_REQUEST['txtrecommendations2'])."',
		'".addslashes($_REQUEST['txttitle9'])."',
		'".addslashes($_REQUEST['txtdescription9'])."',
		'".addslashes($_REQUEST['txttitle10'])."',
		'".addslashes($_REQUEST['txtdescription10'])."',
		'".addslashes($_REQUEST['txttitle11'])."',
		'".addslashes($_REQUEST['txtdescription11'])."',
		'".addslashes($_REQUEST['txttitle12'])."',
		'".addslashes($_REQUEST['txtdescription12'])."',
		'".addslashes($_REQUEST['txtrating3'])."',
		'".addslashes($_REQUEST['txtobservations3'])."',
		'".addslashes($_REQUEST['txtrecommendations3'])."',
		'".addslashes($_REQUEST['txttitle13'])."',
		'".addslashes($_REQUEST['txtdescription13'])."',
		'".addslashes($_REQUEST['txttitle14'])."',
		'".addslashes($_REQUEST['txtdescription14'])."',
		'".addslashes($_REQUEST['txttitle15'])."',
		'".addslashes($_REQUEST['txtdescription15'])."',
		'".addslashes($_REQUEST['txttitle16'])."',
		'".addslashes($_REQUEST['txtdescription16'])."',
		'".addslashes($_REQUEST['txtrating4'])."',
		'".addslashes($_REQUEST['txtobservations4'])."',
		'".addslashes($_REQUEST['txtrecommendations4'])."',
		'".addslashes($_REQUEST['txtheight'])."',
		'".addslashes($_REQUEST['txtwidth'])."'
		)";
		mysqli_query($this->dbcon,$sql_ins);
		$image_id = mysqli_insert_id($this->dbcon);
		return $image_id;
	}

	/*Function for updating image deatils*/
	function updateImageDetails() {
		 $upd_sql = "UPDATE IGNORE ".$this->project_no."_lowpressure_image_details
		SET title1 = '".addslashes($_REQUEST['txttitle1'])."',
		description1 = '".addslashes($_REQUEST['txtdescription1'])."',
		title2 = '".addslashes($_REQUEST['txttitle2'])."',
		description2 = '".addslashes($_REQUEST['txtdescription2'])."',
		title3 = '".addslashes($_REQUEST['txttitle3'])."',
		description3 = '".addslashes($_REQUEST['txtdescription3'])."',
		title4 = '".addslashes($_REQUEST['txttitle4'])."',
		description4 = '".addslashes($_REQUEST['txtdescription4'])."',
		rating1 = '".addslashes($_REQUEST['txtrating1'])."',
		observations1 = '".addslashes($_REQUEST['txtobservations1'])."',
		recommendations1 = '".addslashes($_REQUEST['txtrecommendations1'])."',
		title5 = '".addslashes($_REQUEST['txttitle5'])."',
		description5 = '".addslashes($_REQUEST['txtdescription5'])."',
		title6 = '".addslashes($_REQUEST['txttitle6'])."',
		description6 = '".addslashes($_REQUEST['txtdescription6'])."',
		title7 = '".addslashes($_REQUEST['txttitle7'])."',
		description7 = '".addslashes($_REQUEST['txtdescription7'])."',
		title8 = '".addslashes($_REQUEST['txttitle8'])."',
		description8 = '".addslashes($_REQUEST['txtdescription8'])."',
		rating2 = '".addslashes($_REQUEST['txtrating2'])."',
		observations2 = '".addslashes($_REQUEST['txtobservations2'])."',
		recommendations2 = '".addslashes($_REQUEST['txtrecommendations2'])."',
		title9= '".addslashes($_REQUEST['txttitle9'])."',
		description9 = '".addslashes($_REQUEST['txtdescription9'])."',
		title10 = '".addslashes($_REQUEST['txttitle10'])."',
		description10 = '".addslashes($_REQUEST['txtdescription10'])."',
		title11 = '".addslashes($_REQUEST['txttitle11'])."',
		description11 = '".addslashes($_REQUEST['txtdescription11'])."',
		title12 = '".addslashes($_REQUEST['txttitle12'])."',
		description12 = '".addslashes($_REQUEST['txtdescription12'])."',
		rating3 = '".addslashes($_REQUEST['txtrating3'])."',
		observations3 = '".addslashes($_REQUEST['txtobservations3'])."',
		recommendations3 = '".addslashes($_REQUEST['txtrecommendations3'])."',
		title13 = '".addslashes($_REQUEST['txttitle13'])."',
		description13 = '".addslashes($_REQUEST['txtdescription13'])."',
		title14 = '".addslashes($_REQUEST['txttitle14'])."',
		description14 = '".addslashes($_REQUEST['txtdescription14'])."',
		title15 = '".addslashes($_REQUEST['txttitle15'])."',
		description15 = '".addslashes($_REQUEST['txtdescription15'])."',
		title16 = '".addslashes($_REQUEST['txttitle16'])."',
		description16 = '".addslashes($_REQUEST['txtdescription16'])."',
		rating4 = '".addslashes($_REQUEST['txtrating4'])."',
		observations4 = '".addslashes($_REQUEST['txtobservations4'])."',
		height = '".addslashes($_REQUEST['txtheight'])."',
		width = '".addslashes($_REQUEST['txtwidth'])."',
		recommendations4 = '".addslashes($_REQUEST['txtrecommendations4'])."'
		WHERE project_id = '".$_REQUEST['project_id']."'
		";
		mysqli_query($this->dbcon,$upd_sql);
	}

	/*function for displaying image details*/
	function displayImageDetails($project_id=null) {
		$sql_sel = "SELECT * FROM ".$this->project_no."_lowpressure_image_details WHERE project_id='".$project_id."'";
		$result = mysqli_query($this->dbcon,$sql_sel);
		return $result;
	}

	function addImage() {
		
		for($i=1;$i<=16;$i++) {
			if(!empty($_FILES['txtfile'.$i]['name'])) {
				$extn = substr($_FILES['txtfile'.$i]['name'],strpos($_FILES['txtfile'.$i]['name'],'.'));
				$file = substr($_FILES['txtfile'.$i]['name'],0,strpos($_FILES['txtfile'.$i]['name'],'.'));
				$filename = $file.$_REQUEST['project_id']."_".$i.$extn;
				$original_file = $_FILES['txtfile'.$i]['tmp_name'];
				$filepath = 'upload_low_pressure_img/original/'.$filename;
				$resize = 'upload_low_pressure_img/'.$filename;

				
				if(copy($original_file,$filepath)) {
					include_once "hft_image.php";
					include_once "hft_image_errors.php";

					// Get the new height and width
					$height = $_REQUEST['txtheight'];
					$width = $_REQUEST['txtwidth'];

					
					//$objImage = new hft_image($filepath);
					//$objImage->resize($width, $height, '0');
					//$objImage->output_resized($resize, "JPEG");
					//unset($objImage);
					copy($original_file,$resize);
					$sql_upd = "UPDATE IGNORE ".$this->project_no."_lowpressure_image_details
					SET image".$i."='".$filename."'
					WHERE project_id = '".$_REQUEST['project_id']."'";
					//echo $sql_upd;exit;
					mysqli_query($this->dbcon,$sql_upd);
				}
			}
		}
	}
	function get_project_list() {
		$sql = "SELECT * FROM rbi_low_pressure_project_details WHERE copy_id=0 ORDER BY id,copy_id";
		$result = mysqli_query($this->dbcon,$sql);
		while($row = mysqli_fetch_assoc($result)) {
			$struct1="";
				$struct2="";
			if(empty($row['copy_id'])) {
				$struct1="<a href='lowpressure_struct_option.php?doAction=CopyProject&project_id=".$row['id']."'>Copy</a>";
				$struct2="<a href='lowpressure_struct_option.php?doAction=CopyBlankProject&project_id=".$row['id']."'>Blank Copy</a>";
			}
		$struct_options[] = array(
			'project_id'=>$row['id'],
			'project'=>$row['project'],
			'jobno'=>$row['jobno'],
			'location'=>$row['location'],
			'tank'=>$row['tank'],
			'reference'=>$row['reference'],
			'incharge'=>$row['incharge'],
			'edit'=>"<a href='lowpressure_struct_option.php?project_id=".$row['id']."'><img src='images/b_edit.png'/></a>",
			'download'=>"<a href='report_lowpressure_struct_option_excel.php?project_id=".$row['id']."'><img src='images/page_excel.png'/></a>",
			'copy_project'=>$struct1,
			'copy_blank_project'=>$struct2,
			'delete_project'=>"<a href=\"javascript:deleteProject('".$row['id']."');\"><img src=\"images/b_drop.png\"/></a>",
			);
			$sql1 = "SELECT * FROM rbi_low_pressure_project_details WHERE copy_id='".$row['id']."' ORDER BY id,copy_id";
			$result1 = mysqli_query($this->dbcon,$sql1);
			while($row1 = mysqli_fetch_assoc($result1)) {
				$struct1="";
				$struct2="";
					if(!empty($row1['copy_id'])) {
						$struct1="<a href='lowpressure_struct_option.php?doAction=CopyProject&project_id=".$row1['id']."'>Copy</a>";
						$struct2="<a href='lowpressure_struct_option.php?doAction=CopyBlankProject&project_id=".$row1['id']."'>Blank Copy</a>";
					}
				$struct_options[] = array(
					'project_id'=>$row1['id'],
					'project'=>$row1['project'],
					'jobno'=>$row1['jobno'],
					'location'=>$row1['location'],
					'tank'=>$row1['tank'],
					'reference'=>$row1['reference'],
					'incharge'=>$row1['incharge'],
					'edit'=>"<a href='lowpressure_struct_option.php?project_id=".$row1['id']."'><img src='images/b_edit.png'/></a>",
					'download'=>"<a href='report_lowpressure_struct_option_excel.php?project_id=".$row1['id']."'><img src='images/page_excel.png'/></a>",
					'copy_project'=>$struct1,
					'copy_blank_project'=>$struct2,
					'delete_project'=>"<a href=\"javascript:deleteProject('".$row1['id']."');\"><img src=\"images/b_drop.png\"/></a>",
					);
			}
		}
		return $struct_options;
	}

	/*Function for fetching maximum of projects*/
	function getMaxProject() {
		$sql="SELECT MAX(project_no) no  FROM rbi_low_pressure_project_details";
		$result = mysqli_query($this->dbcon,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row['no'];
	}
}
$objstruct = new struct_option();
?>
