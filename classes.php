<?php  include "includes/header.php";  ?>

<!-- Content
  ============================================= -->
<div id="content" style="padding-top:0px">


    <?php

if(isset($_POST['addclass'])){

 $classname = clean($_POST['classname']);

 $sql2 = query("SELECT * FROM classes");

while($row = mysqli_fetch_array($sql2)){

     $cls = $row['classname'];

}



if($cls === $classname){

echo "class already exists in the database";

}else{   


 $sql = "INSERT INTO classes(classname) VALUES('$classname')";
 $query = query($sql);


 if($query){

    echo "<div class='alert alert-success'> CLASS INSERTED</div>";
    
}else{


    echo "FAILED TO INSERTED";
}


}


}



?>

    <div class="container">

        <div class="teacherhead">
            <hr>
            <h5>Enter Another Class</h5>
        </div>
        <hr>
        <div class="row justify-content-center">

            <div class="teacher_area col-lg-8">
                <form action="" method="POST">


                    <div class="form-group row justify-content-end">
                        <label for="user-name-8" class="col-sm-4 col-form-label">
                            Class Name
                        </label>
                        <div class="col-sm-8">
                            <input id="user-name-8" name="classname" type="text" placeholder="Enter a class"
                                required="required" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name='addclass'>add class</button>



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