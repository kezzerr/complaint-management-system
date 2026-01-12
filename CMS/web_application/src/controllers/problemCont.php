<?php

//problem controller class which handles problem submission/retrieval requests

require_once __DIR__ . '/../models/problemRepo.php';
require_once __DIR__ . '/../database.php';

class ViewProblemsController {

    private $problemRepo;

    public function __construct() {

        $db = new Database();
        $conn = $db->getConnection();

        $this->problemRepo = new ProblemRepository($conn);
    }

    public function submitProblem($userId, $orgId, $title, $desc) { //requests that the submitted problem data be entered into the database

        $errors = [];

        if (empty(trim($title))) $errors['title'] = "⚠️ Title cannot be empty";
        if (empty(trim($desc))) $errors['desc'] = "⚠️ Description cannot be empty";
        if (!empty($errors)) return ['success' => false, 'errors' => $errors];

        $problemId = $this->problemRepo->create($userId, $orgId, $title, $desc);

        return ['success' => true, 'errors' => [], 'problem_id' => $problemId];
    }

    public function getProblems($userId) {

        return $this->problemRepo->getProblemsByUserId($userId);
    }
}