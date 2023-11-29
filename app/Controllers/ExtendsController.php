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
		if (!$this->validate([
		  'image' => [
			'rules' => [
			  'is_image[image]',
			  'mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
			  'max_size[image,1024]',
			],
			'errors' => [
			  'max_size' => 'ukuran gambar terllau besar',
			  'is_image' => 'please input format gambar',
			  'mime_in' => 'please input gambar'
			],
		  ],
		])) {
		  $this->session->setFlashData("error", "Failed for add data please check your image");
		  return redirect()->to(base_url("/"));
		}

		// ambil gambar
		$fileImage = $this->request->getFile('image');
		if ($fileImage->getError() == 4) {
		  $namaImage = 'default.jpg';
		} else {
		  // generate nama image biar random
		  $namaImage = $fileImage->getRandomName();
		  // pindahkan gambar Image ke file kita dan pada folder public/img 
		  $fileImage->move('image', $namaImage);
		}
	
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
			"image" => $namaImage
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
			"validation" => \Config\Services::validation(),
		];

		return view("update", $data);
		var_dump($data); // Using var_dump for debugging
	}

	public function updateMahasiswaAction($id){
		if (!$this->validate([
		  'nama' => [
			'rules' => 'required|is_unique[mahasiswa.nama]',
			'errors' => [
			  'required' => '{field} harus diisi',
			  'is_unique' => '{field} sudah digunakan'
			]
		  ],
		  'image' => [
			'rules' => [
			  'is_image[image]',
			  'mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
			  'max_size[image,1024]',
			],
			'errors' => [
			  'max_size' => 'ukuran gambar terllau besar',
			  'is_image' => 'please input format gambar',
			  'mime_in' => 'please input gambar'
			],
		  ],
		  'npm' => 'required',
		  'prodi' => 'required',
		  'minat' => 'required',
		  'domisili' => 'required',
		  'jenis_kelamin' => 'required',
		])) {
		  return redirect()->to(base_url("updateMahasiswa/" . $id))->withInput();
		}
		
		// ambil gambar
		$fileImage = $this->request->getFile('image');
		if ($fileImage->getError() == 4) {
			 $namaImage = $this->request->getVar('old_image') ?? 'default.jpg'; // Keep the existing image if no new image is uploaded
		} else {
			// generate nama image biar random
			$namaImage = $fileImage->getRandomName();
			// pindahkan gambar Image ke file kita dan pada folder public/img 
			$fileImage->move('image', $namaImage);

			// Delete the old image if a new one is uploaded
			if ($this->request->getVar('old_image') && $this->request->getVar('old_image') != 'default.jpg') {
				unlink('image/' . $this->request->getVar('old_image'));
			}
		}
		
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
          "image" => $namaImage
		];

		$this->mahasiswaModel->updateMahasiswa($id, $data);
		var_dump($this->mahasiswaModel->getLastQuery()); // Ini hanya untuk debugging query
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
