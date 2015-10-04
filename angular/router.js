/*

 ROUTER JS v1.0.1
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

// Router
app.config(function ($stateProvider, $urlRouterProvider, $locationProvider) {
    $locationProvider.html5Mode(true);

    $stateProvider
        .state('index', {
            url: "/",
            views: {
                "mainView": {
                    templateUrl: "views/mainView.html",
                    controller: "homeController"
                }
            }
        })
        .state('testState', {
            url: "/test",
            views: {
                "mainView": {
                    templateUrl: "views/test.html",
                    controller: "homeController"
                }
            }
        })
        .state('secondViewState', {
            url: "/page/:slug",
            views: {
                "mainView": {
                    templateUrl: "views/pageView.html",
                    controller: "secondController"
                }
            }
        })
        .state('detailViewState', {
            url: "/page/:slug/:desc",
            views: {
                "mainView": {
                    templateUrl: "views/detailView.html",
                    controller: "detailController"
                }
            }
        })
        .state('projectOnlyState', {
            url: "/project/:slug",
            views: {
                "mainView": {
                    templateUrl: "views/listView.html",
                    controller: "rightPanelController"
                }
            }
        })
        .state('projectListState', {
            url: "/project/type/:slug",
            views: {
                "mainView": {
                    templateUrl: "views/listView.html",
                    controller: "listController"
                }
            }
        })
        .state('projectState', {
            url: "/project/view/:slug",
            views: {
                "mainView": {
                    templateUrl: "views/projectView.html",
                    controller: "projectDetailsController"
                }
            }
        });
    $urlRouterProvider.otherwise('/');
});

app.constant('FIREBASE_URL', 'something');