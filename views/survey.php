<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Midterm</title>
</head>
<body>
    <h1>Midterm Survey</h1>
    <form method="post" action="#">
        <label>Name
            <input type="text" name="name" value="{{ @name }}">
        </label>
        <p>Check all that apply:</p>
        <repeat group="{{ @option }}" value="{{ @options }}">
                <input type="checkbox" name="options[]" value="{{ @options }}">
                <label class="form-check-label">{{ @options }}</label>
                <br>
        </repeat>
        <input type="submit" value="Submit">
    </form>
</body>
</html>