<?php
  $gender = $weight = $height = $age = "";
  $bmr = $tdee = $pal = "";
  $h_pal0 = $h_pal1 = $h_pal2 = $h_pal3 = $h_pal4 = $h_pal5 = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form inputs
    $gender = isset($_POST['g']) ? $_POST['g'] : "";
    $weight = isset($_POST['weight']) ? $_POST['weight'] : 0;
    $height = isset($_POST['height']) ? $_POST['height'] : 0;
    $age = isset($_POST['age']) ? $_POST['age'] : 0;
  }
  echo "g"; var_dump($gender);
  echo "w"; var_dump($weight);
  echo "h"; var_dump($height);
  echo "a"; var_dump($age);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kalorienrechner</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <form method="post">
    <div class="form-group">
      <label>Geschlecht: </label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="g" value="m"> <label class="form-check-label">Mann</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="g" value="w"> <label class="form-check-label">Frau</label>
      </div>
    </div>

    <div class="form-group">
      <label>Gewicht (kg)</label> <input type="number" class="form-control" name="weight" value="<?php echo $weight; ?>">
    </div>

    <div class="form-group">
      <label>Größe (cm)</label> <input type="number" class="form-control" name="height" value="<?php echo $height; ?>">
    </div>

    <div class="form-group">
      <label>Alter (Jahre)</label> <input type="number" class="form-control" name="age" value="<?php echo $age; ?>">
    </div>

    <div class="form-group">

    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="usePAL" value="1"> <label class="form-check-label">TDEE mit PAL berechnen</label>
    </div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="calculate" value="Berechnen">
    </div>
  </form>
  <small>Felder markiert mit * sind Pflichtfelder.</small>

  
</body>

</html>