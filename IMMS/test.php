
<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM tblemployees WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    //
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name  = htmlspecialchars(trim($_POST['last_name']));
    $empcode    = $_POST['empcode'];
    $subunit    = $_POST['subunit'];
    $position   = $_POST['position'];
    $mobile 	  = $_POST['mobile'];
    $status=1;

    //


    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO tblemployees (username, password, EmpId, FirstName, LastName, Subunit, Position_type, Phonenumber, Gender, Address, Status)
                VALUES (?, ?, '$empcode', '$first_name', '$last_name', '$subunit', '$position', '$mobile', '$gender', '$address', '$status')";

        if($stmt = mysqli_prepare($dbh, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($dbh);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Appraisal | Registration Page</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<!--
        <script type="text/javascript">
    function valid()
    {
    if(document.addemp.password.value!= document.addemp.confirmpassword.value)
    {
    alert("New Password and Confirm Password Field do not match  !!");
    document.addemp.confirmpassword.focus();
    return false;
    }
    return true;
    }
    </script>

    <script>
    function checkAvailabilityEmpid() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "check_availability.php",
    data:'empcode='+$("#empcode").val(),
    type: "POST",
    success:function(data){
    $("#empid-availability").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }
    </script>

    <script>
    function checkAvailabilityEmailid() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "check_availability.php",
    data:'emailid='+$("#email").val(),
    type: "POST",
    success:function(data){
    $("#emailid-availability").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }
    </script> -->

    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">
                            <span class="chapter-title">ITU | Appraisal Online Form System</span>
                        </div>


                        </form>


                    </div>
                </nav>
            </header>


            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">


                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
                    <li>&nbsp;</li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="test.php"><i class="material-icons">account_box</i>Staff Registration</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="index.php"><i class="material-icons">account_box</i>Staff Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="supervisor/"><i class="material-icons">account_box</i>Supervisor Login</a></li>
                    <!-- <li class="no-padding"><a class="waves-effect waves-grey" href="forgot-password.php"><i class="material-icons">account_box</i>Staff Password Recovery</a></li> -->

                       <li class="no-padding"><a class="waves-effect waves-grey" href="admin/"><i class="material-icons">account_box</i>Admin Login</a></li>

                </ul>
          <div class="footer">
                    <p class="copyright"><a href="">ITU COMUI </a> © 2019</p>

                </div>
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Staff Registration</span>
                                         <?php if($msg){?><div class="errorWrap"><strong>ERROR</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                       <div class="row">

                                           <form class="col s12" name="addemp" method="post">

                                            <div class="input-field col  s12">
                                            <label for="empcode">Staff Code(Must be unique)</label>
                                            <input  name="empcode" id="empcode" onBlur="checkAvailabilityEmpid()" type="text" autocomplete="off" required>
                                            <span id="empid-availability" style="font-size:12px;"></span>
                                            </div>


                                            <div class="input-field col m6 s12">
                                            <label for="firstName">First name</label>
                                            <input id="firstName" name="first_name" type="text" required>
                                            </div>

                                            <div class="input-field col m6 s12">
                                            <label for="lastName">Last name</label>
                                            <input id="lastName" name="last_name" type="text" autocomplete="off" required>
                                            </div>

                                            <div class="input-field col s12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                            <label for="email">Email</label>
                                            <input name="username" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required>
                                            <span class="help-block"><?php echo $username_err; ?></span>
                                            </div>

                                            <div class="input-field col s6 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                            <label for="password">Password</label>
                                            <input id="password" name="password" type="password" autocomplete="off" required>
                                            <span class="help-block"><?php echo $password_err; ?></span>
                                            </div>

                                            <div class="input-field col s6 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                            <label for="confirm">Confirm password</label>
                                            <input id="confirm" name="confirm_password" type="password" autocomplete="off" required>
                                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                            </div>

                                            <div class="input-field col m6 s12">
                                            <select  name="subunit" autocomplete="off">
                                            <option value="">Subunit...</option>
                                            <?php $sql = "SELECT subunit_name from tbldepartments";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {   ?>
                                            <option value="<?php echo htmlentities($result->subunit_name);?>"><?php echo htmlentities($result->subunit_name);?></option>
                                            <?php }} ?>
                                            </select>
                                            </div>

                                            <div class="input-field col m6 s6">
                                            <select name="position_type" autocomplete="off">
                                            <option value="">Staff position...</option>
                                            <?php $sql = "SELECT position_type from tblleavetype";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {   ?>
                                            <option value="<?php echo htmlentities($result->position_type);?>"><?php echo htmlentities($result->position_type);?></option>
                                            <?php }} ?>
                                            </select>
                                            </div>

                                            <div class="input-field col m6 s12">
                                            <select name="gender" autocomplete="off">
                                            <option value="">Gender...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                            </select>
                                            </div>

                                            <div class="input-field col m6 s12">
                                            <label for="address">Address</label>
                                            <input id="address" name="address" type="text" autocomplete="off" required>
                                            </div>

                                            <div class="input-field col s6">
                                            <label for="phone">Mobile number</label>
                                            <input id="phone" name="mobile" type="tel" maxlength="15" autocomplete="off" required>
                                             </div>


                                             <div class="input-field col s12">
                                             <button type="submit" name="submit" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">REGISTER</button>

                                             </div>
                                           </form>
                                         </div>
                                         </div>


                                      </div>
                                  </div>

                              </div>
                          </div>
                    </div>
                </div>
            </main>

        </div>
        <div class="left-sidebar-hover"></div>

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>

    </body>
</html>
