<?php
$conn = mysqli_connect("localhost", "root", "", "labor10");
$models = '';

if(isset($_POST["marca"]))
{
     if($_POST["marca"] != '')
     {
          $sql = "SELECT * FROM model WHERE marca = '".$_POST["marca"]."'";
     }

     $result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_array($result))
     {
          $models .= '<option value="'.$row['model'].'">'.$row['model'].'</option>';
     }
     echo "$models";
}
?>