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
        Schema::create('advisory_committees', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('title')->nullable();
            $table->mediumText('designation')->nullable();
            $table->tinyInteger('Priority');
            $table->tinyInteger('status')->comment('1=active, 2 =de-active');
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
        Schema::dropIfExists('advisory_committees');
    }
};
