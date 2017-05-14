var myApp = angular.module( 'myApp', [] );

myApp.controller( 'ProfileController', function( gamesService, profileService ){
  var vm = this;
  vm.verbose = true;
  vm.haps = [];
  vm.subs = [];
  vm.profile = {
    loggedIn: false,
    isCreator: false,
    isAdmin: false
  }; // end profile object

  vm.getMySubs = function(){
    console.log( 'in get subs' );
    var subbers = profileService.getSubs( 0 );
    vm.subs = subbers;
    if( vm.verbose) console.log( 'subs:', vm.subs );
  }; //end getmy subs

  vm.initHaps = function(){
    var happers = gamesService.getHaps();
    vm.haps = happers;
    if( vm.verbose ) console.log( 'haps:', vm.haps );
  }; //end init haps

  vm.logIn = function(){
    var objectToSend = {
      email: this.emailIn,
      pass: this.passwordIn
    }; //end object to send
    if( vm.verbose ) console.log( 'attempting loggin in:', objectToSend.email );
    var serviceProfile = profileService.logIn( objectToSend );
    if( vm.verbose ) console.log( 'logged in:', serviceProfile.loggedIn );
    vm.profile = serviceProfile;
    if( vm.verbose ) console.log( 'logged in as :', vm.profile );
  }; //end login function

  vm.toggleShow = function( index ){
    if( vm.verbose ) console.log( 'in toggleShow:', index );
    vm.subs[index].show = ! vm.subs[index].show;
  }; //end toggleShow

}); //end login controller
