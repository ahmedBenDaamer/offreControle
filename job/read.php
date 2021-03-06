<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM employeur where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                        <h3>Read a offre</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label" style="color:#121290 ;">Soc</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['soc'];?>
                            </label>
                        </div>
                      </div>

                       <div class="control-group">
                        <label class="control-label" style="color:#121290 ;">Poste</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['poste'];?>
                            </label>
                        </div>
                      </div>

                       <div class="control-group">
                        <label class="control-label" style="color:#121290 ;">Adresse</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['adresse'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" style="color:#121290 ;">Email Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
                
                        <div class="control-group">
                        <label class="control-label" style="color:#121290 ;">Domaine</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['domaine'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
