require.config({
	
	paths:{
		'jquery': "libs/jquery-1.10.1.min",
		'angular':"libs/angular.min",
		'bootstrap':"libs/bootstrap",
	},
	shim:{
		'weather':{
			deps: ['angular','jquery','bootstrap']
		},
		'angular':{
			exports: 'angular'
		},
		'bootstrap':{
			deps:['jquery']
		}
	}
	
});
require([
	'weather','weather/controllers/WeatherCtrl','weather/services/WunderAPIService'
	],function(weather){
		angular.bootstrap(document,['weather']);
	});