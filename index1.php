<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
  <style type="text/css">body {
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f0f0f0;
}

.login-container {
  text-align: center;
  max-width: 600px; /* Adjust the max-width for the container */
  width: 80%; /* Optionally, you can set a percentage width */
}

.login-card {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  max-width: 400px; /* Adjust the max-width for the card */
  margin: 0 auto; /* Center the card horizontally */
}

.login-card h2 {
  margin-top: 0;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
}

.form-group input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
   max-width: 400px;
}

button:hover {
  background-color: #0056b3;
}

</style>
</head>
<body>
  
  <div class="login-container">
    <div class="login-card">
      <h2>Login</h2>
      <form>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
