<?php

namespace App\Http\Controllers;
use App\Models\Produtos;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
 
   public function index() {
    return Produtos::all();
   }
   public function edit(Request $req) {
    return Produtos::find($req->id);
   }

   public function store(Request $req) {
    Produtos::create([
        "name" => $req->name,
        "preco" => $req->preco
    ]);
    return response(["OK", 200]);
   }
 
   public function update(Request $req) {
    $produto = Produtos::find($req->id);
    
    $produto->name = $req->name;
    $produto->preco = $req->preco;

    $produto->save();
    return response("tudo Certo ", 200);
   }  

   public function delete(Request $req){
    $produto = Produtos::find($req->id);

    $produto->delete();

    return response("Produto deletado com sucesso", 200);
   }

}













