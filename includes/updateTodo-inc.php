<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once "dbh-inc.php";

        $id = $_POST["task_id"];
        $status = $_POST["task_status"];

        $query = "UPDATE tasks SET task_status = :taskState WHERE task_id = :tID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":taskState", $status, PDO::PARAM_STR);
        $stmt->bindParam(":tID", $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo json_encode([
            "success" => false,
            "message" => "Error: " . $e->getMessage()
        ]);
    } finally {
        $pdo = null;
        $stmt = null;
        exit;
    }
} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit;
};
