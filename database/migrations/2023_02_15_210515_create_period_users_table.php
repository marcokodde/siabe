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
        Schema::create('period_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->default(true);
            $table->integer('status')->default(1);
            
            $table->uuid('user_id')->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->uuid('period_id')->default(null);
            $table->foreign('period_id')->references('id')->on('periods');
            
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
        Schema::dropIfExists('period_users');
    }
};
