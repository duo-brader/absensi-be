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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("roles_id");
            $table->unsignedBigInteger("mapel_id")->nullable(true);
            $table->unsignedBigInteger("jurusan_id")->nullable(true);
            $table->string('nama');
            $table->string("username");
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("roles_id")->references("id")->on("roles");
            $table->foreign("mapel_id")->references("id")->on("mapels");
            $table->foreign("jurusan_id")->references("id")->on("jurusans");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
