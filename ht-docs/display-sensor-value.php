<?php
// This part is only used for AJAX requests
if (isset($_GET['get_value'])) {
    $mysqli = new mysqli("localhost", "database_user", "123aretaiba", "new_database");

    if ($mysqli->connect_errno) {
        echo json_encode(["error" => "Failed to connect"]);
        exit();
    }

    $result = $mysqli->query("SELECT value FROM sensors WHERE id = 1");

    if ($row = $result->fetch_assoc()) {
        echo json_encode(["value" => $row['value']]);
    } else {
        echo json_encode(["error" => "No data"]);
    }

    $mysqli->close();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Sensor Value</title>
    <style>
        #myProgress {
            width: 100%;
            background-color: #ddd;
            border-radius: 20px;
        }

        #myBar {
            width: 0%;
            height: 30px;
            background-color: #4CAF50;
            text-align: center;
            line-height: 30px;
            color: white;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<h1>Sensor Value Progress</h1>

<div id="myProgress">
  <div id="myBar">0%</div>
</div>

<script>
function updateSensorValue() {
    fetch("display-sensor-value.php?get_value=true")
        .then(response => response.json())
        .then(data => {
            if (data.value !== undefined) {
                let value = parseFloat(data.value);
                let percentage = Math.min(100, Math.max(0, value * 20)); // Example: scale 0–5V to 0–100%
                let bar = document.getElementById("myBar");
                bar.style.width = percentage + "%";
                bar.innerHTML = value.toFixed(2) + " V";
            }
        });
}

// Faster update: every 250 milliseconds
setInterval(updateSensorValue, 250);

// Initial call
updateSensorValue();
</script>

</body>
</html>
