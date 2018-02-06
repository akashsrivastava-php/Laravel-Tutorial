<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class FlagModel extends Model
{
	protected $table = 'caffebene_flag';
	protected $fillable = ['flag_url', 'flag_image_path', 'flag_sequence'];

	public static function change_sequence($id, $seq)
	{
		$x=DB::table('caffebene_flag')->select('id', 'flag_sequence')->where(array('id'=>$id))->first();
        $oldSeq=$x->flag_sequence;
        $newSeq=$seq;
        $newId=$id;
        $y=DB::table('caffebene_flag')->select('id', 'flag_sequence')->where(array('flag_sequence'=>$newSeq))->first();
        $oldId=$y->id;
        DB::table('caffebene_flag')->where('id', $newId)->update(array('flag_sequence'=>$newSeq));
        DB::table('caffebene_flag')->where('id', $oldId)->update(array('flag_sequence'=>$oldSeq));
	}
}
