angular.module("AppCuponatic", ["ngRoute"]) 
.config(function($routeProvider){
	$routeProvider //nos permite definir las rutas
		.when("/", {
			controller: "ProductosController",
			templateUrl: "templates/home.html"
		})
		.when("/estadisticas/", {
			controller: "EstadisticasController",
			templateUrl: "templates/estadisticas.html"
		})
		.otherwise("/");
});
