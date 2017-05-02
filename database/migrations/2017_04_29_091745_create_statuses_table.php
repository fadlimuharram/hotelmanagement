<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('statuses', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('namestatus',50);
          $table->string('icon',30)->nullable();
          $table->string('hex_color',30);
          $table->timestamps();
      });

      Schema::table('rooms',function(Blueprint $table){
        $table->integer('statuses_id')->unsigned();
        $table->foreign('statuses_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms',function(Blueprint $table){
          $table->dropForeign('rooms_statuses_id_foreign');
        });
        Schema::dropIfExists('statuses');
    }
}
