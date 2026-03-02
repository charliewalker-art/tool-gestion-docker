<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\TaskController;
use App\Model\Database;

// obtenir une connexion PDO via le modèle Database
$pdo = Database::getConnection();

$controller = new TaskController($pdo);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($id);
        break;
    case 'form':
        $controller->form($id);
        break;
    case 'store':
        $controller->store($_POST);
        break;
    case 'update':
        $controller->update($id, $_POST);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'exportPdf':
        $controller->exportPdf();
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Page non trouvée';
        break;
}
