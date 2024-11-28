<?php
  $gender = $weight = $height = $age = "";
  $bmr = $tdee = $pal = 0;
  $h_pal0 = $h_pal1 = $h_pal2 = $h_pal3 = $h_pal4 = $h_pal5 = 0;
  $f_weight = $f_height = $f_age = 0;
  $usePAL = 0;
  
  

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Read Input Values
      //isset necessary bc: on first loading of page, nothing's submitted yet
      $gender = isset($_POST['rbGender']) ? $_POST['rbGender'] : ""; 
      $weight = isset($_POST['tbWeight']) ? (int)$_POST['tbWeight'] : 0;
      $height = isset($_POST['tbHeight']) ? (int)$_POST['tbHeight'] : 0;
      $age = isset($_POST['tbAge']) ? (int)$_POST['tbAge'] : 0;
      $usePAL = isset($_POST['cbPAL']) ? (bool)$_POST['cbPAL'] : false;
      
  }

  // Check variables
  echo "g"; var_dump($gender);
  echo "w"; var_dump($weight);
  echo "h"; var_dump($height);
  echo "a"; var_dump($age);

  $bmr = (655.1+66.47)/2;
  $f_weight = (9.6+13.7)/2;
  $f_height = (1.8+5)/2;
  $f_age = (4.7+6.8)/2;
  //Find Factors
  if($gender == "f"){
    $
    $bmr = 655.1;
    $f_weight = 9.6;
    $f_height = 1.8;
    $f_age = 4.7;
  } elseif ($gender == "m"){
    $bmr = 66.47;
    $f_weight = 13.7;
    $f_height = 5;
    $f_age = 6.8;
  } else {
    echo "Kein Geschlecht gewählt, der mittelwert sämtlicher Einzelfaktoren wird verwendet. Das Ergebnis ist vmtl. komplett daneben...";
    
  }

  //Calculate BMR
  $bmr += (int)$weight*$f_weight;
  $bmr += (int)$height*$f_height;
  $bmr -= (int)$age*$f_age;



  
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

<h1>Werte eingeben</h1>
<form method="post">
  <h2>Für BMR</h2>
    <div class="form-group">
      <label>Geschlecht: </label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="rbGender" value="m" <?php if ($gender == "m")  echo ' checked="checked"';?>> <label class="form-check-label">Mann</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="rbGender" value="f" <?php if ($gender == "f")  echo ' checked="checked"';?>> <label class="form-check-label">Frau</label>
      </div>
    </div>

    <div class="form-group">
      <label>Gewicht (kg)</label> <input type="number" class="form-control" name="tbWeight" value="<?php echo $weight; ?>">
    </div>

    <div class="form-group">
      <label>Größe (cm)</label> <input type="number" class="form-control" name="tbHeight" value="<?php echo $height; ?>">
    </div>

    <div class="form-group">
      <label>Alter (Jahre)</label> <input type="number" class="form-control" name="tbAge" value="<?php echo $age; ?>">
    </div>

    <div class="form-group">

    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="cbPAL" value="usePAL"> <label class="form-check-label">TDEE mit PAL berechnen</label>
    </div>
    
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="btnCalculate" value="Berechnen">
    </div>

    <h2>Für TDEE</h2>
    
    <div class="form-group">
      <label>Liegend (wach)</label> <input type="number" step="0.5" class="form-control" name="h_pal0" disabled value="<?php echo $h_pal0; ?>">
    </div>

    <div class="form-group">
      <label>Liegend (wach)</label> <input type="number" step="0.5" class="form-control" name="h_pal1" value="<?php echo $h_pal1; ?>">
    </div>
    
    <div class="form-group">
      <label>Liegend (wach)</label> <input type="number" step="0.5" class="form-control" name="h_pal2" value="<?php echo $h_pal2; ?>">
    </div>
    
    <div class="form-group">
      <label>Liegend (wach)</label> <input type="number" step="0.5" class="form-control" name="h_pal3" value="<?php echo $h_pal3; ?>">
    </div>
    
    <div class="form-group">
      <label>Liegend (wach)</label> <input type="number" step="0.5" class="form-control" name="h_pal4" value="<?php echo $h_pal4; ?>">
    </div>
    
    <div class="form-group">
      <label>Liegend (wach)</label> <input type="number" step="0.5" class="form-control" name="h_pal5" value="<?php echo $h_pal5; ?>">
    </div>

  </form>
  <small>Felder markiert mit * sind Pflichtfelder.</small>

  <br/>

  <h1>Ergebnis</h1>
  <h2>BMR: <?php echo $bmr ?></h2>
  <p>Dein Basisumsatz (BMR) beträgt: <?php echo $bmr ?></p>
  
  <h2>TDEE</h2>
  

  
</body>

</html>