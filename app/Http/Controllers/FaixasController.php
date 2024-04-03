<?php

namespace App\Http\Controllers;

use App\Models\Faixas;
use App\Models\Categoria;
use Illuminate\Http\Request;


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




    public function  mostrarFaixasPorId($id)  {
        $faixas = Faixas::find($id);

        if(!$faixas){
            return "faixas  não encontrada";
            
        }
                    return response()->json([
                              'results' => $faixas,
                              'message' => 'Faixas encontradas'
                            ]);
           
                      



    } 



    public function  criarFaixas(Request $request){
        $faixas = $request->all();

        
      //  $faixas['slug'] = Str::slug($request->nome);

        $faixas = Faixas::create($faixas);

     
        return response()->json([
            'faixas' => $faixas,
            'mensagem' => 'faixa cadastrada com sucesso!',
        ],200);

    }




    public function alterarFaixas($id, Request $request){

        $faixas = Faixas::find($id);


        if (!$faixas) {
            throw new Exception("Faixas com ID $id não encontradas.");
          }


          $faixas->nome = $request->nome;
          $faixas->album = $request->album;
          $faixas->artista = $request->artista;


          $faixas->save();


          return response()->json([
            'faixas' => $faixas,
            'message' => 'Faixas alterada com sucesso!'
          ]);

    }






    public function deletarPorId($id)
    {

        $faixas = Faixas::find($id);
        $faixas->delete();


        return response()->json([
            'faixas' => $faixas,
            'message' => 'Faixas excluida com sucesso!'
        ], 200);
    }








    public function  mostrarCategoria($id){
        $categoria = Categoria::find($id);
        $faixas = Faixas::where('id_categoria', $id)->get();
       
        if(!$categoria){
               return "categoria não encontrada"; 
        }
        return response()->json([
            'results' => $categoria,$faixas,
            'message' => 'Categoria encontrada'
        ]);
    }




    public function  criarCategoria(Request $request){
        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        $categoria->descricao = $request->descricao;
        $categoria->save();

        return response()->json([
            'results' => $categoria,
            'message' => 'Categoria criada'
        ]);

    }
  
    
    public function destroy(string $id)
    {
     
        $categoria = Categoria::find($id);
        $categoria->delete();
        

        return response()->json([
            'categoria' => $categoria,
            'message' => 'Categoria excluida com sucesso!'
        ], 200);
    }


        public function alterarPorId($id, Request $request){

            $categoria = Categoria::find($id);
           

            if (!$categoria) {
                throw new Exception("Categoria with ID $id not found."); 
              }
            
             
              $categoria->nome = $request->nome;
              $categoria->descricao = $request->descricao;
            
      
              $categoria->save();


              return response()->json([
                'categoria' => $categoria,
                'message' => 'Categoria alterada com sucesso!'
              ]);
            
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
 
}
