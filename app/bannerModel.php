<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class bannerModel extends Model
{
    protected $table = 'caffebene_home_video_banner';
    protected $fillable = ['video_banner_path', 'video_text_image_path', 'video_created_by', 'video_mfd_by', 'video_status'];
}
