<?php

//webpage which allows the help desk agent to view problems associated with a specific user

require_once __DIR__ . '/../src/controllers/problemCont.php';
require __DIR__ . '/../src/views/navbar.php';
require_once __DIR__ . '/../src/middleware/authenticate.php';

Authenticate::requireAgent();

$controller = new ViewProblemsController();
$userId = $_GET['user_id'] ?? null;
$problems = $controller->getProblems($userId);

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
        <div class="container" style="margin-top: 10px">
            <div class="row">
                <div class="col" style="font-family: lato; font-weight: bold">
                    <h2 class="text-center" style="font-weight: bold; margin-top: 30px">Problem History</h2>
                </div>
            </div>
        </div>

        <div class="container content-wrapper">
            <div class="container content-wrapper mt-5 d-flex justify-content-center">
                <?php if (!empty($problems)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center align-middle">
                            <caption class="visually-hidden">List of problems previously submitted by the user</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Problem ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Assigned To</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($problems as $p): ?>
                                    <tr>
                                        <td><?= $p["problem_id"] ?></td>
                                        <td style="max-width:250px; white-space:normal; word-wrap:break-word;"><?= $p["title"] ?></td>
                                        <td style="max-width:250px; white-space:normal; word-wrap:break-word;"><?= $p["description"] ?></td>
                                        <td><?= $p["status"] ?></td>
                                        <td><?= $p["assigned_to"] ?: "-" ?></td>
                                        <td><?= $p["created_at"] ?></td>
                                        <td><?= $p["updated_at"] ?></td>
                                        <td><a class="btn btn-sm btn-primary">Assign</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info text-center" role="alert">This user has not submitted any problems yet.</div>
                <?php endif; ?>
            </div>
        </div>         
    </body>
</html>