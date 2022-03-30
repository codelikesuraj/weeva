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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owned_by');
            $table->foreign('owned_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('waybill_no')->nullable();
            $table->date('date_issued')->default(date('Y-m-d'));
            $table->integer('quantity');
            $table->enum('value', ['pcs', 'sets'])->default('sets');
            $table->text('description');
            $table->string('customer_name');
            $table->unsignedInteger('issued_by');
            $table->foreign('issued_by')->references('id')->on('contacts')->onDelete('cascade')->onUpdate('cascade');
            $table->date('deadline')->nullable();
            $table->enum('status', ['pending', 'complete'])->default('pending');
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
        Schema::dropIfExists('works');
    }
};
