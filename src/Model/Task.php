<?php

namespace App\Model;

use PDO;
use PDOException;

class Task
{
    private $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM tasks ORDER BY created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare('INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)');
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['status'] ?? 'pending'
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare('UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?');
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['status'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM tasks WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function pending()
    {
        $stmt = $this->db->query("SELECT * FROM tasks WHERE status = 'pending' ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
