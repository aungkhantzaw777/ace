<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->nullable();
            $table->string('name', 128); 
            $table->string('description');
            $table->enum('discount_type',['percentage', 'fix-amount']);
            $table->integer('amount');
            $table->text('image_url')->nullable();
            $table->integer('code');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->enum('coupon_type', ['public', 'private']);
            $table->integer('user_count');
            $table->softDeletes();
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
        Schema::dropIfExists('coupons');
    }
}
