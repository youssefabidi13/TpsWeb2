<?php
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
    $recap = $_POST['recap'];
echo '<!DOCTYPE html>
<html>
<head>

	<title>Resume based on recap</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	
	<style>
	


		.msg { padding: 10px; background: #222; position: relative; }
		.msg h1 { color: #fff;  }
		.msg a { margin-left: 20px; background: #408814; color: white; padding: 4px 8px; text-decoration: none; }
		.msg a:hover { background: #266400; }

		/* //-- yui-grids style overrides -- */
		body { font-family: Georgia; color: #444; }
		#inner { padding: 10px 80px; margin: 80px auto; background: #f5f5f5; border: solid #666; border-width: 8px 0 2px 0; }
		.yui-gf { margin-bottom: 2em; padding-bottom: 2em; border-bottom: 1px solid #ccc; }

		/* //-- header, body, footer -- */
		#hd { margin: 2.5em 0 3em 0; padding-bottom: 1.5em; border-bottom: 1px solid #ccc }
		#hd h2 { text-transform: uppercase; letter-spacing: 2px; }
		#bd, #ft { margin-bottom: 2em; }

		/* //-- footer -- */
		#ft { padding: 1em 0 5em 0; font-size: 92%; border-top: 1px solid #ccc; text-align: center; }
		#ft p { margin-bottom: 0; text-align: center;   }

		/* //-- core typography and style -- */
		#hd h1 { font-size: 48px; text-transform: uppercase; letter-spacing: 3px; }
		h2 { font-size: 152% }
		h3, h4 { font-size: 122%; }
		h1, h2, h3, h4 { color: #333; }
		p { font-size: 100%; line-height: 18px; padding-right: 3em; }
		a { color: #990003 }
		a:hover { text-decoration: none; }
		strong { font-weight: bold; }
		li { line-height: 24px; border-bottom: 1px solid #ccc; }
		p.enlarge { font-size: 144%; padding-right: 6.5em; line-height: 24px; }
		p.enlarge span { color: #000 }
		.contact-info { margin-top: 7px; }
		.first h2 { font-style: italic; }
		.last { border-bottom: 0 }


		/* //-- section styles -- */

		a#pdf { display: block; float: left; background: #666; color: white; padding: 6px 50px 6px 12px; margin-bottom: 6px; text-decoration: none;  }
		a#pdf:hover { background: #222; }

		.job { position: relative; margin-bottom: 1em; padding-bottom: 1em; border-bottom: 1px solid #ccc; }
		.job h4 { position: absolute; top: 0.35em; right: 0 }
		.job p { margin: 0.75em 0 3em 0; }

		.last { border: none; }
		.skills-list {  }
		.skills-list ul { margin: 0; }
		.skills-list li { margin: 3px 0; padding: 3px 0; }
		.skills-list li span { font-size: 152%; display: block; margin-bottom: -2px; padding: 0 }
		.talent { width: 32%; float: left }
		.talent h2 { margin-bottom: 6px; }

		#srt-ttab { margin-bottom: 100px; text-align: center;  }
		#srt-ttab img.last { margin-top: 20px }

		/* --// override to force 1/8th width grids -- */
		.yui-gf .yui-u{width:80.2%;}
		.yui-gf div.first{width:12.3%;}
	</style>
	<script src="html2pdf.bundle.min.js"></script>

</head>
<body>
<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<img  src="../'.$fileDestination.'" style="border-radius:60%;width: 100px;height: 100xpx;">
					<h1>'.$nom.' '.$prenom.'</h1>
					<h2>Etudiant d '.$Filiere.' en '.$Annee.'</h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3><a id="pdf" href="#">Download PDF</a></h3>
						<h3><a href="mailto:'.$email.'">'.$email.'</a></h3>
						<h3>'.$phone.'</h3>
					</div>
				</div>
			</div>
		</div>

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Profile</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								'.$remarque.'. 
							</p>
						</div>
					</div>
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Module</h2>
						</div>
						<div class="yui-u">
							';
							foreach((array) $Module as $val){
								echo '<div class="talent">';
								echo "<h2>$val</h2>";
								echo '</div>';
							}
							echo '
						</div>
					</div>

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Projet</h2>
						</div>

						<div class="yui-u">

							';
							for ($i = 1; $i <= $selectedNum; $i++) {
								echo '<div class="job">';
								$project = $_POST['project' . $i];
								echo '<h2>Projet ' . $i .':</h2>';
								echo '<p>'. $project .'</p>';
								echo ' </div>';
							}
						
							echo '
						</div>
					</div>

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Club</h2>
						</div>
						<div class="yui-u">
								';for ($i = 1; $i <= $selectedNum1; $i++) {
									$club = $_POST['club' . $i];
									echo '<div class="talent">';
									echo '<h2>Club '.$i.'</h2>';
									echo '<p>'. $club .'</p>';
									echo '</div>';

								}'
						</div>
					</div>

					

				</div>
			</div>
		</div>

		<div id="ft">
			<p>'.$nom.' '.$prenom.' &mdash; <a href="'.$email.'">'.$email.'</a> &mdash; '.$phone.'</p>
		</div>

	</div>


</div>
</body>
</html>';