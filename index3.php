<?php
ob_start();
system('ipconfig /all');
$mycom = ob_get_contents();
ob_clean();
$find_mac = "Physical"; 
$pmac = strpos($mycom, $find_mac);
session_start();

include "includes/header.php";
if (isset($_POST['login'])) {

    $username = clean($_POST['username']);
    $password = clean($_POST['password']);
    #$compName = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $computer = substr($mycom, ($pmac + 36), 17);

    if (!empty($username) and !empty($password)) {

        //fetching credentials from the database

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = query($sql);
        if (mysqli_num_rows($result) == 1) {
            $hashed_password = md5($password);
            $mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
            $result2 = query($mainSql);
            if (mysqli_num_rows($result2) == 1) {
                while ($row = mysqli_fetch_array($result2)) {

                  //fetching the user role

                 
                    $accountStatus = $row['account_status'];
                    session_regenerate_id();
                    $_SESSION['user_role']  = $row['role'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['computerName'] = $computer;
                    $_SESSION['adminFullName'] = $row['sname'] . '' . $row['fname'];
                    $_SESSION['email'] = $row['email'];
                   
                    session_write_close();

                    if ($accountStatus = 1) {

                      
                            $doLoginFeedback = "<div class='alert alert-success bg-success ' >                       
                         <p class='text-white '>  <strong> <i class='mdi mdi-checkbox-marked-circle-outline'></i> Credentials Accepted,  Signing you in ..............</p>
                        <script type='text/javascript'>setTimeout(function() { window.location.href = 'submitteddata.php';}, 3000);</script>
                        </div>";
                        

                    } else {

                        $doLoginFeedback = "<div class='alert alert-danger bg-danger message' >                       
                        <p class='text-white font-weight-bold'> <strong> <i class='mdi mdi-close-circle'></i> Sorry!</strong>, Check your Password or Username Used.</p>
                       <script type='text/javascript'>setTimeout(function() { window.location.href = 'index.php';}, 3000);</script>
                       </div>";

                    }

                }

            } else {

                $doLoginFeedback = "<div class='alert alert-warning ' >                       
                <p class='text-white font-weight-bold'> <strong> <i class='mdi mdi-close-circle'></i> Sorry!</strong>,
                 Incorrect Password Entered, Try Again!</p>
               <script type='text/javascript'>setTimeout(function() { window.location.href = 'index.php';}, 3000);</script>
               </div>";

            }

        } else {

            $doLoginFeedback = "<div class='alert  alert-danger ' >                       
            <p class='text-white font-weight-bold'>
             <strong> <i class='mdi mdi-close-circle'></i> Sorry!</strong>,User Not Found In the System.</p>
           <script type='text/javascript'>setTimeout(function() { window.location.href = 'index.php';}, 3000);</script>
           </div>";
        }

    }

}

?>
<div id="content" style="padding-top:0px">


    <div class="container">


        <div class="heading text-center">

            <h1>PIC-ED SCHOOL</h1>
            <h3>LOGIN FORM</h3>
            <hr>


        </div>

        <?php if(isset($doLoginFeedback)){ echo $doLoginFeedback;}?>
        <form class="form-horizontal " action="index3.php" method="POST">

            <div class="form-group  m-t-20">
                <div class="col-xs-12">
                    <label>Username</label>
                    <input class="form-control" type="text" required="" name="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <label>Password</label>
                    <input class="form-control" type="password" required="" name="password" placeholder="Password">
                </div>
            </div>





            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block  text-uppercase waves-effect waves-light" name="login"
                        type="submit">Log In As Admin</button>
                </div>
            </div>

            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>Made with love by <span class="badge badge-danger">Codevast.com</span> Solutions
                        <?php echo date('Y'); ?></a></p>
                </div>
            </div>
        </form>

    </div>
</div>


</div>

</div><!-- Content end -->



<?php  include "includes/footer.php";  ?>