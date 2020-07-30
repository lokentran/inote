<?php

namespace App\Controller;

use App\Model\NoteTypeManager;
use App\Model\NoteType;

class NoteTypeController {
    protected $noteTypeController;

    public function __construct()
    {
        $this->noteTypeController = new NoteTypeManager();
    }

    public function getAll() {
        $noteTypes = $this->noteTypeController->getAll();
        include('src/View/note-type/list-note-type.php');
    }

    public function add() {
        include('src/View/note-type/add-note-type.php');
        if(isset($_POST['sbm'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $noteType = new NoteType($name,$description);
            $this->noteTypeController->addNoteType($noteType);
            header('location:index.php');
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $noteType = $this->noteTypeController->getNoteType($id);
        echo "<pre>";
        print_r($noteType);
        
        include('src/View/note-type/edit-note-type.php');

        if (isset($_POST['sbm'])) {
           
            $name = $_POST['name'];
            $description = $_POST['description'];

            $noteType = new NoteType($name, $description);
            $noteType->setId($id);
            $this->noteTypeController->editNoteType($noteType);
            echo "<pre>";
            print_r($noteType);
            header('location:index.php');
        }
    }
    
    public function del() {
        $id = $_GET['id'];
        $this->noteTypeController->delNoteType($id);
        header('location:index.php');
    }

}