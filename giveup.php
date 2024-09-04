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
    <?php
        session_start();
        echo "<p>The hidden number was: ". $_SESSION["number"] ."</p>";    // displays hiden number
    ?>                      
    <p><a href="startover.php">Start Over</a></p>                          <!-- links to updating page -->
</body>
</html>