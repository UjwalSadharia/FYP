<?php
  session_start();
  include 'db.php';
  $moreData = 0;
  $sql="SELECT * FROM policy LIMIT {$moreData},6";
  $query=mysqli_query($conn,$sql) or die("Sorry unable to execute query because of---->".mysqli_error($conn));


  

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LifeTree.com</title>

  <!-- Favicon  -->
  <link rel="icon" href="myimage/favicon.png">

  <!-- Bootstrap 5 css  -->
  <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">

  <!-- owl carousel css link  -->
  <link rel="stylesheet" href="OwlCarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="OwlCarousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css">


  <!-- Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100&display=swap"
    rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">

  <!-- Font awesome cdn  -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

  <script src="https://kit.fontawesome.com/8ce7d4aa1f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Animation cdn  -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- custom code links -->
  <link rel="stylesheet" href="custom code/style.css">
  <link rel="stylesheet" href="custom code/responsive.css">
</head>

<body onload="preloader()" data-bs-spy="scroll" data-bs-target='.navbar' data-bs-offset="85">
  <!-- Perloader  -->
  <div id="preloader"></div>


  <!-- chat bot start  -->
  <div class="chatbot" data-backdrop="false">
    <img src="myimage/chat.png" class="chat_img" alt="Bot">
  </div>

  <!-- chatbot modal  -->
  <div class="modal fade" id="bot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content bot_content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Talk With Expert</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal_content">
          <div class="row">
            <ul class="message_list">

            </ul>


            <ul class="message_bot_list">

            </ul>
          </div>

        </div>
        <div class="modal-footer">
          <div class="input-group">
            <input type="text" class="form-control" id="question" placeholder="Ask Question's..?">
            <button class="btn btn-outline-primary" type="button" id="send"><img src="myimage/send.png" alt=""></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- chat bot end -->

  <!-- Navbar & Banner -->
  <div class="sec-bg">
    <header class="header_wrapper" id="home">
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand m-0" href="#">
            <img src="myimage/logo.gif" class="img-fluid" alt="Logo">
            <!-- <source src="myimage/1.mp4" type="video/mp4"> -->
          </a>
          <button class="navbar-toggler pe-0 dem" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fas fa-stream navbar-toggler-icon "></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav menu-navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#features">Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#calculate">Calculate</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#reviews">Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#clients">Clients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#faq">FAQs</a>
              </li>

            </ul>
            <ul class="navbar-nav">












              <?php
                if(isset($_SESSION['user_loggedin'])){

              ?>
              <div class="user_box">
                <div class="user_profilepic" style="text-align:center;">
                  <!-- <img src="myimage/c2.jpg" class="img-fluid rounded-circle" style="width:68%; height:55px" alt="image"> -->
                  <p class="user_dbname my-0 mx-3 fs-5"><i class="bi bi-person-circle"
                      style="position:relative; bottom:1px"></i>&nbsp;<span style="font-weight:bold;">
                      <?php echo $_SESSION['user_loggedin'] ?>
                    </span></p>
                </div>
                <div class="user_drp">
                  <ul class="p-0">
                    <li>
                      <div><a href="user_profile/profile.php"><i class="bi bi-person"></i> Profile</a></div>
                    </li>
                    
                    <li>
                      <div><a href="" id='add_nominee'><i class="bi bi-house"></i> Add Nominee</a></div>
                    </li>
                    <li>
                      <div><a href="user_logout.php"><i class="bi bi-box-arrow-in-left"></i> Logout</a></div>
                    </li>
                  </ul>
                </div>
              </div>
              














               <!-- USER NOMINEE NOTIFY MODAL  START-->

               <!-- <div class="modal fade" id="nomineeNotify"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered notifyModalDialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-question-circle"></i></h5>
                    </div>
                    <div class="modal-body text-center">
                      <h4 >Hello, <?php echo $_SESSION['user_loggedin'] ?></h4>
                      <small >It seems you don't have nominnee, Please add nominee</small>
                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-outline-success" id='notiAddNominee'>Add Nominee</button>
                    </div>
                  </div>
                </div>
              </div> -->

              <!-- USER NOMINEE NOTIFY MODAL  END -->




              



              













              <?php
                     }else{
                  ?>
              <div class="nav-rightportion">
                <li class="nav-item text-center ">
                <li class="nav-item dropdown mx-auto">
                  <a class="nav-links dropdown-toggle login_slide "  id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="" aria-expanded="false">
                    LogIn
                  </a>
                  <ul class="dropdown-menu login_drp" aria-labelledby="navbarDropdownMenuLink">
                    <li><button type="button" id='user_login' class="dropdown-item" href="#"><i
                          class="bi bi-person-fill fs-5"></i> User Login</button></li>

                    <li><button type="button" id="agent_login" class="dropdown-item" href="#"><i class="bi bi-people-fill fs-5"></i>
                        Agent Login</button></li>

                  </ul>
                </li>
                </li>

              </div>


              <!-- USER LOGIN MODAL  -->
              <div class="modal fade " id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content user_lg_modal">
                    <div class="modal-header">
                      <h3 class="modal-title text-center" id="exampleModalLabel" style='width:100%;'>User Login</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      <div class="row user_content">
                        <div class="col-12 col-md-6  align-items-center">
                          <div class="login-form">
                            <div class="user_err"></div>
                            <div class="mb-3">
                              <label for="user_username" class="form-label">Username</label>
                              <input type="text" class="form-control" id="user_username">
                            </div>
                            <div class="mb-3">
                              <label for="user_pass" class="form-label">Password</label>
                              <input type="password" class="form-control" id="user_pass">
                            </div>
                            <div class="mb-3">
                              <button type="submit" id="user_submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="mb-3 text-center user_forget_password">
                              <a href="forget_pass.php">Forget Password?</a>
                            </div>

                          </div>


                        </div>

                        <div class="col-12 col-md-6">

                          <div class="login_image">
                            <img src="myimage/logbg.png" class="img-fluid" alt="">
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- USER LOGIN MODAL END  -->

             





                <!-- AGENT LOGIN MODAL START -->
                <div class="modal fade" id="agentLoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title text-center" style='width:100%;' id="exampleModalLabel">Agent Login</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      <div class="row user_content">
                        <div class="col-12 col-md-6  align-items-center">
                          <div class="login-form">
                            <div class="agent_err"></div>
                            <div class="mb-3">
                              <label for="agent_username" class="form-label">Username</label>
                              <input type="text" class="form-control" id="agent_username">
                            </div>
                            <div class="mb-3">
                              <label for="agent_pass" class="form-label">Password</label>
                              <input type="password" class="form-control" id="agent_pass">
                            </div>
                            <div class="mb-3">
                              <button type="submit" id="agent_submit" class="btn btn-primary">Login</button>
                            </div>
                            <!-- <div class="mb-3 text-center user_forget_password">
                              <a href="forget_pass.php">Forget Password?</a>
                            </div> -->

                          </div>


                        </div>

                        <div class="col-12 col-md-6">

                          <div class="login_image">
                            <img src="myimage/agent.jpg" class="img-fluid" alt="">
                          </div>

                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
                <!-- AGENT LOGIN MODAL END -->





              <li class="nav-item sign_up text-center">
                <a class="nav-links learn-more-btn btn-extra-header" id="sign_up" href="#">Sign Up</a>

                <!-- SIGN-UP MODAL  -->
                <div class="modal fade" id="signup_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <div class="add_data">
                          <h2 class="display-4 text-dark pb-5">User Sign-Up</h2>
                          <div class="separator">

                          </div>
                          <form id="su_submit_form" class="text-start">
                            <div class="mb-3">
                              <label for="su_name" class="form-label">Name</label>
                              <input type="text" pattern="^[A-Za-z -]+$" title="Only Alphabets allowed" name="su_name" class="form-control" id="su_name"
                                aria-describedby="emailHelp" autocomplete="of" required>
                                <small id="namecheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_email" class="form-label">Email</label>
                              <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="su_email" class="form-control" id="su_email"
                                aria-describedby="emailHelp" autocomplete="off" required>
                                <small>Format: anyone@gmail.com</small>
                            </div>

                            <div class="mb-3">
                              <label for="su_username" class="form-label">Username</label>
                              <input type="text" pattern="[a-zA-Z0-9-]+" title="Only Alphabets & Numbers allowed" name="su_username" autocomplete="of" class="form-control" id="su_username"
                                aria-describedby="" required>
                                <small id="usercheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_password" class="form-label">Password</label>
                              <input type="text" pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{0,15}$' title='Include Upper case,lower case,number & special character.' name="su_password" autocomplete="of" class="form-control" id="su_password"
                                aria-describedby="" required>
                                <small id="passcheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_phone" class="form-label">Contact No</label>
                              <input type="tel" pattern='[0-9]+' title='Only Phone Number Allowed' placeholder="" name="su_phone" autocomplete="of" class="form-control" id="su_phone"
                                aria-describedby="" required>
                                <small id="contactcheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_profilepic" class="form-label">User Image</label>
                              <input class="form-control" name="su_profilepic" autocomplete="of" type="file" id="su_profilepic" required>
                              <small id="imagecheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_address" class="form-label">Address</label>
                              <div class="form-floating">
                                <textarea class="form-control" name="su_address" autocomplete="of" placeholder="Leave a address here"
                                  id="su_address" required></textarea>
                                  <small id="addcheck"></small>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="su_city" class="form-label">City</label>
                              <input type="text" name="su_city" class="form-control" autocomplete="of" id="su_city" aria-describedby=""
                                required>
                                <small id="citycheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_state" class="form-label">State</label>
                              <input type="text" name="su_state" class="form-control" autocomplete="of" id="su_state" aria-describedby=""
                                required>
                                <small id="statecheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_zipcode" class="form-label">Zipcode</label>
                              <input type="text" pattern='^[1-9][0-9]{5}$'  title='Zipcode is of 6 number letters' name="su_zipcode" autocomplete="of" class="form-control" id="su_zipcode"
                                aria-describedby="" required>
                                <small id="zipcheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_marital_status" class="form-label">Marital Status</label>
                              <select class="form-select" id="su_marital_status" name="su_marital_status"
                                aria-label="Default select example" required>
                                <option value="" >Select..</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Widower">Widower</option>
                                <option value="Widow">Widow</option>
                              </select>
                              <small id="maritalcheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_dob" class="form-label">Date Of Birth</label>
                              <input type="date" name="su_dob" class="form-control" autocomplete="of" id="su_dob" aria-describedby=""
                                required>
                                <small id="dobcheck"></small>
                            </div>
                            <div class="mb-3">
                              <label for="su_gender" class="form-label">Gender</label>
                              <select class="form-select" id='su_gender' name='su_gender'
                                aria-label="Default select example" required>
                                <option value="" >Select..</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                              </select>
                              <small id="gendercheck"></small>
                            </div>


                            <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                            <input class="btn btn-primary" type="submit" value="Sign-Up" id="add_signup">
                          </form>
                        </div>
                      </div>

                      <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                    </div>
                  </div>
                </div>
              </li>

              <?php
                }
              ?>






            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Navbar close -->

    <!-- banner section  -->
    <section id="home" class="banner_wrapper mb-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 banner-img-section">
            <!-- <img src="images/hero_img.png" alt="banner image" class="img-fluid"> -->
            <img src="myimage/banner.jpg" alt="banner image" class="img-fluid">
          </div>
          <div class="col-md-6 my-5 my-md-0 text-center text-md-start">
            <!-- <p class="banner-subtitle">Life insurance</p>
            <h1 class="banner-title">Give Your <span>Family</span> Peace of mind</h1>
            <p class="banner-title-text">Hastag is a bright and result driven social media marketng drive customers,
              grow your audience and expan your reach</p> -->

            <!-- <p class="banner-subtitle">Life insurance</p> -->
            <h1 class="banner-title">Life insurance Give Your <span class="type"></span> Peace of mind</h1>
            <!-- <p class="banner-title-text">Hastag is a bright and result driven social media marketng drive customers,
              grow your audience and expan your reach</p> -->


            <div class="learn-more-btn-section">
              <button type="button" class="nav-link learn-more-btn btn-header" id="subscribe_btn">Get In Touch</button>
              <button type="button" class="nav-link learn-more-btn btn-header" id="be_agent">Be An Agent</button>


              <!-- Be An Agent Modal  -->
              <div class="modal fade" id="apply_agent" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <div class="add_data">
                        <h2 class="display-4 text-dark pb-5">Be An Agent</h2>
                        <div class="separator">

                        </div>
                        <form id='agentForm'>
                          <div class="mb-3">
                            <label for="a_username" class="form-label">Username</label>
                            <input type="text" pattern="[a-zA-Z0-9-]+" title="Only Alphabets & Numbers allowed" class="form-control" id="a_username" aria-describedby="emailHelp"
                              required>
                          </div>
                          <div class="mb-3">
                            <label for="a_password" class="form-label">Password</label>
                            <input type="password" pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{0,15}$' title='Include Upper case,lower case,number & special character.' class="form-control" id="a_password" aria-describedby="emailHelp"
                              required>
                          </div>

                          <div class="mb-3">
                            <label for="a_name" class="form-label">Name</label>
                            <input type="text" class="form-control" pattern="^[A-Za-z -]+$" title="Only Alphabets allowed" id="a_name" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_email" class="form-label">Email</label>
                            <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" class="form-control" id="a_email" aria-describedby="" required>
                            <small>Format: anyone@gmail.com</small>
                          </div>
                          <div class="mb-3">
                            <label for="a_dob" class="form-label">DOB</label>
                            <input type="date" placeholder="" class="form-control" id="a_dob" aria-describedby=""
                              required>
                          </div>

                          <div class="mb-3">
                            <label for="a_address" class="form-label">Address</label>
                            <div class="form-floating">
                              <textarea class="form-control" placeholder="Leave a address here" id="a_address"
                                required></textarea>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="a_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="a_city" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="a_state" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_zipcode" class="form-label">Zipcode</label>
                            <input type="number" class="form-control" pattern='^[1-9][0-9]{5}$'  title='Zipcode is of 6 numbers letters' id="a_zipcode" aria-describedby="" required>
                          </div>

                          <div class="mb-3">
                            <label for="a_branch" class="form-label">Branch</label>
                            <input type="text" class="form-control" id="a_branch" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_gender" class="form-label">Gender</label>
                            <select class="form-select" id='a_gender' aria-label="Default select example">
                              <option selected disabled>Select..</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="others">Others</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="a_phone" class="form-label">Contact No</label>
                            <!-- <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="a_phone" aria-describedby=""  required> -->
                            <input type="text" class="form-control" pattern='[0-9]+' aria-describedby="" title='Only Phone Number Allowed' id="a_phone" aria-describedby=""  required>
                          </div>


                          <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                          <input class="btn btn-primary" type="Submit" value="Sign-Up" id="beagent">
                        </form>
                      </div>
                    </div>

                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                  </div>
                </div>
              </div>

              <!-- MAIL MODAL  -->
              <!-- Button trigger modal -->

              <!-- Modal -->
              <div class="modal fade" id="subscribe_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">LifeTree.com</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="sub_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="sub_email" placeholder="name@gmail.com">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" id="subscribe_send" class="btn btn-primary">Subscribe</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>


  <!-- Client Section  -->
  <div class="clients">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2>Trusted by clients across the globe</h2>
        </div>
        <div class="col-12">
          <div class="owl-carousel client-slider-section">
            <div class="item">
              <img src="images/dummy_logo1.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo2.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo3.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo1.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo2.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo3.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo1.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo2.png" alt="clients">
            </div>
            <div class="item">
              <img src="images/dummy_logo3.png" alt="clients">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- About Section  -->
  <section class="about_wrapper" id="about">
    <div class="container my-5">
      <div class="row align-items-center">
        <div class="col-sm-12 col-lg-5 text-center text-lg-start">
          <p class="about_number">1</p>
          <h2 class="about_title">We're here to assist you with exploring protection.</h2>
          <p class="about_text">"Life insurance gives you peace of mind that your spouse and your children are
            financially stable after your passing. Life insurance also helps with funeral costs and your business, if
            you own one."</p>
          <div class="row">
            <div class="col-6 p-0 fw-bold">
              <i class="bi bi-shield-check about_left_image"></i> &nbsp;
              30+ secure services
            </div>
            <div class="col-6 p-0 fw-bold">
              <i class="bi bi-emoji-smile about_left_image"></i> &nbsp;Money back guarentee
            </div>
          </div>


          <div class="my-5">
            <a href="allPlans.php" class="learn-more-btn">Explore our plans</a>
          </div>
        </div>
        <div class="col-sm-12 col-lg-7 text-center text-md-start">
          <img src="myimage/6948.jpg" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="innovate">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-12 about_heading text-center">
            <h2>Why Choose Life tree</h2>
            <h5>Here are some of the numbers which speak about our accomplishments</h5>
          </div>

          <!-- <div class="col-sm-12 col-lg-6 text-center text-lg-start">
            <p class="about_number">2</p>
            <h2 class="about_title">The best digital marketing company we understand your needs</h2>
            <p class="about_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis unde autem nemo,
              provident reprehenderit eveniet hic laborum pariatur illum magni eaque ad earum fugit, atque molestiae
              consectetur corrupti ut a.</p>
            <div class="mt-5">
              <a href="#" class="learn-more-btn btn-header">Learn More</a>
            </div>
          </div> -->

        </div>
        <div class="row innovate_two">
          <div class="col-md-6 col-lg-3 text-center text-md-start">
            <h5>Claims Paid Percentage</h5>
            <p class="innovate_num">98.35%</p>
            <hr>
            <p>(Source : Life tree
              annual audited financials FY 20-21)</p>
          </div>
          <div class="col-md-6 col-lg-3 text-center text-md-start">
            <h5>Life tree
              Presence</h5>
            <p class="innovate_num">277 Offices</p>
            <hr>
            <p>(Source : As reported to IRDAI, FY 20-21)</p>
          </div>
          <div class="col-md-6 col-lg-3 text-center text-md-start">
            <h5>Sum Assured</h5>
            <p class="innovate_num">₹1,087,987 Cr.</p>
            <hr>
            <p>In force (individual) (Source : Life tree
              Public disclosure, FY 20-21)</p>
          </div>
          <div class="col-md-6 col-lg-3 text-center text-md-start">
            <h5>Assets Under Management</h5>
            <p class="innovate_num">₹1,00,000 Cr.</p>
            <hr>
            <p>(Source : Life tree
              Public disclosure, FY 20-21)</p>
          </div>
        </div>
      </div>
    </div>



    <div class="projects py-4">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3 text-center">
            <h2>9000+</h2>
            <p>Insured People</p>
          </div>
          <div class="col-sm-6 col-lg-3 text-center">
            <h2>9,170</h2>
            <p>Happy Clients</p>
          </div>
          <div class="col-sm-6 col-lg-3 text-center">
            <h2>15</h2>
            <p>insurance Packages</p>
          </div>
          <div class="col-sm-6 col-lg-3 text-center">
            <h2>8,917</h2>
            <p>100% Claim Paid</p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Feature Section -->
  <section class="features_wrapper" id="features">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-2">
          <p class="features_subtitle">So much to offer</p>
          <h2 class="features_title">Most loved plans</h2>
        </div>
      </div>
      <div class="row">
        <?php 
        if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_array($query)){

        ?>
        <div class="col-sm-12 col-lg-6 col-xl-4">
          <div class="ft-1  mb-5">
            <h5 class="card_polid text-end">
              <?php  echo $row['policy_id']  ?>
            </h5>
            <h3>
              <?php echo $row["policy_name"] ?>
            </h3>
            <div class="card_inndiv">
              <p class="card_sumass text-center m-0">
                <?php  echo $row['sum_assured']  ?>
              </p>
              <div class="card_txtsumass text-center pb-2">Sum Assured</div>
              <p class="features_text">
                <?php  echo $row["policy_description"] ?>
              </p>
              <p class="card_polcat m-0 card_sumass" data-plcat='<?php  echo $row['category']  ?>'>
                <?php  echo $row['category']  ?>
              </p>
              <div class="card_txtsumass text-center">category</div>
              <div class="row pb-2">
                <div class="col-6">
                  <p class="card_premium text-center m-0 card_sumass">
                    <?php  echo $row['premium']  ?>
                  </p>
                  <div class="card_txtsumass text-center">Premium</div>
                </div>
                <div class="col-6">
                  <p class="card_premium text-center m-0 card_agelimit">
                    <?php  echo $row['age_limit']  ?>
                  </p>
                  <div class="card_txtsumass text-center">Age Limit</div>
                </div>
              </div>



              <p class="card_link text-center"><button class="btn btn-primary" data-policyid='<?php echo $row['policy_id'] ?>' id="apply_plan">Apply <i class="bi bi-arrow-right"></i></button></p>
            </div>
          </div>
        </div>

        <?php } } ?>


      </div>

      <div class="row text-center" style="max-width: 200px;margin: auto;">
      <button type="button" id="loadMorePlans" class="btn btn-primary">Load More</button>
      <div class="col-12">
        <a href="allPlans.php" id="viewPlans">View All Plans <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>

    </div>

    <!-- apply policy modal  -->
    <div class="modal fade" id="apply_policy_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="add_data">
              <h2 class="display-4 text-dark pb-5">Apply Policy</h2>
              <div class="separator">

              </div>
              <form id="plan_submit_form">
              
              </form>
            </div>
          </div>

          <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
        </div>
      </div>
    </div>


    
  </section>


  <!-- Calculator Section  -->
  <div class="price_wrapper" id="calculate">
    <div class="container">
      <div class="row">

        <div class="col-12 py-5">
          <h1 class="text-center calculator_heading">Calculate Your premium</h1>
        </div>

        <div class="col-sm-12 col-lg-7 align-items-center">
          <img src="myimage/Mar-Business_11.jpg" alt="Calculate" class="img-fluid cal-img">
        </div>

        <div class="col-sm-12 col-lg-5">
          <div class="calculator">
            <form name="first">
              <div class="out_div">

                <div class="mb-3">
                  <div>
                    <h3>Insure your future, start today.</h3>
                  </div>

                </div>
                <div class="inn_div">
                  <div class="calc_div">

                    <div id="emailHelp" class="form-text"> <i><i class="fa-solid fa-circle-check"></i> </i> Get secured
                      in 4 easy steps | <i><i class="fa-solid fa-circle-check"></i> </i> 98.35% claim paid ratio</div>
                    <div id="err_msg"></div>


                    <!-- <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                      <div id="err_msg">
                        
                      </div>
                    </div> -->




                    <br>
                    <label for="age" class="form-label">Current Age</label>
                    <input type="text" class="form-control" id="age" onkeyup=checnum(this) aria-describedby="emailHelp">

                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">Premium Payable</label>
                    <input type="text" class="form-control" id="amount" onkeyup=checnum(this)>

                    <input class="form-check-input" type="radio" name="t" id="exampleRadios1" value="Monthly">
                    <label class="form-check-label" for="exampleRadios1">
                      Monthly
                    </label>

                    <input class="form-check-input" type="radio" name="t" id="exampleRadios2" value="Yearly" checked>
                    <label class="form-check-label" for="exampleRadios2">
                      Yearly
                    </label>

                  </div>


                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">For policy term of?</label>
                    </div>
                    <div class="col-auto ">
                      <input class="form-check-input" type="radio" name="year" value="15" checked>15-Years &nbsp;
                      <input class="form-check-input" type="radio" name="year" value="20">20-Years &nbsp;
                      <input class="form-check-input" type="radio" name="year" value="25">25-Years
                    </div>
                  </div>
                  <br>
                  <div class="calc_btn text-center">
                    <button type="button" class="btn btn-outline-primary" value="Calculate"
                      onclick=tqe_perc()>Calculate</button> &nbsp; &nbsp;
                    <button type="reset" value="reset" class="btn btn-outline-danger">Reset</button>
                  </div>


                  <div align='center' style=" padding-left: 10px;font-size: 10px;color: #dadada;" id="dumdiv">
                    <a href="" id="dum" style="padding-right:0px; text-decoration:none;color: green;"></a>
                  </div>



                  <br>
                  <div class="row g-3 align-items-center justify-content-center ">
                    <div class="col-auto">
                      <input type="text" placeholder="Fund Amount?" readonly id="r1" class="form-control"
                        aria-describedby="passwordHelpInline">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>



    <!-- Free Trial  -->
    <div class="free_trial">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-12 col-lg-6 text-center text-lg-start">
            <h2 class="free_title">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h2>
          </div>
          <div class="col-sm-12 col-lg-6 text-center text-lg-end mt-4 mt-lg-0">
            <a href="#contact" class="learn-more-btn"><i class="fa fa-rocket"></i>Start Free Trial</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Review Section  -->
  <div id="reviews" class="testimonial_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <p class="testimonial_subtitle">Clients loves us</p>
          <h2 class="testimonial_title">Testimonials</h2>

        </div>
      </div>
      <div class="row align-items-center mb-5">
        <div class="col-sm-12 col-lg-5 mb-4 mb-lg-0 text-center">
          <img src="myimage/t1.png" class="img-fluid" alt="images">
        </div>

        <div class="col-sm-12 col-lg-7  mb-5-mb-lg-0">
          <div class="testimonial_card">
            <h3>Michael Jordan</h3>
            <p class="testimonial_role">Actor,</p>
            <p class="testimonial_text">“Life insurance offers you Long-term Savings which will give huge benefit later,
              feel allowed to make inquiry.”</p>
          </div>
        </div>
      </div>

      <div class="row align-items-center flex-row-reverse">
        <div class="col-sm-12 col-lg-5  mb-5 mb-lg-0">
          <img src="myimage/t2.png" class="img-fluid" alt="images">
        </div>

        <div class="col-sm-12 col-lg-7  mb-5-mb-lg-0">
          <div class="testimonial_card">
            <h3>Matt henry</h3>
            <p class="testimonial_role">Athlet</p>
            <p class="testimonial_text">“I don’t call it “Life Insurance,” I call it “Love Insurance.” We buy it because
              we want to leave a legacy for those we love.”</p>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Brands Section  -->
  <div id="clients" class="client_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <p class="client_subtitle">Happy to help!</p>
          <h2 class="client_title">Clients Showcase</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-sm-2 col1  showcase_card align-self-center">
          <a href="#clients"><img src="myimage/c1.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c2.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c6.jpg" class="mb-4 img-fluid" alt="images"></a>
        </div>

        <div class="col-sm-2 col1  showcase_card align-self-center">
          <a href="#clients"><img src="myimage/c13.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c9.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c10.jpg" class="mb-4 img-fluid" alt="images"></a>
        </div>

        <div class="col-sm-2 col1  showcase_card align-self-center">
          <a href="#clients"><img src="myimage/c11.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c12.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c19.jpg" class="mb-4 img-fluid" alt="images"></a>
        </div>
        <div class="col-sm-2 col1  showcase_card align-self-center">
          <a href="#clients"><img src="myimage/c5.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c4.jpeg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c7.jpg" class="mb-4 img-fluid" alt="images"></a>
        </div>
        <div class="col-sm-2 col1  showcase_card align-self-center">
          <a href="#clients"><img src="myimage/c3.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c14.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c15.jpg" class="mb-4 img-fluid" alt="images"></a>
        </div>
        <div class="col-sm-2 col1  showcase_card align-self-center">
          <a href="#clients"><img src="myimage/c16.jpg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c17.jpeg" class="mb-4 img-fluid" alt="images"></a>
          <a href="#clients"><img src="myimage/c18.jpeg" class="mb-4 img-fluid" alt="images"></a>
        </div>
      </div>
    </div>
  </div>


  <!-- FAQs Section -->
  <div id="faq" class="faq_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <p class="faq_subtitle">We're here to help</p>
          <h2 class="faq_title">Frequently asked questions</h2>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-sm-12 col-lg-7 mb-5 mb-lg-0">
          <div class="accordion accordion-flush" id="accordionExample">

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  1. How does life insurance work?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  This is the basic life insurance FAQ. Life insurance is a contract between you and the insurance
                  company. The insurer agrees to pay the policy benefits to your nominees in case of
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  2. Why is life insurance useful?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Life cover is useful to ensure the financial stability of your family in case you are unable to earn
                  due to an accident or illness. The policy also pays the benefits to your beneficiaries in case of an
                  untoward event. Procuring such coverage ensures that your family can to meet their expenses and
                  sustain their lifestyles even in your absence.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  3. Is life insurance necessary?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  One of the things to know about life insurance is that while it is not necessary, purchasing a policy
                  is a smart investment decision. This is especially if you have dependents such as spouse, parents, and
                  children. The life plan will provide financial security to your family if you are not around.
                  Moreover, life policies offer several benefits and are a flexible instrument. Some of these include
                  the flexibility of adding riders for greater coverage or withdrawing part of the accumulated corpus to
                  meet expenses such as children’s education or wedding.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  4. How do I decide on the amount of life insurance cover I need?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  The maturity benefits primarily depend on the premium you pay during the policy term. This amount
                  depends on several factors such as your lifestyle, spending habits, income, expenses, and debt
                  obligations. It is recommended you procure coverage that is approximately between eight-ten times of
                  your annual income.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  5. How much does life insurance cost?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  The insurance cost depends on the type of policy chosen. In addition, factors like the sum assured,
                  premium amount, age, and coverage influence the insurance cost. The total insurance costs include
                  mortality charges, administrative charges, and investment fees. To know all about life insurance
                  costs, you must read the policy document.
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-sm-12 col-lg-5">
          <img src="myimage/5217215.jpg" class="img-fluid" alt="image">
        </div>
      </div>
    </div>


    <!-- Free Consulation  -->
    <div class="free_consulation">
      <div class="free_trial">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-sm-12 col-lg-6 text-center text-lg-start">
              <h2 class="free_title">Questions not listed above? Send us a message and we'll get back to you</h2>
            </div>
            <div class="col-sm-12 col-lg-6 text-center text-lg-end mt-4 mt-lg-0">
              <a href="#contact" class="learn-more-btn"><i class="fa-solid fa-envelope"></i>&nbsp; Free Consulation</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- our contact info  -->
    <div class="ourcon_wrapper mb-5" id="contact">
      <div class="container">
        <div class="">
          <div class="ourcon_heading text-center">
            <h3>Contact Info</h3>
            <h2>Get in touch with us</h2>
          </div>
          <div class="row ">

            <div class="col-sm-12 col-lg-4 mb-sm-2 mb-lg-0">
              <div class="row card ms-0 ">
                <div class="col-4 icon">
                  <i class="bi bi-geo-alt" id="con-icon"></i>
                  <div class="box-square"></div>
                </div>
                <div class="col-8 offset-3 con-text">
                  <h3>Location</h3>
                  <p>66 Guild Street 512B, Great North Town.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-4 mb-sm-2 mb-lg-0">
              <div class="row card ms-0">
                <div class="col-4 icon">
                  <i class="bi bi-phone" id="con-icon"></i>
                  <div class="box-square"></div>
                </div>
                <div class="col-8 offset-3 con-text">
                  <h3>Phone Number</h3>
                  <p>(+44) 123 456 789</p>
                  <p>(+1) 234-567-9874</p>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-4 mb-sm-2 mb-lg-0">
              <div class="row card ms-0">
                <div class="col-4 icon">
                  <i class="bi bi-envelope" id="con-icon"></i>
                  <div class="box-square"></div>
                </div>
                <div class="col-8 offset-3 con-text">
                  <h3>Email Address</h3>
                  <p>lifetree67@gmail.com</p>
                  <p>meadmin@gmail.com</p>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>



  </div>


  <!-- Footer section  -->
  <div id="contact" class="footer_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 footer_logo mb-4 mb-lg-0">
          <img src="myimage/logo11.png" alt="images">
          <p class="footer_text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quae, nostrum eveniet
            quas autem officiis veritatis quis ipsum veniam expedita perspiciatis ad eaque repudiandae vitae mollitia
            voluptates eligendi dolor, laudantium necessitatibus deleniti? Iure, nihil ad.</p>
        </div>

        <div class="col-lg-4 px-lg-5 mb-4 mb-lg-0">
          <h3 class="footer_title">Location</h3>
          <p class="footer_text">
            <a href="#">lifetree67@gmail.com</a> <br>
            <a href="#" class="footer_address">12 / 241 South, City, 134562,<br> UK, COUNTRY</a>
          </p>
        </div>


        <div class="col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer_title">Social Media</h3>
          <p>
            <a href="#" class="footer_social_media_icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="footer_social_media_icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="footer_social_media_icon"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="footer_social_media_icon"><i class="fab fa-dribbble"></i></a>
          </p>


          <!-- <a href="Admin/Admin_login.php">Admin</a> -->





          <!-- modal login  -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" id='AdminLogin' data-bs-toggle="modal" data-bs-target="#exampleModal">
            Admin
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-dark" id="admin_text">Admin Login</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="mb-3">
                      <div id="err">

                      </div>
                      <label for="userr" class="form-label text-dark">Username</label>
                      <input type="text" class="form-control" name="admin_username" id="userr" aria-describedby="">
                    </div>
                    <div class="mb-3">
                      <label for="passs" class="form-label text-dark">Password</label>
                      <input type="password" name="admin_password" class="form-control" id="passs">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" name="submit" id="admin_submit" class="btn btn-primary">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>




        </div>



        <div class="col-12 footer_credits text-center">
          <span>&copy; 2022 <a href="#" target="_blank" title="Ujwal Sadharia">Ujwal Sadharia</a>&trade;. All Rights
            Reserved.</span>
        </div>
      </div>
    </div>
  </div>





 <!-- USER NOMINEE NOTIFY MODAL  START-->

                <div class="modal fade" id="nomineeNotify"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered notifyModalDialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-question-circle"></i></h5>
                    </div>
                    <div class="modal-body text-center">
                      <h4 >Hello, <?php echo $_SESSION['user_loggedin'] ?></h4>
                      <small >It seems you don't have nominnee, Please add nominee</small>
                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-outline-success" id='notiAddNominee'>Add Nominee</button>
                    </div>
                  </div>
                </div>
              </div>

 <!-- USER NOMINEE NOTIFY MODAL  END-->



 <!-- Nominee Modal start -->

 <div class="modal fade" id="nominee_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <div class="add_data">
                        <h2 class="display-4 text-dark pb-5">Add Nominee</h2>
                        <div class="separator">

                        </div>
                        <form id="addNominee">
                          <div class="mb-3">
                            <label for="n_name" class="form-label">Name</label>
                            <input type="text" pattern="^[A-Za-z -]+$" title="Only Alphabets allowed" class="form-control" id="n_name" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="n_customer" class="form-label">Customer Id</label>
                            <input type="number" class="form-control" 
                            value='<?php if(isset($_SESSION['user_loggedin'])){echo $_SESSION['user_loggedin_id'];} ?>' 
                            id="n_customer"
                            aria-describedby="" required
                            readonly>
                          </div>

                          <div class="mb-3">
                            <label for="n_email" class="form-label">Email</label>
                            <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" class="form-control" id="n_email" aria-describedby="" required>
                            <small>Format:- anyone@gmail.com</small>
                          </div>
                          <div class="mb-3">
                            <label for="n_address" class="form-label">Address</label>
                            <div class="form-floating">
                              <textarea class="form-control" placeholder="Leave a address here" id="n_address"
                                required></textarea>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="n_relation" class="form-label">Relation</label>
                            <select class="form-select" title="Please Select Your Relation" id="n_relation" aria-label="Default select example" required>
                              <option value="" readonly>Select..</option>
                              <option value="Father">Father</option>
                              <option value="Mother">Mother</option>
                              <option value="Brother">Brother</option>
                              <option value="Wife">Wife</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="n_gender" class="form-label">Gender</label>
                            <select class="form-select" id='n_gender' title="Please Select Your Gender" aria-label="Default select example" required>
                              <option  value="" readonly>Select..</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="others">Others</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="n_phone" class="form-label">Contact No</label>
                            <input type="tel" placeholder=""  pattern='[0-9]+' title='Only Phone Number Allowed' class="form-control" id="n_phone" aria-describedby=""
                              required>
                          </div>

                          <div class="mb-3">
                            <label for="n_dob" class="form-label">Date Of Birth</label>
                            <input type="date" name="su_dob" class="form-control" id="n_dob" aria-describedby=""
                              required>
                          </div>



                          <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                          <input class="btn btn-primary" type="submit" value="Add Nominee" id="nominee">
                        </form>
                      </div>
                    </div>

                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                  </div>
                </div>
              </div>


 <!-- Nominee Modal end -->










  <!-- typed.js  -->
  <script src="others/typed.js"></script>

  <!-- jQuery  -->
  <script src="jQuery/jquery.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


  <!-- bootstrap5 js link  keep below two files or only bundle.min.js  -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="bootstrap5/js/bootstrap.min.js"></script> -->


  <!-- keep only this js file with this if you are adding any other bootstrap js file error will take place   -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>


  <!-- owl carousel js link  -->
  <script src="OwlCarousel/src/js/owl.carousel.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



  <!-- font awesome cdn  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"
    integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



  <!-- Custom js  -->
  <script src="custom code/main.js"></script>
  <script src="custom code/calculator.js"></script>
  <!-- <script src="admin/Admin_err.js"></script> -->


  <script>
    // preloader
    function preloader() {
      $('#preloader').hide();

    }



    // SIGNUP MODAL FORM VALIDATION
      // $('#namecheck').hide();
      // $('#emailcheck').hide();
      // $('#usercheck').hide();
      // $('#passcheck').hide();
      // $('#contactcheck').hide();
      // $('#imagecheck').hide();
      // $('#addcheck').hide();
      // $('#citycheck').hide();
      // $('#statecheck').hide();
      // $('#zipcheck').hide();
      // $('#maritalcheck').hide();
      // $('#dobcheck').hide();
      // $('#gendercheck').hide();


      // function validateName(){
      //   var suName = $('#su_name').val();
      //   if(suName.length == ''){
      //     $('#namecheck').show();
      //     $('#namecheck').html('Please Enter Your Name');
      //     $('#namecheck').css('color','red');
      //   }else{
      //     $('#namecheck').hide();
      //   }
      // }
      // $('#su_name').keyup(function(){
      //   validateName();
      // })




    // chatbot
    function getCurrentTime() {
      var now = new Date();
      var hh = now.getHours();
      var min = now.getMinutes();
      var ampm = (hh >= 12) ? 'PM' : 'AM';
      hh = hh % 12;
      hh = hh ? hh : 12;
      hh = hh < 10 ? '0' + hh : hh;
      min = min < 10 ? '0' + min : min;
      var time = hh + ":" + min + " " + ampm;
      return time;

    }

    $('.chatbot').click(function () {
      $('#bot').modal('show');
      $(".modal-backdrop.show").hide();

    })


    $('#send').click(function () {
      var que = $('#question').val();
      var me = "<li class='message_me clearfix col-12'><small class='time-messages text-muted'><span><i class='bi bi-clock'></i></span><span class='minutes'> " + getCurrentTime() + "</span></small><span class=message_me_img><img src='myimage/user.png' class='img-fluid rounded-circle' alt=''></span><div class='message-body clearfix'><div class='message-header'></div><p class='message_p'>" + que + "</p></div></li>";
      $('.message_list').append(me);
      $('#question').val(null);
      $('.modal_content').scrollTop($('.modal_content')[0].scrollHeight);
      if (que) {
        $.ajax({
          url: 'chatbot.php',
          type: 'POST',
          data: { que: que },
          success: function (data) {
            var bot = "<li class='message_bot clearfix'><span class='message_bot_img'><img src='myimage/chatbot.png' class='img-fluid rounded-circle' alt=''></span><small class='time-messages text-muted'> <span><i class='bi bi-clock'></i></span><span class='minutes'> " + getCurrentTime() + "</span></small><div class='message_bot_body clearfix'><div class='message-header'></div><p class='message_bot_p'>" + data + "</p></div></li>";

            setTimeout(() => {
              $('.message_list').append(bot);
              $('.modal_content').scrollTop($('.modal_content')[0].scrollHeight);
            }, 300);
          }
        });
      } else {
        alert('Ask Something..?')
      }
    })
    // on enter ask question (CHATBOT)
    $("#question").keyup(function (event) {
      if (event.keyCode === 13) {
        $("#send").click();
      }
    });







    $(document).ready(function () {
      // login dropdown 
      $('.login_slide').click(function () {
        $('.login_drp').slideToggle();
      })

      //user logedin 
      $('.user_box').click(function () {
        $('.user_drp').slideToggle();
      })



      // subscribe us 
      $('#subscribe_btn').click(function () {
        $('#subscribe_modal').modal('show');
      });

      $('#subscribe_send').click(function () {
        var subscribe_email = $('#sub_email').val();

        $.ajax({
          url: 'phpMailer/sendMail.php',
          type: 'POST',
          data: { subscribe_email: subscribe_email },
          beforeSend: function () {
            $('#preloader').show();
            $('#subscribe_modal').modal('hide');
          },
          success: function (data) {
            if (data == 1) {
              // alert('ThankYou, Our Team Will Reach You Soon');
              // $('#subscribe_modal').modal('hide');
              var subscribe_email = $('#sub_email').val('');
            } else {
              alert(data);
            }
          },
          complete: function () {
            $('#preloader').hide();
            setTimeout(() => {
              alert('ThankYou, Our Team Will Reach You Soon');
            }, 500);
          }
        })
      });


      // Add Nominee Modal 
      $('#add_nominee').click(function (event) {
        event.preventDefault();
        $('#nominee_modal').modal('show');
      })

      $(document).on('submit', '#addNominee', function (e) {
        e.preventDefault();
        var n_name = $('#n_name').val();
        var n_customer = $('#n_customer').val();
        var n_email = $('#n_email').val();
        var n_address = $('#n_address').val();
        var n_relation = $('#n_relation').val();
        var n_gender = $('#n_gender').val();
        var n_phone = $('#n_phone').val();
        var n_dob = $('#n_dob').val();

        $.ajax({
          url: 'Admin/agent_ajax/ajax_insert.php',
          type: 'POST',
          data: {
            n_name: n_name,
            n_customer: n_customer,
            n_email: n_email,
            n_address: n_address,
            n_relation: n_relation,
            n_gender: n_gender,
            n_phone: n_phone,
            n_dob: n_dob
          },
          success: function (data) {
            $('#nominee_modal').modal('hide');
            alert('Nominee Added successfully.');
          }
        })
      })








      // typed.js 
      var typed = new Typed('.type', {
        strings: [
          'Family',
          'Friends',
          'Relatives',
        ],
        // smartBackspace: true // Default value
        typeSpeed: 80,
        backSpeed: 80,
        loop: true,
      });




      // Admin Login
      $("#admin_submit").click(function () {
        var u = $("#userr").val();
        var p = $("#passs").val();

        $.ajax({
          url: "Admin/Admin_login.php",
          type: "POST",
          data: {
            username: u,
            password: p
          },
          success: function (data) {
            if (data == 1) {
              window.location = "Admin/admin_home.php";
            } else if (data == 2) {
              $("#err").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid Username</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
            }
            else {
              $("#err").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid Password</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
            }
            // if(data){
            //   alert(data);
            // }
          }


        })

      })






      // User Sign-up 
      $('#sign_up').click(function () {
        $('#signup_modal').modal('show');
      })

      $('#su_submit_form').on("submit", function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
          url: "sign_up.php",
          contentType: false,
          data: formData,
          type: "POST",
          processData: false,
          success: function (data) {
            $('#su_profilepic').val('');
            if (data == 1) {
              alert('ThankYou For Signing Up,Kindly Add Your Nominee After Login');
              $('#signup_modal').modal('hide');
              $("#su_submit_form").trigger('reset');
            }
          }
        })
      })



      // USER LOGIN 
      $('#user_login').click(function () {
        $('#user').modal('show');
      })

      $('#user_submit').on('click', function (event) {
        event.preventDefault();
        var username = $('#user_username').val();
        var password = $('#user_pass').val();

        $.ajax({
          url: 'user_login.php',
          type: 'POST',
          data: {
            username: username,
            password: password
          },
          success: function (data) {
            if (data == 1) {
              location.reload();
            }
            //  else if (data == 2) {
            //   $(".user_err").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid Username</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
            // } 
            else {
              $(".user_err").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid Username or Password</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
            }
          }
        })


      })



      // Apply for plan 
      $(document).on('click', '#apply_plan', function () {


        <?php if(isset($_SESSION['user_loggedin'])):?>
          
          $("#apply_policy_modal").modal('show');
          var policy_id = $(this).data('policyid');

          $.ajax({
            url: 'purchase_plan.php',
            type: 'POST',
            data: { idddd: policy_id },
            success: function (data) {
              $('#plan_submit_form').html(data);
            }
          })

         

        <?php else:?>
          alert('Sign-Up Or LogIn To Apply')
        <?php endif;?>
      })


      $('#plan_submit_form').on('submit',function(event){
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
          url: "purchase_plan.php",
          contentType: false,
          data: formData,
          type: "POST",
          processData: false,
          success: function (data) {
            $('#pl_aadhar').val('');
            if (data == 1) {
              alert('ThankYou.');
              $('#apply_policy_modal').modal('hide');
            }else{
              alert('Invalid File Extension');
              alert(data);
            }
          }
        })
      })


      // be an agent 
      $('#be_agent').click(function () {
        $('#apply_agent').modal('show');
      })

      $('#agentForm').on('submit',function () {
        a_username = $('#a_username').val();
        a_password = $('#a_password').val();
        a_name = $('#a_name').val();
        a_email = $('#a_email').val();
        a_dob = $('#a_dob').val();
        a_address = $('#a_address').val();
        a_city = $('#a_city').val();
        a_state = $('#a_state').val();
        a_zipcode = $('#a_zipcode').val();
        a_branch = $('#a_branch').val();
        a_gender = $('#a_gender').val();
        a_phone = $('#a_phone').val();


        $.ajax({
          url: 'Admin/agent_ajax/ajax_insert.php',
          type: 'POST',
          data: {
            a_username: a_username,
            a_password: a_password,
            a_name: a_name,
            a_email: a_email,
            a_dob: a_dob,
            a_address: a_address,
            a_city: a_city,
            a_state: a_state,
            a_zipcode: a_zipcode,
            a_branch: a_branch,
            a_gender: a_gender,
            a_phone: a_phone
          },
          success: function (data) {
            $('#apply_agent').modal('hide');
            alert('Your Request For Being Agent is Pending, Wait For Approval.Keep Checking Email.')
            // alert(data);
          }
        })
      })



      // AGENT LOGIN START 
      $(document).on('click','#agent_login',function(){
        $('#agentLoginModal').modal('show');
      }) 
      
      
      $('#agent_submit').on('click', function (event) {
        event.preventDefault();
        var ausername = $('#agent_username').val();
        var apassword = $('#agent_pass').val();

        $.ajax({
          url: 'user_login.php',
          type: 'POST',
          data: {
            ausername: ausername,
            apassword: apassword
          },
          success: function (data) {
            if (data == 1) {
              // location.reload();
              console.log(data);
              location.replace("Agent/index.php");
            }
            // else if (data == 2) {
            //   $(".agent_err").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid Username</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
            // } 
            else {
              $(".agent_err").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid username or Password</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
            }
            // console.log(data);
          }
        })


      })
      // AGENT LOGIN END 


    

     
      
      

      // NOTIFY NOMINEE 

      <?php if(isset($_SESSION['user_loggedin'])):?>

        var nData = 10;

        $.ajax({
          url:'checkNominee.php',
          type:'POST',
          data:{nData:nData},
          success:function(data){
            if(data == 2){
              $('#nomineeNotify').modal('show');  

              $(document).on('click','#notiAddNominee',function(){
                $('#nomineeNotify').modal('hide'); 
                setTimeout(() => {
                  $('#nominee_modal').modal('show');
                }, 300);
              })
            }
          }
        })

        $('#AdminLogin').hide();
          
        
        <?php endif;?>



      // Load More Plans 
      $(document).on("click","#loadMorePlans",function(){
        $moreData = 3;
      })
      

    });



  </script>

</body>

</html>

