<?php
function processEmails($file1,$file2) {
    //question 1
    $file = fopen($file1, "r");
    $email_count = array();

    while (!feof($file)) {
        $email = trim(fgets($file));
        if (isset($email_count[$email])) {
            $email_count[$email]++;
        } else {
            $email_count[$email] = 1;
        }
    }

    foreach ($email_count as $email => $count) {
        echo $email . " appears " . $count . " times" . "<br>";
    }

    echo " <br><b>Question 2</b><br>";

    //question 2

    $unique_emails = array_keys($email_count);

    foreach ($unique_emails as $email) {
        echo $email . "<br>";
    }

    fclose($file);

    sort($unique_emails);

    echo " <br><b>Question 3</b><br>";

    //question 3
    $file = fopen($file2, "w");
    foreach ($unique_emails as $email) {
        fwrite($file, $email . "\n");
    }
    fclose($file);

    echo "<br> Emails enregistrés avec succès dans EmailsT.txt <br>";

    $file = fopen($file2, "r");

    while (!feof($file)) {
        echo "<br>".fgets($file);
    }
    fclose($file);
}
?>