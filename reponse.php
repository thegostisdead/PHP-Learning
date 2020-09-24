<!doctype html>
<html lang='fr'>
<head>
    <meta charset="utf-8">
    <title>
        Réponse au formulaire
    </title>
    <!-- import materialize css and js for ui -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav>
    <div class="nav-wrapper">
        <a href="quiz.html" class="brand-logo">FormReponse</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="quiz.html" class="waves-effect waves-light btn">Back to from</a></li>
        </ul>
    </div>
</nav>

<h5> Merci d'avoir répondu au questionnaire ! </h5>

<div class="container">

    <?php

    require_once("include/error_custom.php");


    function check($key)
    {
        if ((isset($_GET[$key])) and (!empty($_GET[$key])) or (isset($_POST[$key])) and (!empty($_POST[$key]))) {
            return true;
        } else {
            return false;
        }
    }

    function get_value_by_key($key)
    {
        if ((isset($_GET[$key])) and (!empty($_GET[$key]))) {
            return $_GET[$key];
        } else if (isset($_POST[$key]) and (!empty($_POST[$key]))) {
            return $_POST[$key];
        }
    }

    // automate answers
    $form_fields = array(
        'prenom' => 'Votre prénom est : ',
        'nom' => 'Votre nom de famille est : ',
        'email' => 'Votre adresse email est : ',
        'age' => 'Vous etes agé de : ',
        'date' => 'Votre date préféré est le :');


    foreach ($form_fields as $key => $val) {
        if (check($key)) {
            echo "<h4>" . $val . "</h4>";
            echo "<p>" . get_value_by_key($key) . "</p> <br>";
        }
    }

    echo "<h3> Questions détailés</h3>";

    if (check("status")) {
        echo "Vous êtes ";

        $res = get_value_by_key("status");

        switch ($res) {
            case "homme":
                echo "un Homme";
                echo "<br>";
                echo "<img width='350' src='https://tel.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Ftel.2F2020.2F07.2F02.2F861bd345-133d-4b7e-946a-2abf6a79c16d.2Ejpeg/1200x600/crop-from/top/quality/80/cr/wqkgQ2FwdHVyZSBUd2l0dGVy/le-youtubeur-thekairi78-en-couple-avec-une-mineure-attaque-sur-leur-enorme-difference-d-age-par-des-internautes-choques-il-s-explique-mise-a-jour.jpg' alt='homme'/> ";
                break;
            case "femme":
                echo "une femme";
                echo "<br>";
                echo "<img width='350' src='https://image.freepik.com/photos-gratuite/jolie-femme-regardant-camera_23-2147767413.jpg' alt='femme'/> ";
                break;
            case "autre":
                echo "un OVNI";
                echo "<br>";
                echo "<img  width='350' src='https://cdn.radiofrance.fr/s3/cruiser-production/2019/08/183a8a57-95c6-4572-b4ba-09dba822fba7/1136_extraterrestre_gettyimages-730142465.jpg' alt='ovni'/> ";
                break;
            default :
                error_custom::displayError("DEBUG", "Not Autorized key");
        }

        echo "  <br>";
    }

    if (check("language")) {

        $res = get_value_by_key("language");
        echo "Votre langage préféré est le : " . $res;
        echo "<br>";
        switch ($res) {
            case "java":
                echo "<img  width='350' src='https://logos-download.com/wp-content/uploads/2016/10/Java_logo_icon.png' alt='java' /> ";
                break;
            case "javascript":
                echo "<img  width='350' src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/768px-Unofficial_JavaScript_logo_2.svg.png' alt='js'/> ";
                break;
            case "php":
                echo "<img  width='350' src='https://mpng.subpng.com/20190325/lvs/kisspng-php-scripting-language-computer-software-programmi-is-php-dying-nigeria-internet-service-provider-5c98a179e157a2.998460931553506681923.jpg' alt='php'/> ";
                break;
            case "c":
                echo "<img  width='350' src='https://f0.pngfuel.com/png/120/705/c-logo-png-clip-art.png' alt='c'/> ";
                break;

            case "python":
                echo "<img  width='350' src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/600px-Python-logo-notext.svg.png' alt='python'/> ";
                break;
            default:
                error_custom::displayError("DEBUG", "Not Autorized key");
        }
        echo "  <br>";
    }

    if (check("love")) {
        $res = (int)get_value_by_key("love");

        echo "Note : ";
        if (0 <= $res and $res <= 20) {
            echo "<p>Vous n'etes pas fort</p>";
            echo "<span style='font-size:100px;'>&#128545;</span>";
        } elseif (21 <= $res and $res <= 50) {
            echo "<p>Vous vous débrouiller </p>";
            echo "<span style='font-size:100px;'>&#128546;</span>";
        } elseif (51 <= $res and $res <= 80) {
            echo "<p>Vous connaissez le language </p>";
            echo "<span style='font-size:100px;'>&#28527;</span>";
        } elseif (81 <= $res and $res <= 100) {
            echo "<p>Dieu ! </p>";
            echo "<span style='font-size:100px;'>&#128526;</span>";
        }
        echo "<br>";

    }

    if (check("web")) {
        $res = get_value_by_key("web");

        switch ($res) {
            case "yes" :
                echo "<p>Vous avez internet !</p>";
                break;
            case "no" :
                echo "<p>Vous n'avez pas internet ! </p>";
                break;
            default:
                error_custom::displayError("DEBUG", "Not Autorized key");
        }
        echo "  <br/>";
    }

    if (check("notify")) {
        $res = get_value_by_key("notify");
        switch ($res) {
            case "on" :
                echo "<p class=\"flow-text\">Nous allons vous envoyer des alerts par email</p>";
                break;
            case "off" :
                echo "<p class=\"flow-text\">Nous n'allons pas vous envoyer de mail</p>";
                break;
            default:
                error_custom::displayError("DEBUG", "Not Autorized key");
        }
    }

    ?>
</div>


<script src="js/jquery-2.1.1.js"></script>
<script src="js/materialize.js"></script>
</body>
</html>