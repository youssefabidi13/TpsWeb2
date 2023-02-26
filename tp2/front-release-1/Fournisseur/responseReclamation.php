<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinFournisseur"]) || $_SESSION["loggedinFournisseur"] !== true){
    header("location: ../loginFournisseur.php");
    exit;
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"><title>Testimonials - Brand</title><link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=10912df2c1f72a56dab1b896789d024a"><link rel="stylesheet" href="/assets/css/styles.min.css?h=3d761efa6b910fcd9f5c7cc0938bf458"><link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css"></head><body><nav id="mainNav" class="navbar navbar-light navbar-expand-md fixed-top navbar-shrink py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>ELECTRICAL WEB SITE</span></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div id="navcol-1" class="collapse navbar-collapse" style="padding-left: 0px;">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard_fournisseur.php">Dashboard</a></li>
                <li class="nav-item"></li>
                <li class="nav-item"><a class="nav-link" href="verify.php">Verification des informations</a></li>
                <li class="nav-item"></li>
                <li class="nav-item"><a class="nav-link" href="showReclamation.php">Reclamation</a></li>
            </ul><a class="btn btn-primary" href="logout.php">logout</a>
        </div>
    </div>
</nav><section class="py-5 mt-5"><div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2 class="fw-bold"><br /><span class="underline pb-2">Repondre le client d&#39;id 1</span></h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div>
                <form class="p-3 p-xl-4" method="post">
                    <div class="mb-3"><textarea id="message-1" class="shadow form-control" name="mesponse" rows="6" placeholder="Repondre"></textarea></div>
                    <div><button class="btn btn-primary shadow d-block w-100" type="submit">Send</button></div>
                </form>
            </div>
        </div>
    </div>
</div></section><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script><script src="/assets/js/script.min.js?h=06571bc955d130136aa0499e36d3b3d9"></script></body></html>