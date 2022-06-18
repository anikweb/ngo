<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('volunteer_id')->unique();
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->unique();
            $table->string('image');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('blood_group')->nullable();
            $table->tinyInteger('sex');
            $table->date('date_of_birth');
            $table->string('nid')->nullable()->unique();
            $table->string('bcn')->nullable()->unique();
            $table->string('nationality');
            $table->string('occupation')->nullable();
            $table->string('institute')->nullable();
            $table->text('facebook_url')->nullable()->unique();
            $table->string('giverFromInspiration')->nullable();
            // present address
            $table->string('prDistrict');
            $table->string('prThana');
            $table->string('prPostOffice');
            $table->string('prZIP')->nullable();
            $table->string('prVillage');
            // permanent address
            $table->string('pmDistrict');
            $table->string('pmThana');
            $table->string('pmPostOffice');
            $table->string('pmZIP')->nullable();
            $table->string('pmVillage');

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
        Schema::dropIfExists('volunteers');
    }
}
