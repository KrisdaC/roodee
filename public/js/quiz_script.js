
/* ------------------------------------------------------- 

* Filename:     AngularJS Dynamic Form Fields
* Website:      http://www.shanidkv.com
* Description:  Shanidkv AngularJS blog
* Author:       Shanid KV shanidkannur@gmail.com

---------------------------------------------------------*/

var app = angular.module('shanidkvApp', [], function($interpolateProvider){
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

  app.controller('MainCtrl', function($scope) {

  //$scope.choices = [{id: 'choice1'}, {id: 'choice2'}];
  $scope.questions = [{id: '1', 'type':'MC'}];
  
  /*$scope.addNewChoice = function() {
    var newItemNo = $scope.choices.length+1;
    $scope.choices.push({'id':'choice'+newItemNo});
  };*/

  $scope.addNewMC = function(){
    var newItemNo = $scope.questions.length+1;
    $scope.questions.push({'id': newItemNo, 'type':'MC'});
  }

  $scope.addNewFITB = function(){
    var newItemNo = $scope.questions.length+1;
    $scope.questions.push({'id': newItemNo, 'type':'FITB'});
  }
    
  $scope.removeChoice = function(id) {
    var lastItem = $scope.questions.length-1;
    $scope.questions.splice(lastItem);
  };
});
