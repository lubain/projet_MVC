<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <title>Sign up</title>
<body>
<div class="container mt-3 mb-4" id="contact">
    <div class="card shadow p-3 mb-5 bg-body-tertiary">
        <div class="card-body">
            <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                <div class="col-md-3 position-relative">
                    <label for="nom" class="form-label">nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" required>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" required>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="adress" class="form-label">Adress</label>
                    <input type="text" name="adress" class="form-control" id="adress" required>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit"><i class="fas fa-paper-plane"></i> Creer</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>