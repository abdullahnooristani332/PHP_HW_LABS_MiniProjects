<?php

$studentName = "Abdullah Nooristani";
$studentID = "2026001";
$subject = "PHP Programming";
$marks = 82;
$attendance = 88;


// Calculate Grade
if ($marks >= 90) {
    $grade = "A";
} elseif ($marks >= 80) {
    $grade = "B";
} elseif ($marks >= 70) {
    $grade = "C";
} elseif ($marks >= 60) {
    $grade = "D";
} else {
    $grade = "F";
}


// Determine Pass / Fail
if ($marks >= 50 && $attendance >= 75) {

    $result = "Passed";
    $statusMessage = "Congratulations! You have successfully passed.";
    $resultClass = "passed";
} else {

    $result = "Failed";
    $resultClass = "failed";

    if ($marks < 50 && $attendance < 75) {
        $statusMessage = "You failed because your marks and attendance are insufficient.";
    } elseif ($marks < 50) {
        $statusMessage = "You failed because your marks are below 50.";
    } elseif ($attendance < 75) {
        $statusMessage = "You failed because your attendance is below 75%.";
    }
}


// Attendance Warning
if ($attendance < 75) {
    $attendanceWarning = "Warning: Attendance is below the required 75%.";
} else {
    $attendanceWarning = "Attendance requirement satisfied.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Result Card</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <div class="result-card">

            <h1>Student Result Card</h1>

            <div class="student-info">

                <p>
                    <strong>Student Name:</strong>
                    <?php echo $studentName; ?>
                </p>

                <p>
                    <strong>Student ID:</strong>
                    <?php echo $studentID; ?>
                </p>

                <p>
                    <strong>Subject:</strong>
                    <?php echo $subject; ?>
                </p>

            </div>


            <div class="results">

                <div class="result-item">
                    <span>Marks</span>
                    <strong><?php echo $marks; ?></strong>
                </div>

                <div class="result-item">
                    <span>Attendance</span>
                    <strong><?php echo $attendance; ?>%</strong>
                </div>

                <div class="result-item">
                    <span>Grade</span>
                    <strong><?php echo $grade; ?></strong>
                </div>

            </div>


            <div class="attendance-message">

                <?php echo $attendanceWarning; ?>

            </div>


            <div class="status <?php echo $resultClass; ?>">

                <h2><?php echo $result; ?></h2>

                <p><?php echo $statusMessage; ?></p>

            </div>


            <div class="requirements">

                <h3>Passing Requirements</h3>

                <p>Minimum Marks: 50</p>

                <p>Minimum Attendance: 75%</p>

            </div>

        </div>

    </div>

</body>

</html>