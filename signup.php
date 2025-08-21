<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FindingHub - Signup</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    </head>
<body>

  <!-- Navbar -->
<nav class="navbar">
  <div class="logo">FindingHub</div>
  <div class="nav-links">
    <a href="./api/reportitems.php">Report items</a>
    <a href="viewlistining.html">View Listing</a>
    <!-- Toggle Button -->
    <button class="toggle-btn" id="authToggle"></button>
  </div>
</nav>

  <!-- Signup Form -->
  <section class="signup-container">
    <div class="signup-box">
      <h2>Signup</h2>
      <form>
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Enter your username" required>

        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" required>

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" placeholder="Confirm your password" required>

    <a href="home.php">Home</a>
    <a href="./api/reportitems.php">Report items</a>
    <a href="viewlistining.php">View Listing</a>
    <!-- Toggle Button -->
    <button class="toggle-btn" id="authToggle"></button>
  </div>
</nav>

  <!-- Signup Form -->
  <section class="signup-container">
    <div class="signup-box">
      <h2>Signup</h2>
      <form>
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Enter your username" required>

        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" required>

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" placeholder="Confirm your password" required>
        <button type="submit">Signup</button>
      </form>
      <div class="signup-footer">
        Already have an account? <a href="signin.html">Signin here</a>
      </div>
    </div>
  </section>

</body>
</html>