<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="styles.css">
    <title>Etudiant</title>
    <script>
      function showTextFields(num) {
      // Getting a reference to the textFieldsContainer div
      
        var container = document.getElementById("textFieldsContainer");
            // Clearing the contents of the container

        container.innerHTML = "";
    // Looping through the number of text fields to be displayed

        for (var i = 1; i <= num; i++) {
                // Adding the text fields to the container

          container.innerHTML += '<b>Projet ' + i + ':</b><input type="text" name="project' + i + '" required><br><br>';
        }
      }
    </script>
    <script>
      function showTextFields1(num) {
      // Getting a reference to the textFieldsContainer div
      
        var container = document.getElementById("textFieldsContainer1");
            // Clearing the contents of the container

        container.innerHTML = "";
    // Looping through the number of text fields to be displayed

        for (var i = 1; i <= num; i++) {
                // Adding the text fields to the container

          container.innerHTML += '<b>club ' + i + ':</b><input type="text" name="club' + i + '" required><br><br>';
        }
      }
      </script>
      <script>
        function myFiliere(x){
          if(x==0){
            document.getElementById('2AP').style.display="block";
            document.getElementById('CI').style.display="none";
          }else{
            document.getElementById('2AP').style.display="none";
            document.getElementById('CI').style.display="block";
          }
        }
        
      </script>
      
</head>
<body>
    <h1>Fiche de renseignements</h1>
    <form method="Post" action="recap.php" enctype="multipart/form-data">
        <h3>Renseignements Personnels</h3>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required><br><br>
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom" required><br><br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" max="26" required><br><br>
        <label for="phone">Numero de Téléphone:</label>
        <input type="tel" name="phone" id="phone" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" title="Le format du numéro de téléphone doit être 000-000-0000." required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <h3>Renseignements Academique</h3>
        <h4><b>Modules suivies cette annee</h4></b>
        2AP :<input type="radio" name="Filiere" value="2AP" onclick="myFiliere(0)" required>|<?echo" ";?>
        GSTR :<input type="radio" name="Filiere" value="GSTR" onclick="myFiliere(1)" required>|<?echo" ";?>
        GI :<input type="radio" name="Filiere" value="GI" onclick="myFiliere(2)" required>|<?echo" ";?>
        SCM :<input type="radio" name="Filiere" value="SCM" onclick="myFiliere(3)" required>|<?echo" ";?>
        GC :<input type="radio" name="Filiere" value="GC" onclick="myFiliere(4)" required>|<?echo" ";?>
        MC :<input type="radio" name="Filiere" value="MS" onclick="myFiliere(5)" required><?php echo "<br><br><br>"?>
        <div id="2AP" style="display:none;">
          1ère année: <input type="radio" name="Annee" value="1ère année" required> |
          2ème année: <input type="radio" name="Annee" value="2ème année" required>
        </div>

        <div id="CI" style="display:none;">
          1ère année: <input type="radio" name="Annee" value="1ère année" required> |
          2ème année: <input type="radio" name="Annee" value="2ème année" required> |
          3ème année: <input type="radio" name="Annee" value="3ème année" required><br><br>
        </div>
        
        <h4><b>Modules suivies cette annee</h4></b>
        Pro Av :<input type="checkbox" name="Module[]" value="Pro Av" >|<?echo" ";?>
        Compilation :<input type="checkbox" name="Module[]" value="Compilation" >|<?echo" ";?>
        reseaux Av :<input type="checkbox" name="Module[]" value="reseaux Av" >|<?echo" ";?>
        Web Avancee :<input type="checkbox" name="Module[]" value="Web Avancee" >|<?echo" ";?>
        POO :<input type="checkbox" name="Module[]" value="POO" >|<?echo" ";?>
        BD :<input type="checkbox" name="Module[]" value="BD" ><?php echo "<br><br><br>"?>

        <?php echo '<b>Nombre de projets realises cette annee :</b>
          <select name="select" required onchange="showTextFields(this.value)">';
          echo '<option value="">select</option>';
          for ($num = 1; $num <= 100; $num++) {
            echo "<option value=" . $num . ">" . $num . "</option>";
          }
          echo '</select>';
        echo '<br>';

        ?>
        <!-- Adding a div with an id of textFieldsContainer, which will be used to dynamically add text fields -->
        <div id="textFieldsContainer"></div>
        <?php echo '<b>Nombre de club auquel vous etes affilié cette annee :</b>
          <select name="selectClub" required onchange="showTextFields1(this.value)">';
          echo '<option value="">select</option>';
          for ($num = 1; $num <= 100; $num++) {
            echo "<option value=" . $num . ">" . $num . "</option>";
          }
          echo '</select>';
        echo '<br>';

        ?>
        <!-- Adding a div with an id of textFieldsContainer, which will be used to dynamically add text fields -->
        <div id="textFieldsContainer1"></div>
        <h3>Vos remarques</h3>
        <textarea name="remarque" required></textarea><br><br>
        <label for="fileToUpload">Select an image to upload:</label>
        <input type="file" name="file" required>       
        <input type="submit" name="submit" value="Envoyer">
        <input type="reset" value="Effacer"> 
    </form>
</body>
</html>

  


