<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Formulaire</h1>
            <form method="post" action="formulaire-traitement.php">
                <div class="form-group">
                    <label>Profession</label>
                    <input type="text" name="profession" class="form-control">
                </div>
                <div class="form-group">
                    <label>Salaire</label>
                    <input type="text" name="salaire" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3"> Envoyer </button>
            </form>
        </div>
    </div>

</body>
</html>
