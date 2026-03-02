<?php include __DIR__ . '/../header.php'; ?>

<div class="card">
    <h2><?= $task ? 'Modifier' : 'Nouvelle' ?> tâche</h2>
    <form class="task-form" method="post" action="/?action=<?= $task ? 'update&id=' . $task['id'] : 'store' ?>">
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" value="<?= htmlspecialchars($task['title'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4"><?= htmlspecialchars($task['description'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="pending" <?= (isset($task['status']) && $task['status']=='pending') ? 'selected' : '' ?>>En attente</option>
                <option value="done" <?= (isset($task['status']) && $task['status']=='done') ? 'selected' : '' ?>>Terminée</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit"><?= $task ? 'Mettre à jour' : 'Créer' ?></button>
    </form>
    <p><a class="btn" href="/">Retour à la liste</a></p>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
