<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Error and Success Snackbar Example</title>
<link rel="stylesheet" href="styles.css">
<style>
    /* Snackbar styles */
.snackbar {
  visibility: hidden;
  min-width: 250px;
  max-width: 500px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  transform: translateX(-50%);
  bottom: 30px;
  border-radius: 4px;
}

/* Error snackbar style */
.error {
  background-color: #f44336; /* Red color */
  color: white;
}

/* Success snackbar style */
.success {
  background-color: #4CAF50; /* Green color */
  color: white;
}

.show {
  visibility: visible;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Snackbar animation */
@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

</style>
</head>
<body>

<button onclick="showErrorSnackbar()">Show Error Snackbar</button>
<button onclick="showSuccessSnackbar()">Show Success Snackbar</button>

<div id="errorSnackbar" class="snackbar error">Error: Something went wrong!</div>
<div id="successSnackbar" class="snackbar success">Success: Action completed successfully!</div>

<script src="scripts.js"></script>
</body>
</html>
