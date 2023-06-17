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
        Schema::create('solidarity_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->id();
            $table->string('name');
            $table->text('description');
            $table->boolean('active')->default(true);
            
            // $table->unsignedBigInteger('subproject_id')->nullable()->default(null);
            $table->uuid('subproject_id')->default(null);
            $table->foreign('subproject_id')->references('id')->on('subprojects');

            // $table->foreignId('subproject_id')->constrained();

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
        Schema::dropIfExists('solidarity_groups');
    }
};
