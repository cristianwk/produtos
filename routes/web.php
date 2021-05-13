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

use illuminate\Http\Request;
use App\Product;

Route::middleware('auth')->group(function(){

	//ajuste para entrar no raiz do projeto
	Route::get('/', function(){
		$product = Product::orderby('description', 'asc')->get();	
		return view('product.index', compact('product'));
	})->name('product.index');

	Route::get('product', function(){
		//return view('product.index');
		$product = Product::orderby('description', 'asc')->get();	
		return view('product.index', compact('product'));
	})->name('product.index');

	Route::get('product/inserir', function(){
		return view('product.inserir');
	})->name('product.inserir');

	Route::post('product', function(Request $request){
		//return $request->all();
		$newProduct = new Product;
		$newProduct->description = $request->input('description');
		$newProduct->price = $request->input('price');
		$newProduct->save();
		return redirect()->route('product.index')->with('info','Produto criado com Sucesso!');
	})->name('product.loja');

	Route::delete('product/{id}', function($id){
		//return $id;
		$product = Product::findOrFail($id);
		//return $product;
		$product->delete();
		return redirect()->route('product.index')->with('info', 'Produto Excluido com Sucesso!');
	})->name('product.excluir');

	Route::get('product/{id}/editar', function($id){
		//return view('product.editar');
		$product = Product::findOrFail($id);
		return view('product.editar', compact('product'));
	})->name('product.editar');

	Route::put('/product/{id}', function(Request $request, $id){
		//return $request->all();
		$product = Product::findOrFail($id);
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->save();
		return redirect()->route('product.index')->with('info', 'Produto atualizado com Sucesso!');
	})->name('product.atualizar');	
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
