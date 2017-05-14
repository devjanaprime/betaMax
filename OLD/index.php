<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="vendors/angular.min.js" charset="utf-8"></script>
    <script src="vendors/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="vendors/sweetalert.css">
    <script src="scripts/twg.js" charset="utf-8"></script>
    <title>This Week's Game</title>
  </head>
  <body ng-app='myApp' ng-controller='twgController'>
    <h1>This Week's Game</h1>
    <div ng-hide='loggedIn'>
      <div ng-show='loginMode'>
        <h2>Log In</h2>
        <p>
          <input type='text' placeholder="email" ng-model='emailIn'/>
        </p>
        <p>
          <input type='password' placeholder="password" ng-model='passIn'/>
        </p>
        <p>
          <button ng-click='logIn();'>Login</button> <button ng-click='toggleLoginMode();'>Sign Up</button>
        </p>
      </div>
      <div ng-hide='loginMode'>
          <h2>Sign Up</h2>
          <p>
            <input type='text' placeholder="email" ng-model='registerEmailIn'/>
          </p>
          <p>
            <button ng-click='register();'>Sign Me Up</button> <button ng-click='toggleLoginMode();'>Log In</button>
          </p>
      </div>
    </div>
    <div ng-show='loggedIn'>
      <h1>LoggedIn</h1>
    </div>

  </body>
</html>
