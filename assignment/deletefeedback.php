<?php 
    $id = $_GET['id'];
    require 'delete.php';
    $bool = deleleFeedback($id);
    if ($bool){
        header ('Location: chitiet.php?aleart=success');
        exit;
    }
    header ('Location: chitiet.php?aleart=fail');
    exit;
?>