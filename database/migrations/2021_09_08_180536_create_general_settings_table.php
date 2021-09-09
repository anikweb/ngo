<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('logo');
            $table->string('icon');
            $table->string('tagline');
            $table->string('admin_email');
            $table->string('membership')->nullable()->default('2')->comment('1 = active, 2 = inactive');
            $table->string('new_user_role');
            $table->string('timezone');
            $table->string('date_format');
            $table->string('time_format');
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
        Schema::dropIfExists('general_settings');
    }
}
