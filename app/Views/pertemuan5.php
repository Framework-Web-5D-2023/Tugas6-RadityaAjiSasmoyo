<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php $session = session(); ?>
<div class="container">
  <?php if ($session->getFlashdata("success")) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $session->getFlashData("success"); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php elseif ($session->getFlashdata("error")) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $session->getFlashData("error"); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <h1><?= $title; ?></h1>
  <form action="<?= base_url("/pertemuan5/create"); ?>" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Inputkan Nama...">
    </div>
    <div class="mb-3">
      <label for="npm" class="form-label">Npm</label>
      <input type="text" class="form-control" id="npm" name="npm" placeholder="Inputkan Npm..." required>
    </div>
    <div class="mb-3">
      <label for="prodi" class="form-label">Prodi</label>
      <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Inputkan Prodi..." required>
    </div>
    <div class="mb-3">
      <label for="minat" class="form-label">Minat</label>
      <input type="text" class="form-control" id="minat" name="minat" placeholder="Inputkan Minat..." required>
    </div>
    <div class="mb-3">
      <label for="domisili" class="form-label">Domisli</label>
      <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Inputkan Domisli..." required>
    </div>
    <div class="mb-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
        <option value="">Jenis Kelamin</option>
        <option value="L">L</option>
        <option value="P">P</option>
      </select>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</div>
<?= $this->endSection(); ?>