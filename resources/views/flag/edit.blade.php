  @include('layout/header')
  <div class="content-content_container">
    <section class="content" style="position:relative">
    <div class="row mrg-b20">
    <div class="col m8 s12 no-mrg">
    <h1 class="head-title"><span class="gry-light">Edit Flags</span></h1>
    </div>
    <div class="col m4 s12 right-align right mrg-t20">
    </div>
    </div>
  <div class="right-bg" id="basic-information">
   <div class="inner_form ui-slider-tabs">

   				<center>
  					<h6 style="color:red;"><?php
  		            echo Session::get('error'); print_r($errors->first());
  		            ?></h6>
  		        </center>
              <center>
            <h6 style="color:green;"><?php
                  echo Session::get('success');
                  ?></h6>
              </center>

  <div class="row">
<div class="col-md-12 mrg-b25 required_msg">* Required field</div>
      <form class="col s12" id="update_flag" action ="{{ route('updateFlag', $data['results']->id) }}" 
      name="update_flag"
      method="POST" enctype="multipart/form-data">

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <div class="col-md-12 formFldCont">
        <div class="row">
            <div class="col-md-12 mrg-b25">
             <div class="col-md-3 text-right fldLabel">
             <span class="required_fild">*</span>
              Flag Url  :
             </div>
             <div class="col-md-8">
             {!! Form::text(['flag_url', $data['results']->id], $data['results']->flag_url, array("placeholder"=>"Enter Flag Url", "id"=>"flag_url", "placeholder"=>"Enter Flag Url", "class"=>"validate")) !!}     
               <input placeholder="Enter Flag Url" id="flag_url" type="text" class="validate" value="<?php echo $data['results']->flag_url;  ?>" name="flag_url">
               <p calss="errorClass"><?php echo $errors->first('flag_url'); ?></p>
             </div>
            </div>

            <div class="col-md-12 mrg-b25">
                <div class="col-md-3 text-right fldLabel">
                <span class="required_fild">*</span>
                  Flag Image  :
                 </div>
                <div class="col-md-8">
                    <div class="file-field">
                      <div class="btn">
                         <div class="col-md-3 fldLabel padTop0">
                           Upload 
                         </div>
                        <input type="file" id="upload" name="image" >
                      </div>
                      <div class="file-path-wrapper">
                       <input class="file-path validate" name="flag_image_name" type="text">
                      </div>
                    </div>
                    <p class="errorClass"><?php echo $errors->first('flag_image_name'); ?></p>
                    <div for="upload" generated="true" class="error"></div>
                 </div>               
             </div>

             <div class="col-md-12 mrg-b25">
                <div class="col-md-3 text-right fldLabel">
                  &nbsp;
                 </div>
                <div class="col-md-8">
                  <span style="color:red;">Flag Image Should be (60X40) Resolution!</span>
                </div>
             </div>
             
             <div class="col-md-12 mrg-b25">
                <div class="col-md-3 text-right fldLabel">
                  &nbsp;
                 </div>
                <div class="col-md-8">
                  <img height=100 width="100" src="<?php echo url('flag_image/')."/".$data['results']->flag_image_path; ?>" title="<?php if(file_exists('./flag_image/'.$data['results']->flag_image_path)){ echo "Image"; } else { echo "No Image"; } ?>">
                </div>
             </div>
             

             <div class="col-md-12">
       <div class="col-md-3 text-right fldLabel">
                  &nbsp;
                 </div>
      <div class="col-md-6 ">
        <button class="waves-effect waves-light btn btn_default mr10">Update</button>
        <a class="waves-effect waves-light btn btn_default red" onclick="window.location.href='<?php echo url('manage_flag') ?>'">Cancel</a>
      </div>
      </div>
             
        </div>   

      </div>

  		



      </form>
      <!--form end-->
    </div>
   </div>    
  </div>

             
      
  <!--   </div>
  </div> -->
    </section>
  </div>
@include('layout/footer')