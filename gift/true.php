<?php
// قائمة الأسماء الصحيحة
$valid_names = ["لمى", "لملم", "لمومتي", "لمو","Lama","lama","LAMA"];

// التحقق من إرسال البيانات عن طريق POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على الاسم المدخل
    $name = $_POST['name'];

    // التحقق من صحة الاسم
    if (in_array($name, $valid_names)) {
        // إذا كان الاسم صحيحًا، إعادة توجيه إلى صفحة success.php
        header("Location: true.html");
    } else {
        // إذا كان الاسم خطأ، إعادة توجيه إلى صفحة error.php
        header("Location: false.html");
    }
    exit();
}
?>
