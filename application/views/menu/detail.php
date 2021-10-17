<div class="container">
	<div class="row mt-3">
		<div class="col-md-8">

		<div class="card mt-5">
			<div class="row no-gutters">
				<div class="col-md-5">	
					<img src="<?= base_url('assets/img/profile/') . $siswa['foto']; ?>" alt="" class="card-img">
				</div>
				<div class="col-md-7">
					<div class="card-body">
						<h5 class="card-title">Detail Biodata Siswa</h5>
							<br>
							<p class="card-text">Nama : <?= $siswa['nama']; ?></p>
							<p class="card-text">NIS : <?= $siswa['nis']; ?></p>
							<p class="card-text">Email : <?= $siswa['email']; ?></p>
							<p class="card-text mb-4">Jurusan : <?= $siswa['jurusan']; ?></p>
							<a href="<?= base_url(); ?>menu" class="btn btn-secondary float-right mb-3">back</a>
					</div>
				</div>
			</div>
		</div>

		</div>
	</div>
</div>