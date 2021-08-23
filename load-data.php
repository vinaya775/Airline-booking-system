
<?php
    include_once './connect.php';
    $recordNewCount     =       $_GET['count'];
    $origin1 = $_GET['origin'];
    $destination1 = $_GET['destination'];
    $Date1 = $_GET['Date'];



    $sql                 =       "SELECT * FROM flight_details limit $recordNewCount";
    $result              =       mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
           $data   =   mysqli_fetch_all($result,MYSQLI_ASSOC);
           echo json_encode($data);
       }       
 ?>