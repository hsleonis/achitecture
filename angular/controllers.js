/*

 CONTROLLERS JS v1.0.1
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

(function (angular) {

    // GLOBALS
    var API = "http://localhost/area/cms/administrator/json/";
    var company = "ARCHITECT EMRAN & ASSOCIATES.";
    var landing = [];
    var pages = [];
    var projects = [];
    var singles = [];
    var slug = '';
    var desc = '';

    var shuffleArray = function (array) {
        var m = array.length,
            t, i;
        while (m) {
            i = Math.floor(Math.random() * m--);
            t = array[m];
            array[m] = array[i];
            array[i] = t;
        }
        return array;
    }

    // ========================================================== //

    // Main control
    app.controller('mainController', function ($scope, $http, $routeParams, $location, $localStorage, $stateParams) {
        $scope.main_menu = [];
        $scope.home_slider = [];
        $scope.categories = [];
        $scope.banner = '';
        $scope.projects = [];
        $scope.slug = '';
        $scope.item = {
            desc: ''
        };

        // Get menu from cache
        landing = $localStorage.menu;

        // Load landing settings
        if (!$localStorage.menu) {
            $http.post(API + "landing_json.json", {})
                .success(function (response) {
                    $localStorage.menu = landing = response;
                    $scope.main_menu = landing.main_menu;
                    $scope.categories = landing.categories;
                    $scope.home_slider = landing.home_slider;
                });
        } else {
            $scope.main_menu = landing.main_menu;
            $scope.categories = landing.categories;
            $scope.home_slider = landing.home_slider;
        }

        // Generate random element
        $scope.random = function () {
            return 0.5 - Math.random();
        }

        // Pages
        $http.post(API + "allpages.json", {})
            .success(function (response) {
                $localStorage.pages = pages = response;
        });

        // Reload settings
        $http.post(API + "landing_json.json", {})
            .success(function (response) {
                $localStorage.menu = landing = response;
            });
        // Load project list
        $http.post(API + "project_list.json", {})
            .success(function (response) {
                $localStorage.projects = projects = response.product_list;
            });
        $scope.projects = projects = $localStorage.projects;
        $scope.randomProjects = shuffleArray($scope.projects);
        // Load projects
        $http.post(API + "project_detail.json", {})
            .success(function (response) {
                $localStorage.singles = singles = response;
            });

        // Menu
        $scope.pages = pages = $localStorage.pages;
    });
    // ========================================================== //

    // Home controller
    app.controller('homeController', function ($scope, $http, $routeParams, $location, $localStorage, $stateParams) {
        $scope.projects = projects = $localStorage.projects;

        if (!$localStorage.projects) {
            $http.post(API + "project_list.json", {})
                .success(function (response) {
                    $localStorage.projects = projects = response.product_list;
                });
        } else {}

        angular.element("#main-wrapper").ready(function () {
            $(".cssloader").hide();
            scrollbar();
        });
        
        $scope.projectCat = 0;
        $scope.projectList = 'ongoing';
        $scope.showProject = function(p){
            if(p==1) $scope.projectList = 'completed';
            else if(p==2) $scope.projectList = 'upcoming';
            else $scope.projectList = 'ongoing';
        }
    });
    // ========================================================== //

    // Project detail control
    app.controller('projectDetailsController', function ($scope, $http, $routeParams, $location, $localStorage, $stateParams) {
        var nslug = $location.$$url.split('/');
        
        singles = $localStorage.singles;
        if (!$localStorage.projects) {
            $http.post(API + "project_detail.json", {})
                .success(function (response) {
                    $localStorage.singles = singles = response.project_list;
                });
        } else {}
        $scope.single = singles;

        $scope.project = singles[$stateParams.slug];
        $scope.title = $scope.project.title;
        $scope.featDetails = $scope.detailDesc = $scope.project.desc;
        $scope.ptype = $scope.project.type.toLowerCase();
        document.title = $scope.project.title.toUpperCase() + " | " + company;
        $scope.featTitle = 'AT A GLANCE';
        
        // Booking Form
        var bookingData = '<form class="ng-pristine ng-valid ng-scope" action="#" method="POST"><p><label for="#">YOUR NAME</label> <input name="" type="text"></p><p><label for="#">EMAIL ADDRESS</label> <input name="" type="text"></p><p><label for="#">MOBILE NUMBER</label> <input name="" type="text"></p><p><label for="#">INTERESTED IN</label> <select name="#"><option value=""></option><option value="residential">Residential</option><option value="commercial">Commercial</option><option value="commercial cum residential">Commercial cum Residential</option><option value="other">Other</option> </select></p><p><label for="#">MESSAGE</label><textarea></textarea></p><p><input value="Send" type="submit"></p></form>';
        
        $scope.featData = function(a){
            if(a==1) {
                $scope.featDetails = $scope.detailDesc;
                $scope.featTitle = 'AT A GLANCE';
            }
            else if(a==2) {
                $scope.featDetails = $scope.title;
                $scope.featTitle = 'FEATURES';
            }
            else if(a==3) {
                $scope.featDetails = bookingData;
                $scope.featTitle = 'BOOK NOW';
            }
            featOpen();
        };

        // READY >>>
        angular.element("#main-wrapper").ready(function () {
            $(".cssloader").hide();
            scrollbar();
        });
    });
    // ========================================================== //

    // Project List Control
    app.controller('listController', function ($scope, $http, $routeParams, $location, $localStorage, $stateParams) {    
        var nslug = $location.$$url.split('/');

        projects = $localStorage.projects;

        if (!$localStorage.projects) {
            $http.post(API + "project_list.json", {})
                .success(function (response) {
                    $localStorage.projects = projects = response.product_list;
                });
        } else {}

        if (nslug[2] === "type" && nslug[3]) {
            $scope.searchProject = nslug[3];
            $scope.$apply;
        }
        $scope.projectList = projects;

        if (!$scope.searchProject)
            document.title = company;
        else
            document.title = $scope.searchProject.toUpperCase() + " PROJECTS | " + company;

        $scope.title = $scope.searchProject.toUpperCase() ? $scope.searchProject.toUpperCase() : '';

        $scope.proFilter = '';
        $scope.filter_pro = function (data) {
            $scope.proFilter = data;
        }
        
        $scope.showProject = function(p){
            $scope.projectCat = p;
        }

        angular.element("#main-wrapper").ready(function () {
            $(".cssloader").hide();        
            scrollbar();
        });
    });
    // ========================================================== //

    // Page controller
    app.controller('secondController', function ($scope, $http, $routeParams, $location, $localStorage, $stateParams) {
        var pageNo = 0;
        var nslug = $location.$$url.split('/');

        if ($stateParams.slug)
            var secondPage = pages[$stateParams.slug];

        if (secondPage) {
            $scope.secondTitle = secondPage.page_data.page_title;
            document.title = secondPage.page_data.page_title + " | " + company;
            if (secondPage.page_images[0].image != 'undefined')
                $scope.secondImage = secondPage.page_images[0].image;
            else $scope.secondImage = '';
            $scope.secondShortDesc = secondPage.page_data.page_desc;
            $scope.secondFullDesc = secondPage.page_data.page_desc;
            $scope.secondChildPage = secondPage.child_pages.menu;
            $scope.secondSlug = secondPage.page_data.page_slug;

        }

        angular.element("#main-wrapper").ready(function () {
            $(".cssloader").hide();        
            scrollbar();
        });
    });
    // ========================================================== //

    // Detail controller
    app.controller('detailController', function ($scope, $http, $routeParams, $location, $localStorage, $stateParams) {
        var nslug = $location.$$url.split('/');

        if ($stateParams.desc) {
            var detailPage = pages[$stateParams.slug].child_pages[$stateParams.desc];
        } else if (nslug[1] === "page" && nslug[3]) {
            var detailPage = pages[nslug[2]].child_pages[nslug[3]];
        }

        if (detailPage) {
            $scope.detailTitle = detailPage.page_data.page_title;
            document.title = detailPage.page_data.page_title + " | " + company;
            $scope.detailDesc = detailPage.page_data.page_desc;
            $scope.pageParentTitle = pages[nslug[2]].page_data.page_title;
            $scope.pageParentSlug = pages[nslug[2]].page_data.page_slug;
            $scope.pageMenu = pages[nslug[2]].child_pages.menu;
        } else {
            $scope.detailTitle = "Page not found";
            $scope.detailDesc = "We can't find what you are looking for.";
        }

        angular.element("#main-wrapper").ready(function () {
            $(".cssloader").hide();        
            scrollbar();
        });

    });
    // ======================================================== //

})(window.angular);