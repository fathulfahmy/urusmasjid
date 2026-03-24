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
        Schema::create('mosques', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('address');
            $table->string('timezone')->default('Asia/Kuala_Lumpur');
            $table->string('method')->default(17);
            $table->string('school')->default(0);
            $table->string('tune')->default('0,0,0,0,0,0,0,0,0');
            $table->float('iqamat')->default(10);
            $table->float('pray')->default(10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosques');
    }
};
