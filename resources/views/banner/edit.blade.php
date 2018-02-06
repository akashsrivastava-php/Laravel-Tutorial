 @include('layout/header')
 <div class="content-content_container">
    <style>
      label{
        font-size: 1.0rem;
        color: #000;
        padding-top: 22px;
        padding-left: 43px;
      }
    </style>

    <section class="content" style="position:relative">
      <div class="row mrg-b20">
        <div class="col m8 s12 no-mrg">
        <h1 class="head-title"><span class="gry-light"> Edit Video Banner</span></h1>
        </div>
        <div class="col m4 s12 right-align right mrg-t20">
        </div>
      </div>
      <div class="right-bg" id="basic-information">
        <div class="inner_form ui-slider-tabs">

          <center>
            <h6 style="color:red;"><?php
            echo Session::get('error');
              ?></h6>
            </center>
            <center>
            <h6 style="color:green;"><?php
            echo Session::get('success');
              ?></h6>
            </center>

            <div class="row">
            <div class="col-md-12 mrg-b25 required_msg">* Required field</div>
              <form class="col s12" id="edit_banner_images" action ="{{ route('updateBanner', $data['results']->first()->id) }}" 
                name="edit_banner_images"
                method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="<?php if (isset($data["results"]->first()->id)) {
                  echo $data["results"]->first()->id;
                }
                ?>">
                
                <div class="col-md-12 formFldCont">
                  <div class="row">


                    <div class="col-md-12 mrg-b25">
                      <div class="col-md-3 text-right fldLabel">
                      <span class="required_fild">*</span>
                        Top Banner Video :
                      </div>
                      <div class="col-md-8">

                        <div class="file-field">
                          <div class="btn">
                            <span>Upload</span>
                            <input type="file" id="video" name="video">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="video_name">
                          </div>
                          <p class="errorClass"><?php echo $errors->first('video'); ?></p>
                        </div>
                        
                      </div>               
                    </div>

                    <div class="col-md-12 mrg-b25">
                      <div class="col-md-3 text-right fldLabel">
                        &nbsp;
                      </div>
                      <div class="col-md-8">
                      <span style="color: red;">Upload Only less than 2 MB mp4 video file!</span>
                     </div>
                   </div>

                     <div class="col-md-12 mrg-b25">
                      <div class="col-md-3 text-right fldLabel">
                        &nbsp;
                      </div>
                      <div class="col-md-8">
                      <video width="200" controls controlsList="nodownload">
                    <source src="<?php echo url('billboard_home_videos').'/'.$data['results']->first()->video_banner_path; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
                     </div>
                   </div>

                    <div class="col-md-12 mrg-b25">
                      <div class="col-md-3 text-right fldLabel">
                      <span class="required_fild">*</span>
                       Text PNG Image :
                      </div>
                      <div class="col-md-8">

                        <div class="file-field">
                          <div class="btn">
                            <span>Upload</span>
                            <input type="file" id="upload" name="image">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="image_name">
                          </div>
                          <p class="errorClass"><?php echo $errors->first('image'); ?></p>
                        </div>
                        
                      </div>               
                    </div>

                    <div class="col-md-12 mrg-b25">
                      <div class="col-md-3 text-right fldLabel">
                        &nbsp;
                      </div>
                      <div class="col-md-8">
                      <span style="color: red;">Upload Only png image file!</span>
                     </div>
                   </div>

                    <div class="col-md-12 mrg-b25">
                      <div class="col-md-3 text-right fldLabel">
                        &nbsp;
                      </div>
                      <div class="col-md-8">
                       <img height=100 width="100" src="<?php 
                       echo url('billboard_home_images/').'/'.$data['results']->first()->video_text_image_path; ?>" title="<?php if(file_exists('./billboard_home_images/'.$data['results']->first()->video_text_image_path)){ echo "Image"; } else { echo "No Image"; } ?>">
                     </div>
                   </div>

                   <div class="col-md-12">
                     <div class="col-md-3 text-right fldLabel">
                      &nbsp;
                    </div>
                    
                    <div class="col-md-6 ">
                      <button id="submit" class="waves-effect waves-light btn btn_default mr10">Update</button>
                      <a class="waves-effect waves-light btn btn_default red" onclick="window.location.href='<?php echo url('manage_banner'); ?>'">Cancel</a>
                    </div>
                  </div>

                </div>   

              </div>

            </form>

          </div>
        </div>
      </section>
    </div>
    @include('layout/footer')