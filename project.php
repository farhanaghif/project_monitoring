<?php include_once('config.php');?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"
	prefix="og: http://ogp.me/ns#" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Project Monitoring</title>

	<link rel="shortcut icon" href="img/project_monitoring.ico">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
		integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<?php
	$condition	=	'';
	if(isset($_REQUEST['project_name']) and $_REQUEST['project_name']!=""){
		$condition	.=	' AND project_name LIKE "%'.$_REQUEST['project_name'].'%" ';
	}
	if(isset($_REQUEST['client']) and $_REQUEST['client']!=""){
		$condition	.=	' AND client LIKE "%'.$_REQUEST['client'].'%" ';
	}
	if(isset($_REQUEST['project_leader']) and $_REQUEST['project_leader']!=""){
		$condition	.=	' AND project_leader LIKE "%'.$_REQUEST['project_leader'].'%" ';
	}
	if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
		$condition	.=	' AND email LIKE "%'.$_REQUEST['email'].'%" ';
	}
	if(isset($_REQUEST['start_date']) and $_REQUEST['start_date']!=""){

		$condition	.=	' AND DATE(start_date)<="'.$_REQUEST['start_date'].'" ';

	}
	if(isset($_REQUEST['end_date']) and $_REQUEST['end_date']!=""){

		$condition	.=	' AND DATE(end_date)<="'.$_REQUEST['end_date'].'" ';

	}
	
	$userData	=	$db->getAllRecords('project','*',$condition,'ORDER BY id ASC');
	?>
	<div class="container-fluid">
		<h1 style="text-align:center ;">Project Monitoring</h1>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Cari User</strong> <a
					href="tambah-project.php" class="float-right btn btn-dark btn-sm"><i
						class="fa fa-fw fa-plus-circle"></i>
					Tambah Project</a></div>
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil dihapus!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil diubah!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil ditambahkan!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Anda tidak mengubah apapun!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Ada sesuatu yang bermasalah <strong>Mohon coba lagi!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Filter User</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label>Nama Project</label>
									<input type="text" name="project_name" id="project_name" class="form-control"
										value="<?php echo isset($_REQUEST['project_name'])?$_REQUEST['project_name']:''?>"
										placeholder="Masukkan nama project">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Client</label>
									<input type="text" name="client" id="client" class="form-control"
										value="<?php echo isset($_REQUEST['client'])?$_REQUEST['client']:''?>"
										placeholder="Masukkan client">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Project Leader</label>
									<input type="tel" name="project_leader" id="project_leader" class="form-control"
										value="<?php echo isset($_REQUEST['project_leader'])?$_REQUEST['project_leader']:''?>"
										placeholder="Masukkan project leader">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Email Leader</label>
									<input type="email" name="email" id="email" class="form-control"
										value="<?php echo isset($_REQUEST['email'])?$_REQUEST['email']:''?>"
										placeholder="Masukkan email">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit"
											class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Cari</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i
												class="fa fa-fw fa-sync"></i> Ulang</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- <div class="col-sm-6">
								<div class="form-group">
									<label>Rentang Waktu Input</label>
									<div class="input-group">
										<input type="text" class="fromDate form-control hasDatepicker" name="start_date" id="start_date"
											value="" placeholder="Masukkan rentang awal">
										<div class="input-group-prepend"><span class="input-group-text">-</span></div>
										<input type="text" class="toDate form-control hasDatepicker" name="dt" id="dt"
											value="" placeholder="Masukkan rentang akhir">
										<div class="input-group-append"><span class="input-group-text"><a
													href="javascript:;" onclick="$('#start_date,#dt').val('');"><i
														class="fa fa-fw fa-sync"></i></a></span>
										</div>
									</div>
								</div>
							</div> -->

						</div>
				</div>
				</form>
			</div>
		</div>
		<hr>

		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<!-- <th>No</th> -->
						<th>Nama Project</th>
						<th>Client</th>
						<th>Project Leader</th>
						<th class="text-center">Tanggal Mulai</th>
						<th class="text-center">Tanggal Berakhir</th>
						<th class="text-center">Proses</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<!-- <td class="text-left align-middle"><?php echo $s;?></td> -->
						<td class="text-left align-middle"><?php echo $val['project_name'];?></td>
						<td class="text-left align-middle"><?php echo $val['client'];?></td>
						<td class="text-left align-middle">
							<div class="row">
								<img class="ml-4 mr-4 align-middle" width="50" height="50"
									src="foto_leader/<?php echo $val['foto'];?>" alt="">
								<div class="row"><?php echo $val['project_leader'];?><br><?php echo $val['email'];?>
								</div>
							</div>
						</td>
						<td class="text-center align-middle" align="center">
							<?php echo date('d M Y',strtotime($val['start_date']));?></td>
						<td class="text-center align-middle" align="center">
							<?php echo date('d M Y',strtotime($val['end_date']));?></td>
						<td class="text-center align-middle">
							<div class="progress">
								<?php
								$classProgress = 'danger';
								if($val['progress'] > 0 && $val['progress'] <=30){
									$classProgress = 'danger';
								} elseif ($val['progress'] > 30 && $val['progress'] <=50){
									$classProgress = 'info';
								} elseif ($val['progress'] >= 70){
									$classProgress = 'success';
								}
								?>
								<div class="progress-bar progress-bar-<?php echo $classProgress?>" role="progressbar"
									aria-valuenow="<?php echo $val['progress'];?>" aria-valuemin="0" aria-valuemax="100"
									style="width:<?php echo $val['progress'];?>%">
								</div>
							</div>
							<div>
								<?php echo $val['progress'];?> %
							</div>
						</td>
						<td class="text-center align-middle" align="center">
							<a href="ubah-project.php?editId=<?php echo $val['id'];?>" class="text-primary"><i
									class="fa fa-fw fa-edit"></i> Sunting</a> |
							<a href="hapus.php?delId=<?php echo $val['id'];?>" class="text-danger"
								onClick="return confirm('Anda yakin ingin menghapus project ini?');"><i
									class="fa fa-fw fa-trash"></i> Delete</a>
						</td>
					</tr>
					<?php 
						}
					}else{
					?>
					<tr>
						<td colspan="6" align="center">Data tidak ada!</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="card-header float-right">
			Created by : <br><strong>Muhammad Farhan Al-Ghifari</strong></p>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<script src="https://cdnjs.cloustart_datelare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
			integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
		</script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
			integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
		<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
			integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function () {
				jQuery(function ($) {
					var input = $('[type=tel]')
					input.mobilePhoneNumber({
						allowPhoneWithoutPrefix: '+1'
					});
					input.bind('country.mobilePhoneNumber', function (e, country) {
						$('.country').text(country || '')
					})
				});

				//From, To date range start
				var dateFormat = "yy-mm-dd";
				fromDate = $(".fromDate").datepicker({
						changeMonth: true,
						dateFormat: 'yy-mm-dd',
						numberOfMonths: 2
					})
					.on("change", function () {
						toDate.datepicker("option", "minDate", getDate(this));
					}),
					toDate = $(".toDate").datepicker({
						changeMonth: true,
						dateFormat: 'yy-mm-dd',
						numberOfMonths: 2
					})
					.on("change", function () {
						fromDate.datepicker("option", "maxDate", getDate(this));
					});


				function getDate(element) {
					var date;
					try {
						date = $.datepicker.parseDate(dateFormat, element.value);
					} catch (error) {
						date = null;
					}
					return date;
				}
				//From, To date range End here	

			});
		</script>
</body>

</html>