<?php
    session_start();                        // start the session

    if (!isset ($_SESSION["number"]) &&     // check if session variable exists
        !isset ($_SESSION["guess_count"]) &&
        !isset ($_SESSION["isSuccess"])) {     
        $_SESSION["number"] = rand(1, 100); // create the session variables
        $_SESSION["guess_count"] = 0;
        $_SESSION["isSucess"] = false;
    }

    if (isset ($_GET["guess"]) && !empty($_GET["guess"])) {
        $guess = intval($_GET["guess"]);
        $num = $_SESSION["number"];
        
        if (is_numeric($guess)) {
            if ($guess > 0 && $guess <= 100) {

                if ($guess < $num) {
                    $message = "The number to guess is <strong>higher</strong> than your number: $guess";
                    $_SESSION["guess_count"]++;
                } 
                elseif ($guess > $num) {
                    $message = "The number to guess is <strong>lower</strong> than your number: $guess";
                    $_SESSION["guess_count"]++;
                }
                else {
                    $message = "Congratulations! You guessed the hidden number: <strong>$num</strong>";
                    $_SESSION["isSucess"] = true;
                }
            } else {
                $message = "Invalid number! Your number is not in range.";
            }

        } else {
            $message = "Please provide a number!";
        }
    } else {
        $message = "Give it a try!";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Web application development">
    <meta name="keywords" content="PHP">
    <title>Creating a simple "Guessing Game"</title>
</head>
<body>
    <h1>Guessing Game</h1>
    <p>Enter a number between 1 and 100, then press the Guess button.</p>
    <form action="guessinggame.php" method="get">
        <p><input type="text" name="guess">
        <input type="submit" value="Guess" <?php if($_SESSION["isSucess"]) { echo "disabled"; } ?> ></p>
    </form>
    <?php
        echo "<p>$message</p>";                                             // displays the message
        echo "<p>Number of guesses: ". $_SESSION["guess_count"] ."</p>";    // displays guesses count

        if (!$_SESSION["isSucess"])
        {
            echo '<p><a href="giveup.php">Give Up</a></p>';
        }
    ?>
    <p><a href="startover.php">Start Over</a></p>
</body>
</html>
