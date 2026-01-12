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
        if(!Schema::hasTable('users')) {
            throw new Exception("The 'users' table does not exist. Please run the migrations for the 'users' table first.");
        }

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');

            // $table->foreignId('post_id')
            //     ->constrained('posts')
            //     ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commnets');
    }

};
