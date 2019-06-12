
function reload(){
  $('#container').html('');
  createTable();
}
function addClass(){
  var formTable = document.getElementById("formTable");
  formTable.classList.add("formTable");
  var printableArea = document.getElementById("printableArea");
  printableArea.classList.add("printableArea");
  var randomNumber = document.getElementById("randomNumber");
  randomNumber.classList.add("Number");
}


function createTable() {
  addClass();
  var column = document.getElementById("column");
  var table = document.getElementById("table");
  if (column.value.length == 0 || table.value.length == 0) {
    alert("Vui lòng nhập vào số dòng và số cột");
    return false;
  } else if (isNaN(column.value) || isNaN(table.value)) {
    alert("Vui lòng nhập giá trị số cho số dòng và số cột");
    return false;
  } else {
    var container = document.getElementById("container");
    var countColumn = parseInt(column.value);
    var countTable = parseInt(table.value);
    var maxnumber = countColumn*countColumn*3;
    var usedNums = new Array(maxnumber);
    if (countColumn > 20) {
      alert('số dòng hoặc số cột của bạn lớn hơn 20! vui lòng nhập lại');
    }else{
        if (countColumn%2 == 0) {
          alert('bạn phải nhập hàng là số lẻ'); 
        }else{
          function getNewNumber() {
            var n;
            do {
              n = Math.floor(Math.random() * maxnumber + 1);
            } while (usedNums[n]);
            usedNums[n] = true;
            return n;
          }

          for (var i = 0; i < countTable; i++) {
            if (i % 4 == 0) {
              var tagdiv = document.createElement("div");
              tagdiv.classList.add("mystyle");
              container.appendChild(tagdiv);
            }
            usedNums.splice(0, usedNums.length);
            var tagTable = document.createElement("table");
            var caption = document.createElement("caption");
            var img = document.createElement("img");
            img.src = "image/logobingo3.png";
            img.width = "420";
            tagTable.appendChild(caption);
            caption.appendChild(img);
            tagTable.setAttribute('border', '1');
            for (var j = 0; j < countColumn; j++) {
              var tagRow = document.createElement("tr");
              tagTable.appendChild(tagRow);

              for(var k = 0; k < countColumn; k++) {
                var tagColumn = document.createElement("td");
                if (k == ((countColumn-1)/2) && j == ((countColumn-1)/2)) {
                  var textNode = document.createTextNode('');
                }
                else{
                  var textNode = document.createTextNode(('0' + getNewNumber()).slice(-2));
                }
                var tagspan = document.createElement("span");
                tagColumn.appendChild(tagspan);
                tagspan.appendChild(textNode);
                tagRow.appendChild(tagColumn);
              }

            }
            container.appendChild(tagTable);
            
          }
          return true;
        }
      }
    }
  }






function Dial(){
  var usedNums = new Array(75);
  myFunction();
  function autoNumber() {
  var n;
  do {
    n = Math.floor(Math.random() * 75 + 1);
  } while (usedNums[n]);
  usedNums[n] = true;
  return n;
}

function returnNumber(){
  var numberR = autoNumber();
  var textNode = document.createTextNode(('0' + getNewNumber()).slice(-2));
  var tagspanid = document.getElementById("valueSpan");
  tagspanid.appendChild(textNode);
  return numberR;
}

function resultNumber(){
  var numberN = returnNumber();
  var textNode = document.createTextNode(('0' + getNewNumber()).slice(-2));
  var tagpid = document.getElementById("numberR");
  var tagb = document.createElement("b");
  tagb.classList.add("styleb");
  tagpid.appendChild(tagb);
  tagb.appendChild(textNode);
}

function reloadDial(){
  $('#valueSpan').html('');
  resultNumber();
}
function myFunction() {
  var interval = setInterval(function(){
    reloadDial();
  }, 3000);
}

}


// Print HTML
function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 var originalContents = document.body.innerHTML;

 document.body.innerHTML = printContents;

 window.print();

 document.body.innerHTML = originalContents;
}
