<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsedIdColumnToProducts extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            // Aggiunge la colonna user_id alla tabella products
            $table->unsignedBigInteger('user_id')->default(1);

            // Specifica che colonna 'user_id' appena creata
            // è una chiave esterna che fa riferimento alla colonna 'id' alla tabella 'users'
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    public function down()  // La funzione down è l'esatto contrario della funzione down.
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropForeign(['user_id']);   // Questa rifga canella la relazione
            $table->dropColumn('user_id');      // Questa riga cancella la colonna

        });
    }
}
