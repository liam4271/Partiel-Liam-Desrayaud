<?php
require_once 'connection.php';

$Id = $_GET["Id"];


if(empty($id_clients)){

         header('Location:  listing_clients.php');
         exit;
}

if(isset($_POST)  && !empty($_POST)){

        // var_dump($_POST);

      $control_form_err = false;

     

      
      $nom = addslashes ($_POST['nom']);
      $description = addslashes ($_POST['description']);
      $Prix = addslashes ($_POST['Prix']);
      $Stock = addslashes ($_POST['Stock']);
      $reference = addslashes ($_POST['reference']);
      $date_de_crea = addslashes ($_POST['date_de_crea']);
      $date_de_mise_ajour = addslashes ($_POST['date_de_mise_ajour']);
  

     if(!empty($id_clients)){

        $sql = " UPDATE  produit  SET   Nom='".$nom."',Description='".$description."',Creation='".$date_de_crea."',Miseajour='".$date_de_mise_ajour."'Prix='".$Prix."',Stock='".$Stock."',Reference='".$reference."' WHERE  Id='".$Id."' ";
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
                $control_form_err = true;
         }

     }

}

$sql = " SELECT Id,Nom,clients.Description,Creation,Miseajour,Prix,Stock,Reference FROM  clients  WHERE Id='".$Id."' ";
$retval = mysqli_query( $conn, $sql );

$results = array();
if($retval){

    while($row = mysqli_fetch_array($retval)) {
        $results[] = $row;
    }

    if(count($results)<=0){

        header('Location:  listing_clients.php');
        exit;
    }
   
}

mysqli_close($conn);
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
                    <h2>Modifier un client</h2>

                    <form  action ="<?php $_PHP_SELF ?>" method= "POST">

                    
                    
<?php   if(isset($_POST)  && !empty($_POST)){  ?>

  <?php   if(!$control_form_err){  ?>

  <div class="alert alert-success" role="alert">
      <a href="#" class="alert-link">L'enregistrement a été effectuer avec succès</a>
  </div>

  <?php   }  ?> 

  <?php   if($control_form_err){  ?>

  <div class="alert alert-danger" role="alert">
      <a href="#" class="alert-link">L'enregistrement a échoué</a>
  </div>

  <?php   }  ?>  

<?php   }  ?>  
  <div class="form-group">
       <label for="labelnom">Nom du produit</label>
       <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter le nom du produit" required>
       <?php   if(isset($_POST['nom'])  && empty($_POST['nom'])){  ?>

        <div class="alert alert-danger" role="alert">
                 <a href="#" class="alert-link">Le nom produit ne doit pas etre vide</a>
         </div>

       <?php   }  ?> 
   
   </div>
   <div class="form-group">
       <label for="labelStock">Stock</label>
       <input type="text" class="form-control" id="Stock" name="Stock" placeholder="Enter le stock" required>
   
   </div>

   <?php   if(isset($_POST['Stock'])  && empty($_POST['Stock'])){  ?>

      <div class="alert alert-danger" role="alert">
           <a href="#" class="alert-link">Le stock ne doit pas etre vide</a>
      </div>

   <?php   }  ?> 



   <div class="form-group">
       <label for="labelreference">Reference</label>
       <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter la reference" required>
   
   </div>

   <?php   if(isset($_POST['reference'])  && empty($_POST['reference'])){  ?>

      <div class="alert alert-danger" role="alert">
           <a href="#" class="alert-link">La reference ne doit pas etre vide</a>
      </div>

   <?php   }  ?> 




   <div class="form-group">
       <label for="labelPrix">Prix</label>
       <input type="text" class="form-control" id="Prix" name="Prix" placeholder="Enter le prix" required>
   
   </div>

   <?php   if(isset($_POST['Prix'])  && empty($_POST['Prix'])){  ?>

      <div class="alert alert-danger" role="alert">
           <a href="#" class="alert-link">Le prix ne doit pas etre vide</a>
      </div>

   <?php   }  ?> 

   <div class="form-group">
       <label for="labeldescription">Description</label>
       <input type="text" class="form-control" id="description" name="description" placeholder="Enter la description" required>
   
   </div>

   <?php   if(isset($_POST['description'])  && empty($_POST['description'])){  ?>

      <div class="alert alert-danger" role="alert">
           <a href="#" class="alert-link">La description ne doit pas etre vide</a>
      </div>

   <?php   }  ?>

   

   <div class="form-group"  style="margin-bottom:1%">
       <label for="labeldate_de_crea">Date de creation</label>                         
       <div class="input-group">
             <input type="date" placeholder="Entrez la date de creation" class="form-control" id="date_de_crea" name="date_de_crea" required>        
        </div>  
        
        <?php   if(isset($_POST['date_de_crea'])  && empty($_POST['date_de_crea'])){  ?>

           <div class="alert alert-danger" role="alert">
               <a href="#" class="alert-link">La date de creation ne doit pas etre vide</a>
           </div>

        <?php   }  ?> 
   
   </div>

   <button type="submit" class="btn btn-primary">Enregister</button>
</form>
                   
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <?php  include 'assets/templates/footer.php'; ?>
    </body>
</html>