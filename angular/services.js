/*

 SERVICES JS v1.0.1
 EMRAN ARCHITECT & ASSOCIATES. v2.1
 (c) 2015 DCASTALIA, http://dcastalia.com
 License: GPL v3
 Author: MD. Hasan Shahriar
 Author email: hsleonis2@gmail.com
 
*/

var app = angular.module('ark');

class MyService {
  sayHello() {
    console.log('hello');
  }
}

app.service('MyService', MyService);