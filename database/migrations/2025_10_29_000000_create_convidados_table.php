<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('convidados', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('evento_id');
			$table->string('nome', 150);
			$table->timestamps();

			$table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('convidados');
	}
};
