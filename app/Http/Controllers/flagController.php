<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use Validator;
use Session;
use DB;
use App\flagModel;
use Paginate;

class FlagController extends HomeController
{
    public function index()
    {
    	$data['page']="flag";
    	$data['results']=flagModel::orderBy('flag_sequence', 'asc')->paginate('10');
        $data['seq']=flagModel::orderBy('flag_sequence', 'asc')->get();
    	return view('flag/view', compact('data'));
    }
    public function edit(Request $request)
    {
    	$data['page']="flag";
    	$data['results']= flagModel::find($request->id);
    	$data['flag_row']= flagModel::count();
    	return view('flag/edit', compact('data'));
    }
    public function change_sequence(Request $request)
    {
    	$id=$request->id;
        $seq=$request->seq;
        flagModel::change_sequence($id, $seq);
        Session::flash('success', 'Flag sequence change successfully');
        return redirect()->action('flagController@index');
    }
    public function addFlag(Request $request)
    {
        $this->validate($request, [
            'flag_url' => 'required',
            'flag_image' => 'required',
        ]);
        $url=$_POST['flag_url'];
        $i=0;
        foreach($url as $url_val)
        {
            $data=array(
                'flag_url'=>$url_val,
                'flag_image_path'=>"",
                'flag_sequence'=>""
                );
            $insertId = flagModel::create($data);
            $id = $insertId->id;
            $path = $request->flag_image[$i]->path();
            $extension = $request->flag_image[$i]->extension();
            $flag_img_name= $id.'.'.$extension;
            $request->file('flag_image')[$i]->move(public_path("/flag_image/"), $flag_img_name);
            $i++;
            $data=array('flag_sequence'=>$id, 'flag_image_path'=>$flag_img_name);
            flagModel::find($id)->update($data);
        }
        Session::flash('success', 'Flag added succesfully');
        return redirect()->action('flagController@index');
    }
    public function deleteFlag(Request $request)
    {
        $id=$request->id;
        $img = flagModel::where('id', $id)->get(['flag_image_path'])->first();
        $img = $img->flag_image_path;
        
        $image_url='flag_image/'.$img;
                
            if(File::exists($image_url))
            {
                File::delete($image_url);
            }

        flagModel::find($id)->delete();
        Session::flash('success', 'Flag deleted successfully');
        return redirect()->action('flagController@index');
    }
    public function updateFlag(Request $request)
    {
        $this->validate($request, [
            'flag_url' => 'required'
        ]);
        $id=$request->id;
        if($request->file('image'))
        {
            $path = $request->image->path();
            $extension = $request->image->extension();
            $flag_img_name= $id.'.'.$extension;

            $image_url='flag_image/'.$flag_img_name;

            if(File::exists($image_url))
            {
                File::delete($image_url);
            }

            $request->file('image')->move(public_path("/flag_image/"), $flag_img_name);

            $data=array(
                'flag_url'=>$request['flag_url'],
                'flag_image_path'=>$flag_img_name
                );
        }
        else
        {
            $data=array('flag_url'=>$request['flag_url']);
        }
        flagModel::find($id)->update($data);
        Session::flash('success', 'Flag updated successfully');
        return redirect()->action('flagController@index');
    }
}
