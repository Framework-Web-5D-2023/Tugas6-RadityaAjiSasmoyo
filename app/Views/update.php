<?php echo $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
  <?php $session = session(); ?>
  <?php if ($session->getFlashdata("success")) : ?>
    <div class="alert alert-success" role="alert">

      <?= $session->getFlashdata("success"); ?>
    </div>
  <?php endif; ?>
  <?php if ($session->getFlashdata("error")) : ?>
    <div class="alert alert-danger" role="alert">

      <?= $session->getFlashdata("error"); ?>
    </div>
  <?php endif; ?>
  <div class="my-3">
    <h1> Update data</h1>
  </div>
  <?php if (session('validation')) : ?>
    <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <ul>
        <?php foreach (session('validation')->getErrors() as $error) : ?>
          <li><?= esc($error) ?></li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>
  <form action="<?= base_url("/updateMahasiswa/update/" . $mahasiswa["id"]); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Inputan Nama.." value="<?= $mahasiswa["nama"]; ?>">
          <div class="invalid-feedback">
            <?= validation_show_error('nama'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="npm" class="form-label">NPM</label>
          <input type="text" class="form-control <?= (validation_show_error('npm')) ? 'is-invalid' : ''; ?>" id="npm" name="npm" placeholder="Inputan NPM.." value="<?= $mahasiswa["npm"]; ?>">
          <div class="invalid-feedback">
            <?= validation_show_error('npm'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Prodi</label>
          <input type="text" class="form-control <?= (validation_show_error('prodi')) ? 'is-invalid' : ''; ?>" id="prodi" name="prodi" placeholder="Inputan Prodi.." value="<?= $mahasiswa["prodi"]; ?>">
          <div class="invalid-feedback">
            <?= validation_show_error('prodi'); ?>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="minat" class="form-label">Minat</label>
          <input type="text" class="form-control <?= (validation_show_error('minat')) ? 'is-invalid' : ''; ?>" id="minat" name="minat" placeholder="Inputan Minat.." value="<?= $mahasiswa["minat"]; ?>">
          <div class="invalid-feedback">
            <?= validation_show_error('minat'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="domisili" class="form-label">Domisili</label>
          <input type="text" class="form-control <?= (validation_show_error('domisili')) ? 'is-invalid' : ''; ?>" id="domisili" name="domisili" placeholder="Inputan Domisili.." value="<?= $mahasiswa["domisili"]; ?>">
          <div class="invalid-feedback">
            <?= validation_show_error('domisili'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <input type="text" class="form-control <?= (validation_show_error('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" placeholder="Inputan Jenis Kelamin.." value="<?= $mahasiswa["jenis_kelamin"]; ?>">
          <div class="invalid-feedback">
            <?= validation_show_error('jenis_kelamin'); ?>
          </div>
        </div>
		<div class="mb-3">
		  <label for="image" class="form-label">Image</label>
		  <input type="file" class="form-control" id="image" name="image" placeholder="Inputan Jenis Kelamin.." value="<?= $mahasiswa["image"]; ?>">
		</div>
		<input type="hidden" name="old_image" value="<?= $mahasiswa['image']; ?>">
		
      </div>
      <div>
        <button class="btn btn-success" type="submit">Update</button>
      </div>
    </div>
  </form>

</div>

<?= $this->endSection(); ?>