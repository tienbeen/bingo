<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body onload="newCard()">
  <div id="printableArea">
    <form action="">
      Số dòng: <input type="text" id="row">
      <br>
      Số cột: <input type="text" id="column">
      <br>
      Số người chơi: <input type="text" id="table">
      <br>
      <input type="button" value="Tạo table" onclick="return createTable()">
    </form>
  </div>
  <br>
  
  <div id="container">

  </div>

  <script type="text/javascript">
    var usedNums = new Array(76);

      function newCard() {
        //Starting loop through each square card
        for(var i=0; i < 24; i++) {  //<--always this code for loops. change in red
          setSquare(i);
        }
      }

      function setSquare() {
        do {
          var newNum = getNewNum();
        }
        while (usedNums[newNum]);
        usedNums[newNum] = true;
        return newNum;
      }

      function getNewNum() {
        return Math.floor(Math.random() * 75);
      }

      function anotherCard() {
        for(var i=1; i<usedNums.length; i++) {
          usedNums[i] = false;
        }
        
        newCard();
      }




  function createTable() {
    console.log(setSquare());
    var row = document.getElementById("row");
    var column = document.getElementById("column");
    var table = document.getElementById("table");

    if (row.value.length == 0 || column.value.length == 0 || table.value.length == 0) {
      alert("Vui lòng nhập vào số dòng và số cột");
      return false;
    } else if (isNaN(row.value) || isNaN(column.value) || isNaN(table.value)) {
      alert("Vui lòng nhập giá trị số cho số dòng và số cột");
      return false;
    } else {
      var container = document.getElementById("container");

      var countRow = parseInt(row.value);
      var countColumn = parseInt(column.value);
      var countTable = parseInt(table.value);        
      for (var i = 0; i < countTable; i++) {
        var tagTable = document.createElement("table");
        tagTable.setAttribute('border', '1');
        for (var j = 0; j < countRow; j++) {
          var tagRow = document.createElement("tr");
          tagTable.appendChild(tagRow);

          for(var k = 0; k < countColumn; k++) {
            var tagColumn = document.createElement("td");
            var textNode = document.createTextNode(setSquare());
            tagColumn.appendChild(textNode);
            tagRow.appendChild(tagColumn);
          }
        }
        container.appendChild(tagTable);
      }
      return true;
    }
  }
</script>
</body>
</html>