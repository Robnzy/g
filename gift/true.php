<?php
// قائمة الأسماء الصحيحة كمصفوفة
$valid_names = array("سارة", "ساره", "سارتي", "سوستي", "سوسة", "Sara", "Sarah");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    
    if (in_array($name, $valid_names)) {
        header("Location: true.html");
    } else {
        header("Location: false.html");
    }
    exit();
}
?>
