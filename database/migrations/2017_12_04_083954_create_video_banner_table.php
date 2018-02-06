<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caffebene_home_video_banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video_banner_path');
            $table->string('video_text_image_path');
            $table->string('video_created_by');
            $table->string('video_mfd_by');
            $table->timestamps();
            $table->string('video_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caffebene_home_video_banner');
    }
}
