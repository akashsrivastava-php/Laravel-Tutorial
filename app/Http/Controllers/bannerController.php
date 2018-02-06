<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use validator;
use File;
use App\bannerModel;

class bannerController extends HomeController
{
   public function index()
   {
    $data['template']='banner/view_banner_images';
    $data['page']='view banner';
    $data['results']= bannerModel::all();
    return view('banner/view_banner_images', compact('data'));
   }
   public function edit(Request $request)
   {
   	$data['template']='banner/edit';
    $data['page']='view banner';
    $data['results']= bannerModel::find($request->id);
    return view('banner/edit', compact('data'));
   }
   public function update(Request $request)
   {
    $this->validate($request, [
            'video' => 'required|mimes:mp4',
            'image' => 'required|mimes:png',
        ]);

      $path = $request->image->path();
      $extension = $request->image->extension();
      $image= $request->id.'.'.$extension;

        $image_url='/billboard_home_images/'.$request->id.'.'.$extension;
                
            if(File::exists($image_url))
            {
                File::delete($image_url);
            }

            $request->file('image')->move(public_path("/billboard_home_images/"), $image);

            $path = $request->video->path();
      $extension = $request->video->extension();
      $video= $request->id.'.'.$extension;

        $video_url='/billboard_home_videos/'.$request->id.'.'.$extension;
                
            if(File::exists($video_url))
            {
                File::delete($video_url);
            }

            $request->file('video')->move(public_path("/billboard_home_videos/"), $video);


            $data=array(
              'video_banner_path'=>$video,
              'video_text_image_path'=>$image
            );
        bannerModel::find($request->id)->update($data);
        Session::flash('success', 'Banner updated successfully');
        return redirect()->action('bannerController@index');
   }
}
