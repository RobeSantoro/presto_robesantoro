<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToProducts extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            // Aggiunge la colonna category_id alla tabella products
            $table->unsignedBigInteger('category_id')->default(1);

            // Specifica che colonna 'category_id' appena creata
            // è una chiave esterna che fa riferimento alla colonna 'id' alla tabella 'categories'
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);   // Questa rifga canella la relazione
            $table->dropColumn('category_id');      // Questa riga cancella la colonna
        });
    }
}
