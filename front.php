<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Infront </title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<header>
        <h1>Welcome to Event Management</h1>
        <nav>
            <a href="front.php">Home</a>
            <a href="register.php">Register</a>
            <a href="events.php">Events</a>
            <a href="login.php">Login</a>
            <a href="feedback.php">Feedback</a>  
            <a href= "book_ticket.php">Book Ticket</a>     
        </nav>
    </header>
    <div class="container" id="sign up">
        <h1 class ="form-title"> 
        <form method="post" action="login.php">
    <div class="input-group">
        <i class="fas fa-envelop"></i>
        <input type="email" name="email" placeholder="Email" required>
        <label for="email"> Email </label>
    </div>
    <div class="input-group">
       <i class="fas fa-lock"></i>
       <input type="password" name="password" placeholder="Password" required>
       <label for="password"> Password </label>
    </div>
    <input type="submit" class="btn" value="Login" name="login">
</form>
<p class="or">
    -------or--------
</p>
  <div class="icons">
    <i class="fab fa-google"></i>
    <i class="fab fa-facebook"></i>
  </div>  
  <div class="links">
    <p>
  </div>
</div>
    <main>
        <h2>Upcoming Events</h2>
    </main>

</body>
</html>