<?php
// File manager by Asrail7x (GitHub)

$dir_name = "images/";
$nftID = $_POST['nftID'];

if(is_dir($dir_name)) {
    $files = scandir($dir_name);
} else {
    echo "$dir_name is not a directory";
}

function deleteFile($dir_name, $nftID) {
    $fileName = $dir_name . $nftID . ".gif";
    if (unlink($fileName)) {
        echo "$fileName deleted successfully";
    } else {
        echo "error deleting $fileName";
    }
}

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    // File properties
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Extracting file extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    // Allowed extensions
    $allowed = array('gif');

    // If the extension allowed 
    if (in_array($fileActualExt, $allowed)) {
        // $fileError has to be zero to check there is no errors
        if($fileError === 0 ) {
            // Not bigger than 50MB
            if ($fileSize < 5000000) {
                // Put your collection max supply here
                if ((int)$nftID <= 11111) {
                    $fileDestination = $dir_name . $nftID . ".gif";
                    deleteFile($dir_name, $nftID);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: index.php?uploadedsuccess");
                } else {
                    echo "Only less or equal to 11111";
                }
            } else {
                echo "File size greater than 50MB";
            }
        } else {
            echo "There was an error uploading yout=r file";
        }
    } else {
        echo "You can only upload .gif files";
    }

}

