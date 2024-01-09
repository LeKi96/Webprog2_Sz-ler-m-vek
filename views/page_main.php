<!DOCTYPE html>
<html lang="hu-hu">

<head>
    <meta charset="utf-8">
    <title>Szélerőművek</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>/css/main_style.css">
    <script type="text/javascript" src="<?php echo SITE_ROOT ?>/js/form_validator.js"></script>
	<?php // if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">';
	?>
</head>

<body> 

<style>
  body {
    margin: 0;
    background: url('<?php echo SITE_ROOT ?>/images/background.jpg') no-repeat center center fixed;
    background-size: cover;
  }
</style>



</header>
<div>
    <nav style="height: 30px;">
		<?php echo Menu::getMenu($viewData['selectedItems']); ?>

        <p class="logged-user" style="background-color: #333; color: antiquewhite; width: fit-content; opacity: 0.9;
        border-bottom-right-radius: 5px; padding: 5px">
			<?= ($_SESSION['userid'] != 0 && isset($_SESSION['userid'])) ?
				"Bejelentkezett: " . $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'] . " (" . $_SESSION['userid'] . ")." : "" ?>
			<?= ($_SESSION['userlevel'] == '__1') ? " (adminisztrátor)" : "" ?>
        </p>
    </nav>
    <br><br><br>
    <div class="tartalom">
        <section>
			<?php if ($viewData['render']) include($viewData['render']); ?>
        </section>
    </div>
    <br><br><br>

    <div>
        <footer id="lab">
            &copy; Szélerőművek <?= date("Y") ?>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </footer>
    </div>
</div>
</body>