<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BETA MAXimizer Aplha</title>
    <script src="vendors/angular.min.js" charset="utf-8"></script>
    <script src="scripts/betaMax.js" charset="utf-8"></script>
    <link rel="stylesheet" href="vendors\bootstrap.css">
    <link rel="stylesheet" href="styles\betaMax.css">
  </head>
  <body ng-app='myApp'>
    <img src='images\betaZap.png' width=100%>
    <div class='container' ng-controller='ProfileController as pc' ng-init='pc.checkLoggedIn()'>
      <div ng-hide='pc.profile.loggedIn'>
        <h2>Login:</h2>
        <p><input type='text' placeholder='email' ng-model='pc.emailIn'></p>
        <p><input type='password' placeholder='password' ng-model='pc.passwordIn'></p>
        <p><input type="checkbox" ng-model='pc.remember'/> Remember Me!</p>
        <p><button ng-click='pc.logIn();'>Log In</button></p>
        <p ng-hide='pc.recover'><a ng-click="pc.recover=true">Forgot my password</a></p>
        <div ng-show='pc.recover'>
          <input type='text' ng-model='pc.recoverEmailIn' placeholder="email"><button ng-click="pc.recover();">Recover</button>
        </div>
      </div> <!-- end !loggedIn -->
      <div ng-if='pc.profile.loggedIn'>
        <div>
          <a ng-click='pc.logOut();'>Log Out</a>
        </div>
        <div class="container" ng-if='pc.profile.isAdmin'>
          <p>
            Add user:
            <input type='text' placeholder="email" ng-model='pc.newEmailIn' />
            <input type='text' placeholder="user name" ng-model='pc.newUsernameIn' />
            <input type='password' placeholder="password" ng-model='pc.newPasswordIn' />
            <button ng-click='pc.addUser();'>Add User</button>
          </p>
          <p>
            Edit user:
            <select ng-model='pc.editIdIn' ng-init='pc.getUsers()'>
              <option ng-repeat='user in pc.users' value='{{ user.id }}'>{{ user.username }} ( {{ user.email }})</option>
            </select>
            <select ng-model='pc.editStatusIn'>
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
            <button ng-click='pc.editUser();'>Update User</button>
          </p>
        </div> <!-- end admin  -->
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
        </div> <!-- end end creations  -->
        <div class="container" ng-init='pc.getMySubs();'>
          <h1>{{ pc.profile.username }}'s Subscriptions</h1>
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
        </div> <!-- end subs  -->
        <div class="container" ng-init='pc.initHaps();'>
          <h1>What's Happenin'</h1>
          <div class='happenin col-sm-4' ng-repeat='hap in pc.haps'>
            <img ng-src='{{hap.image_url}}' width='100%'>
            <h2>{{ hap.name }}</h2>
            <p>{{ hap.description }}</p>
            <button>Request Access</button>
          </div>
        </div> <!-- end haps  -->
      </div> <!-- end end logged in  -->
      <hr>
      <footer>
        footer stuff, yo
      </footer>
    </div>
  </body>
</html>
