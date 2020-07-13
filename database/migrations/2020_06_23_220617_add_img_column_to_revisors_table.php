<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgColumnToRevisorsTable extends Migration
{
    public function up()
    {
        Schema::table('Revisors', function (Blueprint $table) {
            $table->string('photo')->default('NULL');
        });
    }

    public function down()
    {
        Schema::table('Revisors', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
}
