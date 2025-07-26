<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        require_once "dbh-inc.php";

        $todoInput = $_POST["task"];
        if (empty($todoInput)) {
            exit();
        }

        $query = "INSERT INTO tasks(task_todo) values(:todo);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":todo", $todoInput);
        $stmt->execute();

        
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    } finally{
        $pdo = null;
        $stmt = null;

        exit;
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit;
};
