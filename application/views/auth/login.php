<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container mt-2">
				<row class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header"><h3 class="text-center font-weight my-2">Login</h3>
							</div>
							<div class="card-body">
								<?= $this->session->flashdata('message'); ?>
								<form action="<?= base_url('auth'); ?>" method="post">
									<div class="form-group">
										<label for="elemen">Username</label>
										<input class="form-control py-4" type="text" name="name" id="name" placeholder="Masukkan username" value="<?= set_value('name'); ?>" autofocus>
										<?= form_error('name', '<small class="text-danger pl-1">', '</small>') ?>
									</div>
									<div class="form-group">
										<label for="elemen">Password</label>
										<input class="form-control py-4" type="password" name="password" id="password" placeholder="Masukkan password">
										<?= form_error('password', '<small class="text-danger pl-1">', '</small>') ?>
									</div>
									
									<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
										<button type="submit" href="" class="btn btn-primary btn-block">Login</button>
									</div>
								</form>
							</div>
								<div class="card-footer text-center mb-3">
									<div class="small"><a href="<?= base_url('auth/register'); ?>">Belum punya akun? Register!</a></div>
								</div>
						</div>
					</div>
				</row>
			</div>
		</main>
	</div>
</div>