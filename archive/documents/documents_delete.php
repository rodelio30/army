<?php
include '../../include/connect.php';

$docu_id = $_GET['ID'];

// $sql = "DELETE FROM documents WHERE docu_id = $docu_id ";

// // Assuming you have the file ID stored in a variable called $fileId
// // Retrieve the file information from the database
// $stmt = $conn->prepare("SELECT filename, filepath FROM documents WHERE docu_id = ?");
// $stmt->bind_param("i", $docu_id);
// $stmt->execute();
// $stmt->bind_result($filename, $filepath);
// $stmt->fetch();
// $stmt->close();

// // Delete the file from the directory
// if (unlink('../../'.$filepath)) {
//     // File deletion successful, now delete the record from the database
//     $deleteStmt = $conn->prepare("DELETE FROM documents WHERE docu_id = ?");
//     $deleteStmt->bind_param("i", $docu_id);
//     $deleteStmt->execute();
//     $deleteStmt->close();
//     echo "<script>alert('File deleted successfully.');</script>";
//     header("Refresh:0.4; url=../../admin_archive.php");
// } else {
//     // File deletion failed
//     echo "Error deleting the file.";
// }


// Retrieve the file name from the database for the entry you want to delete
$stmt = $conn->prepare("SELECT filename FROM documents WHERE docu_id = ?");
$stmt->bind_param("i", $docu_id);
$stmt->execute();
$stmt->bind_result($filename);
$stmt->fetch();
$stmt->close();

// Execute the database deletion query to remove the entry
$deleteStmt = $conn->prepare("DELETE FROM documents WHERE docu_id = ?");
$deleteStmt->bind_param("i", $docu_id);
$deleteStmt->execute();
$deleteStmt->close();
header("Refresh:0.1; url=../../admin_archive.php");

// Check if any other entries in the database have the same file name
$checkStmt = $conn->prepare("SELECT COUNT(*) FROM documents WHERE filename = ?");
$checkStmt->bind_param("s", $filename);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();
$checkStmt->close();

// If no other entries exist with the same file name, unlink/delete the file from the directory
if ($count === 0) {
    $filePath = '../../uploads/' . $filename; // Adjust the file path based on your directory structure
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// if ($conn->query($sql) === TRUE) {
//   header("Refresh:0.4; url=../../admin_archive.php");
// } else {
//   echo "Error updating record: " . $conn->error;
// }
