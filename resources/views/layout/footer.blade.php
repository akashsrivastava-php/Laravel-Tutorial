<footer class="footer-wrapper"> <strong>Copyright &copy; <?php echo date('Y') ?> <a href="#!">Caffebene</a>.</strong> All rights reserved. </footer>

      </div>


	<script type="text/javascript" src="<?php echo url('js/account.js'); ?>"></script>

      <script src="<?php echo url('js/jquery.sliderTabs.min.js'); ?>"></script>
      <script>var slider = $("div#mySliderTabs").sliderTabs({
         autoplay: false,
         mousewheel: false,
         position: "top"
         });
      </script>
      <script src="<?php echo url('js/bootstrap.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo url('js/materialize.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo url('js/main.js'); ?>"></script>
      <script>$('.datepicker').pickadate({
         selectMonths: true,
         selectYears: 15
         });
      </script>
      <script type="text/javascript" src="<?php echo url('js/jquery.dataTables.min.js'); ?>"></script>

<script src="<?php echo url("ckeditor/ckeditor.js"); ?>"></script>

      <script>
         $(document).ready(function() {
             $('#example').DataTable();
         } );
         $(document).ready(function(){
             $('.modal-trigger').leanModal();
           });
      </script>
      <script>$(document).ready(function() {
                                    $('select').material_select();
                                  });

      <?php
if (Request::segment(1) == "manage_page" || Request::segment(1) == "manage_page") {
	if (Request::segment(2) == "add" || Request::segment(2) == "edit") {?>

CKEDITOR.replace( 'page_content_en', {
       filebrowserUploadUrl : '<?php echo url('manage_page/imgupload'); ?>'
});
CKEDITOR.replace( 'page_content_ar', {
       contentsLangDirection: 'rtl',
       filebrowserUploadUrl : '<?php echo url('manage_page/imgupload'); ?>'
});

<?php }}?>
<?php
if (Request::segment(2) == 'edit_email_template' || Request::segment(2) == 'add_email_template') {
	?>
CKEDITOR.replace( 'template_content_en', {
       filebrowserUploadUrl : '<?php echo url('manage_emailtemplate/imgupload'); ?>'
});
CKEDITOR.instances.template_content_en.on('change', function() {
   $('#template_content_en').val(CKEDITOR.instances.template_content_en.getData());
    $('div[for="template_content_en"]').hide();
});

<?php }?>
<?php
if (Request::segment(2) == 'send_email') {
	?>
CKEDITOR.replace( 'template_content_en', {
       filebrowserUploadUrl : '<?php echo url('manage_emailtemplate/imgupload'); ?>'
});

CKEDITOR.instances.template_content_en.on('change', function() {
   $('#template_content_en').val(CKEDITOR.instances.template_content_en.getData());
    $('div[for="template_content_en"]').hide();
});
<?php }?>
      </script>

    <!-- Start Form Validation Script -->

<script type="text/javascript" src="<?php echo url('js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url('js/materialize.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url('js/custom-validation.js');?>"></script>

<!-- End Form Validation Script -->

   </body>
</html>
