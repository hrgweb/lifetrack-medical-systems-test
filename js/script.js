function data() {
  var inputs = {
    studyPerDay: document.getElementById("study_per_day").value,
    studyPerMonth: document.getElementById("study_growth_per_month").value,
    monthsToForecast: document.getElementById("months_to_forecast").value,
  };

  var queryStr = "?";

  queryStr += "studyPerDay=" + inputs.studyPerDay + "&";
  queryStr += "studyPerMonth=" + inputs.studyPerMonth + "&";
  queryStr += "monthsToForecast=" + inputs.monthsToForecast;

  return queryStr;
}

function src(file) {
  return file + data();
}

// SUBMIT THE FORM
function onSubmit() {
  document.getElementById("submit").addEventListener("click", function (e) {
    e.preventDefault();

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("result").innerHTML = this.responseText;
      }
    };

    xmlhttp.open("GET", src("php/submit.php"), true);
    xmlhttp.send();
  });
}

onSubmit();
