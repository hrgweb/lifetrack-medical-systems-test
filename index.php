<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lifetrack Medical Systems - Test</title>
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class=" container">
    <!-- INPUTS -->
    <form>
      <!-- CURRENT NUMBER STUDY PER DAY -->
      <div class="inputs">
        <label for="study_per_day">Study per day</label>
        <input type="number" id="study_per_day" name="study_per_day" required>
      </div>

      <!-- NUMBER OF STUDY GROWTH PER MONTH -->
      <div class="inputs">
        <label for="study_growth_per_month">Study growth per moth</label>
        <input type="number" id="study_growth_per_month" name="study_growth_per_month" required>
      </div>

      <!-- MONTHS TO FORECAST -->
      <div class="inputs">
        <label for="months_to_forecast">Months to forecast</label>
        <input type="number" id="months_to_forecast" name="months_to_forecast" required>
      </div>

      <button type="submit" class="btn btn-default" id="submit">Submit</button>
    </form>

    <!-- RESULT -->
    <div id="result"></div>
  </div>

  <script src="js/script.js"></script>
</body>

</html>