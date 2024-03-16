<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แสดงผล</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <h1>ผลการแบ่งกลุ่ม</h1>
    <?php
    // เช็คว่ามีการส่งข้อมูลมาโดยเมธอด POST หรือไม่
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // เก็บชื่อนักเรียนที่ส่งมาจากฟอร์ม
      $names = $_POST["name"];
      // กำหนดชื่อสถาบันในตัวแปร $kings เป็น array
      $kings = ["ประชาชื่น", "อินทร", "กนกอาชีวะ", "บูรณพล"];
      // นับจำนวนสถาบันและจำนวนนักเรียน
      $numKings = count($kings);
      $numPeople = count($names);

      // สุ่มตำแหน่งของนักเรียน
      shuffle($names);//สุ่มข้อมูล

      // ตรวจสอบว่าจำนวนนักเรียนน้อยกว่าจำนวนสถาบันหรือไม่
      if ($numPeople < $numKings) {
        $allocatedKings = [];
        // สร้างการแบ่งกลุ่มแบบสุ่ม
        foreach ($names as $person) {
          $randomKingIndex = array_rand($kings);
          $allocatedKings[$randomKingIndex][] = $person;
        }

        // แสดงผลการแบ่งกลุ่ม
        foreach ($kings as $index => $king) {
          echo '<div class="king">';
          echo '<h2>' . $king . '</h2>';
          if (isset($allocatedKings[$index])) {
            echo '<ul>';
            foreach ($allocatedKings[$index] as $person) {
              echo '<li>' . $person . '</li>';
            }
            echo '</ul>';
          } else {
            echo '<p>ไม่มีนักเรียน</p>';
          }
          echo '</div>';
        }
      } else {
        // คำนวณและแบ่งกลุ่มแบบเฉลี่ย
        $averagePerKing = ceil($numPeople / $numKings);
        $allocatedKings = array_chunk($names, $averagePerKing);

        // แสดงผลการแบ่งกลุ่ม
        foreach ($kings as $index => $king) {
          echo '<div class="king">';
          echo '<h2>' . $king . '</h2>';
          if (isset($allocatedKings[$index])) {
            echo '<ul>';
            foreach ($allocatedKings[$index] as $person) {
              echo '<li>' . $person . '</li>';
            }
            echo '</ul>';
          } else {
            echo '<p>ไม่มีนักเรียน</p>';
          }
          echo '</div>';
        }
      }
    }
    ?>
    <div class="button-container">
      <button onclick="window.history.back()">แก้ไขชื่อ</button>
      <a href="index.php"><button>กลับหน้าแรก</button></a>
    </div>
  </div>
</body>

</html>
