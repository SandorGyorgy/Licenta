<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('image0');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE images MODIFY image0 MEDIUMBLOB;');
        DB::statement('ALTER TABLE images MODIFY image1 MEDIUMBLOB;');
        DB::statement('ALTER TABLE images MODIFY image2 MEDIUMBLOB;');
        DB::statement('ALTER TABLE images MODIFY image3 MEDIUMBLOB;');
        DB::statement('ALTER TABLE images MODIFY image4 MEDIUMBLOB;');
    }

    

  
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
