<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adress_id');
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('dateofbirth');
            $table->string('phonenumber', 20);
            $table->string('email');
            $table->string('function');
            $table->timestamps();

            $table->foreign('adress_id')->references('id')->on('adresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
