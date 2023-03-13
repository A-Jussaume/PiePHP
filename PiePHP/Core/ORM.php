<?php

namespace Core;

class ORM extends Database
{
    public function create ($table, $fields)
    {
        echo $fields;
        $request = $this->_db->prepare("INSERT INTO $table ($fields) VALUES (?)");
        $request->execute();
        return $this->_db->lastInsertId();

        $request->closeCursor();
    }

    public function read ($table, $id)
    {
        $request = $this->_db->prepare("SELECT * FROM $table WHERE id = $id");
        $request->execute();
        return $this->$request->fetch();
        
        $request->closeCursor();
    }

    public function update ($table, $id, $fields)
    {
        $request = $this->_db->prepare("UPDATE $table SET $fields = ? WHERE id = $id");
        $request->execute();

        $request->closeCursor();
    }

    public function delete ($table, $id)
    {
        $request = $this->_db->prepare("DELETE FROM $table WHERE id = $id");
        $request->execute();

        $request->closeCursor();
    }

    public function find ($table, $params = array(

    ))
    {
        
    }
    
}
?>