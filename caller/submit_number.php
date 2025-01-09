<form action="submit_number.php" method="post">
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" required>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <label for="address">Address:</label>
    <input type="text" id="address" name="address">
    <label for="social_profiles">Social Profiles (JSON):</label>
    <input type="text" id="social_profiles" name="social_profiles">
    <label for="other_info">Other Info:</label>
    <textarea id="other_info" name="other_info"></textarea>
    <button type="submit">Submit</button>
</form>
