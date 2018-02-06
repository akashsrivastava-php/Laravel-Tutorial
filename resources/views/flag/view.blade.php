@include('layout/header')
 <div class="content-content_container">
            <section class="content" style="position:relative">
            <!--breadcrumb Start Here-->
            <div class="row mrg-b20">
            
            <div class="col m8 s12 no-mrg">
                 <h1 class="head-title"><span class="gry-light">Flags</span>
              </h1>
            </div>

            </div>
            <div>
                
            </div>
            <!--breadcrumb Ends Here-->
            <!--Table Start Here-->
            <div class="row mrg-l-10">
            <div class="col s12">
             <div class="card card-bg no-hidden">
<center>
                      <h6 style="color:red;"><?php
                      echo Session::get('error'); print_r($errors->first())?></h6>
                  </center>
                  <center>
                      <h6 style="color:green;"><?php
                      echo Session::get('success');?></h6>
                  </center>
                  <center><h6 class="validation_err_msg"></h6></center>
   <div class="col-md-12 mrg-b25 nopadlftRgt">
   <div class="col-md-12 mrg-b25 required_msg">* Required field</div>
 <form id="flag_form" method="POST" name="flag_form" action="addFlag" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <div class="col-md-12 formFldCont">
  <div class="row">
  <div class="col-md-12 mrg-b25">
 
  <div class="col-md-10 nopadlftRgt" style="float: none; margin: 0 auto;">
  <div class="field_wrapper_col add_product_cont">
      
  <table cellpadding="0" cellspacing="0" width="100%">
  <thead>
  <tr>
    <th>Flag Url</th>
    <th>Flag Image</th>
    <th>&nbsp;</th>
  </tr>
  </thead>
  <tbody>
  <tr>

          <td><input type="text" class="flag_url" name="flag_url[]" value="">
</td><td><div class="file-field">
            <div class="btn">
                         <div class="">
                           Upload
                         </div>
                        <input type="file" id="upload" name="flag_image[]" >
                      </div>
          
          <div class="file-path-wrapper" id="file_path">
            <input class="file-path validate flag_image" type="text" name="flag_image_name[]">

          </div>
              
        </div></td><td><span class="required_fild_table_volume">*</span><a href="javascript:void(0);" class="btn-floating btn-small waves-effect waves-light green add_flag"><i class="material-icons">add</i></a></td>
          </tr>
          </tbody>
          </table>


      </div>
      </div>
      <div class="col-md-2">
  </div>
  </div>
  </div>
            </div>
            <div class="col-md-12" id="custom-att-submit">
            <div class="col-md-3">
            </div>
                 <div class="col-md-6">
                 <span style="color:red;">Flag Image Should be (60X40) Resolution!</span>
                 </div>
                 <div class="col-md-3">
              <div class="col-md-10 nopadlftRgt" style="float: none; margin: 0 auto;">
                <button class="waves-effect waves-light btn btn_default mr10 form_action">Add</button>
                </div>
              </div>
         </div>
            </form>
  </div>

        
        <table class="table table-bordered table-striped mrg-b0 table-responsive">
              <thead>
                <tr>
                  <th><center>Sr. No.</center></th>
                  <th><center>Sequence</center></th>
                  <th><center>Flag Url</center></th>
                  <th><center>Flag Image</center></th>
                  <th><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              
        <?php if (count($data['results']->first()) > 0) {
          $i=Request::segment(3);
          $sr_no=1;
          $sr_no=$sr_no+$i;
    foreach ($data['results'] as $row) {?>
     
      
                <tr> 
                  <td><center><?php echo $sr_no; ?></center></td>
                  <td><center>
                    <select name="sequence" class="sequence" id="<?php echo $row->id; ?>">
                    <?php $i=1; foreach($data['seq'] as $value){ ?>
                    <option <?php if($row->flag_sequence==$value->flag_sequence){ echo 'selected'; } ?> value="<?php echo $value->flag_sequence; ?>" ><?php echo $i; ?></option>
                    <?php $i++; } ?>
                    </select>
                  </center></td>
                  <td><center><?php echo $row->flag_url; ?></center></td>
                  <td><center><img width="40px" src="<?php echo url('flag_image').'/'.$row->flag_image_path; ?>"></center></td>
                  <td><center>
                   <a href = "<?php echo url('manage_flag/edit/' . $row->id); ?>">
                    <img src="<?php echo url("images/edit.png"); ?>" width="18" height="18" title="Edit">
                  </a>
                  &nbsp;
                  <a href = "<?php echo url('manage_flag/delete/' . $row->id); ?>" onclick="return confirm('Are you sure! do you want to delete?')">
                <img src="<?php echo url('images/delete.png'); ?>" width="14" height="14" title="Delete">
                </a>
            
                  </center></td>
                </tr>
          <?php
  $sr_no++;} 
  } else { echo '<tr class="errorClass"><th colspan="5"><center>No records..</center></th></tr>';}
  ?>
  </tbody>
            </table>
                      {{ $data['results']->links() }}
  </div>

  
             <div id="pagination1" class="pagination_nw">
                  
              </div>
            </div>
            </div>
            </div>
            </section>
        </div>

  <script type="text/javascript">
  $(document).ready(function(){
     
      var maxField_color = 10; //Input fields increment limitation
      var addButton_col = $('.add_flag'); //Add button selector
      var wrapper_col = $('.field_wrapper_col'); //Input field wrapper


      var fieldHTML_color = '<table id="tab_remove"><tr><td><input type="text" class="flag_url" name="flag_url[]" value=""></td><td><div class="file-field"><div class="btn"><div class="">Upload</div><input type="file" id="upload" name="flag_image[]" ></div><div class="file-path-wrapper"><input class="file-path validate flag_image" type="text" name="flag_image_name[]"></div></div></td><td><span class="required_fild_table_volume">*</span><a href="javascript:void(0);" class="btn-floating btn-small waves-effect waves-light green add_button remove_button"><i class="material-icons">cancel</i></a></td></tr></table>';

      var col_count = 2; //Initial field counter is 1
      $(addButton_col).click(function(){ //Once add button is clicked
          if(col_count < maxField_color){ //Check maximum number of input fields
              col_count++; //Increment field counter
              $(wrapper_col).append(fieldHTML_color); // Add field html
          }
      });
      $(wrapper_col).on('click', '.remove_button', function(){ //Once remove button is clicked
          /*$("#tab_remove").remove();*/
          $(this).parents("#tab_remove").remove();//Remove field html
          col_count--; //Decrement field counter
      });

      $(".form_action").click(function(){
        var flag=0;
        $('.flag_url').each(function(){
         var val= $(this).val();
         if(val=='')
         {
          flag=1;
         }
        });
        $('.flag_seq').each(function(){
         var val= $(this).val();
         if(val=='')
         {
          flag=1;
         }
        });
        $('.flag_image').each(function(){
         var val= $(this).val();
         if(val=='')
         {
          flag=1;
         }
        });
        if(flag==1)
        {
          $("h6.validation_err_msg").replaceWith("<h6 class='validation_err_msg' style='color: red;'>All fields are mandatory!</h6>");
          $(this).focus();
          return false;
        }
        else
        {
          $("h6.validation_err_msg").replaceWith("<h6 class='validation_err_msg'></h6>");
          return true;
        }
      });
       $(".sequence").change(function(event) {
        var id = $(this).attr("id");
        var seq = $(this).val();
        window.location.href="<?php echo url('manage_flag/change_sequence'); ?>"+"/"+id+"/"+seq;
      });
    });
  </script>
  @include('layout/footer')