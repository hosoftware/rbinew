<?php
include_once "lowpressure_struct.class.php";
if(!empty($_REQUEST['project_id'])) {
	$rslt = $objstruct->display();
	$row = mysql_fetch_assoc($rslt);
}
else {
	$_REQUEST['project_id']=0;
}
$_REQUEST['txtproject'] = "";
if(!empty($row['project'])) {
	$_REQUEST['txtproject'] = $row['project'];
}
$_REQUEST['txtjobno'] = "";
if(!empty($row['jobno'])) {
	$_REQUEST['txtjobno'] = $row['jobno'];
}
$_REQUEST['txtlocation'] = "";
if(!empty($row['location'])) {
	$_REQUEST['txtlocation'] = $row['location'];
}
$_REQUEST['txttank'] = "";
if(!empty($row['tank'])) {
	$_REQUEST['txttank'] = $row['tank'];
}
$_REQUEST['txtreference'] = "";
if(!empty($row['reference'])) {
	$_REQUEST['txtreference'] = $row['reference'];
}
$_REQUEST['txtincharge'] = "";
if(!empty($row['incharge'])) {
	$_REQUEST['txtincharge'] = $row['incharge'];
}
$_REQUEST['txtyear'] = "";
if(!empty($row['year'])) {
	$_REQUEST['txtyear'] = $row['year'];
}
$_REQUEST['text_date_of_sarvey'] = "";
if(!empty($row['date_of_sarvey'])) {
	 $_REQUEST['text_date_of_sarvey'] = $row['date_of_sarvey'];
}
$_REQUEST['txtsarveydate'] = "";
if(!empty($row['sarveydate'])) {
	$_REQUEST['txtsarveydate'] = $row['sarveydate'];
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
  <link href='css/style.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
 <style>
        .green:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .green:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: #99CC00;
            background-color: #99CC00;
        }
        .yellow:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .yellow:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: yellow;
        }
        .red:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .red:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #e83636;
        }

		 .blue:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .blue:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #0066FF;
        }
		.violet:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .violet:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #CC0066;
        }

		.orange:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .orange:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #FF6600;
        }

		.brown:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .brown:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #800000;
        }

		.purple:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .purple:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #6600CC;
        }

		.grey:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .grey:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #C2C2A3;
        }






        .resign{
            color: red;
            font-size:20 px !important;
            font-weight:bold;
        }
         .other{
            color: red;
            font-size:20 px !important;
            font-weight:bold;
        }
    </style>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxscrollbar.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxmenu.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxgrid.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxgrid.edit.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxgrid.selection.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxgrid.aggregates.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxcheckbox.js"></script>
	<script type="text/javascript" src="js/gettheme.js"></script>
	 <script type="text/javascript" src="jqwidgets/jqxgrid.columnsresize.js"></script>
	 <script type="text/javascript" src="jqwidgets/jqxgrid.columnsreorder.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxcalendar.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxdatetimeinput.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxgrid.pager.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxmaskedinput.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxnumberinput.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxdropdownlist.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxcombobox.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxlistbox.js"></script>
	<script type="text/javascript" src="jqwidgets/globalization/globalize.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxgrid.filter.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxgrid.sort.js"></script>
	 <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
	 <script type="text/javascript" src="jqwidgets/jqxdropdownlist.js"></script>
		 <script type="text/javascript" src="jqwidgets/jqxcombobox.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxinput.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
	<link href="css/calendarstyle.css" rel="stylesheet" type="text/css" />
	<script src="js/calendar_new.js" type="text/javascript"></script>
    <script type="text/javascript">
	//<![CDATA[

	function deleteStuct(project_id,struct_id) {

		if(confirm('Are you sure to delete?')) {
			//location.href="add_struct_option.php?doAction=DeleteStruct&project_id="+project_id+"&struct_id="+struct_id;
			var commit = $("#jqxgrid").jqxGrid('deleterow', struct_id);
			var source =
							{
								datatype: "json",
									datafields:
								[
									{ name: 'struct_id', type: 'number' },
									{ name: 'item'},
									{ name: 'material_type'},
									{ name: 'material'},
									{ name: 'non_severe_corr'},
									{ name: 'install_date' },
									{ name: 'od_size'},
									{ name: 'nde' },
									{ name: 'pressure' },
									{ name: 'allowable_stress' },
									{ name: 'quality_factor' },
									{ name: 'weld_factor' },
									{ name: 'coefficient' },
									{ name: 'conditions' },
									{ name: 'schedules'},
									{ name: 'temperature' },
									{ name: 'wall_tickness' },
									{ name: 'corrosion' },
									{ name: 'thickness1' },
									{ name: 'thickness2' },
									{ name: 'thickness3' },
									{ name: 'thickness4'},
									{ name: 'mean_thickness1'},
									{ name: 'diminution1' },
									{ name: 'thickness5'},
									{ name: 'thickness6' },
									{ name: 'thickness7'},
									{ name: 'thickness8'},
									{ name: 'mean_thickness2'},
									{ name: 'design_thickness'},
									{ name: 'diff_thickness'},
									{ name: 'corrosion_rate'},
									{ name: 'remain_life'},
									{ name: 'length1'},
									{ name: 'length2'},
									{ name: 'remarks', type: 'string' },
									{ name: 'delete_struct', type: 'string' },
									{ name: 'add_struct', type: 'string' }
								],
								method:'post',
								url: 'lowpressure_struct_data.php'
								};
								 source.localdata = source;
								 $("#jqxgrid").jqxGrid('updatebounddata', 'cells');
		}

	}
	function deleteImage(project_id,imageno) {
		location.href="lowpressure_struct_option.php?project_id="+project_id+"&doAction=DeleteImage"+"&image_no="+imageno;
	}
	function showCal(dos, dte){
	showCalendar(dos, dte);
	}

	function  add_struct(project_id,sort_order) {
		 var datarow = {};
		 datarow['sort_order']=sort_order;
		 datarow['doAction']='add_new';
		var commit = $("#jqxgrid").jqxGrid('addrow', '2', datarow);
	}
        $(document).ready(function () {
            var theme = "";

            // prepare the data
            var source =
            {
				datatype: "json",
					datafields:
                [
                    { name: 'struct_id', type: 'number' },
					{ name: 'item'},
					{ name: 'material_type'},
					{ name: 'material'},
					{ name: 'non_severe_corr'},
					{ name: 'install_date' },
					{ name: 'od_size'},
					{ name: 'nde' },
					{ name: 'pressure' },
					{ name: 'allowable_stress' },
					{ name: 'quality_factor' },
					{ name: 'weld_factor' },
					{ name: 'coefficient' },
					{ name: 'conditions' },
					{ name: 'schedules'},
					{ name: 'temperature' },
					{ name: 'wall_tickness' },
					{ name: 'corrosion' },
					{ name: 'thickness1' },
					{ name: 'thickness2' },
					{ name: 'thickness3' },
					{ name: 'thickness4'},
					{ name: 'mean_thickness1'},
					{ name: 'diminution1' },
					{ name: 'thickness5'},
					{ name: 'thickness6' },
					{ name: 'thickness7'},
					{ name: 'thickness8'},
					{ name: 'mean_thickness2'},
					{ name: 'design_thickness'},
					{ name: 'diff_thickness'},
					{ name: 'corrosion_rate'},
					{ name: 'remain_life'},
					{ name: 'length1'},
					{ name: 'length2'},
					{ name: 'remarks', type: 'string' },
					{ name: 'delete_struct', type: 'string' },
					{ name: 'add_struct', type: 'string' }
                ],
				method:'get',
				url: "lowpressure_struct_data.php?project_id=<?php print($_REQUEST['project_id'])?>",
                updaterow: function (rowid, rowdata, commit) {
                    // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful
                    // and with parameter false if the synchronization failder.
					 var data = "update=true&struct_id=" + rowdata.struct_id + "&item=" + rowdata.item;
					data = data + "&material_type=" + rowdata.material_type + "&material=" + rowdata.material+ "&install_date=" + rowdata.install_date;
					data = data + "&od_size=" + rowdata.od_size + "&nde=" + rowdata.nde;
					data = data + "&od_size=" + rowdata.od_size + "&nde=" + rowdata.nde;
					  data = data + "&schedules=" + rowdata.schedules + "&temperature=" + rowdata.temperature;
					  data = data + "&wall_tickness=" + rowdata.wall_tickness + "&corrosion=" + rowdata.corrosion;
					  data = data + "&thickness1=" + rowdata.thickness1 + "&thickness2=" + rowdata.thickness2;
					  data = data + "&thickness3=" + rowdata.thickness3;
					  data = data + "&thickness4=" + rowdata.thickness4 + "&thickness5=" + rowdata.thickness5;
					  data = data + "&thickness6=" + rowdata.thickness6 + "&thickness7=" + rowdata.thickness7;
					  data = data + "&thickness8=" + rowdata.thickness8;
					  data = data + "&corrosion_rate=" + rowdata.corrosion_rate + "&length1=" + rowdata.length1;
					  data = data + "&length2=" + rowdata.length2;
					  data = data + "&pressure=" + rowdata.pressure;
					  data = data + "&non_severe_corr=" + rowdata.non_severe_corr;
					  data = data + "&allowable_stress=" + rowdata.allowable_stress;
					  data = data + "&weld_factor=" + rowdata.weld_factor;
					  data = data + "&quality_factor=" + rowdata.quality_factor;
					  data = data + "&coefficient=" + rowdata.coefficient;
					  data = data + "&conditions=" + rowdata.conditions;
					  data = data + "&remarks=" + rowdata.remarks+"&project_id="+<?php print($_REQUEST['project_id'])?> ;
					  $.ajax({
							dataType: 'json',
							url: 'lowpressure_struct_data.php',
							data: data,
							method:'GET',
							success: function (data, status, xhr) {
								  var source =
							{
								datatype: "json",
									datafields:
								[
									{ name: 'struct_id', type: 'number' },
									{ name: 'item'},
									{ name: 'material_type'},
									{ name: 'material'},
									{ name: 'non_severe_corr'},
									{ name: 'install_date' },
									{ name: 'od_size'},
									{ name: 'nde' },
									{ name: 'pressure' },
									{ name: 'allowable_stress' },
									{ name: 'quality_factor' },
									{ name: 'weld_factor' },
									{ name: 'coefficient' },
									{ name: 'conditions' },
									{ name: 'schedules'},
									{ name: 'temperature' },
									{ name: 'wall_tickness' },
									{ name: 'corrosion' },
									{ name: 'thickness1' },
									{ name: 'thickness2' },
									{ name: 'thickness3' },
									{ name: 'thickness4'},
									{ name: 'mean_thickness1'},
									{ name: 'diminution1' },
									{ name: 'thickness5'},
									{ name: 'thickness6' },
									{ name: 'thickness7'},
									{ name: 'thickness8'},
									{ name: 'mean_thickness2'},
									{ name: 'design_thickness'},
									{ name: 'diff_thickness'},
									{ name: 'corrosion_rate'},
									{ name: 'remain_life'},
									{ name: 'length1'},
									{ name: 'length2'},
									{ name: 'remarks', type: 'string' },
									{ name: 'delete_struct', type: 'string' },
									{ name: 'add_struct', type: 'string' }
								],
								method:'post',
								url: 'lowpressure_struct_data.php'
								};
								 source.localdata = source;
								 $("#jqxgrid").jqxGrid('updatebounddata', 'cells');
							}

						});
					},
					addrow: function (rowid, rowdata, position, commit) {
                    // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful
                    // and with parameter false if the synchronization failder.
					 var data = "update=true&project_id="+<?php print($_REQUEST['project_id'])?> + "&sort_order=" + rowdata.sort_order  + "&doAction=" + rowdata.doAction;
					  $.ajax({
							dataType: 'json',
							url: 'lowpressure_struct_data.php',
							data: data,
							method:'get',
							success: function (data, status, xhr) {
								  var source =
							{
								datatype: "json",
									datafields:
								[
									{ name: 'struct_id', type: 'number' },
									{ name: 'item'},
									{ name: 'material_type'},
									{ name: 'material'},
									{ name: 'non_severe_corr'},
									{ name: 'install_date' },
									{ name: 'od_size'},
									{ name: 'nde' },
									{ name: 'pressure' },
									{ name: 'allowable_stress' },
									{ name: 'quality_factor' },
									{ name: 'weld_factor' },
									{ name: 'coefficient' },
									{ name: 'conditions' },
									{ name: 'schedules'},
									{ name: 'temperature' },
									{ name: 'wall_tickness' },
									{ name: 'corrosion' },
									{ name: 'thickness1' },
									{ name: 'thickness2' },
									{ name: 'thickness3' },
									{ name: 'thickness4'},
									{ name: 'mean_thickness1'},
									{ name: 'diminution1' },
									{ name: 'thickness5'},
									{ name: 'thickness6' },
									{ name: 'thickness7'},
									{ name: 'thickness8'},
									{ name: 'mean_thickness2'},
									{ name: 'design_thickness'},
									{ name: 'diff_thickness'},
									{ name: 'corrosion_rate'},
									{ name: 'remain_life'},
									{ name: 'length1'},
									{ name: 'length2'},
									{ name: 'remarks', type: 'string' },
									{ name: 'delete_struct', type: 'string' },
									{ name: 'add_struct', type: 'string' }
								],
								method:'post',
								url: 'lowpressure_struct_data.php'
								};
								 source.localdata = source;
								 $("#jqxgrid").jqxGrid('updatebounddata', 'cells');
							}

						});
					},
					 deleterow: function (rowid, commit) {
						 // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful
                    // and with parameter false if the synchronization failder.
					 var data = "update=true&project_id="+<?php print($_REQUEST['project_id'])?> +"&struct_id="+rowid+"&doAction=Delete_Struct";
					  $.ajax({
							dataType: 'json',
							url: 'lowpressure_struct_data.php',
							data: data,
							method:'get',
							success: function (data, status, xhr) {
								  var source1 =
							{
								datatype: "json",
									datafields:
								[
									{ name: 'struct_id', type: 'number' },
									{ name: 'item'},
									{ name: 'material_type'},
									{ name: 'material'},
									{ name: 'non_severe_corr'},
									{ name: 'install_date' },
									{ name: 'od_size'},
									{ name: 'nde' },
									{ name: 'pressure' },
									{ name: 'allowable_stress' },
									{ name: 'quality_factor' },
									{ name: 'weld_factor' },
									{ name: 'coefficient' },
									{ name: 'conditions' },
									{ name: 'schedules'},
									{ name: 'temperature' },
									{ name: 'wall_tickness' },
									{ name: 'corrosion' },
									{ name: 'thickness1' },
									{ name: 'thickness2' },
									{ name: 'thickness3' },
									{ name: 'thickness4'},
									{ name: 'mean_thickness1'},
									{ name: 'diminution1' },
									{ name: 'thickness5'},
									{ name: 'thickness6' },
									{ name: 'thickness7'},
									{ name: 'thickness8'},
									{ name: 'mean_thickness2'},
									{ name: 'design_thickness'},
									{ name: 'diff_thickness'},
									{ name: 'corrosion_rate'},
									{ name: 'remain_life'},
									{ name: 'length1'},
									{ name: 'length2'},
									{ name: 'remarks', type: 'string' },
									{ name: 'delete_struct', type: 'string' },
									{ name: 'add_struct', type: 'string' }
								]
								};
								 source.localdata = source1;
								 $("#jqxgrid").jqxGrid('updatebounddata', 'cells');
							}

						});
						//commit(true);
					}
				};
            var dataAdapter = new $.jqx.dataAdapter(source);

				var cellclass1 = function (row, columnfield, value,rowdata) {
					if(parseFloat(rowdata.remain_life)>=5 && parseFloat(rowdata.remain_life)<=9) {

						return 'yellow';
					}
					if(parseFloat(rowdata.remain_life)<5){
						return 'red';
					}

	            }
				var cellclass2 = function (row, columnfield, value,rowdata) {

					if(parseFloat(rowdata.temperature)<400 && parseFloat(rowdata.od_size)>=0.5 && parseFloat(rowdata.od_size)<=1 && parseFloat(rowdata.design_thickness)<1.8) {

						return 'blue';
					}
					if(parseFloat(rowdata.temperature)<400 && parseFloat(rowdata.od_size)>1 && parseFloat(rowdata.od_size)<=1.5 && parseFloat(rowdata.design_thickness)<1.8) {

						return 'violet';
					}

					if(parseFloat(rowdata.temperature)<400 && parseFloat(rowdata.od_size)>1.5 && parseFloat(rowdata.od_size)<=2 && parseFloat(rowdata.design_thickness)<1.8) {

						return 'orange';
					}
					if(parseFloat(rowdata.temperature)<400 && parseFloat(rowdata.od_size)>2 && parseFloat(rowdata.od_size)<=3 && parseFloat(rowdata.design_thickness)<2) {

						return 'brown';
					}

					if(parseFloat(rowdata.temperature)<400 && parseFloat(rowdata.od_size)>3 && parseFloat(rowdata.od_size)<=5 && parseFloat(rowdata.design_thickness)<2.3) {
						rowdata.design_thickness=2.3
						return 'green';
					}
					if(parseFloat(rowdata.temperature)<400 && parseFloat(rowdata.od_size)>=6 && parseFloat(rowdata.od_size)<=18 && parseFloat(rowdata.design_thickness)<2.8) {

						return 'purple';
					}
					if(parseFloat(rowdata.temperature)<400 && parseFloat(rowdata.od_size)>=20 && parseFloat(rowdata.od_size)<=24 && parseFloat(rowdata.design_thickness)<3.1) {

						return 'grey';
					}



	            }



            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                width: 1170,
                source: dataAdapter,
                editable: true,
				enabletooltips: true,
                theme: theme,
				 showstatusbar: true,
				 filterable: true,
				columnsresize: true,
					showfilterrow: true,
                selectionmode: 'multiplecellsadvanced',
					 enablehover: false,
					pageable: true,
                autoheight: true,
				pagesizeoptions: ['50', '100', '150', '200', '250', '300', '350', '400', '450', '500', '550', '600','1000'],
                columns: [

				  { text: 'Delete', columntype: 'textbox', datafield: 'delete_struct', width: 40,align: 'center',editable: false,cellclassname: cellclass2,pinned:true},
				  { text: 'Add', columntype: 'textbox', datafield: 'add_struct', width: 20,align: 'center',editable: false,cellclassname: cellclass2,pinned:true},
                  { text: 'Items', columntype: 'textbox',filtertype: 'textbox', datafield: 'item', width: 150,editable: true,cellclassname: cellclass2 ,pinned:true},
				  { text: 'Material', columntype: 'combobox', datafield: 'material_type', width: 150,editable: true,
                        createeditor: function (row, column, editor) {
                            // assign a new data source to the combobox.
                            var list = ['SS', 'MS'];
                            editor.jqxComboBox({ source: list, promptText: "    " });
                        },
                        // update the editor's value before saving it.
                        cellvaluechanging: function (row, column, columntype, oldvalue, newvalue) {
                            // return the old value, if the new value is empty.
                            if (newvalue == "") return oldvalue;
                        },
                        initeditor: function (row, cellvalue, editor) {
                            editor.jqxComboBox({ dropDownWidth: 200 });
                        } },
                  { text: 'Gas/<br/>liquid/<br/>Content', datafield: 'material', columntype: 'combobox', width: 150,
                        createeditor: function (row, column, editor) {
                            // assign a new data source to the combobox.
                            var list = ['hydraulic oil', 'lube oil','Steam', 'Freshwater', 'Air', 'Fuel Oil', 'Well  Test', 'Hydrocarbon Service'
							, 'Seawater','Mud','Cement'];
                            editor.jqxComboBox({ source: list, promptText: "    " });
                        },
                        // update the editor's value before saving it.
                        cellvaluechanging: function (row, column, columntype, oldvalue, newvalue) {
                            // return the old value, if the new value is empty.
                            if (newvalue == "") return oldvalue;
                        },
                        initeditor: function (row, cellvalue, editor) {
                            editor.jqxComboBox({ dropDownWidth: 200 });
                        }  },
				  { text: 'known <br/>severe</br>corrosion', datafield: 'non_severe_corr', columntype: 'checkbox', width: 67},
                  { text: 'Installation<br/> Date', columntype: 'textbox', datafield: 'install_date', width: 80},
                  { text: 'Size<br/>(OD in <br/>inch)', columntype: 'textbox', datafield: 'od_size', width: 80},
                  { text: 'NDE <br/> Method', columntype: 'textbox', datafield: 'nde', width: 80},
				  { text: 'Pressure<br/>Rating <br/>(Psig)', columntype: 'textbox', datafield: 'pressure', width: 80},
				  { text: 'Allowable Stress', columntype: 'textbox', datafield: 'allowable_stress', width: 80},
				  { text: 'Quality<br>Factor', columntype: 'textbox', datafield: 'quality_factor', width: 80},
				  { text: 'Weld<br>joint<br/>Reduction<br/>factor', columntype: 'textbox', datafield: 'weld_factor', width: 80},
				  { text: 'Value of <br>coefficient', columntype: 'textbox', datafield: 'coefficient', width: 80},
                  { text: 'Condition<br/>(New/<br/>Replaced<br/>/Required)', columntype: 'textbox', datafield: 'conditions', width: 80 ,editable: true},
				  { text: 'Schedule', columntype: 'textbox', datafield: 'schedules', width: 80 ,editable: true},
                  { text: 'F', columntype: 'textbox', datafield: 'temperature', width: 80,columngroup: 'Temp-Rating' },
                  { text: '(mm)', columntype: 'textbox', datafield: 'wall_tickness', width: 80,columngroup: 'wall_tick' ,editable: true},
                  { text: '(mm)', columntype: 'textbox', datafield: 'corrosion', width: 80,columngroup: 'corrosion1'},
				{ text: '3 O Clock', columntype: 'textbox', datafield: 'thickness1', width: 80,columngroup: 'prev_guage_thickness',editable: true},
				{ text: '6 O Clock', columntype: 'textbox', datafield: 'thickness2', width: 80,columngroup: 'prev_guage_thickness',ailign: 'center',editable: true},
				{ text: '9 O Clock', columntype: 'textbox', datafield: 'thickness3', width: 80,columngroup: 'prev_guage_thickness',align: 'center',editable: true},
				{ text: '12 O Clock', columntype: 'textbox', datafield: 'thickness4', width: 80,columngroup: 'prev_guage_thickness',align: 'center'},
				{ text: 'Mean Thickness', columntype: 'textbox', datafield: 'mean_thickness1', width: 80,columngroup: 'prev_guage_thickness',align: 'center',editable: false},
				{ text: 'Diminution in %)', columntype: 'textbox', datafield: 'diminution1', width: 80,columngroup: 'prev_guage_thickness',align: 'center',editable: false},
				{ text: '3 O CLOCK', columntype: 'textbox', datafield: 'thickness5', width: 80,columngroup: 'present_condition',align: 'center'},
				{ text: '6 O CLOCK', columntype: 'textbox', datafield: 'thickness6', width: 80,columngroup: 'present_condition',align: 'center'},
				{ text: '9 O CLOCK', columntype: 'textbox', datafield: 'thickness7', width: 80,columngroup: 'present_condition',align: 'center',editable: true},
				{ text: '12 O CLOCK', columntype: 'textbox', datafield: 'thickness8', width: 80,columngroup: 'present_condition',align: 'center'},
				{ text: 'Minimum measured thickness', columntype: 'textbox', datafield: 'mean_thickness2', width: 80,columngroup: 'present_condition',align: 'center',editable: false},
				{ text: 'Design Thickness', columntype: 'textbox', datafield: 'design_thickness', width: 80,align: 'center',editable: false},

				{ text: 'Difference in tck<br/>(Mean Tck-Dsg Tck)', columntype: 'textbox', datafield: 'diff_thickness', width: 80,align: 'center',editable: false},
				{ text: 'Corrosion rate per year', columntype: 'textbox', datafield: 'corrosion_rate', width: 80,align: 'center'},
				{ text: 'Remaining Life', columntype: 'textbox', datafield: 'remain_life', width: 80,align: 'center',cellclassname: cellclass1,editable: false},
				{ text: 'Est.Lengh in (mm)', columntype: 'textbox', datafield: 'length1', width: 80,columngroup: 'after_2year',ailign: 'center',editable: true},
				{ text: 'Est.Lengh in (mm)', columntype: 'textbox', datafield: 'length2', width: 80,columngroup: 'after_5year',ailign: 'center',editable: true},
				{ text: 'Remarks', columntype: 'textbox', datafield: 'remarks', width: 180,align: 'center'}
                ],
				columngroups:
                [
                  { text: 'Temp<br/>Rating', align: 'top', name: 'Temp-Rating' ,height:100},
                  { text: 'Wall thickeness', align: 'top', name: 'wall_tick' ,height:100},
                  { text: 'Wastage Allowance', align: 'center', name: 'wastage_allowance' },
                  { text: 'Corrosion Allowance', align: 'center', name: 'corrosion1' },
				  { text: 'Previous Guaged Thickness(mm)', align: 'center', name: 'prev_guage_thickness' },
				  { text: 'Present Guaged Thickness (mm)', align: 'center', name: 'present_condition' },
				  { text: 'Diminution Calculation', align: 'center', name: 'dem_calculation' },
				  { text: 'Anticipated Thickness in mm ', ailign: 'center', name: 'anti_thickness' },
				  { text: '<5', align: 'center', name: 'after_2year',parentgroup:'estimated_renewal' },
				  { text: 'Bet 5 & 9', align: 'center', name: 'after_5year',parentgroup:'estimated_renewal' },
                 // { text: 'Order Details', parentgroup: 'ProductDetails', align: 'center', name: 'OrderDetails' },
                  //{ text: 'Location', align: 'center', name: 'Location' }
                ]
            });

        });
		/*function for submitting the form*/
		function frmsubmit(objFrm2) {

			var objFrom1 = document.getElementById('frm_project');
			objFrm2.txtproject.value = objFrom1.txtproject.value;
			objFrm2.txtlocation.value = objFrom1.txtlocation.value;
			objFrm2.txtjobno.value = objFrom1.txtjobno.value;
			objFrm2.txttank.value = objFrom1.txttank.value;
			objFrm2.txtreference.value = objFrom1.txtreference.value;
			objFrm2.text_date_of_sarvey.value = objFrom1.text_date_of_sarvey.value;
			objFrm2.txtsarveydate.value = objFrom1.txtsarveydate.value;
			objFrm2.txtyear.value = objFrom1.txtyear.value;
			objFrm2.txtincharge.value = objFrom1.txtincharge.value;
			if(objFrm2.txtheight.value=='') {
				objFrm2.txtheight.focus();
				alert("Please enter height");
				return false;
			}
			if(objFrm2.txtweight.value=='') {
				objFrm2.txtweight.focus();
				alert("Please enter weight");
				return false;
			}

		}
		//]]>
    </script>
</HEAD>

 <BODY>
  <div class='main'>
	<div class="heading">
		<div class="logo">
			<img src='images/a.png' height='50' width='200'/>
		</div><?php
		include_once "navigation.php";
	?>
	</div>
	<div class='container'>
		<table align='center' border='0'>
		<tr><td>Table 6 - Minimum Thickness for Carbon and Low-alloy Steel Pipe</td></tr>
		<tr>
			<td>
				<table cellspacing=0 cellpadding=0 style='font-size:12px;font-weight:bold'>
					<tr style='border:1px solid;'>
					<td style='border:1px solid;'>NPS</td>
					<td style='border:1px solid;'>Default Minimum Thickness for
					</br>Tempratures <400 F (205 C)
					</br>in(mm)</td>
					<td style='border:1px solid;'>Minimum Alert Thickness for
					</br>Tempratures <400 F (205 C)
					</br>in(mm)</td>
					<td style='border:1px solid;'>&nbsp;</td>
					</tr>
					<tr>
					<td style='border:1px solid;'>1/2 to 1</td>
					<td style='border:1px solid;'>0.07(1.8)</td>
					<td style='border:1px solid;'>0.08(2.0)</td>
					<td bgcolor="#0066FF" style='border:1px solid;' width="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
					<td style='border:1px solid;'> 1 1/2</td>
					<td style='border:1px solid;'>0.07(1.8)</td>
					<td style='border:1px solid;'>0.09(2.3)</td>
					<td bgcolor="#CC0066" style='border:1px solid;'  width="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
					<td style='border:1px solid;'> 2</td>
					<td style='border:1px solid;'>0.07(1.8)</td>
					<td style='border:1px solid;'>0.10(2.5)</td>
					<td bgcolor="#FF6600" style='border:1px solid;'  width="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
					<td style='border:1px solid;'> 3</td>
					<td style='border:1px solid;'>0.8(2.0)</td>
					<td style='border:1px solid;'>0.11(2.8)</td>
					<td bgcolor="#800000" style='border:1px solid;'  width="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
					<td style='border:1px solid;'> 4</td>
					<td style='border:1px solid;'>0.9(2.3)</td>
					<td style='border:1px solid;'>0.12(3.1)</td>
					<td bgcolor="#99CC00" style='border:1px solid;'  width="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
					<td style='border:1px solid;'> 6to18</td>
					<td style='border:1px solid;'>0.11(2.8)</td>
					<td style='border:1px solid;'>0.13(3.3)</td>
					<td bgcolor="#6600CC" style='border:1px solid;'  width="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
					<td style='border:1px solid;'>20to24</td>
					<td style='border:1px solid;'>0.12(3.1)</td>
					<td style='border:1px solid;'>0.14(3.6)</td>
					<td bgcolor="#C2C2A3" style='border:1px solid;'  width="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
				<table>
			</td>
		</tr>
	</table>
		<div class='sect1'>
			<center><span class='h1'><strong>RISK BASED INSPECTION REGISTER (LOW PRESSURE)</strong></span></center><br />
			<center><span class='h1'><strong>TM ANALYSIS WITH ANTICIPATED THICKNESS REMAINING LIFE</strong></span></center><br />
			<form method='post' name='frm_project' id='frm_project' >
				<ul class='lst-disp'>
				<li class='lst-item'>
					<div class='label1'>Project:</div><span class='span_txt'><input type='text' name='txtproject' id='txtproject' value='<?php print($_REQUEST['txtproject'])?>' size="25"/></span>

				</li>
				<div class='clear'></div>
				<li class='lst-item'>
					<label class='label1'>Job No:</label><span class='span_txt'><input type='text' name='txtjobno' id='txtjobno' value='<?php print($_REQUEST['txtjobno'])?>' size="25"/></span>
				</li>
				<div class='clear'></div>
				<li class='lst-item'>
					<label class='label1'>Project Location:</label><span class='span_txt'><input type='text' name='txtlocation' id='txtlocation' value='<?php print($_REQUEST['txtlocation'])?>' size="25"/></span>
				</li>
				</ul>
				<ul class='lst-disp'>
				<li class='lst-item'>
					<label class='label1'>&nbsp;Tank/Space Description:</label><span class='span_txt'><input type='text' name='txttank' id='txttank' value='<?php print($_REQUEST['txttank'])?>' size="25"/></span>
				</li>
				<div class='clear'></div>
				<li class='lst-item'>
					<label class='label1'>&nbsp;Drawing Reference No:</label><span class='span_txt'><input type='text' name='txtreference' id='txtreference' value='<?php print($_REQUEST['txtreference'])?>' size="25"/></span>
				</li>
				<div class='clear'></div>
				<li class='lst-item'>
					<label class='label1'>&nbsp;Project In Charge:</label><span class='span_txt'><input type='text' name='txtincharge' id='txtincharge' value='<?php print($_REQUEST['txtincharge'])?>' size="25"/></span>
				</li>
				</ul>
				<ul class='lst-disp'>
				<li class='lst-item'>
					<label class='label1'>&nbsp;Year Of Build:</label><span class='span_txt'><input type='text' name='txtyear' id='txtyear' value='<?php print($_REQUEST['txtyear'])?>' size="25"/></span>
				</li>
				<div class='clear'></div>
				<li>
					<label class='label1'>&nbsp;&nbsp;Date Of Last Survey:</label><span class='span_txt'><input type='text' name='text_date_of_sarvey' id='text_date_of_sarvey' value='<?php print($_REQUEST['text_date_of_sarvey'])?>' size="20"/> <img
									title="Calendar" style="vertical-align: middle;"
									src="images/calendar0.gif"
									onClick="return showCal('text_date_of_sarvey', 'y-mm-dd');" border="0"></span>
				</li>
				<div class='clear'></div>
				<li class='lst-item'>
					<label class='label1'>&nbsp;Servey Date:</label><span class='span_txt'><input type='text' name='txtsarveydate' id='txtsarveydate' value='<?php print($_REQUEST['txtsarveydate'])?>' size="20"/> <img
									title="Calendar" style="vertical-align: middle;"
									src="images/calendar0.gif"
									onClick="return showCal('txtsarveydate', 'y-mm-dd');" border="0"></span>
				</li>
				</ul>
			<?php
			if(empty($_REQUEST['project_id'])) {
				?><span class='btn_submit'><input type='submit' name='add_project' value='Add Project'/></span><?php
			}
			?>
			<input type='hidden' name='doAction' value='AddProject'/>
			</form>
			<div class='clear'></div>
		</div><?php
		if(!empty($_REQUEST['project_id'])) {
			?><!-- Grid Section Start -->
			<div class='sect2'>
				 <div id='jqxWidget'>
					<div id="jqxgrid"></div>
				</div>
			</div>
			<div class='sect2'><?php

				$result = $objstruct->displayImageDetails($_REQUEST['project_id']);
				$row = mysql_fetch_assoc($result);
				$_REQUEST['txtheight'] = "200";
				if(!empty($row['height'])) {
					$_REQUEST['txtheight'] = $row['height'];
				}
				$_REQUEST['txtwidth'] = "300";
				if(!empty($row['width'])) {
					$_REQUEST['txtwidth'] = $row['width'];
				}
				for($i=1;$i<=16;$i++) {
					$_REQUEST['txttitle'.$i] = "";
					if(!empty($row['title'.$i])) {
						$_REQUEST['txttitle'.$i] = $row['title'.$i];
					}

					$_REQUEST['txtdescription'.$i] = " ";
					if(!empty($row['description'.$i])) {
						$_REQUEST['txtdescription'.$i] = $row['description'.$i];
					}
					if($i<=4){
						$_REQUEST['txtrating'.$i] = "";
						if(!empty($row['rating'.$i])) {
							$_REQUEST['txtrating'.$i] = $row['rating'.$i];
						}
						$_REQUEST['txtobservations'.$i] = "";
						if(!empty($row['observations'.$i])) {
							$_REQUEST['txtobservations'.$i] = $row['observations'.$i];
						}
						$_REQUEST['txtrecommendations'.$i] = "";
						if(!empty($row['recommendations'.$i])) {
							$_REQUEST['txtrecommendations'.$i] = $row['recommendations'.$i];
						}
					}
				}

					?><form name='frm_projectdetails' id='frm_projectdetails' enctype='multipart/form-data' method='post' onsubmit=' return frmsubmit(this);'>
				<div class="leftside">
					<table align='center'>
						<tr>
							<td>Image Height</td>
							<td><input type='test' name='txtheight' id='txtheight' value='<?php print($_REQUEST['txtheight'])?>'/></td>
						</tr>
						<tr>
							<td>Image Width</td>
							<td><input type='test' name='txtwidth' id='txtwidth' value='<?php print($_REQUEST['txtwidth'])?>'/></td>
						</tr>
						<tr>
							<td colspan='2'>COATING CONDITION OF PIPING</td>
						</tr>
						<tr>
							<td>Title1</td>
							<td><input type='test' name='txttitle1' id='txttitle1' value='<?php print($_REQUEST['txttitle1'])?>'/></td>
						</tr>
						<tr>
							<td>Description1</td>
							<td><textarea name='txtdescription1' id='txtdescription1' cols='20' rows='3'><?php print($_REQUEST['txtdescription1'])?></textarea></td>
						</tr>
						<tr>
							<td>Image1</td>
							<td><input type='file' name='txtfile1' id='txtfile1' value=''/><br/><?php
						if(!empty($row['image1'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image1'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><a href="javascript:deleteImage('<?php print($_REQUEST['project_id'])?>','1')">delete image</a><?php

						}
						?></td>
						</tr>
						<tr>
							<td>Title2</td>
							<td><input type='test' name='txttitle2' id='txttitle2' value='<?php print($_REQUEST['txttitle2'])?>'/></td>
						</tr>
						<tr>
							<td>Description2</td>
							<td><textarea name='txtdescription2' id='txtdescription2' cols='20' rows='3'><?php print($_REQUEST['txtdescription2'])?></textarea></td>
						</tr>
						<tr>
							<td>Image2</td>
							<td><input type='file' name='txtfile2' id='txtfile2' value=''/><br/><?php
						if(!empty($row['image2'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image2'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><a href="javascript:deleteImage('<?php print($_REQUEST['project_id'])?>','2')">delete image</a><?php

						}
						?></td>
						</tr>
						<tr>
							<td>Title3</td>
							<td><input type='test' name='txttitle3' id='txttitle3' value='<?php print($_REQUEST['txttitle3'])?>'/></td>
						</tr>
						<tr>
							<td>Description3</td>
							<td><textarea name='txtdescription3' id='txtdescription3' cols='20' rows='3'><?php print($_REQUEST['txtdescription3'])?></textarea></td>
						</tr>
						<tr>
							<td>Image3</td>
							<td><input type='file' name='txtfile3' id='txtfile3' value=''/><br/><?php
						if(!empty($row['image3'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image3'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><a href="javascript:deleteImage('<?php print($_REQUEST['project_id'])?>','3')">delete image</a><?php

						}
						?></td>
						</tr>
						<tr>
							<td>Title4</td>
							<td><input type='test' name='txttitle4' id='txttitle4' value='<?php print($_REQUEST['txttitle4'])?>'/></td>
						</tr>
						<tr>
							<td>Description4</td>
							<td><textarea name='txtdescription4' id='txtdescription4' cols='20' rows='3'><?php print($_REQUEST['txtdescription4'])?></textarea></td>
						</tr>
						<tr>
							<td>Image4</td>
							<td><input type='file' name='txtfile4' id='txtfile4' value=''/><br/><?php
						if(!empty($row['image4'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image4'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><a href="javascript:deleteImage('<?php print($_REQUEST['project_id'])?>','4')">delete image</a><?php

						}
						?></td>
						</tr>

					</table>
					<div class='clear'></div>
				</div>
				<div class="rightside">
					<table align='center'>
						<tr>
							<td colspan='2'>COATING CONDITION OF PIPING</td>
						</tr>
						<tr>
							<td>Title1</td>
							<td><input type='test' name='txttitle5' id='txttitle5' value='<?php print($_REQUEST['txttitle5'])?>'/></td>
						</tr>
						<tr>
							<td>Description1</td>
							<td><textarea name='txtdescription5' id='txtdescription5' cols='20' rows='3'><?php print($_REQUEST['txtdescription5'])?></textarea></td>
						</tr>
						<tr>
							<td>Image1</td>
							<td><input type='file' name='txtfile5' id='txtfile5' value=''/><br/><?php
						if(!empty($row['image5'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image5'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><?php

						}
						?></td>
						</tr>
						<tr>
							<td>Title2</td>
							<td><input type='test' name='txttitle6' id='txttitle6' value='<?php print($_REQUEST['txttitle6'])?>'/></td>
						</tr>
						<tr>
							<td>Description2</td>
							<td><textarea name='txtdescription6' id='txtdescription6' cols='20' rows='3'><?php print($_REQUEST['txtdescription6'])?></textarea></td>
						</tr>
						<tr>
							<td>Image2</td>
							<td><input type='file' name='txtfile6' id='txtfile6' value=''/><br/><?php
						if(!empty($row['image6'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image6'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><a href="javascript:deleteImage('<?php print($_REQUEST['project_id'])?>','6')">delete image</a><?php

						}
						?></td>
						</tr>
						<tr>
							<td>Title3</td>
							<td><input type='test' name='txttitle7' id='txttitle7' value='<?php print($_REQUEST['txttitle7'])?>'/></td>
						</tr>
						<tr>
							<td>Description3</td>
							<td><textarea name='txtdescription7' id='txtdescription7' cols='20' rows='3'><?php print($_REQUEST['txtdescription7'])?></textarea></td>
						</tr>
						<tr>
							<td>Image3</td>
							<td><input type='file' name='txtfile7' id='txtfile7' value=''/><br/><?php
						if(!empty($row['image7'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image7'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><a href="javascript:deleteImage('<?php print($_REQUEST['project_id'])?>','7')">delete image</a><?php

						}
						?></td>
						</tr>
						<tr>
							<td>Title4</td>
							<td><input type='test' name='txttitle8' id='txttitle8' value='<?php print($_REQUEST['txttitle8'])?>'/></td>
						</tr>
						<tr>
							<td>Description4</td>
							<td><textarea name='txtdescription8' id='txtdescription8' cols='20' rows='3'><?php print($_REQUEST['txtdescription8'])?></textarea></td>
						</tr>
						<tr>
							<td>Image4</td>
							<td><input type='file' name='txtfile8' id='txtfile8' value=''/><br/><?php
						if(!empty($row['image8'])) {
						$path1 = 'upload_low_pressure_img/'.$row['image8'];
						?><img src="<?php print($path1)?>" height="100" width="100"/><a href="javascript:deleteImage('<?php print($_REQUEST['project_id'])?>','8')">delete image</a><?php

						}
						?></td>
						</tr>
						<tr>
							<td>Rating</td>
							<td><input type='text' name='txtrating2' id='txtrating2' value='<?php print($_REQUEST['txtrating2'])?>'/></td>
						</tr>
						<tr>
							<td>Observations</td>
							<td><textarea name='txtobservations2' id='txtobservations2' cols='20' rows='3'><?php print($_REQUEST['txtobservations2'])?></textarea></td>
						</tr>
						<tr>
							<td>Recommendations</td>
							<td><textarea name='txtrecommendations2' id='txtrecommendations2' cols='20' rows='3'><?php print($_REQUEST['txtrecommendations2'])?></textarea></td>
						</tr>
					</table>
				</div>
				<div class='clear'></div><?php
				if(!empty($_REQUEST['doAction']) && $_REQUEST['doAction']=='Copy'){
					?><input type='hidden' name='doAction' value='CopyProject'/><?php
				}
				else if(!empty($_REQUEST['doAction']) && $_REQUEST['doAction']=='BlankCopy') {
					?><input type='hidden' name='doAction' value='CopyBlankProject'/><?php
				}
				else {
					?><input type='hidden' name='doAction' value='UpdateProject'/><?php
				}
				?>

				<input type='hidden' name='txtproject' id='txtproject' value='<?php print($_REQUEST['txtproject'])?>'/>
				<input type='hidden' name='txtjobno' id='txtjobno' value='<?php print($_REQUEST['txtjobno'])?>'/>
				<input type='hidden' name='txtlocation' id='txtlocation' value='<?php print($_REQUEST['txtlocation'])?>'/>
				<input type='hidden' name='txttank' id='txttank' value='<?php print($_REQUEST['txttank'])?>'/>
				<input type='hidden' name='txtreference' id='txtreference' value='<?php print($_REQUEST['txtreference'])?>'/>
				<input type='hidden' name='txtincharge' id='txtincharge' value='<?php print($_REQUEST['txtincharge'])?>'/>
				<input type='hidden' name='txtyear' id='txtyear' value='<?php print($_REQUEST['txtyear'])?>'/>
				<input type='hidden' name='text_date_of_sarvey' id='text_date_of_sarvey' value='<?php print($_REQUEST['text_date_of_sarvey'])?>'/>
				<input type='hidden' name='txtsarveydate' id='txtsarveydate' value='<?php print($_REQUEST['txtsarveydate'])?>'/>
				<input type='hidden' name='project_id' id='project_id' value='<?php print($_REQUEST['project_id'])?>'/>



				<div class='clear'></div>
					<input type='submit' value='UPDATE'/>
			</form>
			</div>
			<!-- Grid Section End --><?php
		}
	?></div>
  </div>
 </BODY>
</HTML>
