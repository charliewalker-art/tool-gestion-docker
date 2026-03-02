<?php include __DIR__ . '/../header.php'; ?>

<h1>Liste des tâches</h1>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['id']) ?></td>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['status']) ?></td>
            <td class="actions">
                <a class="btn btn-sm" href="/?action=show&id=<?= $task['id'] ?>">Voir</a>
                <a class="btn btn-sm" href="/?action=form&id=<?= $task['id'] ?>">Modifier</a>
                <a class="btn btn-sm btn-danger" href="/?action=delete&id=<?= $task['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../footer.php'; ?>
