<?php

namespace App\Controllers;

use App\Models\Fasilitas;
use App\Models\Makul;
use App\Models\Staff;

class Home extends BaseController
{
  public function course()
  {
    $model = new Makul();
    return view('course', ['makul' => $model->findAll()]);
  }

  public function facility()
  {
    $model = new Fasilitas();
    return view('facility', ['facilities' => $model->findAll()]);
  }
}
