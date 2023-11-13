<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Class</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Learners list</h2>
        <a class="btn btn-success" href="/myclass/create.php" role="button">Add Learner</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>LearnerID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myclass";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                $sql = "SELECT * FROM learners";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>{$row['learnerid']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['surname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                    <a class='btn btn-success btn-sm' href='/myclass/edit.php?learnerid={$row['learnerid']}'>Update</a>
                    <a class='btn btn-danger btn-sm' href='/myclass/delete.php?learnerid={$row['learnerid']}'>Delete</a>                    
                    </td> 
                </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
