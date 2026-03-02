<?php include __DIR__ . '/../header.php'; ?>

<div class="card">
    <h2>Détails de la tâche</h2>
    <p><strong>ID:</strong> <?= htmlspecialchars($task['id']) ?></p>
    <p><strong>Titre:</strong> <?= htmlspecialchars($task['title']) ?></p>
    <p><strong>Description:</strong><br><?= nl2br(htmlspecialchars($task['description'])) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($task['status']) ?></p>
    <div class="card-actions">
        <a class="btn" href="/?action=form&id=<?= $task['id'] ?>">Modifier</a>
        <a class="btn" href="/">Retour à la liste</a>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
