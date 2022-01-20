<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_module', function (Blueprint $table) {
            $table->id();
            $table->string('url_image');
            $table->foreignId('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->string('date');
            $table->string('title');
            $table->longText('description');
            $table->string('link_url');
            
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
        Schema::dropIfExists('detail_module');
    }
}
