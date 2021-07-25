<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->timestamps();
        });

        Schema::create('agent_sms', function (Blueprint $table) {
            $table->foreignId('sms_id');
            $table->foreignId('agent_id');

            $table->foreign('sms_id')->references('id')->on('sms');
            $table->foreign('agent_id')->references('id')->on('agents');

            $table->primary(['sms_id', 'agent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_sms');
        Schema::dropIfExists('sms');
    }
}
