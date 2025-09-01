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
        Schema::create('sdgs', function (Blueprint $table) {
            $table->id();
            $table->string('goal')->nullable();
            $table->string('title')->nullable();
            $table->string(column: 'slug')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->string('img')->nullable();
            $table->tinyInteger('Priority')->nullable();
            $table->tinyInteger('status')->comment('1=active, 2 =de-active')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sdgs');
    }
};
