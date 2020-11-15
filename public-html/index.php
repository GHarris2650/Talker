<?php
$website = 'http://www.zavrel.net';
?>
<!DOCTYPE html>
<head>
  <title>Hello World!</title>
</head>

<body>
  <h1>Hello World!</h1>
  <a href="<?php echo $website; ?>"><?php echo "ZAVREL CONSULTING: $website"; ?></a>
  <?php
  $trueValue = true;
  $falseValue = false;
  ?>
  <p><?php echo "This is the content of trueValue: $trueValue"; ?></p>
  <p><?php echo "This is the content of trueValue: $falseValue"; ?></p>  

  <p>
      <?php 
      $countries = array('Finland', 'France', 'Spain');
      print_r($countries);
      $countries[] = 'Italy';
      print_r($countries);
      ?>
  </p>

<p> 
  <?php 
  echo $countries[1];
  ?>
</p>
  
<p> 
  <?php 
  echo count ($countries);
  ?>
</p>


<p> 
  <?php 
  $age = array(
      'John' => 35,
      'Paul' => 24,
      'George' => 27
  );
  print_r($age);
  ?>
</p>

<p> 
  <?php 
  echo $age['Paul'];
  ?>
</p>

<script>
  var cars = ["Mercedes", "volvo", "BMW", "Tesla"];
  for (i in cars) {
      console.log("The current car is" + cars[i]);
  }
</script>

<?php 
  $cars = ["Mercedes", "volvo", "BMW", "Tesla"];
  foreach ($cars as $i) {
    echo "The current car is $i<br>";
  }
?>

<p> 
    <?php 
       class carBluePrint {
          //Here goes properties and methods
          

          //Constructor
          public function __construct($newColor, $newMake)
          {
            $this->color = $newColor;
            $this->make = $newMake;
          }

          //setter method
          public function setColor($newColor) {
            $this->color = $newColor;
          }

          //getter method
          public function getColor() {
            return "<br>New color is: " . $this->color . "<br>";
          }

      }

      $firstRealCar = new carBluePrint('green', 'Volvo');

      var_dump($firstRealCar);
      echo $firstRealCar ->color;

      $firstRealCar->setColor("yellow");
      echo $firstRealCar->getColor();

      $secondRealCar = new carBluePrint('brown', 'Mercedes');

      
      echo $secondRealCar->getColor();
      var_dump($secondRealCar);



    ?>

</p>

<p> 

      <?php 

          class sportCarBluePrint extends carBluePrint{

              //Constructor
              public function __construct($newColor, $newMake, $newSpoiler)
              {
                parent::__construct($newColor, $newMake);
                $this->spoiler = $newSpoiler;
              }

              public function activateSpoiler(){
                return "<br><strong>SPOILER ACTIVE!</strong><br>";
              }

          }

          $firstSportCar = new sportCarBluePrint('magenta', 'Porsche', 'tail');
          $firstSportCar->setColor("Pink");
          var_dump($firstSportCar);
          $firstSportCar->activateSpoiler();

      ?>

</p>

<p> 

      <?php 

          function divideOneByNumber($number){
            if ($number == 0) {
              throw new Exception("Division by zero is not allowed.");
            }
            return 1/$number;
          }

          try {
              echo "the result of division is: " . divideOneByNumber(0);
          }

          catch(Exception $e) {
            echo 'Message:' . $e->getMessage();
          }
      ?>

</p>

</body>
