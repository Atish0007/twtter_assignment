<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Twitter Assignment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/my_style/home_style.css">
        <style>
            
        </style>
    </head>
    <body>


        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url() ?>assets/image/twitter.png" class="twit_img" width="10%" height="auto">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="edit_profile('<?php echo $profile_details->firstname?>','<?php echo $profile_details->lastname?>','<?php echo $profile_details->age?>','<?php echo $profile_details->description?>')" data-toggle="modal" data-target="#profile_popup">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>index.php?/login/logout"> <i class="fa fa-power-off" style="color:#cc5a5a;font-size: 15px;"></i> Logout</a>
                    </li>    
                </ul>
            </div>  
        </nav>

        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-12">
                    <?php if ($this->session->flashdata('feedback')): ?>
                      <div class="alert <?php echo $this->session->flashdata('feedback_class'); ?> alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('feedback'); ?>
                      </div>
                    <?php endif; ?> 
                    
                    
                </div>
                <div class="col-sm-4">

                    <div class="twot_cls1">
                        <a class="twPc-bg twPc-block"></a> 

                        <div>
                            <div class="follw_btn">
                                <!--iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="twitter-follow-button twitter-follow-button-rendered" style="position: static; visibility: visible; width: 79px; height: 28px;" title="Twitter Follow Button" src="https://platform.twitter.com/widgets/follow_button.7aeb03ce9f308997020e5998720fbbf7.en.html#dnt=true&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=mertskaplan&amp;show_count=false&amp;show_screen_name=false&amp;size=l&amp;time=1583304638152" data-screen-name="mertskaplan"></iframe-->
                                <button class="btn btn-primary" style="padding: 1px 5px !important;"><i class="fa fa-twitter" aria-hidden="true"></i> Follow</button>
                            </div>
                            <a title="Atish Sanas" href="#" class="twPc_Link">
                                <?php if($profile_details->profile_image!=""): ?>
                                    <img alt="USERImage" src="<?php echo base_url().$profile_details->profile_image; ?>" class="twPc_Img">
                                <?php else:?>
                                    <img alt="USERImage" src="<?php echo base_url()?>/assets/image/profile.png" class="twPc_Img">
                                <?php endif;?>
                                
                            </a>
                            <div class="twPc_Username">
                                <div class="twPc_divName">
                                    <a href="#"><?php echo $profile_details->firstname.' '.$profile_details->lastname; ?></a>
                                </div>
                                <span>
                                    <a href="#">@<span class="username_fnt"><?php echo $profile_details->firstname.$profile_details->lastname; ?></span></a>
                                </span>
                            </div>
                            <div class="profile_desc">
                                <i class="profile_info"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?php echo $profile_details->age . ' Years'; ?></i>
                                <?php if ($profile_details->description != ""): ?>
                                    <p>  <i class="profile_info"><i class="fa fa-list"></i> <?php echo $profile_details->description; ?></i></p>
                                <?php endif; ?>
                            </div>    
                            <div class="twts_div">
                                <ul class="twts_ul">
                                    <li class="twts_li">
                                        <a href="#" style="color: #428bca;text-decoration: none;">
                                            <span class="twPc-StatLabel twPc-block">TWEETS</span>
                                            <span class="twt_cont"><?php echo $tweet_count; ?></span>
                                        </a>
                                    </li>
                                    <li class="twts_li">
                                        <a href="#" style="color: #428bca;text-decoration: none;">
                                            <span class="twPc-StatLabel twPc-block">FOLLOWING</span>
                                            <span class="twt_cont">1</span>
                                        </a>
                                    </li>
                                    <li class="twts_li">
                                        <a href="#" style="color: #428bca;text-decoration: none;">
                                            <span class="twPc-StatLabel twPc-block">FOLLOWERS</span>
                                            <span class="twt_cont">1</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
                 <div class="clearfix"></div>
                <div class="col-sm-8">
                    <div class="twot_cls2">
                        <form action="<?php echo base_url() ?>index.php?/home/tweet" method="post" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <div class="col-sm-2">
                                    <?php if($profile_details->profile_image!=""): ?>
                                    <img alt="USERImage" src="<?php echo base_url().$profile_details->profile_image; ?>" class="twtpost_img">
                                <?php else:?>
                                    <img alt="USERImage" src="<?php echo base_url()?>/assets/image/profile.png" class="twtpost_img">
                                <?php endif;?>
                                </div>
                                <div class="col-sm-10 txtbx_div">
                                    <textarea class="form-control" name="tweet_text" rows="5" cols="77" id="tweet_txt" placeholder="What's happening?" required=""></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-6 image-upload">
                                    <label for="file-input">
                                        <img src="<?php echo base_url(); ?>assets/image/file_upload.png"/>
                                    </label>
                                    <input id="file-input" type="file" name="userfile"/>
                                    <span id="checked" style="color: #4fcc37;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                </div>

                                <div class="col-sm-6 pull-right" style="margin-top: -25px;margin-right: 20px;">
                                    <input class="btn btn-primary tweet_btn" type="submit" value="Tweet">
                                </div>
                            </div>
                        </form>

                        <br>

                        <div class="tweet_desc">
                            <?php if ($img_details != ""): ?>
                                <?php foreach ($img_details as $item): ?> 
                                    <div class="col-sm-12">

                                        <div class="dropdown pull-right" style="margin-top: 20px;">
                                            <button type="button" class="btn btn-primary dropdown-toggle desc_edit_btn" data-toggle="dropdown" >
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" onclick="edit_id('<?php echo $item->id ?>', '<?php echo $item->tweet_desc ?>')" href="#" data-toggle="modal" data-target="#modal_sidebar">Edit</a>
                                                <a class="dropdown-item" href="<?php echo base_url() ?>index.php?/home/delete_tweet?id=<?php echo $item->id ?>">Delete</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <img alt="USERImage" src="https://mertskaplan.com/wp-content/plugins/msk-twprofilecard/img/mertskaplan.jpg" class="twtpost_img" style="margin-left: 15px !important;">
                                        </div>
                                        <div class="col-sm-10">
                                            <p style="padding-top: 30px;margin-left: 85px;">
                                                <a href="#" style="color:unset;text-decoration: none; cursor:pointer;"> <b><?php echo $this->session->userdata('name'); ?></b></a> <a href="#" style="color:unset;"><?php echo '@' . $this->session->userdata('username'); ?></a> <img src="<?php echo base_url() ?>assets/image/correct.png" width="5%" height="auto"/>
                                            </p>

                                            <p style="margin-left: 85px;" id="twt_desc"><?php echo $item->tweet_desc; ?></p>
                                            <?php if ($item->image != ""): ?>
                                                <img src="<?php echo base_url() . $item->image; ?>" width="200" height="200" style="margin-left: 85px;"> 
                                            <?php else: ?>

                                            <?php endif; ?>
                                        <div class="clearfix"></div>
                                        <div class="pull-right" style="margin-top: -20px;margin-right: -130px;">
                                            <?php echo $item->date;?>
                                        </div>    
                                        </div>

                                        <div class="clearfix"></div>
                                        <hr>    
                                    </div> 
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div> 

                    </div>
                </div>
                 <div class="clearfix"></div>
                <br>
            </div>
        </div>


        <!-- Update Modal PopUp -->        
        <div class="modal fade-scale" id="modal_sidebar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title modl_header"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Tweet</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-12">
                            <form action="<?php echo base_url() ?>index.php?/home/update_tweet" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12">
<!--                                    <div class="">
                                        <img alt="USERImage" src="https://mertskaplan.com/wp-content/plugins/msk-twprofilecard/img/mertskaplan.jpg" class="twtpost_img">
                                    </div>-->
                                    <div class="txtbx_div">
                                        <textarea class="form-control" name="tweet_text" rows="5" cols="77" id="edit_txt" placeholder="What's happening?" required=""></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-6 update_image_upload">
                                        <label for="file-input">
                                            <img src="<?php echo base_url(); ?>assets/image/file_upload.png"/>
                                        </label>
                                        <input id="file-input" type="file" name="userfile"/>
                                        <span id="update_checked" style="color: #4fcc37;"><i class="fa fa-check-circle" ></i></span>
                                    </div>

                                    <input type="hidden" name="tweet_id" id="tweet_id" value=""/>
                                    <div class="col-sm-6 pull-right" style="margin-top: 5px;margin-right: -30px;">
                                        <input class="btn btn-primary tweet_btn" type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- /.Update Modal End -->



        <!-- Profile Modal PopUp -->        
        <div class="modal fade-scale" id="profile_popup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

                        <div class="col-sm-12">
                            <form action="<?php echo base_url() ?>index.php?/home/profile" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text"  name="firstname" id="fname" class="form-control" placeholder="Enter Firstname">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text"  name="lastname" id="lname" class="form-control" placeholder="Enter Lastname">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Age</label>
                                    <input type="number"  name="age" id="age" class="form-control" placeholder="Enter Age" >
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Description</label>
                                    <textarea class="form-control" name="description" id="desc" rows="3" cols="77" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 profile_image text-center">
                                        <label for="file-input">
                                            <img src="<?php echo base_url(); ?>assets/image/file_upload.png"/>
                                        </label>
                                        <input id="file-input" type="file" name="userfile"/>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center mb-3">
                                    <button type="submit" class=" btn btn-block mybtn btn-primary" style="border-radius: 20px;">Edit Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




        <!-- End Here -->        
        <script>
            $(document).ready(function () {
                $("#checked").hide();
                $("#update_checked").hide();
                $('input[type="file"]').change(function (e) {
                    var fileName = e.target.files[0].name;
                    alert('The file "' + fileName + '" has been selected.');
                    $("#checked").show();
                    $("#update_checked").show();
                });

            });

            function edit_profile(fname,lname,age,desc){
                if(fname){
                    $("#fname").val(fname);
                }
                if(lname){
                    $("#lname").val(lname);
                }
                if(age){
                    $("#age").val(age);
                }
                if(desc){
                    $("#desc").val(desc);
                }
            }
            
            //Update tweet
            function edit_id(id, desc) {
                $("#tweet_id").val(id);
                $("#edit_txt").val(desc);
            }

        </script>    




    </body>
</html>
