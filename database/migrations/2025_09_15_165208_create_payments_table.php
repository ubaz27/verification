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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->references('id')->on('applications');
            $table->double('amount_payable', 12, 2, true);
            $table->double('amount_paid', 12, 2, true)->default(0);
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->string('rrr')->nullable();
            $table->integer('payment_status_code')->default(25);
            $table->dateTime('date_processed')->nullable();
            $table->double('payment_commission')->default(0);
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
        Schema::dropIfExists('payments');
    }
};
