

<?php

$this->disableAutoLayout();
$cakeDescription = 'cloth shop';
?>
<!doctype html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <?= $this->Html->css(['login']) ?>

</head>

<body>
<main class="form-signin w-100 m-auto">

            <?= $this->Flash->render() ?>
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <?= $this->Form->create() ?>
            <div class="form-group">
                <div class="form-floating">
                <?= $this->Form->control('email', ['required' => true,'class'=>'form-control']) ?>
                </div>
                <div class="form-floating">
                <?= $this->Form->control('password', ['required' => true,'class'=>'form-control']) ?>
                </div>
            </div>
            <?= $this->Form->submit(__('Login'),['class'=>'w-100 btn btn-lg btn-primary']); ?>
            <?= $this->Form->end() ?>

            <?= $this->Html->link("Add User", ['action' => 'add']) ?>
</main>
</body>

</html>
