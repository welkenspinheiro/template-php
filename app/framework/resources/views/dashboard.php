<?php $this->extends('master', ['title' => $title]); ?>
<h2>Usuarios</h2>

<?php foreach ($users as $user) : ?>
    <li><?= $user->name; ?></li>
<?php endforeach; ?>