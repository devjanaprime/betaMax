<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Email Recovery</title>
    <script src="vendors/angular.min.js" charset="utf-8"></script>
    <script src="scripts/betaMax.js" charset="utf-8"></script>
    <link rel="stylesheet" href="vendors\bootstrap.css">
    <link rel="stylesheet" href="styles\betaMax.css">
  </head>
  <body ng-app='myApp'>
    <div ng-controller='RecoverController'>
      <h1>Email Recovery</h1>
      <input type='text' placeholder="email" ng-model='rc.emailIn'><button ng-click='rc.resetPassword'>Reset Password</button>
    </div>
  </body>
</html>
