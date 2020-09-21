<?php  include "includes/db.php";  ?>


<?php 


if(isset($_POST['submitQuestion'])){



$teacher = clean($_POST['teacher']);
$complex = clean($_POST['complex']);
$optionstext = $_POST['optionstext'];
$correctOption =  $_POST['correctOption'];
$feedback1 = clean($_POST['feedback1']);
$feedback2 = clean($_POST['feedback2']);
$comment = clean($_POST['comment']);
$question = clean($_POST['question']);
$term = clean($_POST['term']);
$classroom = clean($_POST['classroom']);
$chapter = clean($_POST['chapter_content']);
$subject = clean($_POST['subject']);
$hintstatement = clean($_POST['hintstatement']);




  

//storing questions
   $var = "INSERT INTO temp_questions (teacherid, class, complexity, question_text,term, hint_statement, feedback1,feedback2,comment, subject, chapter)VALUES ('$teacher','$classroom', '$complex', '$question','$term', '$hintstatement', '$feedback1','$feedback2', '$comment', '$subject', '$chapter')";
    $querys = query($var);



    if($querys){


       $question_id = $connection->insert_id;


       //storing text

       foreach ($optionstext as $optext) {


       $P = query("INSERT INTO answer_text(question_id,option_text) VALUES ('$question_id','$optext')");

       }

       //storing correct

      foreach ($correctOption as $crt) {

      $Q = query("INSERT INTO correct_answer(question_id,correct_option) VALUES ('$question_id','$crt')");


       }


    echo "<div class='alert alert-success text-center'> QUESTIONS INSERTED   <script> window.location.href='index.php';</script></div>";
    
    }else{


    echo "FAILED TO INSERTED";
    }
        

}





                
 



?>