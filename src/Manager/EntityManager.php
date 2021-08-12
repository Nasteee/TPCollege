<?php
namespace Manager;

class EntityManager
{
    protected $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb($db): void
    {
        $this->_db = $db;
    }
}