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
            // Mengganti primary key 'id' menjadi 'idUser'
            $table->id('idUser');

            $table->string('username', 50)->unique();
            $table->string('email', 50)->unique();
            $table->text('password'); // Laravel akan meng-hash ini, jadi 'text' atau 'string' panjang sudah pas
            $table->string('phoneNumber', 14)->nullable();
            $table->string('bankNumber', 20)->nullable();
            $table->date('birthDay')->nullable();
            $table->text('profilePicture')->nullable();

            // 'tinyint(1)' paling cocok direpresentasikan sebagai boolean
            $table->boolean('statusKYC')->default(false);

            // Kolom enum untuk role
            $table->enum('role', ['renter', 'assetOwner', 'admin']);

            $table->text('address')->nullable();

            // Ini adalah standar Laravel, penting untuk otentikasi
            $table->rememberToken();

            // Standar Laravel untuk kolom 'created_at' dan 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
