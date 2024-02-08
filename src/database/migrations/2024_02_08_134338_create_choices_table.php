<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
// question_id INT NOT NULL COMMENT '問題特定番号',
// name VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL COMMENT '選択肢',
// valid TINYINT NOT NULL COMMENT '正誤判定'

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
