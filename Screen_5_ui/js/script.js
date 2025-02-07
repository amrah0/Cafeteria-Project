function displayElement() {
  var x = document.getElementById("Element");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}

function cancel() {
  var y = document.getElementById("cancel");
  if (y.style.display === "none") {
    y.style.display = "flex";
  } else {
    y.style.display = "none";
  }
}

function validateDate() {
  let from = document.forms["dateSearch"]["from"].value;
  let to = document.forms["dateSearch"]["to"].value;
  if (from == "" || to == "") {
    alert("Must Insert Date From & To to Able to Search");
    return false;
  }
  return true;
}
