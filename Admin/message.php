


<?php
    session_start();

    require_once '../db_connect.php';

    require_once '../inc/header.php';
   

    if(!isset($_SESSION['user_status'])){
       header('location: message.php');
    }





    if(isset($_POST['btn'])){
        $guest_email = $_POST['email'];
        $guest_message = $_POST['message'];

       if($db_connect){
            $guest_query = "INSERT INTO tbl_guest(guest_email, guest_message) VALUES ('$guest_email','$guest_message')";
            $gest_msg = mysqli_query($db_connect,$guest_query);
            if($gest_msg){
                header('location: Apps/index.php');
            }else{
            die('Query Problem'.mysqli_errno($db_connect));
            }
           
       }else{
         
       }


    }


    $view_message_query = "SELECT * FROM tbl_guest";
    $result_query = mysqli_query($db_connect,$view_message_query);

    

    

?>



<?php require_once '../inc/navbar.php' ?>


    <div class="container">
      <div class="row">
        <div class="col-md-2">
             <!-- start: Main Menu -->
				<div class="nav-collapse bg-dark mt-2">
					<ul class="nav nav-tabs">
						<li><a class="nav-link text-white" href="All Chart"><span class="hidden-tablet"> All Chart</span></a></li>	
						<li><a class="nav-link text-white" href="message.php"><span class="hidden-tablet"> Messages</span></a></li>
						<li><a class="nav-link text-white" href="tasks.html"><span class="hidden-tablet"> Tasks</span></a></li>
						<li><a class="nav-link text-white" href="ui.html"><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a class="nav-link text-white" href="widgets.html"><span class="hidden-tablet"> Widgets</span></a></li>
		
					</ul>
				</div>
	
			<!-- end: Main Menu -->
        </div>

        <div class="col-md-7 mt-2">
					<h1>Inbox</h1>
					
					<ul class="messagesList">
						<?php foreach($result_query as $total_msg): ?>
						<li>
							<span class="from"><span class="bg-warning"><?=$total_msg['guest_email']?></span><span><?=$total_msg['guest_message']?></span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
                        <?php endforeach ?>	
					</ul>
						
				</div>
      </div>
    </div>





<?php  require_once '../inc/footer.php'; ?>