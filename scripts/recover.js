var myApp = angular.module( 'myApp', [] );

myApp.controller( 'recoverController', function( $http ){
  var vm = this;

  vm.addUser = function(){
    if( vm.verbose ) console.log( 'in addUser:', vm.newEmailIn );
    var objectToSend = {
      email: vm.newEmailIn,
      username: vm.newUsernameIn,
      pass: vm.newPasswordIn
    }; // end objectToSend
    if( vm.verbose ) console.log( 'sending:', objectToSend );
    $http( {
      url: 'http://thisweeksgame.com/scripts/db/user_create',
      method: 'POST',
      data: objectToSend
    } ).then( function( response ){
      console.log( 'back from server with:', response );
    } ); //end http
  }; //end add user
  
}); // end controller
