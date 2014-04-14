/**
 * Created by sujandhakal on 10/04/2014.
 */
define(['weather','angular'],function(WeatherApp,Angular){
    'use strict';
    var WunderApiService = function($http){
        this.$http = $http;
        this.getData = function(country,city){
            var forecastDays = [];
            this.$http.get('wunderground-weather.php?co='+country+'&ci='+city)
                .then(function(res){
                    var foreCastArray = res.data.forecast.simpleforecast.forecastday;
                    var todayDate = new Date();
                    angular.forEach(foreCastArray,function(value,index){
                        var today = false;
                        if(todayDate.getFullYear()==value.date.year && todayDate.getDate()==value.date.day && (todayDate.getMonth()+1)==value.date.month){
                            today = true;
                        }
                        //load the data that are current and of future
                        if(todayDate.getDate()<=value.date.day){
                                forecastDays.push({
                                    'day':value.date.weekday,
                                    'month': value.date.monthname + " " +value.date.day,
                                    'icon_url': value.icon_url,
                                    'icon':value.icon,
                                    'maxhumidity':value.maxhumidity,
                                    'minhumidity':value.minhumidity,
                                    'high_c':value.high.celsius,
                                    'high_f':value.high.fahrenheit,
                                    'low_c':value.low.celsius,
                                    'low_f':value.low.fahrenheit,
                                    'sky_icon': value.skyicon,
                                    'year':value.date.year,
                                    'today':today
                                });
                        }
                    });
                });
            return forecastDays;
        }

    };

    WeatherApp.factory("WunderApi",function($http){
          var apiService = new WunderApiService($http);
          return {
            data: function(country,city){
                    return apiService.getData(country,city);
            }
        };
    });

});