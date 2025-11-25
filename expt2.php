<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <style>
        body { 
            font-family: Arial; 
            background-color: #f8f8f8;
            text-align: center;   /* centers all text */
            margin: 0;
            padding: 40px;
        }

        .box, .bill-box { 
            width: 400px; 
            padding: 20px; 
            margin: 20px auto;   /* centers the boxes */
            border: 1px solid maroon; 
            background: white;
            border-radius: 10px;
            text-align: left;     /* align form labels nicely */
        }

        h2 { 
            color: brown; 
            text-align: center;
        }

        .bill-box {
            border: 2px solid maroon;
        }

        input[type="submit"] {
            background-color: brown;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkred;
        }

    </style>
</head>
<body>

<h2>Electricity Bill Generator</h2>

<div class="box">
<form method="post" action="">
    <b>Customer Name:</b><br>
    <input type="text" name="name" required><br><br>

    <b>Meter Number:</b><br>
    <input type="text" name="meter" required><br><br>

    <b>Billing Month:</b><br>
    <input type="text" name="month" placeholder="e.g., January 2025" required><br><br>

    <b>Units Consumed:</b><br>
    <input type="number" name="units" required><br><br>

    <input type="submit" value="Generate Bill">
</form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["name"];
    $address = $_POST["address"];
    $meter = $_POST["meter"];
    $month = $_POST["month"];
    $units = $_POST["units"];
    $bill = 0;

    // Tariff calculation (slab method)
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
    echo "<b>Meter Number:</b> $meter<br>";
    echo "<b>Billing Month:</b> $month<br><br>";

    echo "<b>Units Consumed:</b> $units<br>";
    echo "<b>Total Amount:</b> ₹$bill<br>";

    echo "</div>";
}
?>

</body>
</html>


