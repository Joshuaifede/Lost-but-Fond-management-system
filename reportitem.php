<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <script src="script.js" defer></script>
  <title>FindingHub - Lost & Found</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">FindingHub</div>
    <ul class="nav-links">
      <li>
        <button class="close-nav" id="closeNavBtn" aria-label="Close Menu">&times;</button>
      </li>
      <li><a href="index.html">Home</a></li>
      <li><a href="reportitem.php" class="active">Report items</a></li>
      <li><a href="viewlistining.html">View Listing</a></li>
    </ul>
    <div class="auth-buttons">
      <a href="signup.html">SignUp</a>
      <a href="signin.html">SignIn</a>
    </div>
    <div class="toggle-btn" id="toggleBtn">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>

  <style>
    .form-container {
  max-width: 800px;
  background: #eee;
  margin: 40px auto;
  padding: 25px;
  border-radius: 10px;
}
.form-container h2 {
  text-align: center;
  margin-bottom: 20px;
}
.form-row {
  display: flex;
  gap: 20px;
}
.form-group {
  flex: 1;
  display: flex;
  flex-direction: column;
  margin-bottom: 15px;
}
label {
  font-weight: bold;
  margin-bottom: 5px;
}
input, textarea, select {
  padding: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
}
textarea {
  resize: vertical;
  min-height: 80px;
}
.btn {
  width: 100%;
  padding: 12px;
  background: #2c0a63;
  color: #fff;
  font-size: 16px;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}
.btn:hover {
  background: #1e0647;
}

  </style>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = htmlspecialchars($_POST['item_name']);
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);
    $date_time = htmlspecialchars($_POST['date_time']);
    $location = htmlspecialchars($_POST['location']);
    $status = htmlspecialchars($_POST['status']);
    $contact_info = htmlspecialchars($_POST['contact_info']);
    
    // Handle file upload
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $image_path = "";
    if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] == 0) {
        $image_name = time() . "_" . basename($_FILES['item_image']['name']);
        $target_path = $upload_dir . $image_name;

        if (move_uploaded_file($_FILES['item_image']['tmp_name'], $target_path)) {
            $image_path = $target_path;
        }
    }

    // Save to database (example: MySQL)
    $conn = new mysqli("localhost", "root", "", "findinghub");
    if ($conn->connect_error) {
        die("DB Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO reports (item_name, category, description, date_time, location, status, contact_info, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $item_name, $category, $description, $date_time, $location, $status, $contact_info, $image_path);

    if ($stmt->execute()) {
        echo "<h2>Item Report Submitted Successfully!</h2>";
        echo "<a href='listing.php'>View Listings</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    // Show the form only if not POST
    ?>
    <div class="form-container">
      <h2>Report Lost or Found Item</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" id="item_name" required>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" required>
              <option value="">Select Category</option>
              <option value="Electronics">Electronics</option>
              <option value="Documents">Documents</option>
              <option value="Personal Items">Personal Items</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" required></textarea>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="date_time">Date & Time</label>
            <input type="datetime-local" name="date_time" id="date_time" required>
          </div>
          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" required>
              <option value="">Select Status</option>
              <option value="Lost">Lost</option>
              <option value="Found">Found</option>
            </select>
          </div>
          <div class="form-group">
            <label for="contact_info">Contact Info</label>
            <input type="text" name="contact_info" id="contact_info" required>
          </div>
        </div>
        <div class="form-group">
          <label for="item_image">Item Image</label>
          <input type="file" name="item_image" id="item_image" accept="image/*">
        </div>
        <button type="submit" class="btn">Submit Report</button>
      </form>
    </div>
    <?php
}
?>


  <footer>
      <div class="footer-content">
        <div class="footer-column">
          <h3>Help</h3>
          <ul>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Contact Support</a></li>
            <li><a href="#">How to Report</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Items Recalls</h3>
          <ul>
            <li><a href="#">View All Recalls</a></li>
            <li><a href="#">Report Recall</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Accessibility</h3>
          <ul>
            <li><a href="#">Accessibility Features</a></li>
            <li><a href="#">Feedback</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>AdChoices</h3>
          <ul>
            <li><a href="#">Advertising Preferences</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Legal</h3>
          <ul>
            <li><a href="#">Terms of use</a></li>
            <li><a href="#">Privacy Notice</a></li>
            <li><a href="#">Delete Account</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>
          © 2025 FindingHub. A Web-Based Lost But Found Management System For
          ESUT All Rights Reserved.
        </p>
      </div>
    </footer>
    <script>
    // Responsive navbar toggle
    window.addEventListener("DOMContentLoaded", () => {
      const toggleBtn = document.getElementById('toggleBtn');
      const navLinks = document.querySelector('.nav-links');
      const closeNavBtn = document.getElementById('closeNavBtn');
      if (toggleBtn && navLinks) {
        toggleBtn.addEventListener('click', () => {
          navLinks.classList.toggle('active');
        });
        // Close nav on link click (mobile UX)
        navLinks.querySelectorAll('a').forEach(link => {
          link.addEventListener('click', () => {
            navLinks.classList.remove('active');
          });
        });
        // Close nav on close button click
        if (closeNavBtn) {
          closeNavBtn.addEventListener('click', () => {
            navLinks.classList.remove('active');
          });
        }
      }
    });

    document.getElementById("reportForm").addEventListener("submit", function(event) {
  let status = document.querySelector("select[name='status']").value;
  if (status === "") {
    alert("Please select a status (Lost/Found).");
    event.preventDefault();
  }
});

    
    </script>
</body>
</html>