myApp.service( 'gamesService', function( $http ){
  var service = this;

  this.getHaps = function(){
    var haps = [];
    var temp = {
      name: "Temp0",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/512/512'
    }
    haps.push( temp );
    temp = {
      name: "Temp1",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/512/512'
    }
    haps.push( temp );
    temp = {
      name: "Temp2",
      description: 'lorem ipsum and some shit like that',
      image_url: 'https://www.fillmurray.com/512/512'
    }
    haps.push( temp );
    return haps;
  }; //end getHaps
}); //end games service
