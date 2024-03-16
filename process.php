<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>คัดสรร</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>ระบบหมวกคัดสรรสถาบัน 4 kings</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $numberOfPeople = $_POST["numberOfPeople"];
      ?>
      <form action="result.php" method="POST">
        <?php
        for ($i = 1; $i <= $numberOfPeople; $i++) {
          echo '<label for="name' . $i . '">ชื่อคนที่ ' . $i . ':</label>';
          echo '<input type="text" id="name' . $i . '" name="name[]" required>';
        }
        ?>
        <button type="submit">จัดสรรบ้าน</button>
      </form>
      <?php
    }
    ?>
  </div>
</body>
</html>
