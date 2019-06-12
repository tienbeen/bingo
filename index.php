<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" media="screen" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <title></title>
</head>
<body>
  <div id="allsite">
    <div id="printableArea" class="col-md-9 part">
      <div id="container">

      </div>
    </div>
    <div class="styleform1" id="formTable" class="col-md-3">
      <div class="text">Bingo :)</div>
      <div class="styleform">

        <form action="">
          <label>Số cột và số cột:</label> 
          <input type="text" name="socot" id="column" placeholder="Nhập số cột">
          <br>
          <label>Số người chơi:</label>
          <input type="text" name="songuoichoi" id="table" placeholder="Nhập số người chơi">
          <br>
          <input type="button" value="Create table" class="button" onclick="return createTable()">
          <input type="button" value="Reload Table" class="button" onclick="return reload()">
          <input type="button" onclick="printDiv('printableArea')" class="button" value="Print" />
          <a href="dial.php" class="button dial">Dial Number</a>
        </form>
      </div>
      <div class="randomNumber" id="randomNumber">

        
      </div>
    </div>
    
  </div>
  
  <script type="text/javascript" src="./js/bingo.js"></script>
</body>
</html>