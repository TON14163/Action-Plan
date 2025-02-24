<!DOCTYPE html>
<html>
<head>
    <title>ERP Sale Report</title>
    <link rel= "icon" href ="assets/images/Awl-logo1.png" type = "image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php require_once __DIR__ . '/../partials/NavBar.php'; ?>

    <!-- เนื้อหาจะถูกแทรกที่นี่ -->
    <?php 
    echo '<div style="background-color: #FFFFFF; margin:20px 0px; min-height: 50vw; padding:40px;">';
    echo $content; 
    echo '</div>';
    ?>

    <?php require_once __DIR__ . '/../partials/FooTer.php'; ?>
</body>
</html>