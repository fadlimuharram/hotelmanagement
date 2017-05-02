<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('types', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('name_type',50);
          $table->string('priceperhour',50);
          $table->timestamps();
      });

      Schema::table('rooms',function(Blueprint $table){
        $table->integer('type_id')->unsigned();
        $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
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
          $table->dropForeign('rooms_type_id_foreign');
        });
        Schema::dropIfExists('types');
    }
}
