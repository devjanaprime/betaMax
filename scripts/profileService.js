myApp.service( 'profileService', function( $http ){
  var service = this;
  var verbose = true;
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
    if( verbose ) console.log( 'in profileService logIn for:', credentials.email );
    var userProfile = {
      loggedIn: true,
      isAdmin: true,
      isCreator: true
    };
    return userProfile;
  };

}); // end service
