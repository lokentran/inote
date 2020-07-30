<?php

require __DIR__ . "/vendor/autoload.php";

use App\Controller\NoteController;
use App\Controller\NoteTypeController;

$noteController = new NoteController();
$noteTypeController = new NoteTypeController();


if(isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'list-note':
            $noteController->getAll();
            break;
        case 'add-note':
            $noteController->add();
            break;
        case 'edit-note':
            $noteController->edit();
            break;
        case 'del-note':
            $noteController->del();
            break;
        
        case 'add-note-type':
            $noteTypeController->add();
            break;
        case 'edit-note-type':
            $noteTypeController->edit();
            break;
        case 'del-note-type':
            $noteTypeController->del();
            break;


        default:
            $noteController->getAll();
                break;
    }  
} else {
    $noteTypeController->getAll();
}