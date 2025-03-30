<?php
// قائمة الأسماء الصحيحة كمصفوفة (مع تحسينات للأحرف الكبيرة/الصغيرة)
$valid_names = array("سارة", "ساره", "سارتي", "سوستي", "سوسة", "sara", "sarah");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تنظيف المدخلات والتأكد من عدم وجود مسافات زائدة
    $name = trim($_POST['name']);
    
    // تحويل الاسم لأحرف صغيرة للمقارنة (للأسماء الإنجليزية فقط)
    $normalized_name = strtolower($name);
    
    // التحقق من صحة الاسم (مع مراعاة الحالة للأسماء العربية)
    if (in_array($name, $valid_names) || in_array($normalized_name, $valid_names)) {
        // إضافة الاسم إلى الجلسة لاستخدامه في الصفحة التالية إذا لزم الأمر
        session_start();
        $_SESSION['verified_name'] = $name;
        
        // التوجيه إلى صفحة النجاح مع إمكانية إضافة الاسم كمعامل
        header("Location: true.html?name=" . urlencode($name));
        exit();
    } else {
        // تسجيل محاولة الدخول الفاشلة (لأغراض الأمان)
        error_log("محاولة دخول باسم غير صحيح: " . $name);
        
        // التوجيه إلى صفحة الخطأ مع رسالة
        header("Location: false.html?error=invalid_name");
        exit();
    }
} else {
    // إذا حاول الوصول إلى الملف مباشرة بدون إرسال بيانات
    header("Location: index.html");
    exit();
}
?>
