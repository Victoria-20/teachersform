<?php  include "includes/db.php";  ?>


<?php 

    if(isset($_POST['classroom'])  AND isset($_POST['subject']) AND isset($_POST['term'])){

      $subject = clean($_POST['subject']);
      $classroom = clean($_POST['classroom']);
      $term = clean($_POST['term']);

  
    $sql2 = query("SELECT * FROM chapters WHERE  classes = '$classroom' AND subject = '$subject'  AND term = '$term' ");   

    if($sql2){

     while($row = mysqli_fetch_array($sql2)){
      
     $result = $row;

     }


     $results =  json_encode($result);

     echo $results;


 }
     
    //echo json_encode($sata);


     //end isset

    }


    ?>
