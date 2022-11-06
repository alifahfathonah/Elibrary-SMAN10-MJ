<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png"> -->

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link id="pagestyle" href="<?= base_url() ?>assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">

<title>E-Library SMAN 10 Muaro Jambi</title>
<style>
	@media (max-width: 575.98px) {
		.img-carousel {
			height: 300px;
		}
	}

	#overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 1999;
    cursor: pointer;
}

.img-overlay {
    border:4px solid black;
    box-shadow: 0px 0px 15px white;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    transform: translate(-50%,-50%) scale(.6);
}

.overlay-close {
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 24px;
    box-shadow: 0px 0px 10px black;
    color: red;
    background: white;
    border-radius: 50px;
    border: 1px solid white;
    padding: 24px;
}

.search{
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1);
        
    }

.search input{

    height: 60px;
    text-indent: 25px;
    border: 2px solid #d6d4d4;


    }


.search input:focus{

    box-shadow: none;
    border: 2px solid blue;


    }

.search .fa-search{

    position: absolute;
    top: 20px;
    left: 16px;

    }

.search button{

    position: absolute;
    top: 5px;
    right: 5px;
    height: 50px;
    width: 110px;
    background: blue;

    }

</style>
