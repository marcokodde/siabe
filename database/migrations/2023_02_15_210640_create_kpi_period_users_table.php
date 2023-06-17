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
        Schema::create('kpi_period_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('value')->nullable(true)->default(null);
            $table->boolean('active')->default(true);

            $table->uuid('period_user_id')->default(null);
            $table->foreign('period_user_id')->references('id')->on('period_users');

            $table->uuid('kpi_id')->default(null);
            $table->foreign('kpi_id')->references('id')->on('kpis');

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
        Schema::dropIfExists('kpi_period_users');
    }
};
