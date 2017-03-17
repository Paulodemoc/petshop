<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/carrinho', 'HomeController@carrinho')->name('carrinho');

Route::post('/carrinho', 'HomeController@adicionarItem')->name('carrinho');

Route::post('/registrar', function (Illuminate\Http\Request $request) {
   $validator = Validator::make($request->all(), [
        'nome' => 'required|max:50|min:4',
        'email' => 'required|max:150|min:10|email',
        'senha' => 'required|max:50|min:4',
    ], [
      'required' => 'O campo :attribute é obrigatório.',
      'max' => 'O campo :attribute deve possuir no máximo :max caracteres.',
      'min' => 'O campo :attribute deve possuir no mínimo :min caracteres.',
      'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
    ]);

    if ($validator->fails()) {
        return redirect('/registrar')
            ->withInput()
            ->withErrors($validator);
    }

    $user = new App\User;
    $user->nome = $request->nome;
    $user->senha = $request->senha;
    $user->email = $request->email;
    $user->tipo = 1;
    $user->save();

    return redirect('/login');
});

Auth::routes();
