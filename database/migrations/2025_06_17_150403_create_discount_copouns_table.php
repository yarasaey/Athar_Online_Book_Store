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
        Schema::create('discount_copouns', function (Blueprint $table) {
              $table->id();
            $table->string('code');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
             $table->integer('maxs_uses')->nullable();
             $table->integer('maxs_uses_users')->nullable();
             $table->enum('type',['percent','fixed'])->default('fixed');
             $table->double('min_amount',10,2)->nullable();
             $table->integer('status')->default(1);
             $table->timestamp('starts_at')->nullable();
              $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('discount_copouns');
    }
};
