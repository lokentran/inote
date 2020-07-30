<?php
namespace App\Model;

class Note {

    protected $id;

    protected $title;

    protected $content;

    protected $typeId;

    public function __construct($title, $content,$typeId)
    {    
        $this->title = $title;     
        $this->content = $content;
        $this->typeId = $typeId;
    }




    /**
     * Get the value of typeId
     */ 
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set the value of typeId
     *
     * @return  self
     */ 
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}