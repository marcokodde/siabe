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
        Schema::create('kpis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('field_name')->nullable(true);
            $table->boolean('active')->default(true);

            $table->uuid('measuring_unit_id')->default(null)->nullable(true);
            $table->foreign('measuring_unit_id')->references('id')->on('measuring_units');

            $table->uuid('category_kpi_id')->default(null)->nullable(true);
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
        Schema::dropIfExists('kpis');
    }
};
