<?php

namespace App\Http\Controllers;

use App\manageNews;
use Illuminate\Http\Request;
use Auth;
use File;
use Validator;
use Session;
use DB;
use Paginate;

class ManageNewsController extends HomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page']="view news";
        $data['results']=manageNews::orderBy('news_img_priority', 'asc')->paginate('10');
        $data['seq']=manageNews::orderBy('news_img_priority', 'asc')->get();
        return view('news/view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\manageNews  $manageNews
     * @return \Illuminate\Http\Response
     */
    public function show(manageNews $manageNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\manageNews  $manageNews
     * @return \Illuminate\Http\Response
     */
    public function edit(manageNews $manageNews, Request $request)
    {
        $data['page']="view news";
        $data['results']=manageNews::find($request->id);
        return view('news/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\manageNews  $manageNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, manageNews $manageNews)
    {
        $id = $request->id;

        if($request->file('image'))
        {
            $path = $request->image->path();
            $extension = $request->image->extension();
            $news_image_name= $id.'.'.$extension;

            $image_url='news_images/'.$news_image_name;

            if(File::exists($image_url))
            {
                File::delete($image_url);
            }

            $request->file('image')->move(public_path("/news_images/"), $news_image_name);

            $data=array(
                'news_img_path'=>$news_image_name,
                'news_status'=>'1'
                );
            manageNews::find($id)->update($data);
            Session::flash('success', 'News updated successfully');
            return redirect()->action('ManageNewsController@index');
        }
        Session::flash('error', 'Something went wrong');
        return redirect()->action('ManageNewsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\manageNews  $manageNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(manageNews $manageNews)
    {
        //
    }
    public function change_sequence(Request $request)
    {
       $id = $request->id;
       $seq = $request->seq;
        manageNews::change_sequence($id, $seq);
        Session::flash('success', 'News sequence change successfully');
        return redirect()->action('ManageNewsController@index');
    }
    public function status(Request $request)
    {
        $id = $request["id"];
            $val = ($request["status"] == "Active" ? "0" : "1");
            if($val=="0")
            {
                $result=manageNews::where('news_status', '0')->count();
                if($result=='4')
                {
                    //$this->session->set_flashdata('error', 'At Least One News Should be Active!');
                    $json = array('status' => 'error', 'response' => 'At Least One News Should be Active!');
                    echo json_encode($json);
                    die;
                
                }
            }
            $data = array('news_status' => $val);
            $res = manageNews::find($id)->update($data);
            if ($res) {

                //echo $val;
                if($val==1)
                {
                    $val="Active";
                }
                else if($val==0)
                {
                    $val = "Inactive";
                }
                $json = array('status' => 'success', 'response' => $val);
                    echo json_encode($json);

            }
    }
}
