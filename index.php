<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Robot Arm Control Panel</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        .slider-container { margin-bottom: 20px; }
        label { display: inline-block; width: 70px; }
        input[type=range] { width: 300px; }
        .buttons { margin-top: 20px; }
        table { margin-top: 30px; border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #eee; }
    </style>
</head>
<body>

<h2>Robot Arm Control Panel</h2>

<form id="controlForm">
    <!-- Sliders for Motors 1 to 6 -->
    <?php
    for ($i = 1; $i <= 6; $i++) {
        echo "<div class='slider-container'>
                <label for='motor$i'>Motor $i:</label>
                <input type='range' id='motor$i' name='motor$i' min='0' max='180' value='90' oninput='updateValue($i)'>
                <span id='value$i'>90</span>
              </div>";
    }
    ?>
    
    <!-- Control Buttons -->
    <div class="buttons">
        <button type="button" onclick="resetSliders()">Reset</button>
        <button type="button" onclick="savePose()">Save Pose</button>
        <button type="button" onclick="runPose()">Run</button>
    </div>
</form>

<!-- Table for displaying saved poses -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Motor 1</th><th>Motor 2</th><th>Motor 3</th>
            <th>Motor 4</th><th>Motor 5</th><th>Motor 6</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="poseTableBody"></tbody>
</table>

<script>
    // Update value next to each slider
    function updateValue(motorId) {
        const slider = document.getElementById(`motor${motorId}`);
        const value = document.getElementById(`value${motorId}`);
        value.textContent = slider.value;
    }

    // Reset all sliders to default value (90)
    function resetSliders() {
        for (let i = 1; i <= 6; i++) {
            const slider = document.getElementById(`motor${i}`);
            slider.value = 90;
            document.getElementById(`value${i}`).textContent = "90";
        }
    }

    // Placeholder for saving pose
    function savePose() {
        alert("Saving pose (not implemented yet)");
    }

    // Placeholder for running pose
    function runPose() {
        alert("Running pose (not implemented yet)");
    }
</script>

</body>
</html>
