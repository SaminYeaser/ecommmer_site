<?php

 ob_start();
session_start();

//session_destroy();

		 defined("SAM") ? null :define("SAM",DIRECTORY_SEPARATOR);

		defined("TEMPLATE_FRONT") ? null :define("TEMPLATE_FRONT", __DIR__ . SAM ."templates".SAM."front");
		defined("TEMPLATE_BACK") ? null :define("TEMPLATE_BACK", __DIR__ . SAM ."templates".SAM."back");
        defined("IMAGE_DIRECTORY") ? null :define("IMAGE_DIRECTORY", __DIR__ . SAM ."uploads");

// echo TEMPLATE_FRONT."</br>";
		// echo TEMPLATE_BACK."</br>";
		// echo SAM;

		defined("DB_HOST") ? null :define("DB_HOST","localhost");
		defined("DB_USER") ? null :define("DB_USER", "root");
		defined("DB_PASS") ? null :define("DB_PASS","");
		defined("DB_NAME") ? null :define("DB_NAME","ecom_db");

		$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		 require_once("function.php");
		 require_once("cart.php");
?>

