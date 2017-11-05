<?php

use App\Model\ProductoModel;

$app->group('/rest/', function () {
    
    $this->get('estadisticas', function ($req, $res, $args) {
        $pm = new ProductoModel();
        $data = json_encode($pm->GetAll());

        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write($data);
    });
    
    $this->get('search', function ($req, $res, $args) {
        $pm = new ProductoModel();
        $name = $req->getParam('keyword');
        $result = $pm->Get($name);
        $objetos = count($result);
        if ($objetos > 0) {
          foreach ($result as $index => $producto) {
            $b = $pm->GetBusqueda($producto->id);
            if ($b) {
              $palabras = explode(",", $b->palabra);
              $palabras_usadas = [];
              foreach ($palabras as $p) {
                $palabras_usadas[] = trim($p);
              }
              if (!in_array($name, $palabras_usadas)) {
                $busqueda['id'] = $b->id;
                $busqueda['producto_id'] = $producto->id;
                $busqueda['palabra'] = $b->palabra.', '.$name;
                $pm->UpdateBusqueda($busqueda);  
              }
            } else {
              $busqueda['producto_id'] = $producto->id;
              $busqueda['palabra'] = $name;
              $pm->InsertBusqueda($busqueda);
            }
          }
        }

        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(json_encode($result));
    });

});