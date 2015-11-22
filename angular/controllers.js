/*

 CONTROLLERS JS v1.0.1
 EMRAN ARCHITECT & ASSOCIATES. v2.1
 (c) 2015 DCASTALIA, http://dcastalia.com
 License: GPL v3
 Author: MD. Hasan Shahriar
 Author email: hsleonis2@gmail.com

*/

(function (angular) {

    // GLOBALS
    var API = "http://dcastalia.com/projects/web/area/cms/administrator/json/";
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
        $scope.ngdate = new Date();

        // Get menu from cache
        //landing = $localStorage.menu;

        // Load landing settings
       // if (!$localStorage.menu) {
            $http.post(API + "landing_json.json", {})
                .success(function (response) {
                    $localStorage.menu = landing = response;
                    $scope.main_menu = landing.main_menu;
                    $scope.categories = landing.categories;
                    $scope.home_slider = landing.home_slider;
                });
        /*} else {
            $scope.main_menu = landing.main_menu;
            $scope.categories = landing.categories;
            $scope.home_slider = landing.home_slider;
        }*/

        // Generate random element
        $scope.random = function () {
            return 0.5 - Math.random();
        }

        // Pages
        $http.post(API + "allpages.json", {})
            .success(function (response) {
                $localStorage.pages = pages = response;
                $scope.pages = pages = $localStorage.pages;
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
                $scope.projects = projects = $localStorage.projects;
                $scope.randomProjects = shuffleArray($scope.projects);
        });
        
        // Load projects
        $http.post(API + "project_detail.json", {})
            .success(function (response) {
                $localStorage.singles = singles = response;
            });
    });
    // ========================================================== //

    // Home controller
    app.controller('homeController', function ($scope, $http, $routeParams, $location, $localStorage, $stateParams) {
        $scope.$parent.hideMenu = false;

        if (!$localStorage.projects) {
            $http.post(API + "project_list.json", {})
                .success(function (response) {
                    $localStorage.projects = projects = response.product_list;
                    $scope.projects = projects = $localStorage.projects;
                });
        } else {}

        angular.element("#main-wrapper").ready(function () {
            $(".cssloader").hide();
            scrollbar();
        });
        
    });
    // ========================================================== //

    // Project detail control
    app.controller('projectDetailsController', function ($scope, $http, $filter, $routeParams, $location, $localStorage, $stateParams) {
        var nslug = $location.$$url.split('/');
        $scope.$parent.hideMenu = false;
        
        function singleProjects(){
            $scope.project = singles[$stateParams.slug];

            $scope.currentIndex = 1;
            $scope.slickConfig = {
                method: {},
                event: {
                    afterChange: function (event, slick, currentSlide, nextSlide) {
                      $scope.currentIndex = currentSlide+1; // save current index each time
                      $scope.$apply();
                      //console.log($scope.currentIndex);
                      // $('.firstDiv').slickGoTo(4);
                    },
                    init: function (event, slick) {
                      slick.slickGoTo(0);
                      //console.log($scope.currentIndex);
                    }
                }
            };

            $scope.title = $scope.project.title;
            $scope.featDetails = $scope.detailDesc = $scope.project.desc;
            $scope.ptype = $scope.project.type.toLowerCase();
            document.title = $scope.project.title.toUpperCase() + " | " + company;
        }
        
        function nav(){
            var catList = $filter('filter')(projects, { 'project_type' : $scope.project.type }, true);
            var foundItem = $filter('filter')(catList, { 'project_slug' : $scope.project.slug }, true)[0];
            var index = catList.indexOf(foundItem);
            
            var prv = (index>0)?(index-1):(catList.length-1);
            var nxt = (index<catList.length-1)?(index+1):0;
            $scope.prvProject = catList[prv].project_slug;
            $scope.nxtProject = catList[nxt].project_slug;
        }
        
        if (typeof $localStorage.singles==='undefined') {
            $http.post(API + "project_detail.json", {})
                .success(function (response) {
                    $localStorage.singles = singles = response.project_list;
                    singles = $localStorage.singles;
                    $scope.single = singles;
                    singleProjects();
               });
        } else {
            $scope.single = singles = $localStorage.singles;
            singleProjects();
        }
        //projects = $localStorage.projects;
        if (typeof $localStorage.projects==='undefined') {
            $http.post(API + "project_list.json", {})
                .success(function (response) {
                    $scope.projects = $localStorage.projects = projects = response.product_list;
                    nav();
                });
        } else {
            $scope.projects = projects = $localStorage.projects;
            nav();
        }

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
        $scope.$parent.hideMenu = false;
        
        function setTitle(){
            if (typeof $scope.searchProject==='undefined')
                $scope.title = document.title = company;
            else
                $scope.title = document.title = $scope.searchProject.toUpperCase() + " PROJECTS | " + company;

            //$scope.title = $scope.searchProject.toUpperCase() ? $scope.searchProject.toUpperCase() : '';
        }
        
        if (!$localStorage.projects) {
            $http.post(API + "project_list.json", {})
                .success(function (response) {
                    $localStorage.projects = projects = response.product_list;
                    projects = $localStorage.projects;
                    $scope.projectList = projects;
                    setTitle();
                });
        } else {
            projects = $localStorage.projects;
            $scope.projectList = projects;
            setTitle();
        }

        if (nslug[2] === "type" && nslug[3]) {
            $scope.searchProject = nslug[3];
            $scope.$apply();
        }

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
        
        function fullPage(){
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

                    if($scope.secondSlug=='contact-us')
                        $scope.$parent.hideMenu = true;
                }
        }
        
        if (!$localStorage.pages) {
            $http.post(API + "allpages.json", {})
                .success(function (response) {
                    $localStorage.pages = pages = response;
                    $scope.pages = pages = $localStorage.pages;
                    fullPage();
            });
        }
        else{
            $scope.pages = pages = $localStorage.pages;
            fullPage();
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
        
        if (!$localStorage.pages) {
            $http.post(API + "project_detail.json", {})
            .success(function (response) {
                $localStorage.singles = singles = response;
            });
        }
        else{
            $scope.pages = pages = $localStorage.pages;
        }

        angular.element("#main-wrapper").ready(function () {
            $(".cssloader").hide();        
            scrollbar();
        });

    });
    // ======================================================== //

})(window.angular);
