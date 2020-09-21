<?php session_start(); ?>

<?php  include "includes/header.php";  ?>

<?php if(!isset($_SESSION['user_id'])){

 header('Location:index.php');

} ?>
<!-- Content
  ============================================= -->
<div id="content" style="padding-top:0px">



    <div class="container mt-5">



        <h3 class="text-center">SUBMITTED DATA</h3>
        <br>

        <div class="card p-5">

            <div class="table-responsive">


                <table id='table' class="table table-bordered table-stripped">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Teacher's Name</th>
                            <th>Subject</th>
                            <th>Chapter</th>
                            <th>Question</th>
                            <th>Answer Options</th>
                            <th>Correct Options</th>
                            <th>Complexity</th>
                            <th>Correct feedback</th>
                            <th>Incorrect feedback</th>
                            <th>Hint</th>
                            <th>Comment</th>
                        </tr>
                    </thead>

                    <tbody>


                        <?php  


                        $sql2 = query("SELECT * FROM main_questions");


                        $count = 0;

                        while($row = mysqli_fetch_array($sql2)){

                           $count++;


                           $t_id = $row['teacherid'];
                          //global $question_id;
                          $question_id = $row['question_id'];

                           $sqlT = query("SELECT * FROM teachers WHERE id = '$t_id' ");

                           while($rowT = mysqli_fetch_array($sqlT)){

                            
                              $teachers_name = $rowT['fullname'];
                              
                           }

                           // fetching classname

                           $c_id = $row['teacherid'];

                           $sqlC= query("SELECT * FROM classes WHERE classid = '$c_id' ");

                           while($rowC = mysqli_fetch_array($sqlC)){

                            
                              $classname = $rowC['classname'];
                              
                           }

                          


                                 //complex answer

                              $complex = $row['complexity'];

                             switch ($complex) {
                               case '1':
                                $comp = "Simple"; # code...
                               break;

                               case '2':
                                 $comp = "Moderate"; 
                               break;
                               
                               case '3':
                                 $comp = "Hard"; 
                               break;
                               
                               default:
                                 # code...
                                 break;
                             }



                        ?>

                        <tr>

                            <td><?php echo $count; ?></td>
                            <td><?php  echo $row['class']; ?></td>
                            <td><?php  echo $row['term']; ?></td>
                            <td><?php echo $teachers_name; ?></td>
                            <td><?php  echo $row['subject']; ?></td>
                            <td><?php  echo $row['chapter']; ?></td>
                            <td><?php echo clean($row['question_text']); ?></td>
                            <td>





                                <?php 
                                  

                                //fetching the correct options 

                                $sql8 = query(" SELECT * FROM answer_text WHERE question_id ='$question_id' ");
                            //   $sql8 = query(" SELECT * FROM answer_text  ");
                                 while($ans = mysqli_fetch_array($sql8)){

                                 echo $ans['option_text'];
                                 
                                 }
                                 
                                  
                              
                              
                               

                                    
                                 

                              ?>





                            </td>

                            <td>


                                <table class="table table-bordered" style="border:1px solid lightgray;">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>No</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>





                                        <?php
                              
                             //fetching the correct options 

                           $sql7 = query("SELECT * FROM correct_answer WHERE question_id = ".$question_id." ");

                           $c = 0;

                            while($row7 = mysqli_fetch_array($sql7)){  $c++?>


                                        <tr>
                                            <td><?php echo $c; ?></td>
                                            <td><?php 


$acCC = $row7['correct_option'];

switch ($acCC) {
  case '1':
   $cor = "<i class='fa fa-check text-success'></i>  A"; # code...
  break;

  case '2':
    $cor = "<i class='fa fa-check text-success'></i>  B"; 
  break;
  
  case '3':
    $cor = "<i class='fa fa-check text-success'></i>  C"; 
  break;

   case '4':
    $cor = "<i class='fa fa-check text-success'></i>  D"; 
  break;

   case '5':
    $cor = "<i class='fa fa-check text-success'></i>  E"; 
  break;
  
  default:
    # code...
    break;
}


echo "<li >".$cor."</li>";

                                            
                                            
                                        
                                            
                                            
                                            
                                            ?></td>
                                        </tr>

                                        <?php } ?>

                                    </tbody>

                                </table>










                            </td>
                            <td><?php echo $comp; ?></td>
                            <td><?php echo strip_tags($row['feedback1']); ?></td>
                            <td><?php echo strip_tags($row['feedback2']); ?></td>
                            <td><?php echo strip_tags($row['hint_statement']); ?></td>

                            <td><?php echo strip_tags($row['comment']); ?></td>


                        </tr>

                        <?php } ?>

                    </tbody>





                </table>

            </div>








        </div>
    </div>





</div>
<!--container end-->

</div><!-- Content end -->



<?php  include "includes/footer.php";  ?>