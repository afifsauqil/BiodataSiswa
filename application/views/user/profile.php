<div class="container">
	<div class="row mt-3">
		<div class="col-md-4">

		<?= $this->session->flashdata('message'); ?>

		<div class="card mt-3 mr-auto">
				<div class="row no-gutters">
					<div class="col-md-14 mb-2">
						<div class="card-body">
							<h4 class="card-title">Profile anda</h4>
							<p class="card-text">status : <?= $user['name']; ?></p>
							<p class="card-text">email : <?= $user['email']; ?></p>
							<p class="card-text"><small class="text-muted">Akun dibuat sejak <?= date('d F Y', $user['date_created']); ?></small></p>
							<br>
							<a href="" class="btn btn-primary" data-toggle="modal" data-target="#addProfile">add your profile</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!--pop up input data-->
<div class="modal fade" id="addProfile" tabindex="-1" role="dialog" aria-labelledby="addProfile" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addProfile">Masukkan Biodata Anda</h5>
				<button  type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('menu/addprofile'); ?>" method="post">
			<div class="modal-body">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" autocomplete="off">
					<small class="form-text text-danger"><?= form_error('nama'); ?></small>
				</div>
				<div class="form-group">
					<label for="nis">NIS</label>
					<input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS anda">
					<small class="form-text text-danger"><?= form_error('nis'); ?></small>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
					<small class="form-text text-danger"><?= form_error('email'); ?></small>
				</div>
				<div class="form-group">
					<label for="jurusan">Jurusan</label>
					<select class="form-control" id="jurusan" name="jurusan">
						<option value="Sistem Informatika Jaringan dan Aplikasi">Sistem Informatika Jaringan dan Aplikasi</option>
						<option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
						<option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
					</select>
				</div>
				<?php form_open_multipart('menu/addprofile'); ?>
				<div class="form-group">
					<label for="foto">Upload your foto</label>
					<input type="file" class="form-control" id="foto" name="foto" value="upload" placeholder="Choose your file">
					<small class="form-text text-danger"><?= form_error('foto'); ?></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" value="upload" class="btn btn-primary">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
				<?= form_close(); ?>
			</form>

		</div>
	</div>
</div>