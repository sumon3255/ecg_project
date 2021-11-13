<?php

$dataPoints = array();
    include "logic.php";
   foreach($result as $row){
        array_push($dataPoints, array($row['rate']));
    }
 echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
?>