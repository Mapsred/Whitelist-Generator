<!DOCTYPE html>
<html lang="en">
<head>
    <title>Whitelist Generator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">Isolonice</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <a class="navbar-brand" href="./" style="width: 96%;text-align:center">Whitelist Generator</a>

            <ul class="nav navbar-nav">
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p>Vous pouvez ici générer votre fichier whitelist.json pour minecraft en rentrant uniquement le nom de votre fichier ainsi que une liste de pseudos à la ligne les uns des autres</p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Whitelist Generator</h1>
            <?php
                if (!isset($_POST['white']) && !isset($_POST['names'])):
            ?>
            <form action="./" method="post" class="form-horizontal" role="form" id="form">
                <div class="form-group">
                    <label for="white" class="ontrol-label col-sm-2">Entrez le nom de votre fichier</label>
                    <div class="col-sm-10">
                        <input type="text" id="white" name="white" required>
                    </div>
                </div>
                <h4>Entrez les noms les uns à la ligne des autres</h4>
                <br>
                <div class="form-group">
                    <label for="names" class="ontrol-label col-sm-2">Entrez les noms ici</label>
                    <div class="col-sm-10">
                        <textarea id="names" class="form-control" name="names" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
            <?php
            else:
                require_once('form.php');
            endif;

            ?>

        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <div id="onaffiche"></div>
    <div id="infos">Créé par Maps_red</div>
</footer>

</body>
</html>
