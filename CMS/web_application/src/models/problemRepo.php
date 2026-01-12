<?php

//problem repository class which submits/retrieves problem data from the database

class ProblemRepository {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function create($userId, $orgId, $title, $desc) { //inputs problem data to the database

        $stmt = $this->db->prepare("INSERT INTO problems (user_id, org_id, title, description) VALUES (:user_id, :org_id, :title, :desc)");
        $stmt->bindParam(':user_id', $userId, SQLITE3_INTEGER);
        $stmt->bindParam(':org_id', $orgId, SQLITE3_INTEGER);
        $stmt->bindParam(':title', $title, SQLITE3_TEXT);
        $stmt->bindParam(':desc', $desc, SQLITE3_TEXT);

        $stmt->execute();

        return $this->db->lastInsertRowID();
    }

    public function getProblemsByUserId($userId) { //retrieves problem data from the database using user id

        $stmt = $this->db->prepare("SELECT * FROM problems WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId, SQLITE3_INTEGER);
        $result = $stmt->execute();

        $problems = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $problems[] = $row;
        }

        return $problems;
    }

    public function getProblemById($id) { //retrieves problem data from the database using problem id

        $stmt = $this->db->prepare("SELECT * FROM problems WHERE problem_id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();

        return $result->fetchArray(SQLITE3_ASSOC) ?: null;   
    }

}

?>