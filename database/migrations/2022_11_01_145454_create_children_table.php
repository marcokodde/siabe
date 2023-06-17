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
        Schema::create('children', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // $table->id();
            $table->integer('child_id')->unique();
            $table->string('top_level_project')->nullable()->default(null);
            $table->string('parent_project')->nullable()->default(null);
            $table->string('primary_child_type')->nullable()->default(null);
            $table->string('disbursement_child_type')->nullable()->default(null);
            $table->string('firstname')->nullable()->default(null);
            $table->string('goesby')->nullable()->default(null);
            $table->string('middlename')->nullable()->default(null);
            $table->string('surname')->nullable()->default(null);
            $table->string('search_fullname')->nullable()->default(null);
            $table->string('fullname')->nullable()->default(null);
            $table->date('birthdate')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->dateTime('last_letter_date')->nullable()->default(null);
            $table->string('child_status')->nullable()->default(null);
            $table->string('status_change_reason')->nullable()->default(null);
            $table->dateTime('initial_sponsorship_date')->nullable()->default(null);
            $table->dateTime('last_photo_received_date')->nullable()->default(null);
            $table->dateTime('last_photo_requested_date')->nullable()->default(null);
            $table->dateTime('last_photo_response_date')->nullable()->default(null);
            $table->dateTime('last_modified_on')->nullable()->default(null);
            $table->dateTime('status_set_on')->nullable()->default(null);
            $table->integer('associate_id')->nullable()->default(null);
            $table->dateTime('welcome_notification_date')->nullable()->default(null);
            $table->dateTime('begin_date')->nullable()->default(null);
            $table->string('status_change_reason_spanish')->nullable()->default(null);
            $table->dateTime('next_photo_due_date')->nullable()->default(null);
            $table->boolean('active')->default(true);

            $table->uuid('gender_id')->nullable(true);
            // $table->unsignedBigInteger('gender_id')->nullable(true);
            $table->foreign('gender_id')->references('id')->on('genders');
            // $table->foreignId('gender_id')->constrained();

            $table->uuid('child_type_id')->nullable(true);
            // $table->unsignedBigInteger('child_type_id')->nullable(true);
            $table->foreign('child_type_id')->references('id')->on('child_types');
            // $table->foreignId('child_type_id')->constrained();

            $table->uuid('subproject_id');
            // $table->unsignedBigInteger('subproject_id');
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
        Schema::dropIfExists('children');
    }
};
