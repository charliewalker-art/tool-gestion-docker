<?php

namespace App\Controller;

use App\Model\Task;
use Dompdf\Dompdf;
use PDO;

class TaskController
{
    private $model;

    public function __construct(PDO $pdo)
    {
        $this->model = new Task($pdo);
    }

    public function index()
    {
        $tasks = $this->model->all();
        include __DIR__ . '/../View/tasks/list.php';
    }

    public function show($id)
    {
        $task = $this->model->find($id);
        include __DIR__ . '/../View/tasks/show.php';
    }

    public function form($id = null)
    {
        $task = $id ? $this->model->find($id) : null;
        include __DIR__ . '/../View/tasks/form.php';
    }

    public function store($data)
    {
        $this->model->create($data);
        header('Location: /');
    }

    public function update($id, $data)
    {
        $this->model->update($id, $data);
        header('Location: /');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: /');
    }

    public function exportPdf()
    {
        $tasks = $this->model->pending();
        ob_start();
        include __DIR__ . '/../View/tasks/list.php';
        $html = ob_get_clean();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('tasks.pdf');
        exit;
    }
}
