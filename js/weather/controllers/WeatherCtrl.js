define(['weather','jquery','angular'],function(weatherApp,jQuery,angular){
	'use strict';
	var WeatherCtrl = function($scope,$http,WunderApi){
		$scope.app_title  = "Weather Check";
		$scope.cities = {
			"AU":["Melbourne","Sydney","Perth","Brisbane","Adelaide","Darwin"],
			"NP":["Kathmandu","Pokhara"],
			"UK":["London"]
		};
		$scope.locations = [
			{label:"Nepal",value:"NP"},
			{label:"Australia",value:"AU"},
			{label:"United Kingdom",value:"UK"}
		];
		
		$scope.selectedCountry = $scope.locations[1];
		$scope.selectedCity = "Melbourne";
        $scope.selectedCCLabel = $scope.selectedCity + ", " + $scope.selectedCountry.label;
        $scope.forecastDays = [];
		$scope.dependentCities = $scope.cities[$scope.selectedCountry];
		
		$scope.$watch("selectedCity", function(newValue, oldValue) {
			if(newValue!=oldValue){
                $scope.selectedCCLabel = $scope.selectedCity + ", " + $scope.selectedCountry.label;
                $scope.forecastDays = WunderApi.data($scope.selectedCountry.value,$scope.selectedCity);
			}
		});
		$scope.$watch("selectedCountry", function(newValue, oldValue) {
				$scope.selectedCity = $scope.cities[newValue.value][0];
				$scope.dependentCities = $scope.cities[newValue.value];
		});

        $scope.forecastDays = WunderApi.data($scope.selectedCountry.value,$scope.selectedCity);
	};
	weatherApp.controller("WeatherCtrl",WeatherCtrl);
});