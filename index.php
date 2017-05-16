<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BETA MAXimizer Aplha</title>
    <script src="vendors/angular.min.js" charset="utf-8"></script>
    <script src="scripts/betaMax.js" charset="utf-8"></script>
    <script src="scripts/gamesService.js" charset="utf-8"></script>
    <script src="scripts/profileService.js" charset="utf-8"></script>
    <link rel="stylesheet" href="vendors\bootstrap.css">
    <link rel="stylesheet" href="styles\betaMax.css">
  </head>
  <body ng-app='myApp'>
    <div class="jumbotron">
      <img src='images/betaMaxAlpha.png'>
      <p class="lead">
        Eventually this will be useful...
      </p>
    </div>
    <div class='container' ng-controller='ProfileController as pc'>
      <div ng-hide='pc.profile.loggedIn'>
        <h2>Login:</h2>
        <p><input type='text' placeholder='email' ng-model='pc.emailIn'></p>
        <p><input type='password' placeholder='password' ng-model='pc.passwordIn'></p>
        <p><button ng-click='pc.logIn();'>Log In</button></p>
      </div>
      <div ng-if='pc.profile.loggedIn'>
        <div class="container" ng-if='pc.profile.isAdmin'>
          <p>
            Add user:
            <input type='text' placeholder="email" ng-model='pc.newEmailIn' />
            <input type='text' placeholder="user name" ng-model='pc.newUsernameIn' />
            <input type='password' placeholder="password" ng-model='pc.newPasswordIn' />
            <button ng-click='pc.addUser();'>Add User</button>
          </p>
        </div>
        <div class="container" ng-if='pc.profile.isCreator' ng-init='pc.getMyCreations();'>
          <h1>{{ pc.profile.username }}'s Stuff</h1>
          <div class='container'>
            <div class='gameAdmin' ng-repeat='creation in pc.creations'>
              <h2><a ng-click="pc.toggleGame( $index );">{{ creation.name }}</a></h2>
              <div ng-if='creation.show'>
                <p>{{ creation.description }}</p>
                <p>Current Version:<input type='text' placeholder="version"></p>
                <p>Download Link:<input type='text' placeholder="URL"></p>
                <button>Update</button>
                <button>Email all subscribers</button>
                <button>Discontinue Development</button>
              </div>
            </div>
            <h2><a ng-click="pc.toggleRequests();">Outstanding Requests</a></h2>
            <div class="requests" ng-init='pc.getRequests( creation.id );' ng-if="pc.showRequests">
              <p ng-repeat='request in pc.requests'>{{ request.username }}</p>
            </div>
          </div>
        </div>
        <div class="container" ng-init='pc.initHaps();'>
          <h1>What's Happenin'</h1>
          <div class='happenin col-sm-4' ng-repeat='hap in pc.haps'>
            <img ng-src='{{hap.image_url}}' width='100%'>
            <h2>{{ hap.name }}</h2>
            <p>{{ hap.description }}</p>
            <button>Request Access</button>
          </div>
        </div>
        <div class="container" ng-init='pc.getMySubs();'>
          <h1>My Subscriptions</h1>
          <div class='container'>
            <div class='subscription' ng-repeat='sub in pc.subs'>
              <h2><a ng-click='pc.toggleShow($index);'>{{ sub.name }}</a></h2>
              <div ng-if='sub.show'>
                <img ng-src='{{sub.image_url}}' width='100%'>
                <p>{{ sub.description }}</p>
                <h3>Current Version: XXX</h3>
                <p>Version Notes: adsf qwer xcv asdf we sdfasdf asdv asd</p>
                <button>Download</button>
                <button>Unsub</button>
                <button>Report</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer>
        footer stuff, yo
      </footer>
    </div>
  </body>
</html>
