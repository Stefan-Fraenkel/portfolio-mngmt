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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('advertise')->default(0);
            $table->string('employer')->nullable();
            $table->string('short_description')->nullable();
            $table->string('location')->nullable();
            $table->string('logo')->nullable();
            $table->longText('image')->nullable();
            $table->string('image_identifier')->nullable();
            $table->string('url')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('certificate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employments');
    }
};
