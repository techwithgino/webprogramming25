<?php
include 'db.php';

$sql = "SELECT * FROM userquery";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Query</th>
                    <th>Attachment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        $fileLink = $row['attachment'] ? "<a href='{$row['attachment']}' target='_blank'>View</a>" : "No file";
        echo "<tr>
                <td>{$row['sn']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['email_add']}</td>
                <td>{$row['company_name']}</td>
                <td>{$row['phone_num']}</td>
                <td>{$row['query']}</td>
                <td>$fileLink</td>
                <td><a href='updatesingle.php?sn={$row['sn']}' class='btn btn-sm btn-warning'>Edit/Delete</a></td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<div class='alert alert-info'>No submissions found.</div>";
}

$conn->close();
?>