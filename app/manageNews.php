<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class manageNews extends Model
{
    protected $table = 'caffebene_home_latest_news';
    protected $fillable = ['news_img_path', 'news_img_priority', 'news_status'];

    public static function change_sequence($id, $seq)
    {
    	$x=DB::table('caffebene_home_latest_news')->select('id', 'news_img_priority')->where(array('id'=>$id))->first();
        $oldSeq=$x->news_img_priority;
        $newSeq=$seq;
        $newId=$id;
        $y=DB::table('caffebene_home_latest_news')->select('id', 'news_img_priority')->where(array('news_img_priority'=>$newSeq))->first();
        $oldId=$y->id;
        DB::table('caffebene_home_latest_news')->where('id', $newId)->update(array('news_img_priority'=>$newSeq));
        DB::table('caffebene_home_latest_news')->where('id', $oldId)->update(array('news_img_priority'=>$oldSeq));
    }
}
