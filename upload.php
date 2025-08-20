<?php
$targetDir = "uploads/"; // مجلد حفظ الملفات
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // إنشاء المجلد إذا لم يكن موجود
}

$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// السماح بأنواع محددة
$allowedTypes = array("pkg", "zip", "rar", "txt", "pdf"); 
if(!in_array($fileType, $allowedTypes)) {
    echo "هذا النوع من الملفات غير مسموح!";
    $uploadOk = 0;
}

if ($uploadOk && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    echo "تم رفع الملف بنجاح: ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
} else if($uploadOk) {
    echo "حدث خطأ أثناء رفع الملف.";
}
?>
