<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'students';
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    //
    $name = isset($_POST['Name']) && $_POST['Name']? $_POST['Name'] : null;
    $lastname = isset($_POST['Lastname']) && $_POST['Lastname']? $_POST['Lastname'] : null;
    $age = isset($_POST['Age']) && $_POST['Age']? $_POST['Age'] : null;
    if ($name && $lastname && $age) {
        $sql1 = "INSERT INTO students (name, lastname, age) VALUES ('$name','$lastname','$age')";
        mysqli_query($connection, $sql1);
    }
    //
    $id = isset($_POST['id']) && $_POST['id']? $_POST['id'] : null;
    if ($id) {
        $ERASURE = "DELETE FROM students WHERE id = '$id'";
        mysqli_query($connection, $ERASURE);
    }
    //
    $sql = 'SELECT * FROM `students`';
    $result = mysqli_query($connection, $sql);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <section>
        <form class='form-1' action="" method="post">
            <div class="input">
            <label for="Name">Name</label>
            <input type="text" name="Name">
            </div>
            <div class="input">
            <label for="Lastname">Lastname</label>
            <input type="text" name="Lastname">
            </div>
            <div class="input">
            <label for="Age">Age</label>
            <input type="text" name="Age">
            </div>
            <button>Add</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $value) :?>
                    <tr>
                    <td><?= $value['id']?></td>
                    <td><?= $value['name']?></td>
                    <td><?= $value['lastname']?></td>
                    <td><?= $value['age']?></td>
                    <td>
                        <form method='post'>
                            <input type="hidden" name='id' value=<?=$value['id']?>>
                            <button>X</button>
                        </form>
                    </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</body>
</html>