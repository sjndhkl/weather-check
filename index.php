<!doctype html>
<html lang="en" ng-app="weather">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta charset="utf-8">
  <title>Weather Check</title>
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/weather.css">
 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

  <div class="container" ng-controller="WeatherCtrl">

      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" ng-cloak>
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".selection_form">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#" ng-bind="selectedCCLabel"></a>
          </div>
      </div>
    <div class="row" ng-cloak>
      <div class="navbar-collapse collapse selection_form">
			 <form role="form" ng-cloak>
			   <fieldset>
			     <div class="form-group">
 			       <select id="countrySelect" class="form-control" ng-model="selectedCountry" ng-options="opt as opt.label for opt in locations">
 			       </select>
			     </div>
				 <div class="form-group">
  			       <select id="citySelect" class="form-control" ng-model="selectedCity">
  			         <option ng-repeat="dcity in dependentCities" value="{{dcity}}">{{dcity}}</option>
  			       </select>
				 </div>
			   </fieldset>
			 </form>
      </div>
    </div>

	  <div class="row">
          <div ng-repeat="forecastDay in forecastDays" ng-class="{'col-md-2':true,'weather_box':true,'today':forecastDay.today}" ng-cloak>
                <img align="display:inline-block" ng-src="{{forecastDay.icon_url}}">
                 <h1>{{forecastDay.low_c}} &deg;C - {{forecastDay.high_c}} &deg;C</h1>
                 <h1 class="blue">{{forecastDay.minhumidity}}% - {{forecastDay.maxhumidity}}%</h1>
                <h3>{{forecastDay.day}}</h3>
                <h4>{{forecastDay.month}} -  {{forecastDay.year}}</h4>
          </div>
	  </div>
	 

   </div>
	 
  <script data-main="js/weather_main" src="js/libs/require.js"></script>
</body>
</html>
