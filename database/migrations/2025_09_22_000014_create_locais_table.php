<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('locais', function (Blueprint $table) {
            $table->id();
            $table->string('local', 150);       
            $table->integer('capacidade');     
            $table->string('endereco', 255);    
            $table->timestamps();              
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('locais');
    }
};
