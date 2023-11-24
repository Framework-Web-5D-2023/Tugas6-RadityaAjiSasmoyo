<?php

namespace App\Controllers;

class Pertemuan5 extends BaseController
{
  public function index(): string
  {

    $data = [
      "title" => "Pertemuan5 || Create",
    ];

    return view('pertemuan5', $data);
  }

  public function create()
  {
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
  }
}
