<?php
include 'dbConn.php';

class collection{

public function __construct(){
  $class1=get_called_class();
  $this->search(6,$class1);
}		
public function search($count,$class1){
    $db=dbConn::getConnection();
    $sql = 'SELECT * FROM '.$class1.' where id< :count1';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':count1', $count);
    $stmt->execute();	
    $rows=$stmt->rowCount();
    echo 'Row count= '.$rows;
    echo '<br>';
    $rowtotal=$stmt->fetchAll();
    $this->displayTable($rowtotal);
  }
public function displayTable($r){
      echo "<table border=2>";
      echo "<tr><th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";

    foreach( $r as $row) {
       echo "<tr>";
            echo "<td>" . $row["id"] . "</td>
			      <td>" . $row["email"] . "</td>
                  <td>" . $row["fname"] . "</td>
                  <td>" . $row["lname"] . "</td>
                  <td>" . $row["phone"] . "</td>
                  <td>" . $row["birthday"] . "</td>
                  <td>" . $row["gender"] . "</td>
                  <td>" . $row["password"] . "</td>";
            echo "</tr>";
  }
echo "</table>";
    
    }
}
class accounts extends collection{
}
?>