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
        Schema::create('benefits_plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->id();
            $table->text('goal1')->default(null);
            $table->text('goal2')->default(null);
            $table->text('familiy_goal')->default(null);
            $table->boolean('self_sufficiency')->default(true);
            $table->date('capture_date');
            $table->string('capture_name');
            $table->string('tutor');
            $table->string('relationship');
            $table->string('relationship_other');
            $table->boolean('active')->default(true);
            
            $table->uuid('child_id')->nullable()->default(null);
            // $table->unsignedBigInteger('child_id')->nullable()->default(null);
            $table->foreign('child_id')->references('id')->on('children');
            // $table->foreignId('child_id')->constrained();
            $table->uuid('year_id')->nullable()->default(null);
            // $table->unsignedBigInteger('year_id')->nullable()->default(null);
            $table->foreign('year_id')->references('id')->on('years');
            // $table->foreignId('year_id')->constrained();
            $table->uuid('subproject_id')->default(null);
            // $table->unsignedBigInteger('subproject_id')->default(null);
            $table->foreign('subproject_id')->references('id')->on('subprojects');
            // $table->foreignId('subproject_id')->constrained();
            $table->uuid('solidarity_group_id')->default(null);
            // $table->unsignedBigInteger('solidarity_group_id')->default(null);
            $table->foreign('solidarity_group_id')->references('id')->on('solidarity_groups');
            // $table->foreignId('solidarity_group_id')->constrained();
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
        Schema::dropIfExists('benefits_plans');
    }
};
