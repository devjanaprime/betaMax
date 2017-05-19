myApp.service( 'profileService', function( $http ){
  var service = this;
  var verbose = true;

    service.getCreations = function(){
    if( verbose ) console.log( 'in profileService get creations for userId:', service.profile.id );
    var myCreations = [];
    var temp = {
      id: 123,
      name: "TempCreation",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    myCreations.push( temp );
    return myCreations;
  }; // end getGames

  service.getRequests = function( gameId ){
    if( verbose ) console.log( 'in profileService get requests for game:', gameId );
    var myRequests = [];
    var temp = {
      username: "TempRequest0",
      user_id: 9,
      status: 0
    }
    myRequests.push( temp );
    var temp = {
      username: "TempRequest1",
      user_id: 12,
      status: 0
    }
    myRequests.push( temp );
    var temp = {
      username: "TempRequest2",
      user_id: 18,
      status: 0
    }
    myRequests.push( temp );
    return myRequests;
  }; // end getGames

  service.getSubs = function( userId ){
    if( verbose ) console.log( 'in profileService get subs for userId:', userId );
    var subs = [];
    var temp = {
      name: "Temp0",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    subs.push( temp );
    temp = {
      name: "Temp1",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    subs.push( temp );
    temp = {
      name: "Temp2",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    subs.push( temp );
    for (var i = 0; i < subs.length; i++) {
      subs[i].show = false;
    };
    return subs;
  }; //end getSubs

  service.logIn = function( credentials ){
    // if( verbose ) console.log( 'in profileService logIn for:', credentials.email );
    // $http( {
    //   url: 'http://thisweeksgame.com/scripts/db/login',
    //   method: 'POST',
    //   data: credentials
    // } ).then( function( response ){
    //   if( verbose ) console.log( 'back from server with:', response );
    // }); //end http

    if( verbose ) console.log( 'in logIn:', credentials.email );
    var objectToSend = {
      email: credentials.email,
      pass: credentials.pass
    }; // end objectToSend
    if( verbose ) console.log( 'sending:', objectToSend );
    $http( {
      url: 'http://thisweeksgame.com/scripts/db/login',
      method: 'POST',
      data: objectToSend
    } ).then( function( response ){
      console.log( 'back from server with:', response );
    } ); //end http

    var userProfile = {
      id: 0,
      email: 'asdf@qwer.com',
      username: 'tempUser',
      loggedIn: true,
      isAdmin: true,
      isCreator: true
    };
    service.profile = userProfile;
    return userProfile;
  };

}); // end service
