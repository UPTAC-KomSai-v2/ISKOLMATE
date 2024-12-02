<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iskolmate - Sign Up</title>
    <link rel="stylesheet" href="{{asset('css/final_css.css')}}">

</head>

<body>
    <div class="container">
        <!-- Title -->
        <div class="title">Iskolmate</div>

        <!-- Question -->
        <div class="question">Which one are you signing up for?</div>

        <!-- Buttons -->
        <div class="button-container">
            <button class="btn" onclick="location.href='teacher_signup.blade.php'">Teacher</button>
            <button class="btn" onclick="location.href='student_signup.blade.php'">Student</button>
        </div>
    </div>
</body>

</html>