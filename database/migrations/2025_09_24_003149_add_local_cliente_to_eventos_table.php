<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->unsignedBigInteger('local_id')->nullable()->after('data');
            $table->unsignedBigInteger('cliente_id')->nullable()->after('local_id');

            $table->foreign('local_id')->references('id')->on('locais')->onDelete('set null');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropForeign(['local_id']);
            $table->dropForeign(['cliente_id']);
            $table->dropColumn(['local_id', 'cliente_id']);
        });
    }

};
