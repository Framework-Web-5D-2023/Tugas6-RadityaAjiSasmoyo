<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index(): string
  {
    // dd($this->mahasiswaModel->getAllMahasiswa());
    $mahasiswa = $this->mahasiswaModel->getAllMahasiswa();
    $data = [
      "title" => "Home",
      "nama" => "Alfian Vito",
      "biodata" => [
        [
          "name" => "Irfan",
          "npm" => "20202222"
        ],
        [
          "name" => "Toni",
          "npm" => "20213102222"
        ],
      ],
      "mahasiswa" => $mahasiswa,
    ];
    return view('home/index', $data);
  }

  public function detailMahasiswa($id)
  {
    $mahasiswa = $this->mahasiswaModel->getDetailMahasiswa($id);
    $data = [
      "title" => "Detail Mahasiswa",
      "mahasiswa" => $mahasiswa
    ];

    return view('home/detail', $data);
  }

  public function createMahasiswa()
  {
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
      "image" => $namaImage,
    ];
    $this->mahasiswaModel->create($data);
    $this->session->setFlashData("success", "Mahasiswa has been added");
    return redirect()->to(base_url("/"));
  }

  public function updateMahasiswa($id)
  {
    $mahasiswa = $this->mahasiswaModel->getDetailMahasiswa($id);

    $data = [
      "title" => "Update Mahasiswa",
      "mahasiswa" => $mahasiswa,
      'validation' => \Config\Services::validation(),
    ];

    return view("home/update", $data);
  }

  public function updateMahasiswaAction($id)
  {
    if (!$this->validate([
      'nama' => [
        'rules' => 'required|is_unique[mahasiswa.nama]',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'npm' => 'required',
      'prodi' => 'required',
      'minat' => 'required',
      'domisili' => 'required',
      'jenis_kelamin' => 'required',
    ])) {
      return redirect()->to(base_url("updateMahasiswa/" . $id))->withInput();
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
    ];

    $this->mahasiswaModel->updateMahasiswa($id, $data);
    $this->session->setFlashData("success", "Mahasiswa has been updated");

    return redirect()->to(base_url("updateMahasiswa/" . $id));
  }

  public function deleteMahasiswa($id)
  {
    $this->mahasiswaModel->delete($id);
    $this->session->setFlashData("success", "Mahasiswa has been deleted");
    return redirect()->to(base_url("/"));
  }
}
