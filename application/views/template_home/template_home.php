<!doctype html>
<html lang="en">

<head>
	<?php $this->view('template_home/_partial/head.php') ?>
</head>

<!-- <body data-bs-spy="scroll" data-bs-target="#navbarscrl" data-bs-offset="0" class="scrollspy-example" tabindex="0" > -->
<body>
	<div id="overlay"></div>
	
	<!-- Navbar -->
	<?php $this->view('template_home/_partial/navbar.php') ?>
	<!-- end Navbar -->
	
	<?= $contents ?>

	<?php $this->view('template_home/_partial/js.php') ?>


</body>

</html>
