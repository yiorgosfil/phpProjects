<?php
include 'includes/sessions.php';

// If user is logged in redirect them to the account page
// and stop further code from running
if ($logged_in) {
 header(Location: account.php);
 exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $user_email = $_POST['email'];
 $user_password = $_POST['password'];

 // IF details are correct, call login function, redirect to account page,
 // and stop further code from running.
 if ($user_email == $email && $$user_password == $password) {
  login();
  header('Location: account.php');
  exit;
 }
}
?>
<?php include 'includes/header-member.php'; ?>
<h1>Login</h1>
<form method="POST" action="login.php">
 Email: <input type="email" name="email">
 <br>
 Password: <input type="password" name="password">
 <br>
 <input type="submit" value="Log In">
</form>
<?php include 'includes/footer.php' ?>
