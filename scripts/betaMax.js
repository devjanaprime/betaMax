var myApp = angular.module( 'myApp', [] );

myApp.controller( 'ProfileController', function( gamesService, profileService, $http ){
  var vm = this;
  vm.verbose = true;
  vm.haps = [];
  vm.subs = [];
  vm.creations = [];
  vm.requests = [];
  vm.showRequests = false;
  vm.profile = {
    loggedIn: false,
    isCreator: false,
    isAdmin: false
  }; // end profile object

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

  vm.getMySubs = function(){
    if( vm.verbose ) console.log( 'in get subs' );
    var subbers = profileService.getSubs( 0 );
    vm.subs = subbers;
    if( vm.verbose) console.log( 'subs:', vm.subs );
  }; //end getmy subs

  vm.getMyCreations = function(){
    if( vm.verbose) console.log( 'in get subs' );
    var creations = profileService.getCreations();
    vm.creations = creations;
    if( vm.verbose) console.log( 'creations:', vm.creations );
  }; //end getmy subs

  vm.getRequests = function( gameId ){
    if( vm.verbose) console.log( 'in get requests for gameId:', gameId );
    var requests = profileService.getRequests( gameId );
    vm.requests = requests;
    if( vm.verbose) console.log( 'requests:', vm.requests );
  }; //end getmy subs

  vm.initHaps = function(){
    var happers = gamesService.getHaps();
    vm.haps = happers;
    if( vm.verbose ) console.log( 'haps:', vm.haps );
  }; //end init haps

  vm.logIn = function(){
    console.log( vm.emailIn );
    var objectToSend = {
      email: vm.emailIn,
      pass: vm.passwordIn
    }; //end object to send
    if( vm.verbose ) console.log( 'attempting loggin in:', objectToSend );
    var serviceProfile = profileService.logIn( objectToSend );
    if( vm.verbose ) console.log( 'logged in:', serviceProfile.loggedIn );
    vm.profile = serviceProfile;
    if( vm.verbose ) console.log( 'logged in as :', vm.profile );
  }; //end login function

  vm.toggleGame = function( index ){
    if( vm.verbose ) console.log( 'in toggleGame:', index );
    vm.creations[index].show = ! vm.creations[index].show;
  }; //end toggleShow

  vm.toggleRequests = function(){
      vm.showRequests = ! vm.showRequests;
  }; //end toggle requests

  vm.toggleShow = function( index ){
    if( vm.verbose ) console.log( 'in toggleShow:', index );
    vm.subs[index].show = ! vm.subs[index].show;
  }; //end toggleShow

}); //end login controller
