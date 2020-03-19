<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('host_name');
            $table->string('server_ip');
            $table->tinyInteger('enable')->default(1)->comment('1=>enable, 0->disable');
            $table->string('ns1');
            $table->string('ns2');
            $table->string('ns3')->nullable();
            $table->string('ns4')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('api_key')->nullable();
            $table->tinyInteger('secureConnection')->default(1)->comment('1=>enable, 0->disable');
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
        Schema::dropIfExists('server_information');
    }
}
