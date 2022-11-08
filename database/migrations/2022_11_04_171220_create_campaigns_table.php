<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50);
            $table->string('party', 50); // Partido politico
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');

            $table->unsignedBigInteger('owner');
            $table->foreign('owner')->references('id')->on('administrators');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('administrators', function (Blueprint $table) {
            $table->foreign('current_campaign')->references('id')->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
