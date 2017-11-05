Cargar CSV a MySQL
1. Lo primero que debemos de hacer es abrir nuestra consola.
2. Debemos introducir nuestro usuario y contraseña. mysql -u root -p.
3. Luego de esto debemos crear una DB, esta llevara el nombre de "cuponatic". "CREATE DATABASE cuponatic;"
4. Ahora en nuestra consola colocamos "use cuponatic;"
5. Creamos nuestras tablas, las cuales tendrán como nombre "producto" y "busqueda"
	CREATE TABLE producto (
		  id int(10) NOT NULL AUTO_INCREMENT,
  		titulo varchar(255) NOT NULL,
  		descripcion text NOT NULL,
  		fecha_inicio datetime NOT NULL,
  		fecha_termino datetime NOT NULL,
  		precio double NOT NULL,
  		imagen text NOT NULL,
  		vendidos int(11) NOT NULL DEFAULT 0,
  		tags text NOT NULL,
		PRIMARY KEY (id)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE busqueda (
      id int(11) NOT NULL,
      producto_id int(11) NOT NULL,
      palabra text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

6. Para cargar nuestro archivo .csv hacemos lo siguiente:
	LOAD DATA INFILE 'Directorio donde se encuentre archivo csv datos_descuentos_buscador_prueba.2.0.csv'
	INTO TABLE producto
	FIELDS TERMINATED BY ','
	ENCLOSED BY '"'
	LINES TERMINATED BY '\r\n'
	IGNORE 1 ROWS
	(titulo,descripcion,fecha_inicio,fecha_termino,precio,imagen,vendidos,tags)
