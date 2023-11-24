update coding saya

// application/Models/MahasiswaModel.php
<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model {
	protected $table = 'mahasiswa';
	protected $primaryKey = 'id';
	protected $protectFields = false;
	protected $useTimestamps = true; //Dates = required to alter .sql created_at, updated_at
	public function getAllMahasiswa(){
		return $this->findAll();
	}
	public function getDetailMahasiswa($id){
		return $this->find($id);
	}
	public function createMahasiswa($data){
		return $this->insert($data);
	}
	public function create($data){
		return $this->insert($data);
	}
	public function updateMahasiswa($id, $data){
		return $this->update($id, $data);
	}
}

// application/controllers/ExtendsController.php
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ExtendsController extends BaseController {
	public function index(): string {
		$data = [
		  "title" => "Login",
		];
		return view('login', $data);
	}

	public function signin(): string {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$data = [
		  "title" => "Login Sini",
		  "nama" => "Framework Web",
		  "kelas" => "5D"
		];
		return view('home', $data);
	}

	public function signup(): string {
		$data = [
		  "title" => "Register",
		];

		return view('register', $data);
	}

	public function create_signup(){
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');

		$data = [
		  "nama" => $email,
		  "npm" => $password,
		  "prodi" => "INFORMATIKA"
		];
		$this->mahasiswaModel->createMahasiswa($data);
		return redirect()->to('login/signup');
	}
	
	public function home() {
        $data['nickname'] = "Radit";
		$data['title'] = "Home";
		
		$mahasiswa = $this->mahasiswaModel->getAllMahasiswa();
		// $data = [ //overwritting
		// $data = array_merge($data, [
		$data = [
			"title" => "Home",
			"nama" => "Radit",
			"biodata" => [
			[
			  "name" => "Raditya Aji Sasmoyo",
			  "npm" => "2010631170111"
			],
			[
			  "name" => "Alif Jabar",
			  "npm" => "2010631170112"
			],
		  ],
		  "mahasiswa" => $mahasiswa,
		// ]);
		];
        return view('home', $data);
		var_dump($data); // Using var_dump for debugging
    }
	
	// public function profile() { 
    public function profile(): string {
        $data['name'] = "Raditya Aji Sasmoyo";
        $data['nickname'] = "Radit";
        $data['npm'] = "2010631170111";
        $data['class'] = "Framework Pemograman Web";
        $data['phone'] = "+62 812-9026-4815";
        $data['email'] = "2010631170111@student.unsika.ac.id";
        $data['username'] = "raditya2010631170111";
		$data['title'] = "About Us";

        return view('about_us', $data);
		var_dump($data); // Using var_dump for debugging

		$this->load->view('about_us', $data);
	}
	
	public function detailMahasiswa($id) {
		$mahasiswa = $this->mahasiswaModel->getDetailMahasiswa($id);
		$data = [
		  "title" => "Detail Mahasiswa",
		  "mahasiswa" => $mahasiswa
		];

		return view('detail', $data);
		var_dump($data); // Using var_dump for debugging
	}
  
	public function createMahasiswa() {
		$nama = $this->request->getVar("nama");
		$npm = $this->request->getVar("npm");
		$prodi = $this->request->getVar("prodi");
		$minat = $this->request->getVar("minat");
		$domisili = $this->request->getVar("domisili");
		$jenis_kelamin = $this->request->getVar("jenis_kelamin");

		$data = [
			"nama" => $nama,
			"npm" => $npm,
			"prodi" => $prodi,
			"minat" => $minat,
			"domisili" => $domisili,
			"jenis_kelamin" => $jenis_kelamin
		];

		$this->mahasiswaModel->create($data);
		$this->session->setFlashData("success", "Mahasiswa has been added");
		return redirect()->to(base_url("/"));
		var_dump($data); // Using var_dump for debugging
    }
	
	
	public function index2(): string {
		$data = [
		  "title" => "Create",
		];

		return view('pertemuan5', $data);
		var_dump($data); // Using var_dump for debugging
	}

	public function create() {
		$nama = $this->request->getVar("nama");
		$npm = $this->request->getVar("npm");
		$prodi = $this->request->getVar("prodi");
		$minat = $this->request->getVar("minat");
		$domisili = $this->request->getVar("domisili");
		$jenis_kelamin = $this->request->getVar("jenis_kelamin");

		$data = [
		  "nama" => $nama,
		  "npm" => $npm,
		  "prodi" => $prodi,
		  "minat" => $minat,
		  "domisili" => $domisili,
		  "jenis_kelamin" => $jenis_kelamin,
		];

		if ($nama) {
		  $this->mahasiswaModel->Save($data);
		  $this->session->setFlashData("success", "Mahasiswa Has been added");
		} else {
		  $this->session->setFlashData("error", "Mahasiswa Failed for added");
		}

		return redirect()->to(base_url("pertemuan5"));
		var_dump($data); // Using var_dump for debugging
	}
	

	public function updateMahasiswa($id){
		$mahasiswa = $this->mahasiswaModel->getDetailMahasiswa($id);

		$data = [
		  "title" => "Update Mahasiswa",
		  "mahasiswa" => $mahasiswa,
		];

		return view("update", $data);
		var_dump($data); // Using var_dump for debugging
	}

	public function updateMahasiswaAction($id){
		$nama = $this->request->getVar("nama");
		$npm = $this->request->getVar("npm");
		$prodi = $this->request->getVar("prodi");
		$minat = $this->request->getVar("minat");
		$domisili = $this->request->getVar("domisili");
		$jenis_kelamin = $this->request->getVar("jenis_kelamin");

		$data = [
		  "nama" => $nama,
		  "npm" => $npm,
		  "prodi" => $prodi,
		  "minat" => $minat,
		  "domisili" => $domisili,
		  "jenis_kelamin" => $jenis_kelamin,
		];

		$this->mahasiswaModel->updateMahasiswa($id, $data);
		$this->session->setFlashData("success", "Mahasiswa has been updated");

		return redirect()->to(base_url("updateMahasiswa/" . $id));
		var_dump($data); // Using var_dump for debugging
	}

	public function deleteMahasiswa($id){
		$this->mahasiswaModel->delete($id);
		$this->session->setFlashData("success", "Mahasiswa has been deleted");
		return redirect()->to(base_url("/"));
		var_dump($data); // Using var_dump for debugging
	}
}

// application/controllers/BaseController.php
unchanged

<!-- application/views/navbar.php -->
unchanged

<!-- application/views/home.php -->
<?= $this->extend("template"); ?>

<?= $this->section("content"); ?>
<?php $session = session(); ?>
<div class="container">
  <?php if ($session->getFlashdata("success")) : ?>
    <div class="alert alert-success" role="alert">

      <?= $session->getFlashdata("success"); ?>
    </div>
  <?php endif; ?>
  <h1><?= $title; ?></h1>
  <table class="table caption-top">
    <caption>List of users</caption>
    <thead>
      <tr>
        <th scope="col">#</th>
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
        <form action="<?= base_url("/create"); ?>" method="post">
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
                    <label for="Domiisili">Domiisili</label>
                    <input type="text" id="domiisili" name="domiisili" class="form-control" placeholder="Domisili" aria-label="domiisili">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" aria-label="jenis_kelamin">
                  </div>
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


<!-- application/views/about_us.php -->
unchanged

<!-- application/views/create.php -->
unchanged

<!-- application/views/update.php -->
<?php echo $this->extend("template"); ?>

<?= $this->section("content"); ?>
<div class="container">
  <?php $session = session(); ?>
  <?php if ($session->getFlashdata("success")) : ?>
    <div class="alert alert-success" role="alert">

      <?= $session->getFlashdata("success"); ?>
    </div>
  <?php endif; ?>
  <div class="my-3">
    <h1> Update data</h1>
  </div>
  <form action="<?= base_url("/updateMahasiswa/update/" . $mahasiswa["id"]); ?>" method="post">
    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Inputan Nama.." value="<?= $mahasiswa["nama"]; ?>">
        </div>
        <div class="mb-3">
          <label for="npm" class="form-label">Npm</label>
          <input type="text" class="form-control" id="npm" name="npm" placeholder="Inputan Npm.." value="<?= $mahasiswa["npm"]; ?>">
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Prodi</label>
          <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Inputan Prodi.." value="<?= $mahasiswa["prodi"]; ?>">
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="minat" class="form-label">Minat</label>
          <input type="text" class="form-control" id="minat" name="minat" placeholder="Inputan Minat.." value="<?= $mahasiswa["minat"]; ?>">
        </div>
        <div class="mb-3">
          <label for="domisili" class="form-label">Domisili</label>
          <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Inputan Domisili.." value="<?= $mahasiswa["domisili"]; ?>">
        </div>
        <div class="mb-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Inputan Jenis Kelamin.." value="<?= $mahasiswa["jenis_kelamin"]; ?>">
        </div>
      </div>
      <div>
        <button class="btn btn-success" type="submit">Update</button>
      </div>
    </div>
  </form>

</div>

<?= $this->endSection(); ?>

<!-- application/views/pertemuan5.php -->
<?= $this->extend('template') ?>

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

// application/config/routes.php
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'ExtendsController::home');
$routes->post('/create', 'ExtendsController::createMahasiswa');
$routes->get('/(:num)', 'ExtendsController::detailMahasiswa/$1');

$routes->get('/updateMahasiswa/(:num)', 'ExtendsController::updateMahasiswa/$1');
$routes->post('/updateMahasiswa/update/(:num)', 'ExtendsController::updateMahasiswaAction/$1');
$routes->get("delete/(:num)", 'ExtendsController::deleteMahasiswa/$1');

// About
$routes->get('/about_us', 'ExtendsController::profile');
# $routes->get('/about/(:num)/(:any)', 'About::create/$1/$2');

// Login
$routes->get('/login', 'ExtendsController::index');
$routes->post('/login/signin', 'ExtendsController::signin');
// Register
$routes->get('/login/signup', 'ExtendsController::signup');
$routes->post('/login/signup/create', 'ExtendsController::create_signup');

// Pertemuan 5 
$routes->get('/pertemuan5', 'ExtendsController::index2');
$routes->post('/pertemuan5/create', 'ExtendsController::create');