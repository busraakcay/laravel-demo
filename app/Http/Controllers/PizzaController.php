<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Pizza;
use Illuminate\Support\Facades\App;

/** !!!
 * RouteServiceProvider->
 *          protected $namespace = 'App\\Http\\Controllers';
 *      yorum satırı şeklinde geliyor!
 */

class PizzaController extends Controller
{
    // public function __construct(){
    //     $this->middleware("auth");
    // } tüm fonksiyonlar için gerçekleştirir

    public function welcome(){
        return view('welcome');
    }

    public function index(){
    // verileri veri tabanindan getir
    
    //pizzalar tablosunun verilerinin kayıtlarının bir koleksiyonu -> $pizzalar
    //$pizzalar = Pizza::all(); //pizzalar tablosundaki tüm kayıtları getirir.
                       //all metodu otomatik olarak get() fonksiyonunu icerir.

    $pizzalar = Pizza::orderBy("name")->get(); // önce sıralama işlemi yaptı, get() metodu dahil olmadığı için kullanıldı.
    //$pizzalar = Pizza::where("type", "hawaiian")->get()
    //$pizzalar = Pizza::latest()->get() # ! timestamp alanları boş

        // $pizzalar = [
        //     ["type" => "karışık", "base" => "kaşarlı"],
        //     ["type" => "sucuklu", "base" => "ince"],
        //     ["type" => "mantarlı", "base" => "çıtır"]
        // ];

    
    return view('pizzalar.index',[ //view icerisindeki pizzalar klasörünü temsil eder. ->> index.blade.php
        "pizzalar" => $pizzalar // pizzalar arrayini temsil eder. //Burada veri gönderme işlemi yapılır.
        //"ad" => request("ad") ///pizzalar?ad=pizzaAdi
    ]); // resources/views


    }

/*
    public function show($id){ //web.php/ route tarafında - function parametresine atadğımız $id degiskenini show id parametresine atadık.
        return view('pizzalar.show',[ //view icerisindeki detaylari temsil eder.
                     "id" => $id
                 ]); // resources/views
    }
*/

    public function show($id){
        //$pizza = Pizza::find($id); //veri tabanındaki herhangi bir değeri bulamadığı zaman hata döndürür
        $pizza = Pizza::findOrFail($id); //veri tabanındaki herhangi bir değeri bulamadığı zaman hata döndürmez // error verir
        return view("pizzalar.show", ["pizza" => $pizza]);
    }

    public function create(){
        return view('pizzalar.create');
    }

    public function store(){
        //request ile form alanındaki name-> ozelligindeki name adı alındı
        //error_log(request("name")); // sonucun terminalde gösterilmesi için log kullanıldı
        //error_log(request("type"));
        //error_log(request("base"));
        $pizza = new Pizza();
        $pizza->name = request("name");
        $pizza->type = request("type");
        $pizza->base = request("base");
        $pizza->toppings = request("toppings");
        $pizza->save(); // veri tabanına kaydet
        //error_log($pizza); -> gelen array için kontrol
        return redirect("/")->with("messageStore", "Sipariş Verdiğiniz İçin Teşekkürler");
    }

    public function destroy($id){
        $pizza = Pizza::find($id);
        $pizza->delete();
        return redirect("/")->with("messageDestroy", "Sipariş Tamamlanmıştır");
    }
}
