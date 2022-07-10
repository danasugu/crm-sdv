<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdVProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('sd_v_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('proiect');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
