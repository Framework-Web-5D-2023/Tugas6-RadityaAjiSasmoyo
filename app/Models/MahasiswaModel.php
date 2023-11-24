<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table      = 'mahasiswa';
  protected $primaryKey = 'id';
  protected $protectFields = false;


  // Dates
  protected $useTimestamps = true;

  public function getAllMahasiswa()
  {
    return $this->findAll();
  }

  public function getDetailMahasiswa($id)
  {
    return $this->find($id);
  }

  public function createMahasiswa($data)
  {
    return $this->insert($data);
  }

  public function create($data)
  {
    return $this->insert($data);
  }

  public function updateMahasiswa($id, $data)
  {
    return $this->update($id, $data);
  }
}
