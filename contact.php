   <?php include 'header.php'?>
    <?php include 'nav.php'?>
    <?php include 'db.php'; ?>


<h1>this is our first contact FILE </h1>


<?php
// Include database connection



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New record created successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>


    <style>
        body {
            padding: 50px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
        }
    </style>



<div class="container form-container">
    <h2>Contact Us</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" placeholder="Enter your message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Link to Admin Area -->
    <a href="contact-records" class="btn btn-secondary mt-3">View Contact Records</a>
</div>

 <?php include 'footer.php'; ?>





