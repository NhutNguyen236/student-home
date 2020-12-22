<?php 

    require 'function.php';
    $idnha = $_GET['idnha'];
    $feedbeck = $_GET['text'];
    $datetime = getCurrentDateTime();


    try {
        require 'connection.php';
        $sql = "INSERT INTO Feedback (feedback, time, id_nha)
                    VALUES ( ?, ? ,?)";
        $stm = $conn ->prepare ($sql);
        // echo (var_dump($stm));
        $stm -> bind_param ('ssi', $feedbeck, $datetime, $idnha);
        if ($stm ->execute()){
            header ('Location: chitiet.php?aleart=success');
            exit;
        } else {
            header ('Location: chitiet.php?aleart=fail');
            exit;
        }

    } catch (Exception $e){
        header ('Location: chitiet.php?aleart=fail');
            exit;
    }

?>