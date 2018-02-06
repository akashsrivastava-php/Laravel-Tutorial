@include('layout/header')

  <div class="content-content_container">
    <section class="content" style="position:relative">

      <div class="row mrg-b20">

          <div class="col m8 s12 no-mrg">
           <h1 class="head-title"><span class="gry-light"> Latest News Images</span></h1>
         </div>
         <div class="col m4 s12 right-align right mrg-t20">
         </div>

       </div>

       <div class="row mrg-l-10">
        <div class="col s12">
         <div class="card card-bg">
             <center>
            <h6 id="error-status" style="color:red;"><?php
                echo Session::get('error'); print_r($errors->first());
                  ?></h6>
              </center>
              <center>
            <h6 style="color:green;"><?php
                  echo Session::get('success');
                  ?></h6>
              </center>
    <!--form-->
           <table class="table table-bordered table-striped mrg-b0 table-responsive">
            <thead>
              <tr>
                <th><center>Sequence No.</center></th>
                <th><center>Image</center></th>
                <th><center>Status</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
             <?php $sr_no=1; if (count($data['results']) > 0){
             foreach ($data['results'] as $row) {
                ?>
                <tr>
                  <td><center>
                <select id='<?php echo $row->id.'/'.'seq'; ?>' class='sequence' name="sequence">
                <?php $i=count($data['results']); for($j=1; $j<=$i; $j++) { ?>
                  <option <?php if($row->news_img_priority==$j){echo 'selected'; } ?> value='<?php echo $j; ?>'><?php echo $j; ?></option>
                  <?php } ?>
                  </select>
                 </center></td>
<td><center>
                <img src="<?php echo url('news_images/').'/'.$row->news_img_path; ?>" width="50" height="50" title="<?php if(file_exists('news_images/'.$row->news_img_path)){ echo "Image"; } else { echo "No Image"; } ?>">
                </center></td></td>
                <td><center>
                  <a href="javascript:void(0);" id="<?php echo $row->id; ?>" class="actdev" data-value="<?php  if($row->news_status==1){ echo 'Active'; }else { echo "Inactive"; } ?>"><?php if($row->news_status==1){ echo 'Active'; }else { echo "Inactive"; } ?></a> 
                  </center></td>
                   <td><center>
                   <a href = "<?php echo url('manage_news/edit/' . $row->id); ?>">
                    <img src="<?php echo url("images/edit.png"); ?>" width="18" height="18" title="Edit">
                  </a>
                
                  </center></td>
              </tr>
              <?php
              $sr_no++;
              }
            } else { echo '<tr class="errorClass"><th colspan="4"><center>No records..</center></th></tr>'; }
            ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
  </section>
  </div>


  <script>
    jQuery(document).ready(function($) {
      jQuery(".actdev").click(function(event) {
        var id = jQuery(this).attr("id");
        var status = jQuery(this).attr("data-value");
        $.ajax({
          url: "<?php echo url('manage_news/status'); ?>",
          type: 'get',
          dataType: "json",
          data: {'id': id,'status':status},
        })
        .done(function(data) {
          if(data.status=='success')
          {
            $('#'+id).attr('data-value', data.response.replace(/\s/g, '') );
            $('#'+id).html(data.response);
          }
          else if(data.status=='error')
          {
            $('#error-status').html(data.response);
          }

        });

      });
      $(".sequence").change(function(event) {
        var idSeq = $(this).attr("id");
        var seq = $(this).val();
        var idS = idSeq.split('/');
        var id = idS[0];
        window.location.href="<?php echo url('manage_news/change_sequence'); ?>"+"/"+id+"/"+seq;
      });

    });
 </script>
 @include('layout/footer')