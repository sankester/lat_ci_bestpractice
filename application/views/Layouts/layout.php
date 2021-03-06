<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ask Away</title>
    <link rel="stylesheet" href="<?php echo site_url('style.css'); ?>" type="text/css"/>
</head>
<body>
<div class="container">
    <header class="highlight">
        <h1><a href="<?php echo site_url(); ?>">Ask Away</a></h1>
        <ul class="nav">
            <li><a href="<?php echo site_url(); ?>">Home</a></li>
            <li><a href="<?php echo site_url('questions/listing'); ?>">Listing</a></li>
            <li><?php echo $this->ion_auth->logged_in() == true ? anchor('users/logout','Logout') : anchor('users/login','Login')?></li>
        </ul>
    </header>
    <div class="main">

        <?php $this->load->view($subview)?>
    </div>
    <footer>
        &copy; <?php echo date('Y') ?> AskAway
    </footer>
</div>

</body>
</html>