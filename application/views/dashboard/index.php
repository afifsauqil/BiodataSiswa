<div class="container mt-3">
	<div class="jumbotron bg-primary mt-5 mx-auto" style="max-width: 700px;">
		<h1 class="display-4">Halo! <?= $user['name']; ?></h1>
		<p class="lead">Selamat datang di website!</p>
			<hr class="my-4 bg-dark">
			<p><?= $deskripsi; ?> 

			<?php if($user['role_id'] == 1) : ?>
			<a class="text-light" href="<?= base_url('menu/index'); ?>">klik</a>
			<?php else: ?>
			<a class="text-light" href="<?= base_url('user/profile'); ?>">klik</a> 
			<?php endif; ?> 

			<?= $tujuan; ?></p>
	</div>
</div>