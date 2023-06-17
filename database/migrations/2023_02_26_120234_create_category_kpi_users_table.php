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
        Schema::create('category_kpi_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('status')->default(1);
            $table->boolean('active')->default(true);

            $table->uuid('period_category_kpi_id')->default(null);
            $table->foreign('period_category_kpi_id')->references('id')->on('period_category_kpis');

            $table->uuid('user_id')->default(null);
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('category_kpi_users');
    }
};
