<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../loginAgent.php");
    exit;
} else if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        $fileName=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
       
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('txt','docx');
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 1000000000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);

                }else{
                    echo "your file is too big !";
                }
            }else{
                echo "there was an error uploading your file !";
            }
        }else{
            echo "you cannot upload files of this type !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Agent phase</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=10912df2c1f72a56dab1b896789d024a">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=3d761efa6b910fcd9f5c7cc0938bf458">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>ELECTRICAL WEB
                    SITE</span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-1"
                class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1" style="padding-left: 0px;">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><a class="btn btn-primary" href="logout.php">logout</a>
            </div>
        </div>
    </nav>
    <section class=" py-5 mt-5">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold"><br /><span class="underline pb-2">Les consomations
                            annuelles </span></h2>
                </div>
            </div>
        </div>
        <div class="dynamic-table">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div>
                        <table class="table table-hover table-bordered dynamic-table-tab_logic">
                            <thead>
                                <tr>
                                    <th class="text-center"> Client id </th>
                                    <th class="text-center"> Consomation annuelle </th>
                                    <th class="text-center"> Année </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="dynamic-table-addr0" style="display: none;">
                                    <td><input class="form-control" type="text" name="idn" placeholder="client_id" />
                                    </td>
                                    <td><input class="form-control" type="text" name="name"
                                            placeholder="Consomation_annuelle" /></td>
                                    <td><input class="form-control" type="text" name="mobile0" placeholder="Année" />
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="dynamic-table-addr1"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-file">
            <form method="post" action="agent.php" enctype="multipart/form-data">
                <input class="custom-file-input" type="file" name="file" />
                <label class="form-label custom-file-label">Upload File consommation_annuel</labelclass>
                <input type="submit" name="submit" class="btn btn-primary" value="Envoyer">
            </form>      
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="/assets/js/script.min.js?h=06571bc955d130136aa0499e36d3b3d9"></script>
</body>

</html>