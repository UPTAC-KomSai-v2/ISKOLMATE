<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iskolmate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1e1e2f] text-white font-sans flex items-center justify-center min-h-screen m-0">
    <div
        class="container text-center w-[90%] max-w-[400px] p-8 bg-[#1e1e2f] rounded-[20px] shadow-[15px_15px_30px_#181824,-15px_-15px_30px_#242434]">
        <!-- Logo -->
        <div class="logo flex justify-center items-center mb-6">
            <img src="up.png" alt="UP Logo"
                class="w-[100px] rounded-full p-2.5 bg-[#1e1e2f] shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]" />
        </div>

        <!-- Title and Tagline -->
        <div class="title text-2xl font-bold text-white mb-2">Iskolmate</div>
        <div class="tagline text-sm text-gray-400 mb-8">your partner in suffering</div>

        <!-- Buttons -->
        <div class="button-container flex justify-around gap-4">
            <button
                class="btn w-[45%] max-w-[300px] px-4 py-2 bg-[#1e1e2f] text-white border-2 border-white rounded-lg font-bold text-lg shadow-[10px_10px_20px_#181824,-10px_-10px_20px_#242434] hover:bg-gradient-to-br hover:from-[#2c2c3f] hover:to-[#1b1b2d] hover:shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434] transition duration-300"
                onclick="location.href='login.blade.php'">
                Login
            </button>
            <button
                class="btn w-[45%] max-w-[300px] px-4 py-2 bg-[#1e1e2f] text-white border-2 border-white rounded-lg font-bold text-lg shadow-[10px_10px_20px_#181824,-10px_-10px_20px_#242434] hover:bg-gradient-to-br hover:from-[#2c2c3f] hover:to-[#1b1b2d] hover:shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434] transition duration-300"
                onclick="location.href='choices.blade.php'">
                Sign Up
            </button>
        </div>
    </div>
</body>

</html>