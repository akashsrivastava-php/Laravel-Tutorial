@include('layout/header')
<?php
if (isset($template)) 
{

//$this->load->view($template);
 View::make($template)->render();
}
else
{
?>
<!--Right Content Start Here-->
       <div class="content-content_container">
          <section class="content" style="position:relative">
          <div class="row mrg-b20">
          <div class="col m4 s12 right-align right mrg-t20">
          </div>
          </div>
          <div class="right-bg" id="basic-information">
			  <div class="inner_form ui-slider-tabs">

				<div class="row">	
					 <div class="row">
				 
               
                
                <div class="clear"></div> 
                  <img src="<?php echo url('images/dashboard.png?img=1.0');?>" alt="Welcome" width="100%;">
              </div>
          <div class="clearfix"></div>
          </div>
          </section>
       </div>
       
<!--Right Content Ends Here-->
<?php } ?>

@include('layout/footer')
