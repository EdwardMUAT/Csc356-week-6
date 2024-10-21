<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mars Tour Countdown</title>
    <link rel="stylesheet" href="main.css" <!-- Link to external CSS file -->
</head>
<body>

    <!-- Navigation Menu -->
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Mars Info</a></li>
            <li><a href="#">Tickets</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <!-- Countdown Display -->
    <div id="counter">Countdown</div>
    
    <header>
        <h1>Countdown to the Mars Tour Launch!</h1>
    </header>

    <main>
        <p>Get ready for an extraordinary journey to Mars! Stay tuned to the countdown below.</p>
    </main>

    <!-- PHP to set the target date -->
    <?php
        // Set the desired countdown date and time for the launch
        $dateTime = strtotime('October 20, 2024 12:00:00');
        $unixDateTime = date("F d, Y H:i:s", $dateTime);
    ?>

    <!-- JavaScript Countdown Script -->
    <script>
        // Fetch the launch date from PHP as a string, then convert to a Date object
        var countdownTimer = new Date("<?php echo $unixDateTime; ?>").getTime();

        // Start the countdown and update every second
        var intervalId = setInterval(function() {
            // Get the current time
            var currentTime = new Date().getTime();

            // Calculate the time difference between the countdown date and now
            var timeDiff = countdownTimer - currentTime;

            // Time constants for calculations
            const MS_IN_A_SECOND = 1000;
            const MS_IN_A_MINUTE = MS_IN_A_SECOND * 60;
            const MS_IN_A_HOUR = MS_IN_A_MINUTE * 60;
            const MS_IN_A_DAY = MS_IN_A_HOUR * 24;

            // Calculate days, hours, minutes, and seconds remaining
            var days = Math.floor(timeDiff / MS_IN_A_DAY);
            var hours = Math.floor((timeDiff % MS_IN_A_DAY) / MS_IN_A_HOUR);
            var minutes = Math.floor((timeDiff % MS_IN_A_HOUR) / MS_IN_A_MINUTE);
            var seconds = Math.floor((timeDiff % MS_IN_A_MINUTE) / MS_IN_A_SECOND);

            // Display the countdown in the div
            document.getElementById("counter").innerHTML = days + " Days, " + hours + " Hours, " + minutes + " Minutes, " + seconds + " Seconds";

            // If the countdown is over, stop the timer and display a message
            if (timeDiff < 0) {
                clearInterval(intervalId); // Stop the countdown
                document.getElementById("counter").innerHTML = "Sorry, you missed the launch!";
            }
            // Additional messages based on the time left
            else if (days < 14) {
                document.getElementById("counter").innerHTML += "<br>Pack your bags!";
            } else {
                document.getElementById("counter").innerHTML += "<br>Keep watching the countdown!";
            }
        }, 1000); // Update every 1 second
    </script>

</body>
</html>
