<html>
<head>
<title>ImportAuto.ro</title>
<style type="text/css">
* {
    margin: 5px;
    padding: 5px;
}

body {
    font-size: 120%;
    background: #F8F8FF;
}

table {
margin: 8px;
text-align: center;
width: 100%;
}

th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #5f9ea0;
color: white;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}

.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5f9ea0;
    border: none;
    border-radius: 5px;
}
</style>
</head>
<body>


<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "labor10";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect("localhost", "root", "", "labor10");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, marca, model, an, cp, cmc, combustibil, pret, culoare, caroserie, usi, descriere FROM car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr> <th>ID</th> <th>Marca</th> <th>Model</th> <th>An</th> <th>CP</th> <th>CMC</th> <th>Combustibil</th>
         <th>Pret</th> <th>Culoare</th> <th>Caroserie</th> <th>Usi</th> <th>Descriere</th> </tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr> <td>".$row["id"]."</td> <td>".$row["marca"]."</td> <td>".$row["model"]."</td> <td>".$row["an"]."</td>
    <td>".$row["cp"]."</td> <td>".$row["cmc"]."</td> <td>".$row["combustibil"]."</td> <td>".$row["pret"]."</td>
    <td>".$row["culoare"]."</td> <td>".$row["caroserie"]."</td> <td>".$row["usi"]."</td> <td>".$row["descriere"]."</td> </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
  
  <br>
  <br>
  <a href="home.html" class="btn">Pagina de start</a>
</body>
</html>