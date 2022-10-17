// Below Function validate Empty ZIP, only digits allowed and zip lenth and changes Background color to red, yellow and orange

function validatezip(field)
{
  if (field == "") {
      changeBackground('#ff6666');
      return "No ZIP Code was entered.\n";
  } 
  else if (/[^0-9]/.test(field)){
    changeBackground('#f0f075');
    return "Only 0-9 allowed in ZIP Code.\n";
  }
  else if (field.length < 5){
  changeBackground('#ffcc99');
  return "Zip must be at least 5 Digits.\n";
  }
  return ""
}

 // Function to change webpage background color
 function changeBackground(color){
  document.body.style.background = color;
 }

