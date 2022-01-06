
<?php
    session_start();

    require_once '../inc/header.php';
   

    

?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="dashboar.php">Dashbord</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">View Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#user">User</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             User
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               <?php echo $_SESSION['admin']; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Frofile</a></li>
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                <li><a class="dropdown-item" href="#">Change Password</a></li>
                <li><a class="dropdown-item text-danger" href="">Log Out</a></li>
            </ul>
        </div>
    
    </div>
  </div>
</nav>



<section id="user">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">User Account</h3>
                    </div>
                    <div class="card-body">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach($result_user as $user):
                            ?>
                                <tr>
                                    <th scope="row"><?=$user['id']; ?></th>
                                    <td><?=$user['stu_name']; ?></td>
                                    <td><?=$user['email']; ?></td>
                                    <td><?=$user['phone']; ?></td>
                                    <td>
                                       <button type="button" class="btn btn-primary"><a href="user_edit.php?id=<?=$user['id']; ?>" class="text-white">Edit</a></button> 
                                       <button type="button" class="btn btn-warning"><a href="" class="text-white">Delete</a></button> 
                                    </td>
                                </tr>

                            <?php

                                endforeach
                            
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php  require_once '../inc/footer.php'; ?>