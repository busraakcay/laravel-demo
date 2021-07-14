<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * migrate olusturmak icin;
 * php artisan make:migration create_pizzalar_table
 */

class CreatePizzalarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzalar', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("type");
            $table->string("base");
            $table->string("name");
            $table->json("toppings");
            //$table->integer("price"); //yeni kolon eklendi 
        });
        /**
         * ---> tablo kolonlarını update etmek icin kötu bir yontem;
         *      tablodaki tüm verileri silerek tekrar yükler.
         * yeni bir kolon eklendiğinde işlemler önce geri alınır
         *      php artisan migrate:rollback
         * daha sonra tekrardan migrate edilir
         *      php artisan migrate
         * ---> en iyi yontem
         * yeni bir migrate olusturmak
         *      php artisan make:migration add_price_to_pizzalar_table
         */
    }

    /**
     * migrationları çalıştırmak için
     * php artisan migrate
     * 
     * -> migrationlara bakar ve tüm migrateleri, migrate eder.
     * -> bütün migrateler için sınıftaki up() fonksiyonunu çalıştırır.
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzalar');
    }
}
