<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('question_id')->constrained()->comment('問題特定番号'); 
            $table->string('name')->comment('選択肢');
            $table->tinyInteger('valid')->comment('正誤判定');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions'); // ここを修正
    }
};
