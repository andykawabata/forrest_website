<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumYearTable extends Migration
{
    public $table = 'album_year';

    public function up()
    {
        Schema::create('album_year', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id');
            $table->integer('year_id');
            $table->string('album_name');
            $table->string('year_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('album_year');
    }
}
