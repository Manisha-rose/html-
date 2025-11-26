<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Generator</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin: 40px;
        }
        .box, .bill-box {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid maroon;
            border-radius: 10px;
            text-align: left;
        }
        
        .bill-box {
            border: 2px solid maroon;  
        }
        h2 { color: brown; }
        input[type="submit"] {
            background-color: brown;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h2>Electricity Bill Generator</h2>

<div class="box">
<form method="post" action="">
    <b>Customer Name:</b><br>
    <input type="text" name="name" required><br><br>

    <b>Consumer ID:</b><br>
    <input type="text" name="meter" required><br><br>

    <b>Billing Period:</b><br>
    From: 
    <input type="text" name="from_date" 
           value="<?php echo date('Y-m-d', strtotime('-2 months')); ?>" 
           readonly><br><br>

    To: 
    <input type="text" name="to_date" 
           value="<?php echo date('Y-m-d'); ?>" 
           readonly><br><br>

    <b>Units Consumed:</b><br>
    <input type="number" name="units" required><br><br>

    <input type="submit" value="Generate Bill">
</form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $meter = $_POST["meter"];
    $from = $_POST["from_date"];
    $to = $_POST["to_date"];
    $units = $_POST["units"];
    $bill = 0;

    // Bill date & due date
    $billDate = date("d-m-Y");
    $dueDate = date("d-m-Y", strtotime("+7 days"));

    // Tariff calculation
    if ($units <= 100) {
        $bill = $units * 3;
    }
    else if ($units <= 200) {
        $bill = (100 * 3) + (($units - 100) * 5);
    }
    else if ($units <= 300) {
        $bill = (100 * 3) + (100 * 5) + (($units - 200) * 7);
    }
    else {
        $bill = (100 * 3) + (100 * 5) + (100 * 7) + (($units - 300) * 10);
    }

    echo "<div class='bill-box'>";
    echo "<h3 style='color:maroon; text-align:center;'>Electricity Bill Details</h3>";

    echo "<b>Customer Name:</b> $name<br>";
    echo "<b>Consumer ID:</b> $meter<br>";
    echo "<b>Billing Period:</b> " . date("d-m-Y", strtotime($from)) . " to " . date("d-m-Y", strtotime($to)) . "<br><br>";

    echo "<b>Bill Date:</b> $billDate<br>";
    echo "<b>Due Date:</b> $dueDate<br><br>";

    echo "<b>Units Consumed:</b> $units<br>";
    echo "<b>Total Amount:</b> ₹$bill<br>";

    echo "</div>";
}
?>

</body>
</html>

