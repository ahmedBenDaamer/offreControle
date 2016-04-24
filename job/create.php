<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $socError = null;
        $posteError = null;
        $adresseError = null;
        $emailError = null;
        $domaineError = null;
        // keep track post values
        $soc = $_POST['name'];
        $poste = $_POST['email'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $domaine = $_POST['domaine'];
         
        // validate input
        $valid = true;
        if (empty($soc)) {
            $socError = 'entrer le nom de Ste';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($poste)) {
            $posteError = 'Please enter the poste';
            $valid = false;
        }
        if (empty($adresse)) {
            $adresseError = 'Please enter the adress';
            $valid = false;
        }
        if (empty($domaine)) {
            $domaineError = 'Please enter the domain';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO employeur (soc,poste,adresse,email,domaine) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($soc,$poste,$adresse,$email,$domaine));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create an offer</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($socError)?'error':'';?>">
                        <label class="control-label">Soc</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($soc)?$soc:'';?>">
                            <?php if (!empty($socError)): ?>
                                <span class="help-inline"><?php echo $socError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                        <label class="control-label">Poste</label>
                        <div class="controls">
                            <input name="poste" type="text"  placeholder="poste" value="<?php echo !empty($poste)?$poste:'';?>">
                            <?php if (!empty($posteError)): ?>
                                <span class="help-inline"><?php echo $posteError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                       <div class="control-group <?php echo !empty($adresseError)?'error':'';?>">
                        <label class="control-label">adresse</label>
                        <div class="controls">
                            <input name="adresse" type="text"  placeholder="adresse" value="<?php echo !empty($adresse)?$adresse:'';?>">
                            <?php if (!empty($adresseError)): ?>
                                <span class="help-inline"><?php echo $adresseError;?></span>
                            <?php endif;?>
                        </div>
                      </div>                      

                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>



                       <div class="control-group <?php echo !empty($domaineError)?'error':'';?>">
                        <label class="control-label">domaine</label>
                        <div class="controls">
                            <input name="domaine" type="text"  placeholder="domaine" value="<?php echo !empty($domaine)?$domaine:'';?>">
                            <?php if (!empty($domaineError)): ?>
                                <span class="help-inline"><?php echo $domaineError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>


