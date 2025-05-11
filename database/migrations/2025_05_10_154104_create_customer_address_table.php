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
        Schema::create('customer_address', function (Blueprint $table) {
          $table->id();
                           $table->unsignedBigInteger('user_id');
               $table->foreign('user_id')->references('id')->on('website_users')->onDelete('cascade');

            // User Address related columns
           $table->string('first_name');
           $table->string('last_name');
           $table->string('email');
           $table->string('mobile');
           $table->text('address');
           $table->string('city');
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
        Schema::dropIfExists('customer_address');
    }
};
