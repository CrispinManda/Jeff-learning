<?php include 'header.php'; ?>
<?php include 'db.php'; ?>



    <style>
        body {
            padding: 50px;
        }
        .table-container {
            max-width: 1000px;
            margin: auto;
        }
    </style>


<?php

// Retrieve contacts from the database
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<div class="container table-container">
    <h2>Contact Records</h2>
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Registered Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No contact records found.</div>
    <?php endif; ?>
    
    <?php $conn->close(); ?>
</div>

 <?php include 'footer.php'; ?>
