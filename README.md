## Robot Arm Control Panel - Web Interface 
This project provides a simple yet functional web-based control panel for a 6-motor robotic arm. The interface allows users to adjust the position of each motor using sliders and submit commands to either reset the motors, save the current pose, or run a saved pose. It was developed as part of Task 3 for Week 4 of the Smart Methods internship.

The control system uses a combination of front-end elements (HTML, JavaScript, and CSS) and backend logic written in PHP connected to a MySQL database. The database stores saved motor poses and tracks the current action (reset or run).

## Technologies Used:
HTML5
CSS3
JavaScript (Vanilla)
PHP 8.2+
MySQL
phpMyAdmin
XAMPP (Apache server)

## File Structure:

All files are placed inside the folder:
htdocs/web_week4_task/robot_arm_web/

Files:
1. index.php – Main control panel interface
2. update_status.php – Handles reset/run commands
3. get_run_pose.php – Fetches the latest saved pose
4. control_panel.php – Receives and stores saved poses

These files must be in the same directory for everything to work correctly.

## Database Configuration:
Database Name: robot_arm

## Table 1: arm_status

| Column Name | Type                  |
| ----------- | --------------------- |
| id          | INT (AUTO\_INCREMENT) |
| pose        | VARCHAR(10)           |
| created\_at | DATETIME              |

Stores the last command: either reset or run.

## Table 2: poses

| Column Name | Type                  |
| ----------- | --------------------- |
| id          | INT (AUTO\_INCREMENT) |
| motor1      | INT                   |
| motor2      | INT                   |
| motor3      | INT                   |
| motor4      | INT                   |
| motor5      | INT                   |
| motor6      | INT                   |
| created\_at | DATETIME              |

* Stores each saved pose including the motor values.

## Step-by-Step What I Did:
## Step 1: Creating index.php

* Designed a clean control panel interface with 6 sliders representing the 6 motors.
* Added buttons: Reset, Save Pose, and Run.
* Added live text update to reflect the current value of each motor.
* Included JavaScript functions to handle each button’s interaction.
* Buttons call PHP scripts via fetch() to send or retrieve data.
* Default slider values set to 90.

## Step 2: Creating update_status.php

* Receives reset or run commands via POST.
* Inserts that command into the arm_status table along with the current timestamp.
* Helps Arduino or other systems to know what action was requested.

## Step 3: Creating `control_panel.php`

* Receives POST data for the 6 motors when "Save Pose" is clicked.
* Saves them into the poses table along with the timestamp.
* Data is sanitized before insertion.
* Confirmation message is returned.

## Step 4: Creating get_run_pose.php

* Fetches the latest entry from the poses table.
* Returns motor values as JSON.
* This is useful when the robotic arm needs to execute the most recent pose saved.

## How Each File Works:

## index.php:

* Displays the UI.
* Uses JavaScript to update values in real-time.
* Sends async requests (fetch) to backend scripts on button click.

## update\_status.php:

* Simple POST handler that updates the action in the database.
* Example POST: { action: 'reset' }.

## control\_panel.php:

* Handles saving the current motor positions to the DB.
* Requires all motor values.
* Example POST: { motor1: 90, motor2: 90, ..., motor6: 90 }

## get\_run\_pose.php:

* Returns JSON of latest pose.
* Used by Arduino or interface to fetch current pose.

## Challenges Faced:

* Some issues appeared due to file structure; all PHP files **must** be in the same folder.
* Not Found (404) error appeared when `index.php` was not accessed via correct localhost URL.
* Ensured XAMPP server was running before accessing `localhost`.
* Verified database connection by checking phpMyAdmin structure.

## Final Result:

✅ User interface displays correctly.
✅ Buttons trigger appropriate PHP scripts.
✅ Data successfully saved into the MySQL database.
✅ Pose can be retrieved correctly.
✅ Clean user experience with minimal alerts (no unnecessary popups).

## Important Notes:

* Always keep all four PHP files in the **same directory**.
* Ensure Apache and MySQL are running in XAMPP before use.
* Tables must be created **before** using the interface.
* The system is modular: can be extended with more motors or buttons easily
* 
## Summary:

The goal of this task was to build a web-based control system for a robotic arm with 6 degrees of freedom. Using HTML, CSS, JavaScript, PHP, and MySQL, we implemented a functional UI and backend that lets users control and store arm positions (poses). Each component was thoroughly tested and corrected multiple times to ensure proper behavior, especially with database queries and file linking.
The system can be integrated with real robotic hardware or used in simulations (e.g., Arduino + Serial Monitor) by polling the `arm_status` and `poses` tables.
This README documents all work completed from scratch with clarification on code logic, database structure, and troubleshooting.
