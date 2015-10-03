/*
 APP JS v1.0.1
 EMRAN ARCHITECT & ASSOCIATES. v2.1
 (c) 2015 DCASTALIA, http://dcastalia.com
 License: GPL v3
 Author: MD. Hasan Shahriar
 Author email: hsleonis2@gmail.com
  _____   _____           _____ _______       _      _____          
 |  __ \ / ____|   /\    / ____|__   __|/\   | |    |_   _|   /\    
 | |  | | |       /  \  | (___    | |  /  \  | |      | |    /  \   
 | |  | | |      / /\ \  \___ \   | | / /\ \ | |      | |   / /\ \  
 | |__| | |____ / ____ \ ____) |  | |/ ____ \| |____ _| |_ / ____ \ 
 |_____/ \_____/_/    \_\_____/   |_/_/    \_\______|_____/_/    \_\

*/

// App
var app = angular.module('ark', ['ngAnimate', 'ngRoute', 'ngStorage', 'ui.router', 'angularUtils.directives.dirPagination', 'ngSanitize', 'slick']).run(function ($templateCache, $http) {
    $http.get('views/mainView.html', {
        cache: $templateCache
    });
    $http.get('views/pageView.html', {
        cache: $templateCache
    });
    $http.get('views/subpageView.html', {
        cache: $templateCache
    });
    $http.get('views/listView.html', {
        cache: $templateCache
    });
    $http.get('views/projectView.html', {
        cache: $templateCache
    });
    $http.get('views/menu.html', {
        cache: $templateCache
    });
    $http.get('views/feat.html', {
        cache: $templateCache
    });
});

app.directive('bindUnsafeHtml', ['$compile', function ($compile) {
    return function (scope, element, attrs) {
        scope.$watch(
            function (scope) {
                return scope.$eval(attrs.bindUnsafeHtml);
            },
            function (value) {
                element.html(value);
                $compile(element.contents())(scope);
            }
        );
    };
}]);

app.directive('lightgallery', function () {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            if (scope.$last) {

                // ng-repeat is completed
                element.parent().lightGallery();
            }
        }
    };
});