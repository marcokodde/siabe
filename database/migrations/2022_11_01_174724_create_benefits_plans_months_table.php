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
        Schema::create('benefits_plans_months', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->id();
            $table->date('date');
            $table->string('other');
            $table->string('save');
            $table->date('month');
            $table->boolean('active')->default(true);
            
            $table->uuid('benefits_plan_id')->nullable()->default(null);
            // $table->unsignedBigInteger('benefits_plan_id')->nullable()->default(null);
            $table->foreign('benefits_plan_id')->references('id')->on('benefits_plans');
            $table->uuid('benefit_id')->nullable()->default(null);
            // $table->unsignedBigInteger('benefit_id')->nullable()->default(null);
            $table->foreign('benefit_id')->references('id')->on('benefits');
            $table->uuid('benefit_plan_month_change_id')->nullable()->default(null);
            // $table->unsignedBigInteger('benefit_plan_month_change_id')->nullable()->default(null);
            // $table->foreign('benefit_plan_month_change_id')->references('id')->on('benefits_plans_months');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefits_plans_months');
    }
};
