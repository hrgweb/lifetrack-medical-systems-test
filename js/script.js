// SUBMIT THE FORM
document.getElementById("submit").addEventListener("click", function (e) {
  e.preventDefault();

  // alert("clicking...");

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };

  // xmlhttp.open("GET", "gethint.php?q=" + str, true);
  xmlhttp.open("GET", "php/submit.php", true);
  xmlhttp.send();
});
