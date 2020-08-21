<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Entrenador</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <!-- Css Styles chat -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min2.css" rel="stylesheet">

    <link href="css/style_nav.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="css/style2.css" type="text/css">
    <style>
    .content {
        margin-top: 80px;
    }
    </style>

    <script type="text/javascript">
    function ajax() {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }

        req.open('GET', 'includes/chat.php', true);
        req.send();
    }

    //linea que hace que se refreseque la pagina cada segundo
    setInterval(function() {
        ajax();
    }, 1000);
    </script>




</head>
