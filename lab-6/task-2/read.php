<?php
require 'db.php';

$sql = "SELECT * FROM notes";
$result = $conn->query($sql);

$notes = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $notes[] = $row;
  }
}

echo json_encode($notes);
