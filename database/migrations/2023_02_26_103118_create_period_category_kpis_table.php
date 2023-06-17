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
        Schema::create('period_category_kpis', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('period_id')->default(null);
            $table->foreign('period_id')->references('id')->on('periods');

            $table->uuid('category_kpi_id')->default(null);
            $table->foreign('category_kpi_id')->references('id')->on('category_kpis');

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
        Schema::dropIfExists('period_category_kpis');
    }
};
