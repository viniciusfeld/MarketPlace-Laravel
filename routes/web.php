<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPhotoController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\HomeController;
use App\Models\ProductPhoto;
use Illuminate\Support\Facades\Route;
use \App\Models\Store;
use Database\Factories\CategoryFactory;


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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/model', function(){

   // $user = new \App\Models\User();
   // $user = \App\Models\User::find(7);
   // $user->name = 'Usuario teste editado';
   // $user->email = 'teste@tete.com';
   // $user->password = bcrypt('12345678');

   // $user->save();

   // return \App\Models\User::all - Para coletar todos os users
   // return \App\Models\User::find(51); - Para coletar um usuario expecifico com base no ID
   // return \App\Models\User::where('name', 'Usuario teste editado')->get(); - Usuario de acordo com a condição usando get para
   // buscar mais usuários com o mesmo nome
   // return \App\Models\User::where('name', 'Usuario teste editado')->first(); - Somente o primeiro resultado da pesquisa
   // return \App\Models\User::paginate(10); - Separa 10 dado para cada pagina
    
// Mass Assignment - Atribuição em Massa
   
//$user = \App\Models\User::create([
       //'name' => 'Vinicius Feld',
       //'email' => 'email110@email.com',
       //'password' => bcrypt('12345788'),
   //]);

   //dd($user);

        // Mass Update
   // $user = \App\Models\User::find(60);
  // $user->update([
       //'name' => 'Atualizando com Mas Update'
   //]);

   //dd($user);

   //Como faria para pegar a loja de um usuario

   //$user = \App\Models\User::find(4);

   //dd($user->store()->count());     //O objeto unico (Store) se for Collection de Dados(Objetos)
   

   //PEgar os produtos de uma loja?

   //$loja = \App\Models\Store::find(1);
   //return $loja->products; | $loja->products()->where('id', 9)->get();

   //Pegar as lojas de uma categoria de uma loja?

   //$categoria = App\Models\Category::find(1);
   //$categoria->products;
   

   //Criar uma loja para um usuário
// recupera os usuarios criados na tabela
//$users = App\Models\User::get();

// itera os usuarios
//foreach($users as $user){
    // cria uma loja para cada um dos usuários
  //  App\Models\Store::create([
    //    'user_id' => $user->id,
    //  'name' => 'Loja Teste',
    //   'description' => 'Loja Teste de produtos de informatica',
    //    'mobile_phone' => 'XX-XXXX-XXXX',
    //    'phone' => 'XX-XXXX-XXXX',
    //  'slug' => 'loja-teste',
        // restante das colunas que precisam de informações
    //]);
//}

// recupera as lojas criadas na tabela
//$stores = App\Models\Store::get();



// Criar um produto para uma loja
//$store = \App\Models\Store::find(40);
//$product = $store->products()->create([

            //'name' =>'Notebook Dell',
            //'description' => 'Core I5 10GB',
            //'body' =>'Teste...',
            //'price' =>2999.90,
            //'slug' =>'notebook-dell',
//]);
//dd($product);


//Criar uma Categoria

//\App\Models\Category::create([
//    'name' => 'Games',
//    'description' => null,
//    'slug' => 'games'
//]);
//\App\Models\Category::create([
//    'name' => 'Notebooks',
//    'description' => null,
//   'slug' => 'notebooks'
//]);

// return \App\Models\Category::all();

// Adicionar um produto para uma categoria ou vice-versa

//$product = \App\Models\Product::find(40);
//dd/($product->categories()->detach([1]));

});

Route::get('/home', function() {})->name('home');

Route::group(['middleware'=> ['auth']], function()
{
    Route::prefix('admin')->name('admin.')->group(function(){

        //    Route::prefix('stores')->name('stores.')->group(function(){
        //        Route::get('/', [StoreController::class, 'index'])->name('index');
        //        Route::get('/create', [StoreController::class, 'create'])->name('create');
        //        Route::post('/store', [StoreController::class, 'store'])->name('store');
        //        Route::get('/{store}/edit', [StoreController::class, 'edit'])->name('edit');
        //        Route::post('/update/{store}', [StoreController::class, 'update'])->name('update');
        //        Route::get('/destroy/{store}', [StoreController::class, 'destroy'])->name('destroy');
        //    });
            
            Route::resource('/stores', StoreController::class);
            Route::resource('/products', ProductController::class);
            Route::resource('/categories', CategoryController::class);
            
            Route::post('/photos/remove', [ProductPhotoController::class, 'delete'])->name('photos.remove');   
        });
         
});



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
