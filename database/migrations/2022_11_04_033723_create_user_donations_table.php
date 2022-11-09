<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_donations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->double('amount');
            $table->string('address');
            $table->string('status');
            $table->string('transaction_id');
            $table->string('currency');
            $table->foreignId('project_id')->nullable();
            $table->string('custom_project')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('type')->comment('1= one time, 2= recurring');
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
        Schema::dropIfExists('user_donations');
    }
}
