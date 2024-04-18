<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('resto_id')->constrained('restos');
            $table->string('gerant_fname');
            $table->string('gerant_lname');
            $table->string('gerant_location');
            $table->string('gerant_image')->nullable();
            $table->string('gerant_email');
            $table->string('gerant_pwd');
            $table->string('gerant_is_first')->default('1');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerants');
    }
}
