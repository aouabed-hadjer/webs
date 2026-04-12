<?php

if (isset($_POST['course'], $_POST['credits'], $_POST['grade'])) {

    $courses = $_POST['course'];
    $credits = $_POST['credits'];
    $grades  = $_POST['grade'];

    $totalPoints = 0;
    $totalCredits = 0;

    echo "<h2>Result</h2>";

    echo "<table border='1'>
            <tr>
                <th>Course</th>
                <th>Credits</th>
                <th>Grade</th>
                <th>Points</th>
            </tr>";

    for ($i = 0; $i < count($courses); $i++) {

        $course = htmlspecialchars($courses[$i]);
        $cr = floatval($credits[$i]);
        $g = floatval($grades[$i]);

        if ($cr <= 0) continue;

        $points = $cr * $g;

        $totalPoints += $points;
        $totalCredits += $cr;

        echo "<tr>
                <td>$course</td>
                <td>$cr</td>
                <td>$g</td>
                <td>$points</td>
              </tr>";
    }

    echo "</table>";

    if ($totalCredits > 0) {

        $gpa = $totalPoints / $totalCredits;

        if ($gpa >= 3.7) {
            $status = "Distinction";
        } elseif ($gpa >= 3.0) {
            $status = "Merit";
        } elseif ($gpa >= 2.0) {
            $status = "Pass";
        } else {
            $status = "Fail";
        }

        echo "<h3>Your GPA: " . round($gpa, 2) . " ($status)</h3>";

    } else {
        echo "No valid data";
    }

} else {
    echo "Data not received";
}

?>
