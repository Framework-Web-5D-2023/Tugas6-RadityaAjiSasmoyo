<?php

namespace App\Controllers;

class Login extends BaseController
{
  public function index(): string
  {

    $data = [
      "title" => "Login",
    ];

    return view('login', $data);
  }

  public function signin(): string
  {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // if($email && $password){
    //   return view('home', $data);
    // } else {
    //   return view('login', $data);
    // }

    $data = [
      "title" => "Login Sini",
      "nama" => "Framework Web",
      "kelas" => "5D"
    ];

    return view('home', $data);
  }

  public function signup(): string
  {
    $data = [
      "title" => "Register",
    ];

    return view('register', $data);
  }

  public function create_signup()
  {
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $data = [
      "nama" => $email,
      "npm" => $password,
      "prodi" => "INFORMATIKA"
    ];

    $this->mahasiswaModel->create($data);
    return redirect()->to('/login/signup');
  }
}
