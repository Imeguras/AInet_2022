<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recibo;
use Illuminate\Support\Facades\Auth;


class RecibosController extends Controller
{
    public function index()
    {
        $recibos = Recibo::where('cliente_id', Auth::user()->id)->orderBy('data', 'desc')->get();

        return view('recibos.index')
                ->withRecibos($recibos);
    }
}
