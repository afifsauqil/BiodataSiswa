<div class="container">
	<h3 class="mt-3">Daftar Siswa</h3>

	<!--Kolom Search-->
	<div class="row">
		<div class="col-md-5 mt-2">
			<form action="<?= base_url('menu/index'); ?>" method="post"> 
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="search keyword..." name="keyword" autocomplete="off" autofocus>
					<div class="input-group-append">
						<input class="btn btn-primary" type="submit" name="submit" autofocus>
					</div>
				</div>
			</form>
		</div>
	</div>


		<div class="row">
			<div class="col-md-9">
			<!--session-->
			<?= $this->session->flashdata('message'); ?>
					<!--tampil banyaknya data-->
					<h4>Total Siswa : <?= $total_rows; ?></h4>
					<!--tabel-->				
				<table class="table table-hover mt-3">
					<thead>
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Nama</th>
							<th scope="col">Jurusan</th>
							<th scope="col">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<!-- <?php $i = 1; ?> pakai ini jika tdk pakai pagination -->
						<?php foreach($siswa as $ssw) : ?>
						<tr>
						<!-- <?= $i++; ?>  pakai ini jika tdk pakai pagination -->
							<th scope="row"><?= ++$start; ?></th>
							<td><?= $ssw['nama']; ?></td>
							<td><?= $ssw['jurusan']; ?></td>
							<td>
								<a href="<?= base_url(); ?>menu/detail/<?= $ssw['id']; ?>" class="badge badge-info">detail</a>
								<a href="<?= base_url(); ?>menu/edit/<?= $ssw['id']; ?>" class="badge badge-success">edit</a>
								<button type="submit" class="badge badge-danger" data-toggle="modal" data-target="#delete">delete</button>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				
				<!--tampilan pagination-->
				<?= $this->pagination->create_links(); ?>

			</div>
		</div>
</div>

<!-- pop-up delete data -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" ariaLabelledby="delete" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="delete">Apakah anda menghapus data ini?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form action="<?= base_url(); ?>menu/delete/<?= $ssw['id']; ?>">
						<div class="modal-body">
							Klik "delete" jika menghapus data, jika tidak klik "cancel".
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Delete</button>
							<button  type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>