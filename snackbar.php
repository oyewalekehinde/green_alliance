<!DOCTYPE html>
<html>
<head>
  <title>My Page</title>
  <style>
    /* Include your notification dialog styles here */
  </style>
</head>
<body>

  <div class="notification" id="myNotification">
    This is a notification message!
  </div>

  <script>
    const notification = document.getElementById('myNotification');

    function showNotification(message) {
      notification.textContent = message;
      notification.classList.add('show');

      setTimeout(() => {
        notification.classList.remove('show');
      }, 4000); // Set timeout for 4 seconds
    }

    // Check for session variable set by error handling script
    if (typeof sessionStorage['notification_message'] !== 'undefined') {
      const message = sessionStorage['notification_message'];
      showNotification(message);

      // Clear session variable after displaying the dialog (optional)
      sessionStorage.removeItem('notification_message');
    }
  </script>

</body>
</html>
