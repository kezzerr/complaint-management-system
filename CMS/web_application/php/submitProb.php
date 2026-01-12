<?php

//webpage which allows the consumer to submit a problem

require __DIR__ . '/../src/views/navbar.php';
require_once __DIR__ . '/../src/middleware/authenticate.php';
require_once __DIR__ . '/../src/controllers/problemCont.php';

Authenticate::requireConsumer();

$controller = new ViewProblemsController();
$errors = [];
$success = false;

if (isset($_POST['submit'])) {
    $result = $controller->submitProblem(
        $_SESSION['user_id'],
        $_SESSION['org_id'],
        $_POST['title'] ?? '',
        $_POST['desc'] ?? ''
    );

    $success = $result['success'];
    $errors = $result['errors'];

    if ($success) {
    $_POST['title'] = '';
    $_POST['desc'] = '';
}
}

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato'>
        <link rel="stylesheet" href="../css/site.css">
    </head>
    
    <body>
        <div class="container content-wrapper">
            <div class="container" style="margin-top: 10px">
                <div class="row">
                    <div class="col" style="font-family: lato; font-weight: bold">
                        <div class="row">
                            <h2 style="text-align: center; font-weight: bold; margin-top: 30px">Submit Problem</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
    	        <div class="row d-flex justify-content-center">
			        <div class="col-12 col-md-6 col-lg-4 mx-auto" style="font-family: lato; font-weight: bold; margin-top: 30px; max-width: 275px">
    			        <form method="post" class="text-center">
                            <label for="title" style="padding-bottom: 5px">Title:</label>
                            <input class="form-control form-control-sm mb-2" type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
                            <?php if (isset($errors['title'])): ?>
                            <div class="error"><?= $errors['title'] ?></div>
                            <?php endif; ?>
                            <label for="desc" style="padding-bottom: 5px; padding-top: 10px">Description:</label>
                            <textarea class="form-control form-control-sm mb-2" name="desc" rows="7"><?= htmlspecialchars($_POST['desc'] ?? '') ?></textarea>
                            <?php if (isset($errors['desc'])): ?>
                            <div class="error"><?= $errors['desc'] ?></div>
                            <?php endif; ?>
                            <button class="btn btn-dark mt-3" type="submit" name="submit" value="submit">Submit</button>               
                        </form>
                        <?php if ($success): ?>
                        <div class="alert alert-success text-center" role="alert">Problem submitted successfully!<br>Problem ID: <?= $result['problem_id'] ?></div>
                        <?php endif; ?>  
			        </div>
		        </div>
	        </div>
        </div>
    </body>
</html>