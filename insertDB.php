<!DOCTYPE html>
<html lang="en">

<?php
$conn = new mysqli("localhost", "root", "", "labor10");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function fill_brand($conn){
  $result = $conn->query("SELECT DISTINCT marca FROM model ORDER BY marca");
  $brandOptions = '';
  while ($row = mysqli_fetch_array($result)) {
    $brandOptions .= '<option value="'.$row['marca'].'">'.$row['marca'].'</option>';
  }
  return $brandOptions;
}
?>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stilizareInsertDB.css">
  <title>Import Auto</title>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <div class="header">
    <h>ImportAuto.ro</h>
  </div>
  <div class="content">
      <form method="post">
        <label for="text" name="marca">Marca:</label>
        <select class="input-group" type="text" name="marca" id="marca">
          <option value="Marca" disabled selected>Marca</option>
          <?php echo fill_brand($conn)?>
        </select>
        <br>
        <label class="input-group" for="text" name="model">Model:</label>
        <select class="input-group" type="text" name="model_show" id="model_show">
          <option value="Model" id="model" disabled selected>Model</option>
        </select>
        <br>
        <label class="input-group" for="text" name="an">An de fabricatie:</label>
        <input class="input-group" type="text" name="an" id="an" min="1900" max="2021">
        <br>
        <label class="input-group" for="text" name="fuel">Combustibil:</label>
        <select class="input-group" type="text" name="fuel" id="fuel">
          <option id="fuel" value="Fuel" disabled selected>Combustibil</option>
          <option id="fuel" value="Benzina">Benzina</option>
          <option id="fuel" value="Diesel">Diesel</option>
          <option id="fuel" value="GPL">GPL</option>
        </select>
        <br>
        <label class="input-group" for="cp" name="cp">Puterea motorului(cp):</label>
        <input class="input-group" type="number" name="cp" id="cp">
        <br>
        <label for="cmc" name="cmc">Cilindree:</label>
        <input type="number" name="cmc" id="cmc">
        <br>
        <label class="input-group" for="caroserie" name="caroserie">Tipul caroseriei:</label>
        <select class="input-group" type="text" name="caroserie" id="caroserie">
          <option id="caroserie" value="Caroserie" disabled selected>Caroserie</option>
          <option id="caroserie" value="Berlina">Berlina</option>
          <option id="caroserie" value="Cabrio">Cabrio</option>
          <option id="caroserie" value="Coupe">Coupe</option>
          <option id="caroserie" value="Hatchback">Hatchback</option>
          <option id="caroserie" value="Limousine">Limousine</option>
          <option id="caroserie" value="SUV">SUV</option>
          <option id="caroserie" value="Off-Road">Off-Road</option>
        </select>
        <br>
        <label class="input-group" for="color-choice">Culoare:</label>
        <select class="input-group" name="color" id="color">
          <option id="color" value="Color" disabled selected>Culoare</option>
          <option id="color" value="Alb">Alb</option>
          <option id="color" value="Albastru">Albastru</option>
          <option id="color" value="Cameleon">Cameleon</option>
          <option id="color" value="Galben">Galben</option>
          <option id="color" value="Gri">Gri</option>
          <option id="color" value="Maro">Maro</option>
          <option id="color" value="Mov">Mov</option>
          <option id="color" value="Negru">Negru</option>
          <option id="color" value="Portocaliu">Portocaliu</option>
          <option id="color" value="Verde">Verde</option>
        </select>
        <br>
        <label class="input-group" for="usi" name="usi">Numar de usi:</label>
        <select class="input-group" type="number" name="usi" id="usi">
          <option id="usi" value="Usi" disabled selected>Usi</option>
          <option id="usi" value="2">2/3</option>
          <option id="usi" value="4">4/5</option>
        </select>
        <br>
        <label class="input-group" for="pret" name="pret">Pret:</label>
        <input class="input-group" type="number" name="pret" id="pret">
        <br>
        <textarea class="input-group" id="descriere" name="descriere" rows="10" cols="50" maxlength="500" placeholder="Adauga o descriere..."></textarea>
        <br>
        <input class="btn" type="submit" name="submit" value="Insert">

        <!-- butoane cu comenzi pentru site -->
        <br>
        <br>
        <a href="home.html" class="btn">Pagina de start</a>
        <br>
        <br>
        <a href="selectDB.php" class="btn">Vizualizare baza de date</a>
        <br>
        <br>
        <a href="updateDB.php" class="btn">Actualizare baza de date</a>
        <br>
        <br>
        <a href="deleteDB.php" class="btn">Stergere din baza de date</a>
        </form>
  </div>

  
  <?php
  $conn = new mysqli("localhost", "root", "", "labor10");

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST["submit"])){
    if(!empty($_POST["an"]) && !empty($_POST["cp"]) && !empty($_POST["cmc"]) && !empty($_POST["cmc"]) && !empty($_POST["pret"]) && !empty($_POST["descriere"])) {
        $marca = $_POST["marca"];
        $model = $_POST["model_show"];
        $an = $_POST["an"];
        $combustibil = $_POST["fuel"];
        $cp = $_POST["cp"];
        $cmc = $_POST["cmc"];
        $caroserie = $_POST["caroserie"];
        $pret = $_POST["pret"];
        $culoare = $_POST["color"];
        $usi = $_POST["usi"];
        $descr = $_POST['descriere'];

        $result = $conn->query("INSERT INTO car(marca, model, an, cp, cmc, combustibil, pret, culoare, caroserie, usi, descriere)
        VALUES ('{$marca}','{$model}','{$an}','{$cp}','{$cmc}','{$combustibil}','{$pret}','{$culoare}','{$caroserie}','{$usi}','{$descr}')");

        if(mysqli_affected_rows($conn) == 1){
          echo "Datele au fost inserate cu succes!";
        }
        else{
          echo "errroooooor";
        }
      }
      else{
        echo "Please insert data first!";
      }
  }
  mysqli_close($conn);
  ?>
</body>
</html>

<script>
$(document).ready(function(){
     $('#marca').change(function(){
          var marca = $(this).val();
          $.ajax({
               url:"load_model.php",
               method:"POST",
               data:{marca:marca}, 
               success:function(gigel)
               {
                 $("#model_show").html(gigel);
               }
          });
     });
});
</script>
