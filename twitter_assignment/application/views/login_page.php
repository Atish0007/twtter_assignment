<?php $this->load->view('public/header'); ?>   
<link rel="stylesheet" href="<?php echo base_url()?>assets/my_style/login_style.css">

<br>
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1 style="color: #52a6ff;font-weight: 700;">LOGIN</h1>
                            <br>
                            <?php if ($this->session->flashdata('feedback')) { ?>
                                <div class="alert <?php echo $this->session->flashdata('feedback_class');?> hd_clss">      
                                    <?php echo $this->session->flashdata('feedback'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <form action="<?php echo base_url()?>index.php?/login/signin" method="post" name="login">
                        <div class="form-group font_styl">
                            <label for="UserEmail">Email address</label>
                            <input type="email" name="email"  class="form-control" id="useremail" placeholder="Enter email">
                        </div>
                        <div class="form-group font_styl">
                            <label for="UserPassword">Password</label>
                            <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group font_styl">
                            <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                        </div>
                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm font_styl">Login</button>
                        </div>
                        <div class="col-md-12 ">
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or font_styl">or</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="text-center font_styl">Don't have account? <a href="#" id="signup" class="font_styl">Sign up here</a></p>
                        </div>
                    </form>

                </div>
            </div>


            <div id="second">
                <div class="myform form font_styl">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1 style="color: #52a6ff;font-weight: 700;">SIGNUP</h1>
                        </div>
                    </div>
                    <form action="<?php echo base_url() ?>index.php?/login/signup" name="registration" method="post">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text"  name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Age</label>
                            <input type="number"  name="age" class="form-control" id="age" placeholder="Enter Age" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email"  class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm sign_validate">SignUp</button>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group font_styl">
                                <p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  



<script>
    $(document).ready(function () {


        $("#signup").click(function () {
            $("#first").fadeOut("fast", function () {
                $("#second").fadeIn("fast");
            });
        });

        $("#signin").click(function () {
            $("#second").fadeOut("fast", function () {
                $("#first").fadeIn("fast");
            });
        });

        $(function () {
            $("form[name='login']").validate({
                rules: {

                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    email: "Please enter a valid email address",

                    password: {
                        required: "Please enter password",
                    }

                },
                submitHandler: function (form) {

                    form.submit();
                }
            });
        });

        $(function () {

            $("form[name='registration']").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    age:"required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },

                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    age: "Please enter your age",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: "Please enter a valid email address"
                },

                submitHandler: function (form) {

                    var email = $("#email").val();

                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php?/login/email_already_exists",
                        type: "POST",
                        data: {'email': email},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.status == 1) {
                                alert(data.res);
                                return false;
                            } else {
                                form.submit();
                                return true;
                            }
                        }
                    });

                }
            });
        });



    });


</script>    


<?php $this->load->view('public/footer'); ?>   
