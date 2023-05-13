<?php
    require_once '../config.php';
    if(!isset($base) && !isset($conn))
        exit();

    // all records
    $stmt_all = $conn->prepare("SELECT * FROM `students`");
    $stmt_all->execute();

    // add record
    if(isset($_POST['add-student']))
    {
        $first_name = isset($_POST['first-name']) ? trim($_POST['first-name']) : '';
        $last_name  = isset($_POST['last-name'])  ? trim($_POST['last-name'])  : '';
        if($first_name != '' && $last_name != '') {
            $stmt_insert = $conn->prepare("INSERT INTO `students`(`FirstName`, `LastName`) VALUES(?, ?)");
            $stmt_insert->bindParam(1, $first_name, PDO::PARAM_STR);
            $stmt_insert->bindParam(2, $last_name, PDO::PARAM_STR);
            $stmt_insert->execute();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/<?= $base ?>/public/dist/bootstrap-5.1.3/css/bootstrap.min.css"/>
    <title>Access</title>
</head>
<body>
    <!-- all records -->
    <div class="row justify-content-center pt-3">
        <div class="col-md-6">
            <h4 class="mb-3">All Students</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                while($row = $stmt_all->fetch()) {
                    $i += 1;
                ?>
                    <tr>
                        <td align="right"><?= $i ?>.</td>
                        <td><?= htmlentities($row['FirstName']) ?></td>
                        <td><?= htmlentities($row['LastName']) ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- add record -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h4 class="mb-3">Add Student</h4>
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name">
                    <label for="first-name">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name">
                    <label for="last-name">Last Name</label>
                </div>
                <div align="right">
                    <button name="add-student" type="submit" class="btn btn-primary btn-lg">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/<?= $base ?>/public/dist/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>