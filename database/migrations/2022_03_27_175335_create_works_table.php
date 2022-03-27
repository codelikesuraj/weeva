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
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owned_by');
            $table->foreign('owned_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('issued_at')->default(date('Y-m-d'));
            $table->text('description');
            $table->string('customer');
            $table->date('due_at')->nullable();
            $table->unsignedInteger('issued_by');
            $table->foreign('issued_by')->references('id')->on('contacts')->onDelete('cascade')->onUpdate('cascade');
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
