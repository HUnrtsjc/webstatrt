<?php
// รับข้อมูลจากฟอร์ม
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// เชื่อมต่อ SQLite
$db = new SQLite3('path_to_your_database.db');

// ตรวจสอบการเชื่อมต่อ
if(!$db) {
    die("ไม่สามารถเชื่อมต่อ SQLite: " . $db->lastErrorMsg());
}

// เตรียมคำสั่ง SQL สำหรับการเพิ่มข้อมูล
$sql = "INSERT INTO your_table_name (name, email, message) VALUES ('$name', '$email', '$message')";

// ทำการเพิ่มข้อมูล
$result = $db->exec($sql);

if(!$result) {
    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $db->lastErrorMsg();
} else {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว!";
}

// ปิดการเชื่อมต่อ SQLite
$db->close();
?
