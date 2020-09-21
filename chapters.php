<?php  include "includes/header.php";  ?>

<!-- Content
  ============================================= -->


    <div class="container">

        <div class="teacherhead text-center">
           
            <h5><strong > ADD CHAPTERS</strong></h5>
        </div>
        <hr>
        <div class="row justify-content-center">

            <div class="teacher_area col-lg-8">



                <?php  

                
 

    if(isset($_POST['submit'])){




    $classroom = clean($_POST['classroom']);
    $subject     = clean($_POST['subject']);
    $term   = clean($_POST['term']);
    $chapter_content = clean($_POST['chapter_content']);


    //first select from existing


    $sql2 = query("SELECT * FROM chapters WHERE chapter_content = '$chapter_content' ");

    


    if(mysqli_num_rows($sql2) > 0){
        
     echo "Chapter exists in the database";

    }else{   


       


    $sql = "INSERT INTO chapters(classes,subject,term, chapter_content) VALUES('$classroom','$subject','$term','$chapter_content')";
    
    $query = query($sql);


    if($query){

        echo "<div class='alert alert-success'> CHAPTER SUCCESSIFULLY INSERTED</div>";
        
    }else{


        echo "FAILED TO INSERTED";
    }


    }








    
}








?>

                <form action="#" method="POST">


                   
                        <div class="form-group row justify-content-end">
                            <label for="user-name-8" class="col-sm-4 col-form-label">
                                Class <sup class="text-danger">* </sup>
                            </label>
                            <div class="col-sm-8">
                                 <select name="classroom" id="cls" class="custom-select">
                                
                                    <option value="" disabled selected>--select class--</option>
                                    <?php 
                            
                                    $sql = query("SELECT classid, classname FROM classes"); 
                                    while ($row = mysqli_fetch_array($sql)) {  ?>

                                    <option value="<?php echo $row['classid'] ?>">
                                        <?php echo $row['classname'];?>
                                    </option>
                                    <?php } ?>


                                </select>
                            </div>
                        </div>



                        <div class="form-group row justify-content-end">
                            <label for="user-name-8" class="col-sm-4 col-form-label">
                                Subject <sup class="text-danger">* </sup>
                            </label>
                            <div class="col-sm-8">
                               <select name="subject" id="sub" class="custom-select">
                                    <option value="" disabled selected>--Select Subject--</option>
                                    <?php 
                            
                                    $sql = query("SELECT id, subjectname FROM subjects"); 
                                    while ($row = mysqli_fetch_array($sql)) {  ?>

                                    <option value="<?php echo $row['id'] ?>">
                                        <?php echo $row['subjectname'];?>
                                    </option>
                                    <?php } ?>
                                  

                                </select>
                            </div>
                        </div>





                        <div class="form-group row justify-content-end">
                            <label for="email" class="col-sm-4 col-form-label">
                                Term : <sup class="text-danger">* </sup>
                            </label>
                            <div class="col-sm-8">
                               <select name="term" id="" class="custom-select">
                                   <option value="#" disabled selected> Select Term</option>
                                   <option value="1">Term 1</option>
                                   <option value="2">Term 2</option>
                                   <option value="3">Term 3</option>
                               </select>
                            </div>
                        </div>



                        <div class="form-group row justify-content-end">
                            <label for="email" class="col-sm-4 col-form-label">
                                Chapter : <sup class="text-danger">* </sup>
                            </label>
                            <div class="col-sm-8">
                                <textarea cols="6" rows="4" id="tiny" name="chapter_content" class="form-control"></textarea>
                            </div>
                        </div>




                        <div class="form-group row justify-content-end">
                            <div class=" col-sm-8">

                                <button type="submit" name="submit" class="btn btn-success btn-block">
                                    Add Chapter <span class="fa fa-check append"></span>
                                </button>

                            </div>
                        </div>
                

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