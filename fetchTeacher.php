<?php  include "includes/db.php";  ?>


<?php  

                
 

    if(isset($_POST['teacher'])){

    $teacher_id = clean($_POST['teacher']);

   // $data = array();

    $sql2 = query("SELECT * FROM teachers WHERE id = '$teacher_id' ");

     while($row = mysqli_fetch_array($sql2)){

      
     $result = $row;
        
     }


     $results = json_encode($result);
     
     echo $results;

    }


    ?>