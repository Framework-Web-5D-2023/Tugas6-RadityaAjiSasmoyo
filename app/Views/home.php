<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<?php $session = session(); ?>
<div class="container">
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
  <h1><?= $title; ?></h1>
  <table class="table caption-top">
    <caption>List of users</caption>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Nama</th>
        <th scope="col">NPM</th>
        <th scope="col">Prodi</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($mahasiswa as $m) : ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><img src="<?= base_url("image/" . $m['image']); ?>" class="img-fluid rounded" style="width:80px; height:100px;" alt=""></td>
          <td><?= $m["nama"]; ?></td>
          <td><?= $m["npm"]; ?></td>
          <td><?= $m["prodi"]; ?></td>
          <td>
            <a href="<?= site_url("delete/" . $m["id"]); ?>" class="btn btn-danger btn-sm">Delete</a>
            <a href="<?= site_url("/" . $m["id"]); ?>" class="btn btn-secondary btn-sm">Detail</a>
            <a href="<?= site_url("updateMahasiswa/" . $m["id"]); ?>" class="btn btn-primary btn-sm">Update</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Create
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Mahasiswa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url("/create"); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-12 row mb-3">
                <div class="col-6">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="npm">NPM</label>
                    <input type="text" id="npm" name="npm" class="form-control" placeholder="NPM" aria-label="NPM">
                  </div>
                </div>
              </div>

              <div class="col-12 row mb-3">
                <div class="col-6">
                  <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" id="prodi" name="prodi" class="form-control" placeholder="Prodi" aria-label="prodi">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="minat">Minat</label>
                    <input type="text" id="minat" name="minat" class="form-control" placeholder="Minat" aria-label="NPM">
                  </div>
                </div>
              </div>

              <div class="col-12 row mb-3">
                <div class="col-6">
                  <div class="form-group">
                    <label for="domiisili">Domiisili</label>
                    <input type="text" id="domiisili" name="domisili" class="form-control" placeholder="Domiisili" aria-label="domiisili">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" aria-label="jenis_kelamin">
                  </div>
                </div>
              </div>
              <div class="col-sm-12 mb-3">
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" id="image" name="image">
                </div>
              </div>


            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("script"); ?>
<script>
  function sendIdDataDelete() {

  }
</script>
<?= $this->endSection(); ?>