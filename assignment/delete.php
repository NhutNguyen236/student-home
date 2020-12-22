<?php

function deleteFeedback ($id){
  $sql = "DELETE FROM Feedback WHERE id = $id";
  // echo ($sql);
  require 'connection.php';
  if ($conn->query ($sql)){
    return true;
  }
  return false;
}

function deleteContact ($id){
  $sql = "DELETE FROM Contact WHERE id = $id";
  // echo ($sql);
  require 'connection.php';
  if ($conn->query ($sql)){
    return true;
  }
  return false;
}

function deleteNha ($id){
  try{
    $sql = "SELECT F.id FROM Nha N, Feedback F
            WHERE N.id = F.id_nha
                AND N.id = $id";
    require 'connection.php';
    $result = $conn -> query ($sql);
    while ($row = $result -> fetch_assoc()){
      deleteFeedback($row['id']);
    }

    $sql = "DELETE FROM Nha WHERE id = $id";
    $conn ->query ($sql);

    $sql = "SELECT C.id FROM Nha N, Contact C
            WHERE N.id_contact = C.id
                AND N.id = $id";
    $result = $conn -> query ($sql);
    while ($row = $result -> fetch_assoc()){
      deleteFeedback($row['id']);
    }
    return true;
  } catch (Exception $e){
    return false;
  }
}

?>