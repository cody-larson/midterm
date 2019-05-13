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
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Name
            <input type="text" name="name" value="{{ @name }}">
        </label>
        <span> {{ @nameErr }} </span>
        <p>Check all that apply:</p>
        <repeat group="{{ @option }}" value="{{ @options }}">
                <input type="checkbox" name="options[]" value="{{ @options }}">
                <label class="form-check-label">{{ @options }}</label>
                <br>
        </repeat>
        <span> {{ @optionsErr }} </span>
        <input type="submit" value="Submit">
    </form>
</body>
</html>