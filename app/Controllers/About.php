<?php

namespace App\Controllers;

class About extends BaseController
{
  public function index(): string
  {
    return view('home/index');
  }

  public function create($dataPertama, $dataKedua): void
  {
    echo "tampilan about $dataPertama, $dataKedua";
  }
}
