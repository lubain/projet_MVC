
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link"><i class="fas fa-home"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" method="post">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search" required>
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?= count($conversations) ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php $i = 0 ?>
          <?php if (count($conversations) == 0): ?>
            <span class="dropdown-item dropdown-header">aucune messages</span>
            <div class="dropdown-divider"></div>
          <?php endif; ?>
          <?php foreach ($conversations as $conversation): ?>
            <a href="chats/<?= esc($conversation->id) ?>" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= esc($conversation->profile_photo) ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <?= esc($conversation->nom) ?> <?= esc($conversation->prenom) ?>
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm"><?= esc($conversation->content) ?></p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?= esc($conversation->created_at) ?></p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>

            <?php $i++; ?>
            <?php if ($i > 3): ?>
              <a href="chats" class="dropdown-item dropdown-footer">See All Messages</a>
              <?php break; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light"><strong>Chat</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="user-block image">
          <img src="<?= $user["profile_photo"] ?>" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user["nom"]; ?> <?= $user["prenom"]; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Adresse
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                  <p><?= $user["adress"]?></p>
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Email
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                  <p><?= $user["email"]?></p>
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#maModal<?=$user['id']?>">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Deconexion
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="modal fade" id="maModal<?=$user['id']?>" tabindex="-1" aria-labelledby="titreModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p>voulez vous vous déconnecter ?</p>
                      </div>
                      <div class="col-md-6">
                        <a href="logout" class="btn btn-danger">oui</a>
                        <button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Fermer">non</button>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <?php if(!isset($resultats)):?>
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activité</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Modifier les informations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#photo" data-toggle="tab">Changer le photo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#publication" data-toggle="tab">Creer une publication</a></li>
                  <?php else:?>
                    <?php if (count($resultats) == 0): ?>
                        <li class="nav-item"><a class="nav-link active" href="#resultat" data-toggle="tab">aucune resultat trouvé...</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link active" href="#resultat" data-toggle="tab">resultat : <?= count($resultats)?></a></li>
                    <?php endif ?>
                  <?php endif;?>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <?php if (!isset($resultats)): ?>
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php foreach($publications as $publication):?>
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?= esc($publication->profile_photo) ?>" alt="User Image">
                        <span class="username">
                          <a href="<?= base_url("public/profile/" . esc($publication->sender_id)) ?>"><?= esc($publication->nom) ?> <?= esc($publication->prenom) ?></a>
                          <?php if (esc($publication->sender_id) == session()->get('id')):?>
                          <a href="#" class="float-right btn-tool" data-bs-toggle="modal" data-bs-target="#deletModal<?=esc($publication->id)?>">
                            <i class="fas fa-times"></i>
                          </a>
                          <div class="modal fade" id="deletModal<?=esc($publication->id)?>" tabindex="-1" aria-labelledby="titreModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <p>supprimer la publication ?</p>
                                    </div>
                                    <div class="col-md-6">
                                      <a href="delete/<?=esc($publication->id)?>" class="btn btn-danger">oui</a>
                                      <button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Fermer">non</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php endif; ?>
                        </span>
                        <span class="description"><?= esc($publication->created_at) ?></span> 
                      </div>
                      <!-- /.user-block -->
                      
                      <p>
                          <?= esc($publication->descriptions) ?>
                      </p>

                      <?php if (esc($publication->publications_photo)):?>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="<?= esc($publication->publications_photo)?>" alt="Photo">
                        </div>
                      </div>
                      <?php endif ?>

                      <p>
                        <!-- <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a> -->
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <form class="form-horizontal" method="post">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" name="response" placeholder="Comments" required>
                          <div class="input-group-append">
                            <button type="submit" name="submit_response" class="btn btn-danger"><i class="fas fa-paper-plane"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <?php endforeach; ?>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <?php else: ?>
                  <div class="active tab-pane" id="resultat">
                      <?php foreach($resultats as $row):?>
                      <div class="post clearfix">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?= $row["profile_photo"]?>" alt="User Image">
                            <span class="username">
                                <a href="profile/<?= $row["id"]?>"><?= $row["nom"]?> <?= $row["prenom"]?></a>
                                <a href="chats/<?= $row["id"]?>" class="float-right">
                                  <i class="far fa-comments"></i>
                                </a>
                            </span>
                            <!-- <span class="description"></span> -->
                          </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">nom</label>
                        <div class="col-sm-10">
                          <input type="text" name="nom" value="<?= $user["nom"];?>" class="form-control" id="inputName" placeholder="nom">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">prenom</label>
                        <div class="col-sm-10">
                          <input type="text" name="prenom" value="<?= $user["prenom"];?>" class="form-control" id="inputName" placeholder="prenom">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="<?= $user["email"];?>" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputAdress" class="col-sm-2 col-form-label">adress</label>
                        <div class="col-sm-10">
                          <input type="adress" value="<?= $user["adress"];?>" name="adress" class="form-control" id="inputAdress" placeholder="Adress">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" value="Submit" name="update" class="btn btn-danger">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="photo">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                          <div class="col-md-6 position-relative">
                              <img class="img-circle img-bordered-sm" src="<?= $user["profile_photo"] ?>" alt="Photo de profil" width="100" height="100">
                          </div>
                          <div class="col-md-6 position-relative">
                            <div class="form-group row">
                              <label for="photo" class="form-label">upload image</label>
                              <input type="file" name="profile_photo" class="form-control" id="photo" required>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-3">
                                <input type="submit" value="Upload" class="btn btn-danger">
                              </div>
                            </div>
                          </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="publication">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                          <div class="col-md-6 position-relative">
                              <label for="nom" class="form-label">descriptions</label>
                              <textarea name="descriptions" rows="1" id="" class="form-control" required></textarea>
                          </div>
                          <div class="col-md-6 position-relative">
                              <label for="photo" class="form-label">laisser ce champ vide si vous n'avez pas besoin</label>
                              <input type="file" name="publications_photo" class="form-control" id="photo">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <input type="submit" value="Publier" class="btn btn-danger">
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
