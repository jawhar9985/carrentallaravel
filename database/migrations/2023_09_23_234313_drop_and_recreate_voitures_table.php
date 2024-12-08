<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAndRecreateVoituresTable extends Migration
{
    public function up()
    {
        // Drop the existing 'voitures' table if it exists
        Schema::dropIfExists('voitures');

        // Create a new 'voitures' table with the desired structure
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->integer('prix');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Inverse the changes if necessary
        Schema::dropIfExists('voitures');
    }
}

