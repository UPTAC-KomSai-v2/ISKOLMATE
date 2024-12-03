<!-- login student -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign-Up</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>

<body>
    <div class="container">
        <div class="back-button">
            <a href="/signup" title="Go Back">&#9664;</a>
        </div>

        <div class="logo">
            <img src="up.png" alt="UP Logo">
        </div>
        <div class="title">Iskolmate</div>
        <div class="tagline">your partner in suffering</div>


        <div class="form-container">
            <h2>Sign-up as a Student</h2>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="student_number" placeholder="Student Number" required>
                <input type="text" name="program" placeholder="Program" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>