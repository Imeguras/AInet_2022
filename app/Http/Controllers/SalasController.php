<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;

class SalasController extends Controller
{
    public function admin_index()
    {
        $salas = Sala::paginate(10);
        return view('salas.admin.index')
            ->withSalas($salas);
    }
}
