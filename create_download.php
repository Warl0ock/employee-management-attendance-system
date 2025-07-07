<?php
// Simple download script that creates a tar.gz archive of the project
$project_name = 'employee_management_system';
$archive_name = $project_name . '.tar.gz';

// Create the archive using tar command
$command = "tar -czf {$archive_name} --exclude='{$archive_name}' --exclude='create_download.php' .";
$result = shell_exec($command);

if (file_exists($archive_name)) {
    // Set headers for download
    header('Content-Type: application/gzip');
    header('Content-Disposition: attachment; filename=' . $archive_name);
    header('Content-Length: ' . filesize($archive_name));
    
    // Send the file to the browser
    readfile($archive_name);
    
    // Delete the archive file after download
    unlink($archive_name);
} else {
    echo "Error: Could not create archive. Please try again.";
}
?>
