<?php
/**
 * The template for displaying all pages
 * Template Name: My Account
 */

get_header();
global $current_user; 
 
get_currentuserinfo();
?>
<section class="main-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="comon-title text-center">
                        <h3>My Account </h3>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="left-sidebar">
                        <div class="sidebar-menu">
                            <ul class="nav nav-tabs mb-3" id="Myaccount-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="my-profile-tab" data-toggle="tab" data-target="#my-profile" type="button" role="tab" aria-controls="my-profile" aria-selected="true"> My profile </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="zoom-link-tab" data-toggle="tab" data-target="#zoomlink" type="button" role="tab" aria-controls="zoomlink" aria-selected="true">  Go Live </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="<?php echo wp_logout_url( site_url() ); ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="myaccount-right-wrap">
                        <div class="tab-content" id="Myaccount-tabContent">
                          <div class="tab-pane active" id="my-profile" role="tabpanel" aria-labelledby="my-profile-tab">
                            <div class="myaccount-form-wrap">
                                
                                    <div class="form-wrap">
                                        <div class="row">
                                            


                                             <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <input class="form-control" readonly style="border: 0; outline: none;background: none;" type="text" name="first_name" value="<?php echo get_user_meta( $current_user->ID, 'first_name' , true ); ?>" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <input class="form-control" readonly style="border: 0; outline: none;background: none;" type="text" name="last_name" value="<?php echo get_user_meta( $current_user->ID, 'last_name' , true ); ?>" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <input class="form-control" readonly style="border: 0; outline: none;background: none;" type="text" name="phone" value="<?php echo get_user_meta( $current_user->ID, 'phone' , true ); ?>" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <input class="form-control" readonly style="border: 0; outline: none;background: none;" type="email" name="email" value="<?php echo $current_user->user_email; ?>" placeholder="Email Address">
                                    </div>
                                </div>
                                
                                
                                <div class="col-12 text-center">
                                     <input type="hidden" name="action" value="send_form" style="display: none; visibility: hidden; opacity: 0;">
                                    <button type="button" class="btn btn-info" href="javascript:void(0)" data-toggle="modal" data-target="#myModal" value="Edit Profile">Edit Profile</button>
                                </div>
                                   
                                </div>
                            </div>
                         
                            </div>
                          </div>

                          <div class="tab-pane fade" id="zoomlink" role="tabpanel" aria-labelledby="zoom-link-tab">
                            <h4>Please click the <a href="<?php echo get_theme_value("zoomlink"); ?>" class="btn btn-info" target="_blank">Zoom Link</a></h4>
                          </div>
                          
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Edit Profile</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body myaccount-form-wrap" >
           <form action="" method="post" name="contact-me" enctype="multipart/form-data">
            <div class="form-wrap">
                <div class="row">
                    

                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input class="form-control" type="text" name="first_name" value="<?php echo get_user_meta( $current_user->ID, 'first_name' , true ); ?>" placeholder="First Name">
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input class="form-control" type="text" name="last_name" value="<?php echo get_user_meta( $current_user->ID, 'last_name' , true ); ?>" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" value="<?php echo get_user_meta( $current_user->ID, 'phone' , true ); ?>" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                         <input class="form-control" type="email" name="email" value="<?php echo $current_user->user_email; ?>" placeholder="Email Address">
                    </div>
                </div>
                
                
                <div class="col-12 text-center">
                     <input type="hidden" name="action" value="send_form" style="display: none; visibility: hidden; opacity: 0;">
                    <input class="btn btn-danger" type="submit" name="submit" value="Update">
                </div>
                     
                        </div>
                    </div>
                </form>
        </div>

      </div>
      
    </div>
  </div>


<?php
//get_sidebar();
get_footer();