<?php

use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $categories = ['Motori','Market','Immobili','Lavoro'];

        foreach ($categories as $category) {
            $cat = new Category();
            $cat->name = $category;
            $cat->save();
        }

    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
