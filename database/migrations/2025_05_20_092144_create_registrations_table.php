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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('regno')->unique()->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('year_graduation')->nullable();
            $table->integer('is_activated')->default(1);
            $table->integer('migrated_id')->default(0);
            $table->integer('programme_id')->default(1);
            $table->integer('program_category_id');
            $table->integer('member_type_id')->default(0);
            $table->string('degree_file_name')->default('upload.jpg');
            $table->string('country')->nullable();
            $table->string('passport')->default('user.png');
            $table->string('password')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('officeaddress')->nullable();
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
        Schema::dropIfExists('registrations');
    }
};
