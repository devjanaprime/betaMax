var myApp = angular.module( 'myApp', [] );

myApp.controller( 'ProfileController', function( $http ){
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
    vm.subs = [];
    /// - replace these with sub only for the logged in user - ///
    var temp = {
      name: "Temp0",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    vm.subs.push( temp );
    temp = {
      name: "Temp1",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    vm.subs.push( temp );
    temp = {
      name: "Temp2",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    vm.subs.push( temp );
    /// - end replace later - ///
    for (var i = 0; i < vm.subs.length; i++) {
      vm.subs[i].show = false;
    };
    if( vm.verbose) console.log( 'subs:', vm.subs );
  }; //end getmy subs

  vm.getMyCreations = function(){
    if( vm.verbose) console.log( 'in get creations' );
    vm.creations = [];
    /// - replace with creations for this user if user is a creator - ///
    var temp = {
      id: 123,
      name: "TempCreation",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    vm.creations.push( temp )
    /// - end replace eventually - ///
    if( vm.verbose) console.log( 'creations:', vm.creations );
  }; //end getmy subs

  vm.getRequests = function( gameId ){
    if( vm.verbose) console.log( 'in get requests for gameId:', gameId );
    vm.requests = [];
    /// - eventually replace with requests for this user, maybe sort by game id? - ///
    var temp = {
      username: "TempRequest0",
      user_id: 9,
      status: 0
    }
    vm.requests.push( temp );
    var temp = {
      username: "TempRequest1",
      user_id: 12,
      status: 0
    }
    vm.requests.push( temp );
    var temp = {
      username: "TempRequest2",
      user_id: 18,
      status: 0
    }
    vm.requests.push( temp );
    /// - end eventually replace - ///
    if( vm.verbose) console.log( 'requests:', vm.requests );
  }; //end getmy subs

  vm.initHaps = function(){
    vm.haps = [];
    /// - replace with the three newest releases, eventually - ///
    var temp = {
      name: "Temp0",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/512/512'
    }
    vm.haps.push( temp );
    temp = {
      name: "Temp1",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/512/512'
    }
    vm.haps.push( temp );
    temp = {
      name: "Temp2",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/512/512'
    }
    vm.haps.push( temp );
    /// - end eventually replace - ///
  }; //end init haps

  vm.logIn = function(){
    console.log( vm.emailIn );
    var objectToSend = {
      email: vm.emailIn,
      pass: vm.passwordIn
    }; //end object to send
    if( vm.verbose ) console.log( 'attempting loggin in:', objectToSend );
    $http( {
      url: 'http://thisweeksgame.com/scripts/db/login',
      method: 'POST',
      data: objectToSend
    } ).then( function( response ){
      if( vm.verbose ) console.log( 'back from server with:', response );
      if( response.data == "nope" ){
        if( vm.verbose ) console.log( 'no userFound' );
        vm.profile = {
          loggedIn: false,
          message: 'user not found'
        };
        alert( 'email/pass combo not found :(' );
      }// end no user found
      else {
        if( response.data.status > 0 ){
          vm.profile = {
            id: response.data.id,
            email: vm.emailIn,
            username: response.data.username,
            status: response.data.status,
            loggedIn: true,
          };
          if( vm.verbose ) console.log( 'logged in as:', vm.profile );
          if( vm.profile.status >= 2 ){
            vm.profile.isCreator = true;
          }
          if( vm.profile.status >= 3 ){
            vm.profile.isAdmin = true;
          }
          return vm.profile;
        } // end active user
        else{
          if( verbose ) console.log( 'inactive userFound' );
          vm.profile = {
            id: response.data.id,
            email: vm.emailIn,
            username: response.data.username,
            loggedIn: false,
          };
          alert( 'this login is inactive :( contact admin 4 help' );
        } // end inactive user
      } // end user found
    } ); //end http
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
