<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Auth;

use App\Produto;
use App\Compra;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth', ['except' => 'index']);
    }

    public function index(){
      $produtos = Produto::orderBy('created_at', 'desc')->get();

      return view('loja', [
          'produtos' => $produtos
      ]);
    }

    public function adicionarItem(Request $request){
      $produtoAdicionar = $request->produtoAdicionar;
      $carrinho = Session::get('carrinho',[]);
      if(isset($carrinho[$produtoAdicionar])){
        $carrinho[$produtoAdicionar]['quantidade']++;
      } else {
        $carrinho[$produtoAdicionar] = [ 'quantidade' => 1 ];
      }
      Session::put('carrinho',$carrinho);

      $produtos = [];
      foreach($carrinho as $id => $item){
        array_push($produtos, Produto::find($id));
      }

      return view('carrinho', [
        'produtos' => $produtos,
        'carrinho' => $carrinho
      ]);
    }

    public function carrinho(){
      $carrinho = Session::get('carrinho',[]);
      $produtos = [];
      foreach($carrinho as $id => $item){
        array_push($produtos, Produto::find($id));
      }

      return view('carrinho', [
        'produtos' => $produtos,
        'carrinho' => $carrinho
      ]);
    }

    public function finalizarCompra(Request $request){
      $carrinho = Session::get('carrinho',[]);
      foreach($carrinho as $id => $item){
        $fieldname = "qtde_".$id;
        if(isset($request->$fieldname)){
          $carrinho[$id]['quantidade'] = $request->$fieldname;
        }
        if($carrinho[$id]['quantidade'] > 0){
          $compra = new Compra;
          $compra->user_id = Auth::user()->id;
          $compra->produto_id = $id;
          $compra->quantidade = $carrinho[$id]['quantidade'];
          $compra->datacompra = date('Y-m-d H:i:s');
          $compra->situacao = 1;
          $compra->created_at = date('Y-m-d H:i:s');
          $compra->updated_at = date('Y-m-d H:i:s');
          $compra->save();
        }
      }

      Session::put('carrinho',[]);

      Session::flash('status_success', 'Obrigado por comprar!');

      return redirect('/');
    }
}
