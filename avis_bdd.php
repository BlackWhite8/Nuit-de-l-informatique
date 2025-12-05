<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$host = 'mysql-gonzalez-gomez.alwaysdata.net';
$db   = 'gonzalez-gomez_bdd_avis';
$user = '444518';      // à changer
$pass = 'YasHugBapCle';     // à changer
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur de connexion à la base.']);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Renvoyer la liste des avis
    $stmt = $pdo->query("SELECT id, nom, role, message, created_at FROM avis ORDER BY created_at DESC LIMIT 5");
    $avis = $stmt->fetchAll();
    echo json_encode($avis);
    exit;
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $nom = $input['nom'] ?? null;
    $role = $input['role'] ?? null;
    $message = trim($input['message'] ?? '');

    echo json_encode(['error' => 'Hello toi 2']);

    if ($message === '') {
        http_response_code(400);
        echo json_encode(['error' => 'Le champ message est obligatoire.']);
        exit;
    }

    echo json_encode(['error' => 'Hello toi']);

    $stmt = $pdo->prepare("INSERT INTO avis (nom, role, message) VALUES (:nom, :role, :message)");
    $stmt->execute([
        ':nom' => $nom,
        ':role' => $role,
        ':message' => $message
    ]);

    $id = $pdo->lastInsertId();
    $stmt = $pdo->prepare("SELECT id, nom, role, message, created_at FROM avis WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();

    http_response_code(201);
    echo json_encode($row);
    exit;
}

http_response_code(405);

echo json_encode(['error' => 'Méthode non autorisée.']);
