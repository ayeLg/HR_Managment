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
        Schema::create('employs', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->integer('phone');
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('position')->default('admin');
            $table->integer('salary');
            $table->tinyInteger('role')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employs');
    }
};
