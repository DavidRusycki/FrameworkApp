<?php
namespace Components\FacadeDb;
/**
 * Classe de DB para o Postgres.
 * @author David Rusycki
 * @since 12/02/2022
 */
class Postgres extends Manager {

    public function getConfigForPdo()
    {
        return 'pgsql:host=localhost;dbname=dinamic';
    }
    
    public function getUser()
    {
        return 'postgres';
    }
    
    public function getPassword()
    {
        return 'postgres';
    }

    public function getType() 
    { 
        return Manager::POSTGRES;
    }

    /**
     * Retorna uma instância.
     * @return self;
     */
    public static function getInstance() : self
    {
        if (empty(self::$instance)) {
            self::$instance = new Self();
        }
        return self::$instance;
    } 

}