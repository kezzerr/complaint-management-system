<?php

//problem class which encapsulates problem data as an object

class Problem {

    public $id;
    public $title;
    public $description;

    public function __construct($id, $title, $description) {

        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }
}

?>