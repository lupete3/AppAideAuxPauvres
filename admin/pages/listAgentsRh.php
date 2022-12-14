<?php 
  include('../access/security_adm.php');
  require_once ('../access/connex.php'); 
  $id= $_SESSION['profile']['admin']['id'];
  $username= $_SESSION['profile']['admin']['login'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta charset="utf-8">

  <title>Espace Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<style>
  .spacer{
    margin-top: 30px;
  }
</style>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Espace Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
          <a class="dropdown-item" href="#"><?php echo $username;?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../access/deconnexion.php" >D??connexion</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('include/sidebarAdmin.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin.php">Accueil</a>
          </li>
          <li class="breadcrumb-item active">Liste des Agents RH</li>
        </ol>

        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des agents RH</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Postnom</th>
                    <th>Sexe</th>
                    <th>Matricule</th>
                    <th>N?? T??l??phone</th>
                    <th>Pseudo</th>
                    <th>Mot de passe</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  
                  <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Postnom</th>
                    <th>Sexe</th>
                    <th>Matricule</th>
                    <th>N?? T??l??phone</th>
                    <th>Pseudo</th>
                    <th>Mot de passe</th>
                    <th>Action</th>
                  </tr>
                
                </tfoot>
                <tbody>
                  <?php 
                    $req=$bd->prepare("SELECT A.id,A.nom,A.postnom,A.sexe,A.matricule,A.tel,A.login,A.password FROM chargerh AS A");
                    $req->execute();
                    while ($res = $req->fetch()) { ?>
                  <tr>
                    <td><?php echo $res['id'] ?></td>
                    <td><?php echo $res['nom'] ?></td>
                    <td><?php echo $res['postnom'] ?></td>
                    <td><?php echo $res['sexe'] ?></td>
                    <td><?php echo $res['matricule'] ?></td>
                    <td><?php echo $res['tel'] ?></td>
                    <td><?php echo $res['login'] ?></td>
                    <td><?php echo $res['password'] ?></td>
                    <td><button type="button" class="btn btn-primary editBtn"><i class="fa fa-edit"></i></button></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <div class="spacer">
        
      </div>

      <!-- Sticky Footer -->
      <?php include('include/footerList.php'); ?>

  <!-- Logout Modal-->
  
  <div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="Modregister" aria-hidden="true">
        <div class="modal-dialog">
      <div class="modal-content panel-primary">
        <div class="modal-header">
          <h4 class="modal-title" id="AddSectionLabel">Modification Agent RH</h4>
          <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
                        
        </div>
        <div class="modal-body">
        <form action="../access/mod_agentRh.php" method="post" was-validate>
          <input type="hidden" name="id" id="id" class="form-control" placeholder="Id" required="required" >
          <div class="form-row">
              <div class="col-md-6">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom Agent" required="required" autofocus="autofocus">
              </div>
              <div class="col-md-6">
                <label for="nom">Postnom</label>
                <input type="text" id="postnom" name="postnom" class="form-control" placeholder="Postnom Agent" required="required" autofocus="autofocus">
              </div>
              
          </div>
          
          <div class="form-row">
              <div class="col-md-6">
                <label for="sexe">Sexe</label>
                <select name="sexe" id="sexe" class="form-control">
                  <option value="M">Masculin</option>
                  <option value="F">F??minin</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="matricule">Matricule</label>
                <input type="text" id="matricule" name="matricule" class="form-control" placeholder="Matricule Agent" required="required" autofocus="">
              </div>
              
          </div>
          
          <div class="form-row">
              <div class="col-md-12">
                <label for="tel">T??l??phone</label>
                <input type="text" id="tel" name="tel" class="form-control" placeholder="T??l??phone" required="required" autofocus="">
              </div>
              
              
          </div>
          
          <div class="form-row">
              <div class="col-md-6">
                <label for="nom">Login</label>
                <input type="text" id="login" name="login" class="form-control" placeholder="Login" required="required" autofocus="">
              </div>
              <div class="col-md-6">
                <label for="nom">Mot de passe</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autofocus="">
              </div>              
          </div><br>
          <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <button type="submit" class="btn btn-secondary btn-block" data-dismiss="modal" name="btn">Annuler </button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <button type="submit" class="btn btn-primary btn-block" name="update"> Modifier </button>
                </div>
              </div>
          </div>
            
        </div> 
        </form>
             
                       
        </div>
        
        </form>
        
      </div>
  <!-- /.modal-content -->
        </div>
    </div>

  <!-- Bootstrap core JavaScript-->

  <script type="text/javascript">
    $(document).ready(function() {
      $('.editBtn').on('click', function(){
          $('#editBtn').modal('show');

          $tr =$(this).closest('tr');
          var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
          console.log(data);

          $('#id').val(data[0]);
          $('#nom').val(data[1]);
          $('#postnom').val(data[2]);
          $('#sexe').val(data[3]);
          $('#matricule').val(data[4]);
          $('#tel').val(data[5]);
          $('#login').val(data[6]);
          $('#password').val(data[7]);
        });
    });
  </script>

</body>

</html>
