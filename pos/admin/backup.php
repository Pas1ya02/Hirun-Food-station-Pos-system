
<?php

$host = $_SERVER['SERVER_NAME'];
$username = "hirunfoo_infintihex";
$password = "Infini@2002@2010hirunpos";
$database_name = "hirunfoo_rposystem";


// Get connection object and set the charset
$conn = mysqli_connect($host, $username, $password, $database_name);
$conn->set_charset("utf8");

// Get All Table Names From the Database
$tables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

$sqlScript = "";
foreach ($tables as $table) {    
    // Prepare SQLscript for creating table structure
    $query = "SHOW CREATE TABLE $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    
    $sqlScript .= "\n\n" . $row[1] . ";\n\n";
      
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    
    $columnCount = mysqli_num_fields($result);    
    // Prepare SQLscript for dumping data for each table
    for ($i = 0; $i < $columnCount; $i ++) {
        while ($row = mysqli_fetch_row($result)) {
            $sqlScript .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j ++) {
                $row[$j] = $row[$j];
                
                if (isset($row[$j])) {
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= '""';
                }
                if ($j < ($columnCount - 1)) {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
    }
    $sqlScript .= "\n"; 
}

if (!empty($sqlScript)) {
    // Save the SQL script to a backup file
    $backup_file_name = $database_name . '_backup_' . time() . '.sql';
    
    // Remove the encryption and include the raw SQL script in the file
    $fileHandler = fopen($backup_file_name, 'w+');
    fwrite($fileHandler, $sqlScript);
    fclose($fileHandler);

    // Download the SQL backup file to the browser
    
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
   
    header('Content-Length: ' . filesize($backup_file_name));


    readfile($backup_file_name);

    // Optional: Delete the backup file after download
    unlink($backup_file_name);
}
?>