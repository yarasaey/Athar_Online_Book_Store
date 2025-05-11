<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // اسم التصنيف
            $table->string('slug');  // السلاوج الخاص بالتصنيف
            $table->string('image')->nullable();  // صورة التصنيف (يمكن أن تكون فارغة)
            $table->integer('status')->default(1);  // الحالة، سواء كانت فعالة أو لا
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
