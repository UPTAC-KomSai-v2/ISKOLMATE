<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign-Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1e1e2f] text-white font-sans min-h-screen flex items-center justify-center">
    <div
        class="container mx-auto w-[90%] max-w-md p-10 bg-[#1e1e2f] rounded-[20px] shadow-[10px_10px_20px_#141418,-10px_-10px_20px_#282838] text-center relative">
        <!-- Back Button -->
        <div class="absolute top-3 left-3">
            <a href="javascript:history.back();" title="Go Back"
                class="block w-10 h-10 bg-[#1e1e2f] text-white text-center leading-[40px] text-2xl rounded-full shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] transition hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838]">
                ◁
            </a>
        </div>

        <!-- Logo -->
        <div class="logo flex justify-center items-center mb-6">
            <img src="up.png" alt="UP Logo"
                class="w-[100px] rounded-full p-2.5 bg-[#1e1e2f] shadow-[inset_10px_10px_20px_#181824,inset_-10px_-10px_20px_#242434]" />
        </div>

        <!-- Title and Tagline -->
        <div class="title text-2xl font-bold mb-2">Iskolmate</div>
        <div class="tagline text-gray-400 mb-8">your partner in suffering</div>

        <!-- Form Container -->
        <div class="form-container">
            <h2 class="text-xl font-semibold mb-6">Sign-up as a Student</h2>
            <form action="#" method="POST" class="space-y-4">
                <!-- Name -->
                <input type="text" name="name" placeholder="Name" required
                    class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                <!-- Student Number -->
                <input type="text" name="student_number" placeholder="Student Number" required
                    class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                <!-- Dropdown for Degree Program -->
                <select name="program"
                    class="w-full p-4 bg-[#1e1e2f] rounded-md shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                    <option value="" disabled selected>Select your program</option>
                    <option value="BS Computer Science">BS Computer Science</option>
                    <option value="BS Biology">BS Biology</option>
                    <option value="BS Applied Mathematics">BS Applied Mathematics</option>
                    <option value="BS Accountancy">BS Accountancy</option>
                    <option value="BA Literature">BA Literature</option>
                    <option value="BA Political Science">BA Political Science</option>
                    <option value="BA Political Science">BA Multimedia Arts</option>
                    <option value="BA Political Science">BA Economics</option>
                    <option value="BA Political Science">BA Psychology</option>
                </select>

                <!-- Password -->
                <input type="password" name="password" placeholder="Password" required
                    class="w-full p-4 bg-[#1e1e2f] rounded-lg shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] text-white text-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full p-4 text-lg font-bold bg-[#1e1e2f] text-white rounded-lg shadow-[5px_5px_10px_#141418,-5px_-5px_10px_#282838] hover:bg-[#252538] hover:shadow-[inset_5px_5px_10px_#141418,inset_-5px_-5px_10px_#282838] transition">
                    Submit
                </button>
            </form>
        </div>
    </div>
</body>

</html>