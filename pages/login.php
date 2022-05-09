 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="../css/style.css">
     <script src="../js/main.js" defer></script>
     <title>Closed Beta Projects</title>
</head>
 
 <body>
     
    <?php include_once "../incs/components/header.comp.php"; ?>
     <main class="main-sec">
    <?php include_once "../incs/components/login-form.comp.php"; ?>
     </main>
     <?php include_once "../incs/components/footer.comp.php"?>

 </body>
 </html>
<?php

//  echo "<br \> {$_SERVER['REMOTE_ADDR']}<br \> ";
//  $ip = "141.136.90.153";
//  $json = json_decode(file_get_contents("http://ipinfo.io/$ip/geo"), TRUE)["region"];
//  echo var_dump($json);
//  echo "<br \>" . hash('sha256', $mac);

// <?php
//  if (!isset($_COOKIE['perm'])) {
//     echo "<h1 class=\"container__text--error\"> 403 </h1><p class=\"container__text--error\"><strong> WARNING : You don't have the permission to access this page!</Strong?</p>";
//     exit();
//  }
?>