<?php
require_once('tcpdf.php');


extract($_GET);




// Load the HTML template
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$Filiere = $_POST['Filiere'];
$Annee = $_POST['Annee'];
$Module = $_POST['Module'];
$remarque = $_POST['remarque'];
$selectedNum = $_POST['selectedNum'];
$selectedNum1 = $_POST['selectedNum1'];
$fileDestination=$_POST['file'];
$section = array();
foreach((array) $Module as $val) {
    $section[] = "<li>$val</li>";
}

$section2 = array();
for ($i = 1; $i <= $selectedNum; $i++) {
    $project = $_POST['project' . $i];
    $section2[] = '<h4>Projet ' . $i . ':</h4>';
    $section2[] = '<p>'. $project .'</p>';
}
$section3 = array();
for ($i = 1; $i <= $selectedNum1; $i++) {
    $club = $_POST['club' . $i];
    $section3[] = '<h4>Club '.$i.'</h4>';
    $section3[] = '<p>'. $club .'</p>';
}
$html = file_get_contents('info.html');
$html = str_replace('{nom}', $nom, $html);
$html = str_replace('{prenom}', $prenom, $html);
$html = str_replace('{phone}', $phone, $html);
$html = str_replace('{remarque}', $remarque, $html);
$html = str_replace('{section}', implode('', $section), $html);
$html = str_replace('{section2}', implode('', $section2), $html);
$html = str_replace('{section3}', implode('', $section3), $html);
$html = str_replace('{fileDestination}', $fileDestination, $html);
$html = str_replace('{Filiere}', $Filiere, $html);
$html = str_replace('{Module}', $Module, $html);
$html = str_replace('{email}', $email, $html);
$html = str_replace('{Annee}', $Annee, $html);






                
							
// Generate the PDF
// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set the document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Personal Information');
    $pdf->SetSubject('Personal Information');

    // Add a page
    $pdf->AddPage();

    // Write the HTML to the PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF to the browser
    $pdf->Output('info.pdf', 'D');


?>