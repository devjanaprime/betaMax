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
      if( verbose ) console.log( 'back from server with:', response );
      if( response.data == "nope" ){
        if( verbose ) console.log( 'no userFound' );
        service.profile = {
          loggedIn: false,
          message: 'user not found'
        };
        return service.profile;
      }// end no user found
      else {
        if( profileJson.status > 0 ){
          var profileJson = response.data;
          if( verbose ) console.log( profileJson );
          service.profile = {
            id: 0,
            email: credentials.email,
            username: profileJson.username,
            loggedIn: true,
          };
          if( verbose ) console.log( userProfile );
          if( profileJson == 2 ){
            service.profile.isCreator = true;
          }
          if( profileJson == 3 ){
            service.profile.isAdmin = true;
          }
          return service.profile;
        } // end active user
        else{
          if( verbose ) console.log( 'inactive userFound' );
          service.profile = {
            loggedIn: false,
            message: 'user inactive'
          };
          return service.profile;
        } // end inactive user
      } // end user found
    } ); //end http
  }; // end login

}); // end service
