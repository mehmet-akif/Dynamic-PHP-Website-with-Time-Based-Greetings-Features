<!DOCTYPE html>
<html>
<head>
  <title>Multiplication Table</title>
  <style>
    
    body {
      font-family: Arial, sans-serif;
    }
    table {
      border-collapse: collapse;
      width: 50%;
      margin: 50px auto;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    th:first-child,
    td:first-child {
      font-weight: bold;
    }
  </style>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? $_POST['num1'] : '';
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : '';

   
    if ($num1 >= 3 && $num1 <= 12 && $num2 >= 3 && $num2 <= 12) {
        echo '<h2>Multiplication Table ' . $num1 . ' x ' . $num2 . '</h2>';
        echo '<table>';
        for ($i = 1; $i <= $num1; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $num2; $j++) {
                echo '<td>' . ($i * $j) . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
      
        echo '<h2>Error: Please enter numbers between 3 and 12</h2>';
        echo '<p><a href="lab08.php">Go back</a> and enter valid numbers.</p>';
    }
}
?>
</body>
</html>
