<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // auth işlemleri için eklenmesi gereklidir.

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

/**
 * ### 1 ###
 * tarayiciya ilk istek atildiginda, tarayicinin ilk ziyaret ettigi klasordur.
 * 
 */

// Route::get('/', function () {
//     return view('welcome'); // resources/views
// });

// Route::get('/pizzalar', function () {
//     // verileri veri tabanindan getir
//     $pizzalar = [
//         ["type" => "karışık", "base" => "kaşarlı"],
//         ["type" => "sucuklu", "base" => "ince"],
//         ["type" => "mantarlı", "base" => "çıtır"]
//     ];

//     return view('pizzalar',[ //view icerisindeki pizzalari temsil eder.
//         "pizzalar" => $pizzalar, // pizzalar arrayini temsil eder.
//         "ad" => request("ad") ///pizzalar?ad=pizzaAdi
//     ]); // resources/views
// });

//bu asamada bir query-sorgu parametresi tanımlanacak
//Route::get('/pizzalar', "PizzaController@index")->middleware("auth"); //sadece kullanıcıların siparişleri görüntüleyebilmesi için bir koşul

//bu asamada "wildcard" -> route parametresi tanımlanacak;
/**
 *  ## validations
 * route parametresinden gelen deger bir integer deger (id) oldugu icin 
 * bir takım kontroller yapmamız gerek -> parametrede gelen deger
 * string bir degeri takip etmemelidir.
 */
// Route::get('/pizzalar/{id}', function ($id) { //secilen pizzaya gore pizzanin id degeri alinacak
//     //veri tabanindaki bir kayıt icin $id degiskenini kullanarak bir sorgu gonderir.
//     return view('detaylar',[ //view icerisindeki detaylari temsil eder.
//         "id" => $id
//     ]); // resources/views
// });

Route::get('/', "PizzaController@welcome")->name("welcome");
Route::get('/pizzalar', "PizzaController@index")->name("pizzalar.index")->middleware("auth");
Route::get("/pizzalar/create", "PizzaController@create")->name("pizzalar.create");
Route::post('/pizzalar', "PizzaController@store");
Route::get("/pizzalar/{id}", "PizzaController@show")->name("pizzalar.show")->middleware("auth");
Route::delete("/pizzalar/{id}", "PizzaController@destroy")->name("pizzalar.destroy")->middleware("auth");

Auth::routes([
    "register" => true //false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


if(file_exists(app_path("Http/Controllers/LocalizationController.php"))){
    Route::get("{locale}", "LocalizationController@lang");
}
