  @include('layout/header')
  <script type="text/javascript" src="<?php echo url('js/jquery.validate.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo url('js/materialize.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo url('js/custom-validation.js') ?>"></script>


  <div class="content-content_container">
    <section class="content" style="position:relative">

      <div class="row mrg-b20">


          <div class="col m8 s12 no-mrg">
           <h1 class="head-title"><span class="gry-light">Video Banner</span></h1>
         </div>
         <div class="col m4 s12 right-align right mrg-t20">
         </div>

       </div>

       <div class="row mrg-l-10">
        <div class="col s12">
         <div class="card card-bg">
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

           <table class="table table-bordered table-striped mrg-b0 table-responsive">
            <thead>
              <tr>
                <th><center>Sr.No.</center></th>
                <th><center>Text PNG Image</center></th>
                <th><center>Top Video</center></th>
                <!-- <th><center>Status</center></th> -->
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
             <?php if (count($data['results']) > 0){
              $i=1;
              foreach ($data['results'] as $row) {
                ?>
                <tr>
                  <td><center><?php echo $i; ?></center></td>

                  <td><center>
                  <?php 
                  if ($row->video_text_image_path != "") {
                    $imgurl = url('billboard_home_images'). '/' . $row->video_text_image_path;

                    echo '<img width="100" src="' . $imgurl.'" >';
                    } 
                    else 
                    {
                      echo "No Image.";
                    }?> 
                    </center></td>
                    <td><center><?php if(isset($row->video_banner_path)) { ?><video width="150" controls controlsList="nodownload">
                    <source src="<?php echo url('billboard_home_videos').'/'.$row->video_banner_path; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                    </video><?php }?></center></td>
                 <!-- <td><center>
                    <a href="javascript:void(0);" id="<?php echo $row->id; ?>" class="actdev" data-value="<?php echo $row->video_status; ?>"><?php echo $row->video_status; ?> </a>
                  </center></td>
 -->                  <td><center>
                   <a href = "<?php echo url('manage_banner/edit/' . $row->id); ?>">
                    <img src="<?php echo url("images/edit.png"); ?>" width="18" height="18" title="Edit">
                  </a>
                </center></td>
              </tr>
              <?php
              $i++;}
            } else { echo '<tr class="errorClass"><th colspan="5"><center>No records..</center></th></tr>'; }
            ?>
          </tbody>
        </table>
        <?php if (count($data['results']) > 0) {?>
        <div class="pagination"><?php ?></div>
        <?php }?>
      </div>
    </div>
  </div>
  </section>
  </div>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script>
    jQuery(document).ready(function($) {
      jQuery(".actdev").click(function(event) {
        var id = jQuery(this).attr("id");
        var status = jQuery(this).attr("data-value");
        $.ajax({
          url: "<?php echo url('manage_banner/status'); ?>",
          type: 'post',
          data: {'id': id,'status':status},
        })
        .done(function(data) {
         $('#'+id).attr('data-value', data.replace(/\s/g, '') );
         $('#'+id).html(data);
       });

      });
    });



  </script>

@include('layout/footer')