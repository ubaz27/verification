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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->unique();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            // $table->string('mstate')->nullable();
            // $table->string('bloodgroup')->nullable();
            // $table->string('address')->nullable();
            // $table->string('country')->nullable();
            // $table->string('state')->nullable();
            // $table->string('lga')->nullable();

            // $table->string('nok')->nullable();
            // $table->string('nok_phone')->nullable();
            // $table->string('nok_address')->nullable();
            // $table->string('nok_relations')->nullable();
            $table->string('photo')->default('default.png');
            $table->tinyInteger('reset_password')->default(1);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('applications');
    }
};
