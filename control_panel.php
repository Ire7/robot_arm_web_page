<!DOCTYPE html>
<html>
<head>
    <title>Robot Arm Control Panel</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        .motor-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Robot Arm Control Panel</h1>

    <?php for ($i = 1; $i <= 6; $i++): ?>
        <div class="motor-control">
            <label>Motor <?= $i ?>:</label>
            <input type="range" min="0" max="180" value="90" id="motor<?= $i ?>" oninput="updateValue(<?= $i ?>)">
            <span id="value<?= $i ?>">90</span>
        </div>
    <?php endfor; ?>

    <button onclick="resetMotors()">Reset</button>
    <button onclick="savePose()">Save Pose</button>
    <button onclick="runPose()">Run</button>

    <script>
        function updateValue(i) {
            document.getElementById('value' + i).innerText = document.getElementById('motor' + i).value;
        }

        function resetMotors() {
            for (let i = 1; i <= 6; i++) {
                document.getElementById('motor' + i).value = 90;
                updateValue(i);
            }

            fetch('update_status.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'pose=reset'
            });
        }

        function savePose() {
            let values = [];
            for (let i = 1; i <= 6; i++) {
                values.push(document.getElementById('motor' + i).value);
            }

            fetch('update_status.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'pose=' + values.join(',')
            });
        }

        function runPose() {
            fetch('update_status.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'pose=run'
            });
        }
    </script>
</body>
</html>
