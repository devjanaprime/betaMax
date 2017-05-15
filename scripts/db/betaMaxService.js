myApp.service( 'profileService', function( $http ){
  var service = this;

  service.getSubs = function(){
    var subs = [];
    var temp = {
      name: "Temp0",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    subs.push( temp );temp = {
      name: "Temp1",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    subs.push( temp );temp = {
      name: "Temp2",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/256/256'
    }
    subs.push( temp );
    for (var i = 0; i < vm.subs.length; i++) {
      subs[i].show = false;
    };
    return subs;
  }; //end getSubs
  
}); // end service
