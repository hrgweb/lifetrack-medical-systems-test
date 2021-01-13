function data() {
  return {
    studyPerDay: document.getElementById("study_per_day").value,
    studyGrowthPerMonth: document.getElementById("study_growth_per_month")
      .value,
    monthsToForecast: document.getElementById("months_to_forecast").value,
  };
}

function validation() {
  var input = data();

  // CHECK IF STUDY PER DAY IS EMPTY
  if (!input.studyPerDay) {
    alert("Study per day is empty");

    return false;
  }

  // CHECK IF STUDY GROWTH PER MONTH IS EMPTY
  if (!input.studyGrowthPerMonth) {
    alert("Study growth per month (%) is empty");

    return false;
  }

  // CHECK IF STUDY GROWTH PER MONTH IS EMPTY
  if (!input.monthsToForecast) {
    alert("Months to forecast is empty");

    return false;
  }

  return true;
}

function validated() {
  return validation() ? true : false;
}

function queryString() {
  var inputs = data();
  var queryStr = "?";

  queryStr += "studyPerDay=" + inputs.studyPerDay + "&";
  queryStr += "studyGrowthPerMonth=" + inputs.studyGrowthPerMonth + "&";
  queryStr += "monthsToForecast=" + inputs.monthsToForecast;

  return queryStr;
}

function src(file) {
  return file + queryString();
}

// SUBMIT THE FORM
document.getElementById("submit").addEventListener("click", function (e) {
  e.preventDefault();

  // CHECK IF VALIDATION FAILS THEN EXIT
  if (!validated()) {
    return;
  }

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", src("php/submit.php"), true);
  xmlhttp.send();
});
