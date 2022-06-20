<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Lugar;

class SalasController extends Controller
{
    public function admin_index()
    {
        $salas = Sala::withTrashed()->paginate(10);
        return view('salas.admin.index')
            ->withSalas($salas);
    }


    public function admin_create()
    {
        $sala = new Sala;
        return view('salas.admin.createEdit')
                ->withSala($sala)
                ->withLinha(0);
    }

    public function admin_edit($id)
    {
        $sala = Sala::where('id', $id)->first();
        $linha = 0;
        while ($sala->lugares[$linha]->fila == "A") {
            $linha++;
        }
        return view('salas.admin.createEdit')
                ->withSala($sala)
                ->withLinha($linha);
    }

    public function admin_save(Request $request)
    {
        $oldSala = Sala::where('id', $request->input('id'))->first();
        //dd(count($oldSala->lugares));
        if ($oldSala) {

            $maxLinhaOld = 0;
            while ($oldSala->lugares[$maxLinhaOld]->fila == "A") {
                $maxLinhaOld++;
            }

            $fila = "A";
            $posicao = 1;

            if ($maxLinhaOld != $request->input('lugaresLinha')) {
                if ($maxLinhaOld > $request->input('lugaresLinha')) {
                    //adicionar de filas superiores à fila de baixo
                    $control = 0;
                    foreach ($oldSala->lugares as $value) {
                        $control++;
                        if ($control <= $request->input('lugaresLinha')) {
                            continue;
                        }

                        $value->fila = $fila;
                        $value->posicao = $posicao;
                        $value->save();

                        if ($posicao == $request->input('lugaresLinha')) {
                            $fila++;
                            $posicao = 1;
                        }else{
                            $posicao++;
                        }


                    }
                }
                else{
                    $posicao = $maxLinhaOld;
                    $control = 0;
                    foreach ($oldSala->lugares as $value) {
                        $control++;
                        if ($control < $maxLinhaOld) {
                            continue;
                        }

                        $value->fila = $fila;
                        $value->posicao = $posicao;
                        $value->save();

                        if ($posicao == $request->input('lugaresLinha')) {
                            $fila++;
                            $posicao = 1;
                        }else{
                            $posicao++;
                        }

                    }
                }
            }


            if (count($oldSala->lugares) != $request->input('numeroLugares')) {
                $diffLugares = count($oldSala->lugares) - $request->input('numeroLugares');
                //dd($diffLugares);

                $lastLugar = $oldSala->lugares[count($oldSala->lugares)-1];
                $lastFila = $lastLugar->fila;
                $lastPosicao = $lastLugar->posicao;


                if ($diffLugares < 0) {
                    //criar lugares
                    
                    if ($lastPosicao == $request->input('lugaresLinha')) {
                        $lastFila++;
                        $lastPosicao = 0;
                    }

                    $diffLugares = -$diffLugares;

                    for ($i=0; $i < $diffLugares; $i++) { 
                        Lugar::create([
                            'sala_id' => $oldSala->id,
                            'fila' => $lastFila,
                            'posicao' => $lastPosicao
                            ]);

                        if ($lastPosicao == $request->input('lugaresLinha')) {
                            $lastPosicao = 0;
                            $lastFila++;
                        }else{
                            $lastPosicao++;
                        }
                    }
                }
                else{
                    //apagar lugares
                    for ($i=0; $i < $diffLugares; $i++) { 
                        Lugar::where([
                            ['sala_id', '=', $oldSala->id],
                            ['fila', '=', $lastFila],
                            ['posicao', '=', $lastPosicao]
                        ])->delete();

                        if ($lastPosicao == 0) {
                            $lastPosicao = $request->input('lugaresLinha');
                            $lastFila--;
                        }else{
                            $lastPosicao--;
                        }
                    }
                }
            }

            $oldSala->nome = $request->input('nome');
            $oldSala->save();
            
        }else{
            //criar sala nova !
            $sala = Sala::create([
                'nome' => $request->input('nome')
            ]);

            $fila = "A";
            $posicao = 1;
            for ($i=0; $i < $request->input('numeroLugares'); $i++) { 
                Lugar::create([
                    'sala_id' => $sala->id,
                    'fila' => $fila,
                    'posicao' => $posicao
                    ]);

                if ($posicao == $request->input('lugaresLinha')) {
                    $posicao = 1;
                    $fila++;
                }else{
                    $posicao++;
                }
            }
        }

        session()->flash('success', 'Sala criada / alterada com sucesso');
        return redirect()->route('admin_salas');
    }

    public function admin_delete(Request $request)
    {
        $sala = Sala::where('id', $request->input('id'))->first();
        foreach ($sala->lugares as $lugar) {
            $lugar->delete();
        }
        $sala->delete();

        session()->flash('success', 'Sala apagada com sucesso');
        return redirect()->route('admin_salas');
    }
}
