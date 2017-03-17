<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Produto;

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
        //$this->middleware('auth', ['except' => 'index']);
    }

    public function index(){
      $produtos = Produto::orderBy('created_at', 'desc')->get();

      return view('loja', [
          'produtos' => $produtos
      ]);
    }

    public function adicionarItem(Request $request){
      $produtoAdicionar = $request->produtoAdicionar;
      $carrinho = $request->session()->get('carrinho',[]);
      if(isset($carrinho[$produtoAdicionar])){
        $carrinho[$produtoAdicionar]['quantidade']++;
      } else {
        $carrinho[$produtoAdicionar] = [ 'quantidade' => 1 ];
      }
      $request->session()->put('carrinho',$carrinho);

      $produtos = [];
      foreach($carrinho as $id => $item){
        array_push($produtos, Produto::find($id));
      }

      return view('carrinho', [
        'produtos' => $produtos,
        'carrinho' => $carrinho
      ]);
    }
}
