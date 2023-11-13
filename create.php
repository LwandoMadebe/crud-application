<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myclass";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$surname = "";
$email = "";
$phone = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    do {
        if (empty($name) || empty($surname) || empty($email) || empty($phone)) {
        $errorMessage = "All fields are required";
        break;
    }

    $sql = "INSERT INTO learners (name, surname, email, phone)
            VALUES ('$name', '$surname', '$email', '$phone')";
     $result = $connection->query($sql);

    if  (!$result){
        $errorMessage = "Invalid query: " . $connection->error;
        break;
    }

    $name = "";
    $surname = "";
    $email = "";
    $phone = "";  

    $successMessage = "Learner added successfully";

    header("location: /myclass/index.php");
    exit;

    } while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Learner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container my-5">
        <h2>Add Learner</h2>

        <?php
        if (!empty($errorMessage )) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>


        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control"  name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
            </div>
          

            <?php
            if (!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                     <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                          <strong>$successMessage</strong>
                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                     </div>
               </div>
             ";
            }
            ?>

            <div class="row my-4">
                <div class="col-6 d-grid">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
               <div class="col-6 d-grid">
                    <a class="btn btn-success" href="/myclass/index.php" role="button">Cancel</a>
               </div>
           </div>
        </form>
    </div>
</body>
</html>
