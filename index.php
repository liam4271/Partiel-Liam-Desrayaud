<?php
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
         <?php  include 'assets/templates/head.php'; ?>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
            <?php  include 'assets/templates/menu.php'; ?>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                  <?php  include 'assets/templates/nav.php'; ?>
                <!-- Page content-->
                <div class="container-fluid">
                <form method="POST" action="<?php $_PHP_SELF ?>">

Entrez un mot clé:<br>

<input type="text" name="Mot" size="15">

<input type="submit" value="Rechercher" alt="Lancer la recherche!">

</form>
<?php   
    $Mot = addslashes ($_POST['mot']);
            if (($Mot == "")||($Mot == "%")) {
    // Si aucun mot clé n'a été saisi,
    // le script demande à l'utilisateur
    // de bien vouloir préciser un mot clé

        echo "
        Veuillez entrer un mot clé s'il vous plaît!
        <p>";

    }

    else {
    // On selectionne les enregistrements contenant le mot clé
    // dans les keywords ou le titre
        $query = "SELECT distinct count(lien) FROM utilisateur,produit
        WHERE keyword LIKE \"%$Mot%\"
        OR titre LIKE \"%$Mot%\"
        ";

        $result = mysql_query($query);

        $row = mysql_fetch_row($result);

        $Nombre = $row[0];

    // Si aucun enregistrement n'est retourné,
    // on affiche un message adéquat
    if ($Nombre == "0") {
        echo "
        <h2>Aucun résultat ne correspond à votre recherche</h2>

        <p>

        ";

    }

    // Sinon, on affiche le nombre d'enregistrements correspondant
    // et les résultats eux-mêmes
    else {
        $query = "SELECT distinct lien,keyword,titre FROM search
        WHERE keyword LIKE \"%$Mot%\"
        OR titre LIKE \"%$Mot%\" ORDER by titre ASC";

        $result = mysql_query($query);

        // Si un seul enregistrement est trouvé, on affiche un message au singulier
        if ($Nombre == "1") {
        echo "
        <a name=\"#resultat\"><h2>Résultat: Un article trouvé</h2></a>

        <p>";

        }
        // Dans le cas contraire le message est au pluriel...
        else {
        echo "
        <a name=\"#resultat\"><h2>Résultat: $Nombre articles trouvés</h2></a>

        <p>";

        }
        while($row = mysql_fetch_row($result))
        {
            echo "
            <p>\n
            <b>$row[2]</b>\n
            <br><a href=\"../$row[0]\">Visualiser l'article</a>\n
            <p>\n
            ";

        }
    }

    }

    // on ferme la base
    mysql_close($conn);

?>
                </div>
            </div>
        </div>
        <?php  include 'assets/templates/footer.php'; ?>
    </body>
</html>




