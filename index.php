<?php  include "includes/header.php";  ?>



<div class="container-fluid">


    <div class=" card mb-4 mt-2 text-center">

        <h1>PIC-ED EDUCATION</h1>
        <h3>EXAMINATION QUESTIONS FORM</h3>



    </div>


    <?php 


        $sqlF = query("SELECT * FROM  temp_questions");

        $found = mysqli_num_rows($sqlF);

        if($found > 0)

        {

             $rowF=mysqli_fetch_array($sqlF);
             $sqlss = query("SELECT id,fullname,email FROM teachers WHERE id ='".$rowF['teacherid']."' "); 
             $rowss = mysqli_fetch_array($sqlss);



        }


         ?>





    <div class="row">

        <div class=" col-lg-8 col-12  ">

            <form action="saveQuestion.php" method="POST" class=" mb-5 ">




                <div class="card">

                    <div class="card-header">

                        <h5 class="card-title"><strong>TEACHER'S DETAILS</strong></h5>

                    </div>

                    <div class="card-body p-3">


                        <div class="form-group">



                            <select name="teacher" id="teach" class="custom-select">


                                <?php 


                        if($found >0){


                        ?>


                                <option value="<?php echo $rowF['teacherid'];?>" readonly selected>
                                    <?php echo $rowss['fullname']. "IS ENTERING QUESTIONS NOW"; ?></option>


                                <?php


                        }else{


                         ?>

                                <option value="" disabled selected>--Select teacher--</option>

                                <?php 

                    $sql = query("SELECT id,fullname FROM teachers"); 
                    while ($row = mysqli_fetch_array($sql)) {  ?>

                                <option value="<?php echo $row['id'] ?>">
                                    <?php echo $row['fullname'];?>
                                </option>
                                <?php }} ?>


                            </select>

                        </div>



                        <div class="form-group ">
                            <label for="" class="col-form-label">
                                FULL Name <sup class="text-danger">* </sup>
                            </label>

                            <?php  if($found>0) {  ?>



                            <input name="fullname" type="text" value="<?php  echo $rowss['fullname']; ?>"
                                class="form-control" readonly>


                            <?php   }else{  ?>

                            <input id="fullname" name="fullname" type="text" class="form-control">

                            <?php }?>



                        </div>

                        <div class="form-group  ">
                            <label for="" class=" col-form-label">
                                Email : <sup class="text-danger">* </sup>
                            </label>

                            <?php  if($found>0) {  ?>

                            <input name="email" type="email" value="<?php  echo $rowss['email']; ?>"
                                class="form-control" readonly>

                            <?php   }else{  ?>

                            <input id="email" name="email" type="email" class="form-control">

                            <?php }?>

                        </div>





                    </div>


                </div>




                <div class="card mt-2  mb-3">

                    <div class="card-header">
                        <h5 class="card-title">QUESTIONS AREA</h5>
                    </div>



                    <div class="card-body p-3">
                        <div class="form-group">

                            <label for="class">Class:</label>

                            <select name="classroom" id="classroom" class="custom-select">

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



                        <div class="form-group">

                            <label> Subject <sup class="text-danger">* </sup>
                            </label>

                            <select name="subject" id="subject" class="custom-select">
                                <option value="" disabled selected>--Select Subject--</option>
                                <?php 
                                  
                                          $sql = query("SELECT id, subjectname FROM subjects"); 
                                          while ($row = mysqli_fetch_array($sql)) {  ?>

                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['subjectname'];?>
                                </option>
                                <?php } ?>


                            </select>

                        </div>



                        <div class="form-group">

                            <label for="term" class="col-form-label">
                                Term : <sup class="text-danger">* </sup>
                            </label>

                            <select name="term" id="term" class="custom-select">
                                <option value="#" disabled selected> Select Term</option>
                                <option value="1">Term One</option>
                                <option value="2">Term Two</option>
                                <option value="3">Term Three</option>
                            </select>

                        </div>





                        <div class="form-group">


                            <label for="chapter">Chapter:</label>
                            <input type="text" id="chapter_content" name="chapter_content"
                                placeholder="--select chapter--" class="form-control">

                        </div>

                    </div>


                </div>



                <!--class end-->

                <div class="card p-3 mt-3 mb-3">

                    <label for="Complex"> Complexity</label>

                    <div class="checkboxes">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="complex" value="1" checked>
                            <label class="form-check-label">
                                Simple
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="complex" value="2">
                            <label class="form-check-label">
                                Moderate
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="complex" value="3">
                            <label class="form-check-label">
                                Hard
                            </label>
                        </div>
                    </div>



                </div>
                <!--complexity end-->






                <div class="form-group  card p-3">
                    <label for="comment">Question(s)</label>
                    <textarea class="form-control tiny" rows="5" name="question"></textarea>
                </div>


                <!--questiontext end-->
                <hr>


                <div class="form-group card p-4">
                    <h6>Answers/Options:</h6>
                    <label for="hint">Provide options using a,b,c,d.. as provided below </label> <br>

                    <div class="alert alert-info">

                        Indicate the correct answer(s) using the tick mark in the checkbox.

                    </div>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="correctOption[]" value="1">
                        <label class="form-check-label">Option A</label>
                    </div>

                    <textarea class="form-control tiny" rows="3" id="option1" name="optionstext[]"></textarea>

                    <!-- <label for="hint">Choice 2</label> -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="correctOption[]" value="2">
                        <label class="form-check-label">Option B</label>
                    </div>

                    <textarea class="form-control tiny" rows="3" id="option2" name="optionstext[]"></textarea>


                    <!-- OPTION C -->

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="correctOption[]" value="3">
                        <label class="form-check-label">Option C</label>
                    </div>
                    <textarea class="form-control tiny" rows="3" id="option3" name="optionstext[]"></textarea>


                    <!-- OPTION D -->

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="correctOption[]" value="4">
                        <label class="form-check-label">Option D</label>
                    </div>
                    <textarea class="form-control tiny" rows="3" id="option4" name="optionstext[]"></textarea>


                    <!-- OPTION E -->

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="correctOption[]" value="5">
                        <label class="form-check-label">Option E</label>
                    </div>
                    <textarea class="form-control tiny" rows="3" id="option5" name="optionstext[]"></textarea>

                </div>










                <div class=" card mt-3">


                    <div class="card-header">

                        <h5 class="card-title">Hint Statement:</h5>

                    </div>


                    <div class="card-body p-3">


                        <div class="form-group">
                            <label for="hint">Without giving a direct answer,please provide learners with some
                                referencing
                                that could help them choose correct answer(s)</label>
                            <textarea class="form-control tiny" rows="3" id="hint" name="hintstatement"></textarea>
                        </div>

                    </div>


                </div>
                <!--hintstatement end-->



                <div class="form-group card mt-3">


                    <div class="card-header">

                        <h5 class="card-title">GENERAL FEEDBACK</h5>
                        <p>Specify why answer is correct/incorrect by providing reason(s).</p>

                    </div>


                    <div class="card-body p-3">

                        <div class="row">
                            <div class="col-6">
                                <label for="feedback1"> Correct Feedback </label>
                                <textarea class="form-control " rows="3" id="fb" name="feedback1"></textarea>
                            </div>


                            <div class="col-6">

                                <label for="feedback2"> Incorrect Feedback! </label>

                                <textarea class="form-control " rows="3" id="fb" name="feedback2"></textarea>
                            </div>
                        </div>



                    </div>







                </div>









                <div class="form-group card p-3">
                    <label for="comment">TEACHER'S COMMENT , IF ANY:</label>
                    <textarea class="form-control tiny" rows="3" id="tc" name="comment"
                        placeholder="Enter your comments here"></textarea>
                </div>



                <div class="form-group">
                    <button type="submit" name="submitQuestion" class="btn btn-success btn-block">Submit</button>
                </div>


                <!--questions row end-->

            </form>

        </div>

        <!--questions end-->

        <div class=" col-lg-4 col-12 ">

            <div class="card">

                <div class="card-header">

                    <h5 class="card-title"> SUMMARY OF QUESTIONS</h5>

                </div>

                <div class="card-body">



                    <table class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th width="10%">S/N</th>
                                <th width="90%">QUESTION</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php 

                    $sqldd = query("SELECT * FROM temp_questions");


                    $count = 0;

                    while($rowdd = mysqli_fetch_array($sqldd)){

                        $count++;
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $rowdd['question_text']; ?></td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>


                </div>





            </div>

            <hr>


            <div class="card mb-3">

                <div class="card-header">

                    <h5 class="card-title">ACKNOWLEDGE</h5>

                </div>

                <div class="card-body p-1">


                    <div class="alert bg-secondary">
                        <p class="lead text-white">
                            <strong>After Fully setting all your questions, Please submit them here
                                Thanks, MANAGEMENT.</strong>
                        </p>


                    </div>


                </div>

            </div>









            <form action="submitFinished.php" method="POST">

                <div class="form-group">
                    <label for="tcf">Enter your FInal words about the questions set(Optional)</label>
                    <textarea class="form-control " rows="1" name="tcf"></textarea>
                </div>


                <button class="btn btn-block btn-primary" name="allsubmit" type="submit"> SUBMIT
                    QUESTIONS</button>


            </form>

        </div>


    </div>


</div>

</div><!-- Content end -->



<?php  include "includes/footer.php";  ?>