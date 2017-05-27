var myApp = angular.module( 'myApp', [] );

myApp.controller( 'RecoverController', function( $http ){
  var vm = this;
  vm.emailIn = '';

  vm.resetPassword = function(){
    if( vm.verbose ) console.log( 'in resetPassword:', vm.newEmailIn );
    var objectToSend = {
      email: vm.newEmailIn
    }; // end objectToSend
    if( vm.verbose ) console.log( 'sending:', objectToSend );
    $http( {
      url: 'http://thisweeksgame.com/scripts/db/user_recover',
      method: 'POST',
      data: objectToSend
    } ).then( function( response ){
      console.log( 'back from server with:', response );
    } ); //end http
  }; //end add user

}); // end controller
