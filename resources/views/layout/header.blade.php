<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Caffebene</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="shortcut icon" href="<?php echo url('images/favicon.png'); ?>" />

      <link rel="stylesheet" href="<?php echo url('css/bootstrap.min.css?ver=3.3'); ?>">
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo url('css/materialize.min.css?ver=3.3'); ?>"  media="screen,projection"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo url('css/style.css?ver=3.3'); ?>">
      <link rel="stylesheet" href="<?php echo url('css/media.css?ver=3.3'); ?>">
      <link rel="stylesheet" href="<?php echo url('css/jquery.sliderTabs.min.css'); ?>">
      <link class="" href="<?php echo url('css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="<?php echo url('css/tablesaw.css'); ?>">
   <script src="<?php echo url('js/jQuery-2.1.4.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo url('js/jquery.validate.min.js'); ?>"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="content_container">
      <!--Header Start Here-->
       <header class="header-wrapper"> <a href="<?php echo url('admin/dashboard') ?>" class="logo"> <span class="logo-mini">
		   <img src="<?php echo url('images/application-tracking_mini-logo.png'); ?>" style="height:40px; margin-left:5px; margin-top:10px;" alt=""/></span> <span class="logo-lg"><img src="<?php echo url('images/application-tracking.png'); ?>" alt=""/></span> </a>
    <nav class="navbar navbar-static-top" role="navigation"> <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav mrg-tb10">
          <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle pdn-tb10" data-toggle="dropdown">
		 <span class="user_txt left">
		<?php echo Session::get('first_name') . ' ' . Session::get('last_name'); ?>
		</span>
          <i class="material-icons left col_444 down-arrow" style="line-height:20px !important; font-size:18px; margin-top:15px;">expand_more</i>

			<?php
if (!empty($userPhoto['photo'])) {
	$profile_image = url('photo/' . $userPhoto['photo']);

} else {
	$profile_image = url('images/avatar5.png');
}

?>
			<img width='200' src="<?php echo $profile_image; ?>" class="user-image hidden-xs" alt="User Image" style="margin-right: 2px;">

            <div class="clearfix"></div>
            </a>
            <ul class="dropdown-menu">

              <li class="user-footer">
                <div class="pull-left"> <a href="<?php echo url('admin/changepwd') ?>" class="waves-effect waves-light btn btn_default">Change Password</a> </div>
                <div class="pull-right"> <a href="<?php echo url('admin/logout') ?>" class="waves-effect waves-light btn btn-danger">Sign out</a> </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
      <!--Header Ends Here-->
      <?php
$segment2 = Request::segment(2);
$segment1 = Request::segment(1);
?>

<!--Sidebar Start Here-->
<aside class="main-sidebar">
  <section class="sidebar">
      <ul class="sidebar-menu">
        <li class=" treeview"> <a href="<?php echo url('admin/dashboard') ?>" class="waves-effect wave-light <?php if ($data["page"] == 'Dashboard') {
	echo 'active';
}
?>"> <i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span> <i class="material-icons right menu_dir">keyboard_arrow_right</i></a>
        </li>
     <!--Start for Super Admin Links-->
	  <?php if (Session::get('user_type') == '1') {
	// link visible For Supper Admin ?>

	<!-- Manage User-->
   <!--<li class="treeview <?php if ($segment1 == "manage_user") {echo "active";}?>"> <a href="javascript:void(0)" class="<?php if ($segment1 == "manage_user") {echo "active";}?>"> <i class="fa fa-users"></i> <span>Manage User</span>
        <i class="material-icons right menu_dir">keyboard_arrow_down</i>
        </a>
		 <ul class="treeview-menu" style="display:<?php //if ($data["page"] == 'user') {echo 'block;';} else {echo 'none;';}?>">
		   <li><a href="<?php //echo url('manage_user/add_user') ?>" <?php// if ($segment2 == 'add_user') {echo 'class="activeSubLink"';}?>>
		   <i class="fa fa-circle-o"></i> Add User</a></li>
		   <li><a href="<?php //echo url('manage_user'); ?>" <?php //if ($segment2 == '') {echo 'class="activeSubLink"';}?>>
		   <i class="fa fa-circle-o"></i> View User</a></li>
		 </ul>
       </li>-->

       <?php }?>
<!-- Manage User-->

<!-- Manage Home Banner-->

<li class="treeview <?php if ($segment1 == 'manage_banner' || $segment1 == 'manage_news' || $segment1 == 'manage_know' || $segment1 == 'manage_flag' || $segment1 == 'menubox' || $segment1 == 'manage_instagram') {echo 'active';}?> "> <a href="javascript:void(0)" class="<?php if ($segment1 == 'manage_banner' || $segment1 == 'manage_news' || $segment1 == 'manage_know' || $segment1 == 'manage_flag' || $segment1 == 'menubox' || $segment1 == 'manage_instagram') {echo "active";}?>"> <i class="fa fa-picture-o"></i> <span>Manage Homepage</span>
    <i class="material-icons right menu_dir">keyboard_arrow_down</i>
    </a>
     <ul class="treeview-menu">

      <li><a href="<?php echo url('manage_banner') ?>" <?php if ($data["page"] == "view banner") {echo 'class="activeSubLink"';}?> >
      <i class="fa fa-circle-o"></i> Video Banner</a></li>

      <li><a href="<?php echo url('manage_flag') ?>" <?php if ($data["page"] == "flag") {echo 'class="activeSubLink"';}?> >
      <i class="fa fa-circle-o"></i> Flags</a></li>

       <li><a href="<?php echo url('manage_news') ?>" <?php if ($data["page"] == "view news") {echo 'class="activeSubLink"';}?> >           <i class="fa fa-circle-o"></i> Latest News</a></li>

       <li><a href="<?php echo url('menubox/view'); ?>" <?php if ($segment2 == 'menubox') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> Menu Box</a></li>

       <li><a href="<?php echo url('manage_know') ?>" <?php if ($data["page"] == "view") {echo 'class="activeSubLink"';}?> >
      <i class="fa fa-circle-o"></i> Did You Know</a></li>



     </ul>
</li>

<!-- Manage Home Banner-->


 <!-- Manage Member-->



   <li class="treeview <?php if ($segment1 == "manage_member" || $segment1 == "manage_group") {echo "active";}?>">
		<a href="javascript:void(0)" class="<?php if ($segment1 == "manage_member" || $segment2 == "customers_view" || $segment1 == "manage_group") {echo "active";}?>"> <i class="fa fa-users"></i> <span>Manage Members/Groups</span>
				<i class="material-icons right menu_dir">keyboard_arrow_down</i>
        </a>
		 <ul class="treeview-menu" style="display:<?php if ($segment1 == 'manage_member' || $segment2 == "customers_view" || $segment1 == "manage_group") {echo 'block;';} else {echo 'none;';}
?>">

        <li><a href="<?php echo url('manage_group'); ?>" <?php if ($data["page"] == 'view group') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> View/Edit Group</a></li>

			   <li><a href="<?php echo url('manage_member/add') ?>" <?php if ($data["page"] == 'addcustomer') {echo 'class="activeSubLink"';}?>>
			   <i class="fa fa-circle-o"></i> Add Member</a></li>

			   <li><a href="<?php echo url('manage_member'); ?>" <?php if ($data["page"] == 'viewcustomer') {echo 'class="activeSubLink"';}?>>
			   <i class="fa fa-circle-o"></i> View Member</a></li>


		 </ul>
    </li>
<!-- Manage Member-->


 <!-- Manage Product-->

 <li class="treeview <?php if ($segment1 == "manage_product" || $segment1 == "menu_banner") {echo "active";}?>">
    <a href="javascript:void(0)" class="<?php if ($segment1 == "manage_product" || $segment1 == "menu_banner") {echo "active";}?>"> <i class="fa fa-delicious"></i> <span>Manage Menu/Products</span>
        <i class="material-icons right menu_dir">keyboard_arrow_down</i>
        </a>
     <ul class="treeview-menu" style="display:<?php if ($segment1 == 'manage_product' || $segment1 == "menu_banner") {echo 'block;';} else {echo 'none;';}
?>">

        <!-- <li><a href="<?php echo url('menu_banner') ?>" <?php if ($data["page"] == 'menu banner') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> View/Edit Menu Banner</a></li> -->

         <li><a href="<?php echo url('manage_product/add_menu') ?>" <?php if ($data["page"] == 'add menu') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> Add Menu Category</a></li>

         <li><a href="<?php echo url('manage_product/view_menu'); ?>" <?php if ($data["page"] == 'view menu') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> View Menu Category</a></li>

        <li><a href="<?php echo url('manage_product/view_filtermenu/1'); ?>" <?php if ($data["page"] == 'filter menu') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> Filter/Submenu Category</a></li>

       <li><a href="<?php echo url('manage_product/add_product'); ?>" <?php if ($data["page"] == 'add product') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> Add Product</a></li>

       <li><a href="<?php echo url('manage_product/view_product/1'); ?>" <?php if ($data["page"] == 'view product') {echo 'class="activeSubLink"';}?>>
         <i class="fa fa-circle-o"></i> View Product</a></li>

     </ul>
    </li>

<!-- Manage Product-->


<!-- Store List Start-->

<li class="treeview <?php if ($segment1 == 'store_list') {echo 'active';}?> "> <a href="javascript:void(0)" class="<?php if ($segment1 == "store_list") {echo "active";}?>"> <i class="fa fa-shopping-cart"></i> <span>Manage Stores</span>
    <i class="material-icons right menu_dir">keyboard_arrow_down</i>
    </a>
     <ul class="treeview-menu">
         <li><a href="<?php echo url('store_list/add_store') ?>" <?php if ($data["page"] == "add_store") {echo 'class="activeSubLink"';}?> >
      <i class="fa fa-circle-o"></i>Add Store</a></li>
      <li><a href="<?php echo url('store_list') ?>" <?php if ($data["page"] == "edit_store" || $data["page"] == "view_store") {echo 'class="activeSubLink"';}?> >
      <i class="fa fa-circle-o"></i> View/Edit Store</a></li>

     </ul>
</li>
<!-- Store List End-->


<!-- Manage Email Tempalte -->


<li class="treeview <?php if ($segment1 == 'manage_emailtemplate' || $segment2 == 'add_email_template') {echo 'active';}?> "> <a href="javascript:void(0)" class="<?php if ($segment1 == "manage_emailtemplate") {echo "active";}?>"> <i class="fa fa-envelope"></i> <span>Manage Email Templates</span>
    <i class="material-icons right menu_dir">keyboard_arrow_down</i>
    </a>
     <ul class="treeview-menu">
      <li><a href="<?php echo url('manage_emailtemplate') ?>" <?php if ($data["page"] == "addtemplate" || $data["page"] == "viewtemplate") {echo 'class="activeSubLink"';}?> >
      <i class="fa fa-circle-o"></i> Add/Edit Template</a></li>
       <li><a href="<?php echo url('manage_emailtemplate/send_email') ?>" <?php if ($data["page"] == "sendemail") {echo 'class="activeSubLink"';}?> >           <i class="fa fa-circle-o"></i> Send Email</a></li>

     </ul>
</li>


<!-- Manage Email Tempalte -->


<!---Manage Offers---->

<li class="treeview <?php if ($segment1 == 'manage_offers') {echo 'active';}?> "> <a href="javascript:void(0)" class="<?php if ($segment1 == "manage_offers") {echo "active";}?>"> <i class="fa fa-shopping-cart"></i> <span>Manage Offers</span>
    <i class="material-icons right menu_dir">keyboard_arrow_down</i>
    </a>
     <ul class="treeview-menu">
         <li>
				<a href="<?php echo url('manage_offers/add_offers') ?>" <?php if ($data["page"] == "add_offers") {echo 'class="activeSubLink"';}?> >
				<i class="fa fa-circle-o"></i>Add Offers</a>
			</li>

			 <li>
				<a href="<?php echo url('manage_offers/view_offers') ?>" <?php if ($data["page"] == "view_offers") {echo 'class="activeSubLink"';}?> >
				<i class="fa fa-circle-o"></i>View Offers</a>
			</li>

     </ul>
</li>

<!----End of Manage offers--->



    <!-- Manage Page Content-->

       <li class="treeview <?php if ($segment1 == 'manage_page') {echo 'active';}?> "> <a href="javascript:void(0)" class="<?php if ($segment1 == "manage_page") {echo "active";}?>"> <i class="fa fa-file-text"></i> <span>Manage Page Content</span>
        <i class="material-icons right menu_dir">keyboard_arrow_right</i>
        </a>
		 <ul class="treeview-menu">
		  <li><a href="<?php echo url('manage_page') ?>" <?php if ($segment2 == 'add' || $data["page"] == "view_page_content" || $data["page"] == "add_page_content") {
	echo 'class="activeSubLink"';

}
?>>		   <i class="fa fa-circle-o"></i> Add/Edit Page Content</a></li>

		 </ul>
       </li>

 <!-- Manage Page Content-->


 <!-- Manage Report-->

       <li class=" treeview"> <a href="<?php echo url('report') ?>" class="waves-effect wave-light <?php if ($data["page"] == 'report') {echo 'active';}?>"> <i class="fa fa-bar-chart" style="font-size:17px;"></i> <span> Report</span> <i class="material-icons right menu_dir">keyboard_arrow_right</i></a>
        </li>
 <!-- Manage Report-->




       <!-- Manage Password-->

       <li class=" treeview"> <a href="<?php echo url('admin/changepwd') ?>" class="waves-effect wave-light <?php if ($data["page"] == 'changepwd') {echo 'active';}?>"> <i class="left fa fa-key" style="font-size:17px;"></i> <span>Change Password</span> <i class="material-icons right menu_dir">keyboard_arrow_right</i></a>
        </li>
         <!-- Manage Password-->

      </ul>
  </section>
</aside>
<!--Sidebar Ends Here-->
<div id="loaderID" class="loader" style="display: none;"><img src="<?php echo url('images/ajax-loader.gif'); ?>"></div>
