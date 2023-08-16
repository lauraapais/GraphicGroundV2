<!DOCTYPE html>
<html>
<head>
    <title>Display Images</title>
</head>
<body>
<main>
    <div>
        <?php
        echo "HELLO";
        // Database configuration
        $db_host = 'localhost';
        $db_user = 'pais';
        $db_pass = 'zaL6i@h2X1$G';
        $db_name = 'gground_db';

        // Create database connection
        $db = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Get image data from database
        $result = $db->query("SELECT image FROM images ORDER BY id DESC");
        ?>

        <!-- Display images with BLOB data from database -->
        <?php if($result->num_rows > 0){ ?>
            <div class="gallery">
                <?php while($row = $result->fetch_assoc()){ ?>
                    <img src="data:image/png;base64,<?php echo base64_encode($row['image']); ?>"/>
                <?php } ?>
            </div>
        <?php }else{ ?>
            <p class="status error">Image(s) not found...</p>
        <?php } ?>
    </div>
</main>
</body>
</html>