var app = angular.module('AppCuponatic');

app.controller('ProductosController',function($scope,$http) {
	$scope.buscar = function() {
		$scope.productos = [];
		$scope.loading = true;
		data = {
			keyword: $scope.name_product
		};
		$http({
		  method: 'GET',
		  url: 'http://localhost/cuponatic/back/public/rest/search',
		  params: data
		}).then(function successCallback(response) {
			$scope.productos = response.data;
		    $scope.loading = false;
		}, function errorCallback(response) {
			console.log(response);
		    $scope.loading = false;
		});
	}
});

app.controller('EstadisticasController',function($scope,$http) {
	$scope.productos = [];
	$scope.loading = true;
	$http({
	  method: 'GET',
	  url: 'http://localhost/cuponatic/back/public/rest/estadisticas'
	}).then(function successCallback(response) {
		$scope.productos = response.data;
		console.log($scope.productos);
	    $scope.loading = false;
	}, function errorCallback(response) {
	    $scope.loading = false;
	});
});