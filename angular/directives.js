/*

 DIRECTIVES JS v1.0.1
 EMRAN ARCHITECT & ASSOCIATES. v2.1
 (c) 2015 DCASTALIA, http://dcastalia.com
 License: GPL v3
 Author: MD. Hasan Shahriar
 Author email: hsleonis2@gmail.com
 
*/

var app = angular.module('ark');

app.filter('highlight', function($sce) {
    return function(text, phrase) {
      if (phrase && phrase.length>2) {
          text = text.replace(new RegExp('('+phrase+')', 'gi'),
        '<span class="highlighted">$1</span>');
      }
        setTimeout(function(){
            $('.ps-container').perfectScrollbar('update');
        },5);
      return $sce.trustAsHtml(text);
  }
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
                element.parent().lightGallery({
                    download: false
                });
            }
        }
    };
});

app.directive('ngTopMenu', function() {
    return {
        restrict: 'AM',
        link: function(scope, element, attrs){
        },
        templateUrl: 'views/topmenu.html',
    }
});

app.directive('ngBottomMenu', function() {
    return {
        restrict: 'AM',
        link: function(scope, element, attrs){
        },
        templateUrl: 'views/bottommenu.html',
    }
});

app.directive('ngCopyright', function() {
    return {
        restrict: 'AM',
        link: function(scope, element, attrs){
        },
        templateUrl: 'views/copyright.html',
    }
});

app.directive('ngScroll', function() {
    return {
        restrict: 'AM',
        link: function(scope, element, attrs){
            $(document).ready(function () {
                element.perfectScrollbar({
                    maxScrollbarLength: 15,
                    minScrollbarLength: 15
                });
                setTimeout(function(){
                    element.perfectScrollbar('update');
                },50);
            });
        }
    }
});

app.directive('ngImageLoadAnimation', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.css({'opacity': 0});
            element.imagesLoaded(function(){
                $(element).animate({
                    'opacity': 1
                }, 1000,
                    function() {
                });
            });
        }
    }
});