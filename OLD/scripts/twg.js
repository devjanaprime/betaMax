var myApp = angular.module( 'myApp', [] );
var verbose = true;
myApp.controller( 'twgController', [ '$scope', '$http', function( $scope, $http ){
  $scope.loggedIn = false;
  $scope.loginMode = true;

  $scope.logIn = function(){
    if( verbose ) console.log( 'in logIn' );
    // assemble object
    var objectToSend = {
      email: $scope.emailIn,
      pass: $scope.passIn
    }; // end objectToSend
    // format for php:
    // send to server for login
    $http({
      method: 'POST',
      url: 'server/login.php',
      data: objectToSend,
    }).then( function( response ){
      // process resonse
      if( verbose ) console.log( 'back from http with:', response );
    }); // end http
  }; // end login

  $scope.register = function(){
    if( verbose ) console.log( 'in register');
    // assemble object
    var objectToSend = {
      email: $scope.registerEmailIn,
    }; // end objectToSend
    // format for php:
    // send to server for login
    $http({
      method: 'POST',
      url: 'server/invite_create.php',
      data: objectToSend,
    }).then( function( response ){
      // process resonse
      if( verbose ) console.log( 'back from http with:', response );
      if( response.data == 'saved'){
        alert( 'Invite sent to ' + $scope.registerEmailIn + '. Check your email for next steps!' );
      }
    }); // end http
  }; // end login

  $scope.toggleLoginMode = function(){
    console.log( 'in toggleLoginMode' );
    $scope.loginMode = ! $scope.loginMode;
  }; // end toggleLoginMode

}]); // end controller
