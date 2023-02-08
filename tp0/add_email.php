<?php
include 'index1.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Append the email to the file
    $file = fopen("Emails.txt", "a");
    fwrite($file, $email . "\n");
    fclose($file);
    
    echo "<br>Email added successfully!<br>";
  } else {
    echo "<br>Invalid email address.<br>";
  }
  processEmails("Emails.txt","Emails2.txt");
  echo "<a href='./index.html'>return to form</a>";
}
?>