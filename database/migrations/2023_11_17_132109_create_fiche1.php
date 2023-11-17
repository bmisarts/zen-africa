<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiche1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csp', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
        });
        
        Schema::create('fiche1', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('slug');
            $table->integer('age');
            $table->integer('tel');
            $table->unsignedBigInteger('csp_id')->nullable();
            $table->string('photo')->default('assets/images/user.png');
            
            $table->timestamps();
            $table->foreign('csp_id')->references('id')->on('csp')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiche1');
    }
}
