<?php
namespace App\Model;

use App\Lib\Database;
use App\Lib\Response;

class ProductoModel {
    private $db;
    private $table = 'producto';
    private $response;
    
    public function __CONSTRUCT(){
        $this->db = Database::StartUp();
        $this->response = new Response();
    }
    
    public function GetAll(){
		try{
			$result = $this->db
						->from('busqueda')
						->select('busqueda.palabra, producto.*')
						->orderBy("busqueda.palabra DESC")
						->limit(20)
						->fetchAll();

			return $result;
		}
		catch(Exception $e){
			$this->response->setResponse(false, $e->getMessage());
            return $this->response;
		}
    }
    
    public function Get($nombre){
    	
		try{
			$result = $this->db
                     	->from('producto')
                     	->select('producto.*')
                     	->where('titulo LIKE ?', '%'.$nombre.'%')
                     	->fetchAll();

            return $result;
		}
		catch(Exception $e){
			$this->response->setResponse(false, $e->getMessage());
            return $this->response;
		}  
    }

    public function InsertBusqueda($data)
	{
		try {
            $this->db->insertInto('busqueda', $data)
                     ->execute();
		}
        catch (Exception $e){
			$this->response->setResponse(false, $e->getMessage());
            return $this->response;
		}
	}

	public function GetBusqueda($id)
	{
		try {
            $result = $this->db
                     	->from('busqueda')
                     	->where('producto_id = ?', $id)
                     	->fetch();

            return $result;
		}
        catch (Exception $e){
			$this->response->setResponse(false, $e->getMessage());
            return $this->response;
		}
	}

	public function UpdateBusqueda($data)
	{
		try {
            $id = $data['id'];
            unset($data['id']);
            
            $this->db->update('busqueda', $data, $id)
                     ->execute();
		}
        catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}