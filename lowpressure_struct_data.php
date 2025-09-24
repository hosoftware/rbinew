<?php
include_once "lowpressure_struct.class.php";
$dbcon = mysqli_connect("localhost", "erp", "aries12171219", "hiles", 3306)
    or die("Error in mysql connection");
if(!empty($_REQUEST['update']) && !empty($_REQUEST['project_id'])) {
	$rslt = $objstruct->display();
	$row_table = mysqli_fetch_assoc($rslt);
	$table_id = $row_table['project_no']."_";
	if(empty($_REQUEST['item'])||$_REQUEST['item']=='null')
		$_REQUEST['item'] = '';
	if(empty($_REQUEST['material'])||$_REQUEST['material']=='null')
		$_REQUEST['material'] = '';
	if(empty($_REQUEST['material_type'])||$_REQUEST['material_type']=='null')
		$_REQUEST['material_type'] = '';
	if(empty($_REQUEST['install_date'])||$_REQUEST['install_date']=='null')
		$_REQUEST['install_date'] = '';
	if(empty($_REQUEST['od_size']) ||$_REQUEST['od_size']=='null')
		$_REQUEST['od_size'] = '';
	if(empty($_REQUEST['nde']) ||$_REQUEST['nde']=='null')
		$_REQUEST['nde'] = '';
	if(empty($_REQUEST['pressure']) ||$_REQUEST['pressure']=='null')
		$_REQUEST['pressure'] = '';
	if(empty($_REQUEST['allowable_stress']) ||$_REQUEST['allowable_stress']=='null')
		$_REQUEST['allowable_stress'] = '';
	if(empty($_REQUEST['conditions']) ||$_REQUEST['conditions']=='null')
		$_REQUEST['conditions'] = '';
	if(empty($_REQUEST['schedules']) ||$_REQUEST['schedules']=='null')
		$_REQUEST['schedules'] = '';
	if(empty($_REQUEST['temperature']) ||$_REQUEST['temperature']=='null')
		$_REQUEST['temperature'] = '';
	if(empty($_REQUEST['wall_tickness']) ||$_REQUEST['wall_tickness']=='null')
		$_REQUEST['wall_tickness'] = '';
	if(empty($_REQUEST['corrosion']) ||$_REQUEST['corrosion']=='null')
		$_REQUEST['corrosion'] = '';
	if(empty($_REQUEST['thickness1']) ||$_REQUEST['thickness1']=='null')
		$_REQUEST['thickness1'] = '';
	if(empty($_REQUEST['thickness2']) ||$_REQUEST['thickness2']=='null')
		$_REQUEST['thickness2'] = '';
	if(empty($_REQUEST['thickness3']) ||$_REQUEST['thickness3']=='null')
		$_REQUEST['thickness3'] = '';
	if(empty($_REQUEST['thickness4']) ||$_REQUEST['thickness4']=='null')
		$_REQUEST['thickness4'] = '';
	if(empty($_REQUEST['diminution1']) ||$_REQUEST['diminution1']=='null')
		$_REQUEST['diminution1'] = '';
	if(empty($_REQUEST['thickness5']) ||$_REQUEST['thickness5']=='null')
		$_REQUEST['thickness5'] = '';
	if(empty($_REQUEST['thickness6']) ||$_REQUEST['thickness6']=='null')
		$_REQUEST['thickness6'] = '';
	if(empty($_REQUEST['thickness7']) ||$_REQUEST['thickness7']=='null')
		$_REQUEST['thickness7'] = '';
	if(empty($_REQUEST['thickness8']) ||$_REQUEST['thickness8']=='null')
		$_REQUEST['thickness8'] = '';
	if(empty($_REQUEST['mean_thickness2']) ||$_REQUEST['mean_thickness2']=='null')
		$_REQUEST['mean_thickness2'] = '';
	if(empty($_REQUEST['design_thickness']) ||$_REQUEST['design_thickness']=='null')
		$_REQUEST['design_thickness'] = '';
	if(empty($_REQUEST['diff_thickness']) ||$_REQUEST['diff_thickness']=='null')
		$_REQUEST['diff_thickness'] = '';
	if(empty($_REQUEST['corrosion_rate']) ||$_REQUEST['corrosion_rate']=='null')
		$_REQUEST['corrosion_rate'] = '';
	if(empty($_REQUEST['remain_life']) ||$_REQUEST['remain_life']=='null')
		$_REQUEST['remain_life'] = '';
	if(empty($_REQUEST['length1']) ||$_REQUEST['length1']=='null')
		$_REQUEST['length1'] = '';
	if(empty($_REQUEST['length2']) ||$_REQUEST['length2']=='null')
		$_REQUEST['length2'] = '';
	if(empty($_REQUEST['remarks']) ||$_REQUEST['remarks']=='null')
		$_REQUEST['remarks'] = '';
	if(empty($_REQUEST['conditions']) ||$_REQUEST['conditions']=='null')
		$_REQUEST['conditions'] = '';

	if(empty($_REQUEST['corrosion_rate']) ||$_REQUEST['corrosion_rate']=='null')
		$_REQUEST['corrosion_rate'] = '';

	if(!empty($_REQUEST['doAction'])&&$_REQUEST['doAction']=='Delete_Struct') {
		$struct_id = $_REQUEST['struct_id'];
		 $sql_del = "DELETE FROM ".$table_id."lowpressure_struct_option WHERE id=".$struct_id;
		mysqli_query($dbcon,$sql_del);
		$struct_options = $objstruct->get_stuct_option();

		echo json_encode($struct_options);
	}
	else if(!empty($_REQUEST['struct_id'])) {

		$flag = false;
		$flag2 = false;
		if(!empty($_REQUEST['material'])) {
			switch($_REQUEST['material']) {
				case"hydraulic oil":
				case"Hydraulic Oil":
				case"lube oil":
				case"Lube Oil":
					$_REQUEST['corrosion'] = "0.30";
					$flag = true;
					break;
				case"steam":
				case"Steam":
				case"freshwater":
				case"Freshwater":
					$_REQUEST['corrosion'] = "0.80";
					$flag = true;
					break;
				case"air":
				case"Air":
				case"fuel oil":
				case"Fuel Oil":
					$_REQUEST['corrosion'] = "1.00";
					$flag = true;
					break;
				case"well test":
				case"Well  Test":
				case"Hydrocarbon Servic":
				case"hydrocarbon service":
					$_REQUEST['corrosion'] = "2.00";
					$flag = true;
					break;
				case"Seawater":
				case"seawater":
				case"Mud":
				case"mud":
				case"cement":
				case"Cement":
					$flag = true;
					$_REQUEST['corrosion'] = "3.00";
					break;
				default:
					$_REQUEST['corrosion'] = "1.60";
			}

			switch($_REQUEST['material']) {
				case"lube oil":
				case"Lube Oil":
					$_REQUEST['corrosion_rate'] = "0.05";
					$flag2 = true;
					break;
				case"steam":
				case"Steam":
				case"freshwater":
				case"Freshwater":
					$_REQUEST['corrosion_rate'] = "0.10";
					$flag2 = true;
					break;
				case"air":
				case"Air":
				case"fuel oil":
				case"Fuel Oil":
					$_REQUEST['corrosion_rate'] = "0.20";
					$flag2 = true;
					break;
				default:
					$_REQUEST['corrosion_rate'] = "0.50";
			}

		}
		if(!empty($_REQUEST['material_type']) && $_REQUEST['material_type']=='SS' && !$flag) {
				$_REQUEST['corrosion'] = "0.30";
		}
		if(!empty($_REQUEST['material_type']) && $_REQUEST['material_type']=='SS' && !$flag2) {
			$_REQUEST['corrosion_rate'] = "0.05";
		}
		if(isset($_REQUEST['non_severe_corr']) && $_REQUEST['non_severe_corr'] == 'true') {
			$_REQUEST['corrosion_rate'] = "0.90";
			$_REQUEST['non_severe_corr']=1;
		}
		else {
			$_REQUEST['non_severe_corr']=0;
		}

		$sql_upd = "UPDATE IGNORE  ".$table_id."lowpressure_struct_option
		SET item='".addslashes($_REQUEST['item'])."',
		material='".addslashes($_REQUEST['material'])."',
		material_type='".addslashes($_REQUEST['material_type'])."',
		non_severe_corr='".addslashes($_REQUEST['non_severe_corr'])."',
		install_date='".addslashes($_REQUEST['install_date'])."',
		od_size='".addslashes($_REQUEST['od_size'])."',
		nde='".addslashes($_REQUEST['nde'])."',
		pressure='".addslashes($_REQUEST['pressure'])."',
		allowable_stress='".addslashes($_REQUEST['allowable_stress'])."',
		quality_factor='".addslashes($_REQUEST['quality_factor'])."',
		weld_factor='".addslashes($_REQUEST['weld_factor'])."',
		coefficient='".addslashes($_REQUEST['coefficient'])."',
		conditions='".addslashes($_REQUEST['conditions'])."',
		schedules='".addslashes($_REQUEST['schedules'])."',
		temperature='".addslashes($_REQUEST['temperature'])."',
		wall_tickness='".addslashes($_REQUEST['wall_tickness'])."',
		corrosion='".addslashes($_REQUEST['corrosion'])."',
		thickness1='".addslashes($_REQUEST['thickness1'])."',
		thickness2='".addslashes($_REQUEST['thickness2'])."',
		thickness3='".addslashes($_REQUEST['thickness3'])."',
		thickness4='".addslashes($_REQUEST['thickness4'])."',
		thickness5='".addslashes($_REQUEST['thickness5'])."',
		thickness6='".addslashes($_REQUEST['thickness6'])."',
		thickness7='".addslashes($_REQUEST['thickness7'])."',
		thickness8='".addslashes($_REQUEST['thickness8'])."',
		corrosion_rate='".addslashes($_REQUEST['corrosion_rate'])."',
		length1='".addslashes($_REQUEST['length1'])."',
		length2='".addslashes($_REQUEST['length2'])."',
		project_id='".addslashes($_REQUEST['project_id'])."',
		remarks='".addslashes($_REQUEST['remarks'])."'
		WHERE id = '".addslashes($_REQUEST['struct_id'])."'";
		mysqli_query($dbcon,$sql_upd);
	}
	else if(!empty($_REQUEST['doAction'])&&$_REQUEST['doAction']=='add_new') {
		$sort_order = $_REQUEST['sort_order']+1;
		$updsort_order = $_REQUEST['sort_order']+1;

		$flag = false;
		$flag2 = false;
		if(!empty($_REQUEST['material'])) {
			switch($_REQUEST['material']) {
				case"hydraulic oil":
				case"Hydraulic Oil":
				case"lube oil":
				case"Lube Oil":
					$_REQUEST['corrosion'] = "0.30";
					$flag = true;
					break;
				case"steam":
				case"Steam":
				case"freshwater":
				case"Freshwater":
					$_REQUEST['corrosion'] = "0.80";
					$flag = true;
					break;
				case"air":
				case"Air":
				case"fuel oil":
				case"Fuel Oil":
					$_REQUEST['corrosion'] = "1.00";
					$flag = true;
					break;
				case"well test":
				case"Well  Test":
				case"Hydrocarbon Servic":
				case"hydrocarbon service":
					$_REQUEST['corrosion'] = "2.00";
					$flag = true;
					break;
				case"Seawater":
				case"seawater":
				case"Mud":
				case"mud":
				case"cement":
				case"Cement":
					$flag = true;
					$_REQUEST['corrosion'] = "3.00";
					break;
				default:
					$_REQUEST['corrosion'] = "1.60";
			}

			switch($_REQUEST['material']) {
				case"lube oil":
				case"Lube Oil":
					$_REQUEST['corrosion_rate'] = "0.05";
					$flag2 = true;
					break;
				case"steam":
				case"Steam":
				case"freshwater":
				case"Freshwater":
					$_REQUEST['corrosion_rate'] = "0.10";
					$flag2 = true;
					break;
				case"air":
				case"Air":
				case"fuel oil":
				case"Fuel Oil":
					$_REQUEST['corrosion_rate'] = "0.20";
					$flag2 = true;
					break;
				default:
					$_REQUEST['corrosion_rate'] = "0.50";
			}

		}
		if(!empty($_REQUEST['material_type']) && $_REQUEST['material_type']=='SS' && !$flag) {
				$_REQUEST['corrosion'] = "0.30";
			}
			if(!empty($_REQUEST['material_type']) && $_REQUEST['material_type']=='SS' && !$flag2) {
				$_REQUEST['corrosion_rate'] = "0.05";
			}
		if(isset($_REQUEST['non_severe_corr']) && $_REQUEST['non_severe_corr'] == 'true') {
			$_REQUEST['corrosion_rate'] = "0.90";
			$_REQUEST['non_severe_corr']=1;
		}
		else {
			$_REQUEST['non_severe_corr']=0;
		}
		$sql_ins = "INSERT IGNORE INTO ".$table_id."lowpressure_struct_option(project_id,item,material_type,material,non_severe_corr,install_date,
		od_size,
		nde,pressure,allowable_stress,quality_factor,weld_factor,coefficient,conditions,schedules,wall_tickness,corrosion,thickness1,thickness2,
		thickness3,thickness4,thickness5,thickness6,thickness7,thickness8,length1,length2,remarks,sort_order,	corrosion_rate)
		VALUES('".addslashes($_REQUEST['project_id'])."',
		'".addslashes($_REQUEST['item'])."',
		'".addslashes($_REQUEST['material_type'])."',
		'".addslashes($_REQUEST['material'])."',
		'".addslashes($_REQUEST['non_severe_corr'])."',
		'".addslashes($_REQUEST['install_date'])."',
		'".addslashes($_REQUEST['od_size'])."',
		'".addslashes($_REQUEST['nde'])."',
		'".addslashes($_REQUEST['pressure'])."',
		'".addslashes($_REQUEST['allowable_stress'])."',
		'".addslashes($_REQUEST['quality_factor'])."',
		'".addslashes($_REQUEST['weld_factor'])."',
		'".addslashes($_REQUEST['coefficient'])."',
		'".addslashes($_REQUEST['conditions'])."',
		'".addslashes($_REQUEST['schedules'])."',
		'".addslashes($_REQUEST['wall_tickness'])."',
		'".addslashes($_REQUEST['corrosion'])."',
		'".addslashes($_REQUEST['thickness1'])."',
		'".addslashes($_REQUEST['thickness2'])."',
		'".addslashes($_REQUEST['thickness3'])."',
		'".addslashes($_REQUEST['thickness4'])."',
		'".addslashes($_REQUEST['thickness5'])."',
		'".addslashes($_REQUEST['thickness6'])."',
		'".addslashes($_REQUEST['thickness7'])."',
		'".addslashes($_REQUEST['thickness8'])."',
		'".addslashes($_REQUEST['length1'])."',
		'".addslashes($_REQUEST['length2'])."',
		'".addslashes($_REQUEST['remarks'])."',
		'".addslashes($sort_order)."',
		'".addslashes($_REQUEST['corrosion_rate'])."'
		)";
		mysqli_query($dbcon,$sql_ins);
		$id=mysqli_insert_id($dbcon);
		$sql="SELECT id FROM ".$table_id."lowpressure_struct_option WHERE sort_order>=".$sort_order." and project_id=".$_REQUEST['project_id']." order by sort_order";
		$sort_order++;
		$result = mysqli_query($dbcon,$sql);
		while($row = mysqli_fetch_assoc($result)) {
			$sql_update = "UPDATE ".$table_id."lowpressure_struct_option SET sort_order=".$sort_order." where id=".$row['id'];
			mysqli_query($dbcon,$sql_update);
			$sort_order++;
		}
		 $sql_update1 = "UPDATE ".$table_id."lowpressure_struct_option SET sort_order=".$updsort_order." where id=".$id;
		mysqli_query($dbcon,$sql_update1);
	}
	else{
		if(empty($_REQUEST['item'])) {
			$_REQUEST['item'] == '';
		}
		if(empty($_REQUEST['item'])) {
			$_REQUEST['item'] == '';
		}
		$sort_order = 0;
		$flag = false;
		$flag2 = false;
		if(!empty($_REQUEST['material'])) {
			switch($_REQUEST['material']) {
				case"hydraulic oil":
				case"Hydraulic Oil":
				case"lube oil":
				case"Lube Oil":
					$_REQUEST['corrosion'] = "0.30";
					$flag = true;
					break;
				case"steam":
				case"Steam":
				case"freshwater":
				case"Freshwater":
					$_REQUEST['corrosion'] = "0.80";
					$flag = true;
					break;
				case"air":
				case"Air":
				case"fuel oil":
				case"Fuel Oil":
					$_REQUEST['corrosion'] = "1.00";
					$flag = true;
					break;
				case"well test":
				case"Well  Test":
				case"Hydrocarbon Servic":
				case"hydrocarbon service":
					$_REQUEST['corrosion'] = "2.00";
					$flag = true;
					break;
				case"Seawater":
				case"seawater":
				case"Mud":
				case"mud":
				case"cement":
				case"Cement":
					$flag = true;
					$_REQUEST['corrosion'] = "3.00";
					break;
				default:
					$_REQUEST['corrosion'] = "1.60";
			}

			switch($_REQUEST['material']) {
				case"lube oil":
				case"Lube Oil":
					$_REQUEST['corrosion_rate'] = "0.05";
					$flag2 = true;
					break;
				case"steam":
				case"Steam":
				case"freshwater":
				case"Freshwater":
					$_REQUEST['corrosion_rate'] = "0.10";
					$flag2 = true;
					break;
				case"air":
				case"Air":
				case"fuel oil":
				case"Fuel Oil":
					$_REQUEST['corrosion_rate'] = "0.20";
					$flag2 = true;
					break;
				default:
					$_REQUEST['corrosion_rate'] = "0.50";
			}

		}
		if(!empty($_REQUEST['material_type']) && $_REQUEST['material_type']=='SS' && !$flag) {
				$_REQUEST['corrosion'] = "0.30";
			}
			if(!empty($_REQUEST['material_type']) && $_REQUEST['material_type']=='SS' && !$flag2) {
				$_REQUEST['corrosion_rate'] = "0.05";
			}
		if(isset($_REQUEST['non_severe_corr']) && $_REQUEST['non_severe_corr'] == 'true') {
			$_REQUEST['corrosion_rate'] = "0.90";
			$_REQUEST['non_severe_corr']=1;
		}
		else {
			$_REQUEST['non_severe_corr']=0;
		}
		$sql_ins = "INSERT IGNORE INTO ".$table_id."lowpressure_struct_option(project_id,item,material_type,material,non_severe_corr,install_date,
		od_size,
		nde,pressure,allowable_stress,quality_factor,weld_factor,coefficient,conditions,schedules,wall_tickness,corrosion,thickness1,thickness2,
		thickness3,thickness4,thickness5,thickness6,thickness7,thickness8,length1,length2,remarks,corrosion_rate)
		VALUES('".addslashes($_REQUEST['project_id'])."',
		'".addslashes($_REQUEST['item'])."',
		'".addslashes($_REQUEST['material_type'])."',
		'".addslashes($_REQUEST['material'])."',
		'".addslashes($_REQUEST['non_severe_corr'])."',
		'".addslashes($_REQUEST['install_date'])."',
		'".addslashes($_REQUEST['od_size'])."',
		'".addslashes($_REQUEST['nde'])."',
		'".addslashes($_REQUEST['pressure'])."',
		'".addslashes($_REQUEST['allowable_stress'])."',
		'".addslashes($_REQUEST['quality_factor'])."',
		'".addslashes($_REQUEST['weld_factor'])."',
		'".addslashes($_REQUEST['coefficient'])."',
		'".addslashes($_REQUEST['conditions'])."',
		'".addslashes($_REQUEST['schedules'])."',
		'".addslashes($_REQUEST['wall_tickness'])."',
		'".addslashes($_REQUEST['corrosion'])."',
		'".addslashes($_REQUEST['thickness1'])."',
		'".addslashes($_REQUEST['thickness2'])."',
		'".addslashes($_REQUEST['thickness3'])."',
		'".addslashes($_REQUEST['thickness4'])."',
		'".addslashes($_REQUEST['thickness5'])."',
		'".addslashes($_REQUEST['thickness6'])."',
		'".addslashes($_REQUEST['thickness7'])."',
		'".addslashes($_REQUEST['thickness8'])."',
		'".addslashes($_REQUEST['length1'])."',
		'".addslashes($_REQUEST['length2'])."',
		'".addslashes($_REQUEST['remarks'])."',
		'".addslashes($_REQUEST['corrosion_rate'])."'
		)";
		mysqli_query($dbcon,$sql_ins);
		$id=mysqli_insert_id($dbcon);
		$sql="SELECT max(sort_order) sort_order FROM ".$table_id."lowpressure_struct_option WHERE project_id=".$_REQUEST['project_id'];
		$result = mysqli_query($dbcon,$sql);
		$row = mysqli_fetch_assoc($result);
		if(empty($row['sort_order'])) $row['sort_order']=0;
		$row['sort_order'] = $row['sort_order']+1;
		 $sql_update1 = "UPDATE ".$table_id."lowpressure_struct_option SET sort_order=".$row['sort_order']." where id=".$id;
		mysqli_query($dbcon,$sql_update1);
	}
	$struct_options = $objstruct->get_stuct_option();

	echo json_encode($struct_options);
}
else {
	$struct_options = $objstruct->get_stuct_option();
	$struct_options[] = array(
					'struct_id'=>'',
					'item'=>'',
					'material_type'=>'',
					'material'=>'',
					'install_date'=>'',
					'od_size'=>'',
					'nde'=>'',
					'pressure'=>'',
					'allowable_stress'=>'',
					'conditions'=>'',
					'schedules'=>'',
					'temperature'=>'',
					'wall_tickness'=>'',
					'corrosion'=>'',
					'thickness1'=>'',
						'thickness2'=>'',
						'thickness3'=>'',
						'thickness4'=>'',
						'mean_thickness1'=>'',
						'diminution1'=>'',
						'thickness5'=>'',
						'thickness6'=>'' ,
						'thickness7'=>'',
						'thickness8'=>'',
						'mean_thickness2'=>'' ,
						'design_thickness'=>'',
						'diff_thickness'=>'',
						'corrosion_rate'=>'',
						'remain_life'=>'',
						'length1'=>'',
						'length2'=>'',
						'remarks'=>'',
						'delete_struct'=>'',
						'add_struct'=>'',
					);
	echo json_encode($struct_options);
}
?>