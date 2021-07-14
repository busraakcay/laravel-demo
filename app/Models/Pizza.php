<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $table = "pizzalar";
    //public $timestamps = false;

    /**
     * veri tabanına gönderdiğimiz arrayler ve
     * json veri tipindeki sütuna ekleyebilmek için
     * kullandığımız degiskeni array olarak tanımladık.
     */
    protected $casts = [ 
        "toppings" => "array"
    ];
}
