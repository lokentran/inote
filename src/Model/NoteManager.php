<?php

namespace App\Model;
use App\Model\DBConnect;

class NoteManager {
    protected $database;

    public function __construct()
    {   
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAllNote() {
        $sql = "SELECT * FROM note INNER JOIN note_type ON note.type_id = note_type.id";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();

        // echo "<pre>";
        // print_r($data);
        $arr = [];
        foreach($data as $item) {
            $note = new Note($item['title'], $item['content'], $item['type_id']);
            $note->setId($item['note_id']);
            $newNote = ['items'=>$note, 'name-work'=>$item['name']];
            array_push($arr, $newNote);
        }
        return $arr;
    }

    public function getNote($id) {
        $sql = "SELECT * FROM note WHERE note_id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addNote($note) {
        $sql = "INSERT INTO `note`(`title`, `content`, `type_id`) VALUES (:title, :content,:type_id)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':title', $note->getTitle());
        $stmt->bindParam(':content', $note->getContent());
        $stmt->bindParam(':type_id', $note->getTypeId());
        $stmt->execute();
    }

    public function editNote($note) {
        $sql = "UPDATE `note` SET `title`= :title,`content`=:content,`type_id`=:type_id WHERE note_id=:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':title', $note->getTitle());
        $stmt->bindParam(':content', $note->getContent());
        $stmt->bindParam(':type_id', $note->getTypeId());
        $stmt->bindParam(':id', $note->getId());
        $stmt->execute();
    }

    public function delNote($id) {
        $sql = "DELETE FROM note WHERE note_id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }

}