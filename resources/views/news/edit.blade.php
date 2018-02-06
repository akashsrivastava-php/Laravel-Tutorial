@include('layout/header')
<div class="content-content_container">
  <section class="content" style="position:relative">
  <div class="row mrg-b20">
  <div class="col m8 s12 no-mrg">
  <h1 class="head-title"><span class="gry-light">Edit Latest News Images</span></h1>
  </div>
    
  <div class="col m4 s12 right-align right mrg-t20">
  </div>
  </div>



  <div class="right-bg" id="basic-information">
  <div class="inner_form ui-slider-tabs">

     <center>
            <h6 style="color:red;"><?php
                  print_r($errors->first()); echo Session::get('error');
                  ?></h6>
              </center>
              <center>
            <h6 style="color:green;"><?php
                  echo Session::get('success');
                  ?></h6>
              </center>
    <!--form-->
	 {!! Form::open(['url'=>['updateNews', $data['results']->id], 'files' => true, 'name'=>'edit_brand_news', 'id'=>'edit_brand_news']) !!}

	<div class="row form_fld_label">
<div class="col-md-12 formFldCont">
<div class="col-md-12 mrg-b25 required_msg">* Required field</div>
<div class="row">


            <div class="col-md-12 mrg-b25">
                <div class="col-md-3 text-right fldLabel">
                <span class="required_fild">*</span>
               Image
                  &nbsp;
                 </div>
                <div class="col-md-8">
                    <div class="file-field">
                      <div class="btn">
                         <div class="col-md-3 fldLabel padTop0">
                         
                           Upload
                         </div>
                         {!! Form::file('image', array('id'=>'upload')) !!}
                      </div>
                      <div class="file-path-wrapper">
                      {!! Form::text('image_name', '', array('class'=>'file-path validate')) !!}
                      </div>
                      
                    </div>
                    <div for="upload" generated="true" class="error"></div>
                 </div>               
             </div>

             <div class="col-md-12 mrg-b25">
                <div class="col-md-3 text-right fldLabel">
                  &nbsp;
                 </div>
                <div class="col-md-8">
                  <span style="color:red;">Latest News Image Should be (1201X406) Resolution!</span>
                </div>
             </div>

                    <div class="col-md-12 mrg-b25">
                      <div class="col-md-3 text-right fldLabel">
                        &nbsp;
                      </div>
                      <div class="col-md-8">
                       <img height=100 width="100" src="<?php 
                       echo url('news_images/').'/'.$data['results']->news_img_path; ?>" title="<?php if(file_exists('new_images/'.$data['results']->news_img_path)){ echo "Image"; } else { echo "No Image"; } ?>">
                     </div>
                   </div>

                   <div class="col-md-12">
                     <div class="col-md-3 text-right fldLabel">
                      &nbsp;
                    </div>
                    <div class="col-md-6 ">
                    <br>
                    {!! Form::submit('UPDATE', array('class'=>'waves-effect waves-light btn btn_default mr10')) !!}
                    {!! link_to('manage_news', 'Cancel', array('class'=>'waves-effect waves-light btn btn_default red')) !!}
        </div>
     </div>
     </div>

  {!! Form::close() !!}
   

  </div>
</div>
  </section>
</div>

@include('layout/footer')


