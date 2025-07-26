<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["taskID"])) {

    try {
        require_once "dbh-inc.php";

        $active = 0;
        $task_ID = $_POST["taskID"];

        $query = "UPDATE tasks SET is_active = :active WHERE task_id = :tID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":active", $active, PDO::PARAM_INT);
        $stmt -> bindParam(":tID", $task_ID, PDO::PARAM_INT);
        $stmt->execute();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    } finally {
        $pdo = null;
        $stmt = null;
        exit;
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit;
}
