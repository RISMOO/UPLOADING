<?php
$_FILES['image']['name'];//nom de l'image
$_FILES['image']['type'];//type png etc
$_FILES['image']['size'];//taille
$_FILES['image']['tmp_name'];//stocke l'image en attendant
$_FILES['image']['error'];//erreur
if (isset($_FILES['image']) && $_FILES['image']['error']== 0 ){
    //des que l'on reçoit une image
    $error=1;
//taille
if ($_FILES['image']['size']<= 3000000){
//extension
$informationsImage=pathinfo($_FILES['image']['name']);//nottre tableau d'information
$extensionImage=$informationsImage['extension'];//a l'index extension
//On fait un tableau de toutess les extensions possibles
$extensionsArray=array('jpg','png', 'jpeg','gif');
if(in_array($extensionImage, $extensionsArray)){ //on compare si extensionImage est contenu dans le tableau $extensionsArray
    //on envoi dans le serveur
    $address='uploads/'.time().rand().rand();//adresse vers notre image
    move_uploaded_file($_FILES['image']['tmp_name'],$address);//genere des identfiant aleatoire pour les images
    $error=0;//si erreur = 0
   }
  } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>HEBERGEUR D'IMAGES</title>
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Pattaya&display=swap');

    html,
    body {

        margin: 0;
        text-align: center;
        
    }

    body

    {

        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        background-image: url('https://images.unsplash.com/photo-1595981234058-a9302fb97229?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80');
    }

    header {

        text-align: center;
        background-color: purple;
    }

    .contener {
     
        width: 600px;
       margin: 0 auto;
        padding: 5%;
        text-align: center;
        margin-top: 5%;

    }
    #presentation-picture
    {

        text-align: center;
    }

    article {

        margin-top: 50px;
        background-color:#f7f7f7;
        text-align: center;
    }

    h2 {

        color: white;
        font-family: 'Pattaya', sans-serif;
    }

   h1, h2
   {
    font-family: 'Pattaya', sans-serif;

   }

   input
   {
    cursor: pointer;

   }
    .btn {
        margin: auto;
        text-align: center;
         color: white;
        border: #ee0251;
        background-color: #ee0251;
    }
    #img {

        max-width: 250px;
    }


</style>
<body>
    <!--header-->
    <!--FORMULAIRE-->
    <div class="contener">
        <article class="pt-2">
            <h1 class="mt-3">Héberger une image</h1>
            <?php
      if(isset($error) && $error ==0)//si ma variable exsite est quu'il n'yas pas d'erreur cest qu'elle a bien été envotyé
//le chemin de l'image
      echo '<div id="presentation-picture"><img src="' .$address. '" id="img"/><br>
      <input class="form-control mt-2 mb-2" type="text" placeholder="Default input" value="http://localhost/PHP_UDEMY/HEBERGEUR_IMAGES/'.$address.'"/></div>';
            ?>
              <form action="index.php" method="post"
               enctype="multipart/form-data">
            <p>
               <input type="file" name="image" id="image"><br>
                 <button type="submit" class="btn btn-outline-info mt-3 mb-3">ENVOYER</button>
            </p>
            </form>
        </article>
     <footer>
        <div class="copyright text-center">
            &copy; <script>
              document.write(new Date().getFullYear())
    
          </script>&nbsp;<a href="https://rismo.fr" class="text-dark"><img src="img/Sale.webp" width="50px">rismo.fr</a>
           </div>
     </footer>
    </div>
  </body>
</html>