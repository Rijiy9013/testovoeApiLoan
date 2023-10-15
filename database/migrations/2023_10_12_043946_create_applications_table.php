<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_id');
            $table->foreign('dealer_id')->references('id')->on('dealers');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->unsignedBigInteger('dealer_employee_id');
            $table->foreign('dealer_employee_id')->references('id')->on('dealer_employees');
            $table->decimal('loan_amount', 10, 2);
            $table->integer('loan_term');
            $table->decimal('interest_rate', 5, 2);
            $table->text('reason_description');
            $table->unsignedBigInteger('application_status_id');
            $table->foreign('application_status_id')->references('id')->on('application_statuses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
