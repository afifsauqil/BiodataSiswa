<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container mt-2">
				<row class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header"><h3 class="text-center font-weight my-2">Register</h3>
							</div>
							<div class="card-body">
								<form action="<?= base_url('auth/register'); ?>" method="post">
									<div class="form-group">
										<label for="name">Username</label>
										<input class="form-control py-4" type="text" name="name" id="name" placeholder="Masukkan username" value="<?= set_value('name'); ?>" autofocus autocomplete="off">
										<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input class="form-control py-4" type="text" name="email" id="email" placeholder="Masukkan email" value="<?= set_value('email'); ?>" autocomplete="off">
										<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
									</div>
									
									<div class="form-row">
										<div class="col-md-6">
									<div class="form-group">
										<label for="password1">Password</label>
										<input class="form-control py-4" type="password" name="password1" id="password1" placeholder="Masukkan password">
										<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
									</div>
										</div>
										<div class="col-md-6">
									<div class="form-group">
										<label for="password2">Confirm Password</label>
										<input class="form-control py-4" type="password" name="password2" id="password2" placeholder="Masukkan password">
									</div>
										</div>
									</div>
									
									<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
										<button type="submit" class="btn btn-primary btn-block">Create Account</button>
									</div>
								</form>
							</div>
								<div class="card-footer text-center mb-3">
									<div class="small"><a href="<?= base_url('auth'); ?>">Punya akun? Login!</a></div>
								</div>
						</div>
					</div>
				</row>
			</div>
		</main>
	</div>
</div>