<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $judul; ?></title>

	<!--CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container ml-3">
			<a href="" class="navbar-brand">
				<img src="<?= base_url(); ?>assets/img/icon/smekda.png" alt="" width="50" height="44">
				SMK Negeri 2 Surabaya
			</a>
			<button class="navbar-toggler" type="button" data-toggle="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expended="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarAltMarkup">
				
				<!--looping menu-->
				<div class="navbar-nav">
					<a href="<?= base_url('user'); ?>" class="nav-item nav-link text-light">Dashboard</a>
					<?php if($user['role_id'] == 1) : ?>
					<a href="<?= base_url('menu'); ?>" class="nav-item nav-link text-light">Management</a>
					<?php else: ?>
					<a href="<?= base_url('user/profile'); ?>" class="nav-item nav-link text-light">Profile</a>
					<?php endif; ?>
				</div>
			</div>
					<a class="btn btn-secondary text-light float right" data-toggle="modal" data-target="#logout">Logout</a>
		</div>

		<div class="modal fade" id="logout" tabindex="-1" role="dialog" ariaLabelledby="logout" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="logout">Apakah anda keluar dari sesi ini?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form action="<?= base_url('auth/logout'); ?>">
						<div class="modal-body">
							Klik "logout" jika anda keluar, jika tidak klik "cancel".
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Logout</button>
							<button  type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</nav>