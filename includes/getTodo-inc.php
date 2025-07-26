<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  try {

    require_once "dbh-inc.php";

    $active = 1;
    $query = "SELECT * FROM tasks WHERE is_active = :active";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":active", $active, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($results);
  } catch (PDOException $e) {
    echo json_encode([
      "success" => false,
      "message" => "Query Failed: " . $e->getMessage()
    ]);
    exit;
  } finally {
    $pdo = null;
    $stmt = null;
    exit;
  };
} else {
  http_response_code(405);
  echo json_encode(["success" => false, "message" => "Invalid request method."]);
  exit;
}
