<?php
// Replace these variables with your database credentials
$host = 'localhost';
$username = 'root';
$password = 'Pasindu@123';
$database = 'rposystem';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current date and time for the backup file name
$date = date("Y-m-d_H-i-s");
$backupFile = "backup_$date.sql";

// Perform a mysqldump to create a backup
$command = "mysqldump --host=$host --user=$username --password=$password --databases $database > $backupFile";
exec($command);

// Check if the backup file was created successfully
if (file_exists($backupFile)) {
    // Set headers to force download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($backupFile) . '"');
    header('Content-Length: ' . filesize($backupFile));
    
    // Read the file and output it to the browser
    readfile($backupFile);

    // Delete the backup file after download (optional)
    unlink($backupFile);
} else {
    echo "Backup failed.";
}

// Close the database connection
$conn->close();
?>
