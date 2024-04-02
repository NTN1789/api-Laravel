<?php

namespace App\Http\Controllers;

use App\Models\Faixas;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\FaixasStoreRequest;

class FaixasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faixas = Faixas::all();
        

        return response()->json([
                'results' => $faixas
        ],200);
    }




    public function  mostrarFaixasPorCategoria($id)

    {

        $faixas = Faixas::where('id_categoria', $id)->get();
            if(!$faixas){
                        return response()->json([
                                'message' => 'Não há faixas para essa categoria'

                        ],400);
           
                    }
           
                            return response()->json([
                                'results' => $faixas
                            ],200);
           
                      



    } 

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaixasStoreRequest $request)
    {
            try {
                 Faixas::create([
                    'nome' => $request->nome,
                    'album' => $request->album,
                    'artista' => $request->artista,
                
                 ]);

                return response()->json([
                        'message' => 'Faixa cadastrada com sucesso'
                ],201);

                    
            } catch (\Exception $e) {
                return response()->json([
                        'message' => 'Erro ao cadastrar faixa',
                ],500);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faixas  $faixas
     * @return \Illuminate\Http\Response
     */
    public function show(Faixas $faixas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faixas  $faixas
     * @return \Illuminate\Http\Response
     */
    public function edit(Faixas $faixas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faixas  $faixas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faixas $faixas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faixas  $faixas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faixas $faixas)
    {
        //
    }
}
