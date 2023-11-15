<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").on("keyup", function() {
                // Get the input value
                var name = $(this).val();

                // Send an AJAX request to check for an existing user
                $.ajax({
                    type: "POST",
                    url: "check_user.php",
                    data: { name: name },
                    success: function(response) {
                        $("#userDetails").html(response);
                    }
                });
            });

            // Check if passwords match when the form is submitted
            $("form").submit(function() {
                var password = $("#password").val();
                var confirmPassword = $("#confirmPassword").val();

                if (password !== confirmPassword) {
                    alert("Passwords do not match.");
                    return false; // Prevent form submission
                }
            });
        });
    </script>
</head>
<body>
    <h2>User Registration</h2>
    <form action="register_process.php" method="post">
        <label for="name">Name (characters only):</label>
        <input type="text" id="name" name="name" pattern="[A-Za-z]+" required><br><br>

        <label for="email">Email (ending with one of 6 domains):</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>

        <label for="phone">Phone (10 digits, starts with 0, 6, or 9):</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>

        <label for="class">Class (silver, gold, platinum):</label>
        <select id="class" name="class" required>
            <option value="silver">Silver</option>
            <option value="gold">Gold</option>
            <option value="platinum">Platinum</option>
        </select><br><br>

        <input type="submit" value="Register">
    </form>

    <div id="userDetails"></div>
</body>
</html>
