<?php
namespace App\Controller;

use App\Model\Note;
use App\Model\NoteManager;
use App\Model\NoteType;
use App\Model\NoteTypeManager;


class NoteController {
    protected $noteController;

    public function __construct()
    {
        $this->noteController = new NoteManager();
    }

    public function getAll() {
        $noteTypeManager = new NoteTypeManager();
        $noteTypes = $noteTypeManager->getAll();
  
        $notes = $this->noteController->getAllNote();

        echo "<pre>";
        print_r($notes);
        include('src/View/note/list-note.php');
    }
    
    public function add() {
        $noteTypeManager = new NoteTypeManager();
        $noteTypes = $noteTypeManager->getAll();
        // echo "<pre>";
        // var_dump($noteTypes);  
        include('src/View/note/add-note.php');
        if(isset($_POST['sbm'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $typeId = $_POST['type_id'];
            $note = new Note($title, $content, $typeId);
            $this->noteController->addNote($note);
            header('location:index.php?page=list-note');
        }
    }


    public function edit() {
        $noteTypeManager = new NoteTypeManager();
        $noteTypes = $noteTypeManager->getAll();
        $id = $_GET['id'];
        $note = $this->noteController->getNote($id);
        // echo $id;
        // echo "<pre>";
        // print_r($note);
    
        include('src/View/note/edit-note.php');
        if(isset($_POST['sbm'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $typeId = $_POST['note_id'];

            $note = new Note($title, $content, $typeId);
            $note->setId($id);

            $this->noteController->editNote($note);
            header('location:index.php?page=list-note');
        }
    }

    public function del() {
        $id = $_GET['id'];
        $this->noteController->delNote($id);
        header('location:index.php?page=list-note');
    }

}
