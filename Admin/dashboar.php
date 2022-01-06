
<?php
    session_start();

    require_once '../inc/header.php';
   

    if(!isset($_SESSION['user_status'])){
       header('location: ../login.php');
    }


    

    

?>



<?php require_once '../inc/navbar.php' ?>


    <div class="container">
      <div class="row">
        <div class="col-md-2">
        <div class="nav-collapse bg-dark mt-2">
					<ul class="nav nav-tabs">
						<li><a class="nav-link text-white" href="All Chart"><span class="hidden-tablet"> All Chart</span></a></li>	
						<li><a class="nav-link text-white" href="message.php"><span class="hidden-tablet"> Messages</span></a></li>
						<li><a class="nav-link text-white" href="tasks.html"><span class="hidden-tablet"> Tasks</span></a></li>
						<li><a class="nav-link text-white" href="ui.html"><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a class="nav-link text-white" href="widgets.html"><span class="hidden-tablet"> Widgets</span></a></li>
		
					</ul>
				</div>
        </div>
      </div>
    </div>





<?php  require_once '../inc/footer.php'; ?>