<?php include_once 'config.php';
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('project','*',' AND id="'.$_REQUEST['editId'].'"');
}

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != '') {
	extract($_REQUEST);
	if ($project_name == '') {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un');
		exit();
	} elseif ($client == '') {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');
		exit();
	} elseif ($project_leader == '') {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=pl');
		exit();
	} elseif ($email == '') {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=em');
		exit();
	} elseif ($progress == '') {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=pg');
		exit();
	} else {
		$userCount = $db->getQueryCount('project', 'id');
		$data = [
			'project_name' => $project_name,
			'client' => $client,
			'project_leader' => $project_leader,
			'email' => $email,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'progress' => $progress,
		];
		$update = $db->update('project', $data,array('id'=>$editId));
		if ($update) {
			header('location:project.php?msg=rus');
			exit();
		} else {
			header('location:project.php?msg=rna');
			exit();
		}
	}
}
?>

<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"
	prefix="og: http://ogp.me/ns#" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sunting Project | Project Monitoring</title>
	<link rel="shortcut icon" href="img/project_monitoring.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
		integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-6724419004010752",
			enable_page_level_ads: true
		});
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-131906273-1');
	</script>
</head>

<body>
	<br><br><br><br>
	<div class="container">
		<?php if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'un') {
			echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Nama project harus diisi!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'ue') {
			echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Client harus diisi!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'pl') {
			echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Project leader harus diisi!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'em') {
			echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Email harus diisi!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'pg') {
			echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Progress harus diisi!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'ras') {
			echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil ditambahkan!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'edt') {
			echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil disunting!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == 'rna') {
			echo '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Data gagal ditambahkan <strong>Coba ulang!</strong></div>';
		} ?>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Sunting Project</strong> <a
					href="project.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Lihat
					Project</a></div>
			<div class="card-body">
				<div class="col-sm-6">
					<h5 class="card-title">Input dengan tanda <span class="text-danger">*</span> harus diisi!</h5>
					<form method="post">
						<div class="form-group">
							<label>Nama Project <span class="text-danger">*</span></label>
							<input type="text" name="project_name" id="project_name" class="form-control"
								value="<?php echo $row[0]['project_name']; ?>" placeholder="Masukkan nama project"
								required>
						</div>
						<div class="form-group">
							<label>Client <span class="text-danger">*</span></label>
							<input type="text" name="client" id="client" class="form-control"
								value="<?php echo $row[0]['client']; ?>" placeholder="Masukkan nama client" required>
						</div>
						<div class="form-group">
							<label>Project Leader <span class="text-danger">*</span></label>
							<input type="text" name="project_leader" id="project_leader" class="form-control"
								value="<?php echo $row[0]['project_leader']; ?>"
								placeholder="Masukkan nama project leader" required>
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="email" name="email" id="email" class="form-control"
								value="<?php echo $row[0]['email']; ?>" placeholder="Masukkan email leader" required>
						</div>
						<div class="form-group">
							<label>Progress <span class="text-danger">*</span></label>
							<input type="number" class="form-control" name="progress" id="progress"
								value="<?php echo $row[0]['progress']; ?>" placeholder="Masukkan persentase progress"
								required>
						</div>
						<div class="form-group">
							<label>Tanggal Mulai <span class="text-danger">*</span></label>
							<input type="date" class="form-control" name="start_date" id="start_date"
								value="<?php echo $row[0]['start_date']; ?>" placeholder="Masukkan tanggal mulai"
								required>
						</div>
						<div class="form-group">
							<label>Tanggal Selesai <span class="text-danger">*</span></label>
							<input type="date" class="form-control" name="end_date" id="end_date"
								value="<?php echo $row[0]['end_date']; ?>" placeholder="Masukkan tanggal mulai"
								required>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i
									class="fa fa-fw fa-plus-circle"></i> Sunting Project</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
		integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
	</script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<!-- <script>
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
		});
	</script> -->



</body>

</html>