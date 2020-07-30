<?php

namespace App\Model;

use App\Model\DBConnect;

class NoteTypeManager {
    protected $database;

    public function __construct()
    {   
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    function getAll() {
        $sql = "SELECT * FROM note_type";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach($data as $item) {
            $noteType = new NoteType($item['name'], $item['description']);
            $noteType->setId($item['id']);
            array_push($arr, $noteType);
        }
        return $arr;
    }

    public function addNoteType($noteType) {
        $sql = "INSERT INTO `note_type`(`name`, `description`) VALUES (:name, :description)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $noteType->getName());
        $stmt->bindParam(':description', $noteType->getDescription());
        $stmt->execute();
    }

    public function getNoteType($id) {
        $sql = "SELECT * FROM note_type WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function editNoteType($noteType)
    {
        $sql = "UPDATE `note_type` SET `name`= :name,`description`=:description WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $noteType->getName());
        $stmt->bindParam(':description', $noteType->getDescription());
        $stmt->bindParam(':id', $noteType->getId());
        $stmt->execute();
    }

    public function delNoteType($id) {
        $sql = "DELETE FROM note_type WHERE id=:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}