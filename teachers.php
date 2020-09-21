<?php  include "includes/header.php";  ?>

<!-- Content
  ============================================= -->
<div id="content" style="padding-top:0px">



    <div class="container">

        <div class="teacherhead">
            <hr>
            <h5><strong>TEACHER'S DETAILS</strong></h5>
        </div>
        <hr>
        <div class="row justify-content-center">

            <div class="teacher_area col-lg-8">



                <?php  

                
 

    if(isset($_POST['submit'])){




    $fullName = clean($_POST['fullname']);
    $email     = clean($_POST['email']);
    $civility   = clean($_POST['civility']);


    //first select from existing


    $sql2 = query("SELECT * FROM teachers");

     while($row = mysqli_fetch_array($sql2)){

        $emm = $row['email'];
        
     }



    if($email === $emm){
        
     echo "Teacher exists in the database";

    }else{   


       


    $sql = "INSERT INTO teachers(fullname,email,civility) VALUES('$fullName','$email','$civility')";
    
    $query = query($sql);


    if($query){

        echo "<div class='alert alert-success'> DATA INSERTED</div>";
        
    }else{


        echo "FAILED TO INSERTED";
    }


    }








    
}








?>

                <form action="#" method="POST">


                    <fieldset>

                        <div class="form-group row justify-content-end">
                            <label class="main-label col-sm-4 col-form-label">
                                Civility :
                            </label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="civility_0" name="civility" value="1"
                                        class="form-check-input">
                                    <label for="civility_0" class="form-check-label">
                                        M.
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="civility_1" name="civility" value="2"
                                        class="form-check-input">
                                    <label for="civility_1" class="form-check-label">
                                        Mrs.
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="civility_2" name="civility" value="3"
                                        class=" form-check-input">
                                    <label for="civility_2" class="form-check-label">
                                        Ms.
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row justify-content-end">
                            <label for="user-name-8" class="col-sm-4 col-form-label">
                                FUll Name <sup class="text-danger">* </sup>
                            </label>
                            <div class="col-sm-8">
                                <input id="user-name-8" name="fullname" type="text" placeholder="Enter fullName"
                                    size="60" required="required" class="form-control">
                            </div>
                        </div>




                        <div class="form-group row justify-content-end">
                            <label for="email" class="col-sm-4 col-form-label">
                                Email : <sup class="text-danger">* </sup>
                            </label>
                            <div class="col-sm-8">
                                <input id="email" name="email" type="email" placeholder="Enter email" size="60"
                                    required="required" class="form-control">
                            </div>
                        </div>



                        <div class="form-group row justify-content-end">
                            <div class=" col-sm-8">

                                <button type="submit" name="submit" class="btn btn-success btn-block">
                                    Submit <span class="fa fa-check append"></span>
                                </button>

                            </div>
                        </div>
                    </fieldset>

                </form>

            </div>
        </div>
        <hr>







    </div>
    <!--questions row end-->
</div>
<!--container end-->

</div><!-- Content end -->



<?php  include "includes/footer.php";  ?>