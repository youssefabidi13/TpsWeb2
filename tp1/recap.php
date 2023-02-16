<?php 
    if(isset($_POST['submit'])){
        global $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $fileNameNew, $fileDestination, $nom, $prenom, $age, $phone, $email, $Filiere, $Annee, $Module, $remarque, $selectedNum, $recap;
        $file = $_FILES['file'];
        $fileName=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
       
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png','pdf');
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 1000000000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    echo '<img src="'.$fileDestination.'" width="200" height="150"></img><br>';
                }else{
                    echo "your file is too big !";
                }
            }else{
                echo "there was an error uploading your file !";
            }
        }else{
            echo "you cannot upload files of this type !";
        }
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $Filiere = $_POST['Filiere'];
    $Annee = $_POST['Annee'];
    $Module = $_POST['Module'];
    $remarque = $_POST['remarque'];
    echo "Nom : " . $nom . "<br>";
    echo "Prénom : " . $prenom . "<br>";
    echo "Age : " . $age . "<br>";
    echo "Numéro de Téléphone : " . $phone . "<br>";
    echo "Email : " . $email . "<br>";
    echo "Filière : " . $Filiere . "<br>";
    echo "Année : " . $Annee . "<br>";
    echo "Modules suivis : ";
    echo "<ul>";
    foreach($Module as $val){
        echo "<li>$val</li>";
    }
    echo "</ul>";
    $selectedNum = $_POST['select'];
    $selectedNum1 = $_POST['selectClub'];
    

    echo "Nombre de projets realises cette annee: " . $selectedNum . "<br><br>";
    
    // Looping through the number of text fields to be
    for ($i = 1; $i <= $selectedNum; $i++) {
        $project = $_POST['project' . $i];
        echo "Projet " . $i . ": " . $project . "<br><br>";
    }
  

    echo "Nombre de club auquel vous etes affilié cette annee: " . $selectedNum1 . "<br><br>";
    
    // Looping through the number of text fields to be
    for ($i = 1; $i <= $selectedNum1; $i++) {
        $club = $_POST['club' . $i];
        echo "Club " . $i . ": " . $club . "<br><br>";
    }
  
    echo "Remarques : " . $remarque . "<br>";
    // Ajoutez ce code pour enregistrer les informations dans un fichier recap.txt
    $recap = '';
    $recap = "Nom : " . $nom . "\r\n"
    . "Prénom : " . $prenom . "\r\n"
    . "Age : " . $age . "\r\n"
    . "Numéro de Téléphone : " . $phone . "\r\n"
    . "Email : " . $email . "\r\n"
    . "Filière : " . $Filiere . "\r\n"
    . "Année : " . $Annee . "\r\n"
    . "Modules suivis : " . "\r\n";
    foreach ($Module as $val) {
    $recap .= "  - " . $val . "\r\n";
    }
    
    $recap .= "Nombre de projets realisés cette année : " . $selectedNum . "\r\n";
    for ($i = 1; $i <= $selectedNum; $i++) {
    $recap .= "Projet " . $i . " : " . $_POST['project' . $i] . "\r\n";
    }
    $recap .= "Nombre de club auquel vous etes affilié cette annee : " . $selectedNum1 . "\r\n";
    for ($i = 1; $i <= $selectedNum1; $i++) {
    $recap .= "Club " . $i . " : " . $_POST['club' . $i] . "\r\n";
    }
    $recap .= "Remarques : " . $remarque . "\r\n";

    echo '
        <form action="recap.php" method="post">
            <input type="hidden" name="recap" value="' . htmlspecialchars($recap) . '">
            <input type="submit" name="valider" value="Valider">
        </form>
        <form action="generatepdf.php" method="post">
        <input type="hidden" name="recap" value="' . htmlspecialchars($recap) . '">
        <input type="hidden" name="file" value="' . htmlspecialchars($fileDestination) . '">
        <input type="hidden" name="nom" value="' . htmlspecialchars($nom) . '">
        <input type="hidden" name="prenom" value="' . htmlspecialchars($prenom) . '">
        <input type="hidden" name="age" value="' . htmlspecialchars($age) . '">
        <input type="hidden" name="phone" value="' . htmlspecialchars($phone) . '">
        <input type="hidden" name="email" value="' . htmlspecialchars($email) . '">
        <input type="hidden" name="Filiere" value="' . htmlspecialchars($Filiere) . '">
        <input type="hidden" name="Annee" value="' . htmlspecialchars($Annee) . '">
        ';
        foreach($Module as $val){
            echo'<input type="hidden" name="Module" value="' . htmlspecialchars($val). '">';
        }
        for ($i = 1; $i <= $selectedNum; $i++) {
            $project = $_POST['project' . $i];
            echo '<input type="hidden" name="project'.$i.'" value="' . htmlspecialchars($project) . '">';

        }
        for ($i = 1; $i <= $selectedNum1; $i++) {
            $club = $_POST['club' . $i];
            echo '<input type="hidden" name="club'.$i.'" value="' . htmlspecialchars($club) . '">';

        }
        echo '<input type="hidden" name="remarque" value="' . htmlspecialchars($remarque) . '">
        <input type="hidden" name="selectedNum" value="' . htmlspecialchars($selectedNum) . '">
        <input type="hidden" name="selectedNum1" value="' . htmlspecialchars($selectedNum1) . '">           
         <input type="submit" name="genererPdf" value="genererPdf">
        </form>
        <form action="CV/cvAbidi.php" method="post">
            <input type="hidden" name="recap" value="' . htmlspecialchars($recap) . '">
            <input type="hidden" name="file" value="' . htmlspecialchars($fileDestination) . '">
            <input type="hidden" name="nom" value="' . htmlspecialchars($nom) . '">
            <input type="hidden" name="prenom" value="' . htmlspecialchars($prenom) . '">
            <input type="hidden" name="age" value="' . htmlspecialchars($age) . '">
            <input type="hidden" name="phone" value="' . htmlspecialchars($phone) . '">
            <input type="hidden" name="email" value="' . htmlspecialchars($email) . '">
            <input type="hidden" name="Filiere" value="' . htmlspecialchars($Filiere) . '">
            <input type="hidden" name="Annee" value="' . htmlspecialchars($Annee) . '">
            ';
            foreach($Module as $val){
                echo'<input type="hidden" name="Module" value="' . htmlspecialchars($val). '">';
            }
            for ($i = 1; $i <= $selectedNum; $i++) {
                $project = $_POST['project' . $i];
                echo '<input type="hidden" name="project'.$i.'" value="' . htmlspecialchars($project) . '">';

            }
            for ($i = 1; $i <= $selectedNum1; $i++) {
                $club = $_POST['club' . $i];
                echo '<input type="hidden" name="club'.$i.'" value="' . htmlspecialchars($club) . '">';

            }
            echo '<input type="hidden" name="remarque" value="' . htmlspecialchars($remarque) . '">
            <input type="hidden" name="selectedNum" value="' . htmlspecialchars($selectedNum) . '">
            <input type="hidden" name="selectedNum1" value="' . htmlspecialchars($selectedNum1) . '">
            <input type="submit" name="generateCV" value="GenerateCv">
        </form>
    ';
    
} else {
    echo "Des données sont manquantes.";
}
?>
<?php

if (isset($_POST['valider'])) {
    $recap = $_POST['recap'];
    $file = fopen("recap.txt", "a+") or die("Unable to open file!");
    fwrite($file, $recap);
    fclose($file);
    header("Location: Formulaire.php");
    exit;
}

echo '<form action="Formulaire.php" method="GET">
    <input type="button" onclick="history.go(-1);" value="Modifier">
</form>';
echo '<a href ="./formulaire.php">retour au formulaire</a><br>';


?>






