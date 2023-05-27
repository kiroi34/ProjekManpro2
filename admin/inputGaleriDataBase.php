<?php 
// Include the database configuration file 
include_once 'koneksi.php'; 
// $kategori = $_POST['kategori'];
// $id = $_POST['riwayatKategori'];
$riwayatKategori = $_POST['riwayatKategori'];

     
if(isset($_POST['submit'])){ 
    // File upload configuration 
    $targetDir = "gambarGaleri/"; 
    $allowTypes = array('jpg','png','jpeg'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
     
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
           
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    
                    $insertValuesSQL .= "(".$riwayatKategori.",'".$fileName."', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                
            }
        } 
        $insertValuesSQL = trim($insertValuesSQL, ',');
        $insert = $sambung->query("INSERT INTO galeri (kategori, file_name, gambar) VALUES $insertValuesSQL"); 
         
            // $insert = $sambung->query("INSERT INTO galeri (file_name, gambar) VALUES $insertValuesSQL"); 
            echo "<script>alert('Input Galeri Baru berhasil'); window.location.href = 'inputGaleri.php';</script>";
        // }else{ 
        //     echo "<script>alert('Input Galeri Baru gagal'); window.location.href = 'inputGaleri.php';</script>";
        // } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 
?>









