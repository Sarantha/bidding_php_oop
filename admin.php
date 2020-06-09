<?php  
 include 'database.php';  
 $data = new Databases;  
 $success_message = '';
 $timeSet_message = '';
 if(isset($_POST["approve"]))  
 {   
    $id = $_POST['post_id']; 
    if($data->updateTable('customer', $id))  
      {  
           $success_message = 'The bid has been approved';  
      }       
 }
 if(isset($_POST["remove"]))  
 {   
    $id = $_POST['post_id']; 
    if($data->deleteBid('customer', $id))  
      {  
           $success_message = 'The bid has been removed successfully';  
      }       
 }
 if(isset($_POST["setDateTime"]))  
 {   
    $tm = $_POST['date_time']; 
    $id = 3;
    if($data->updateTime('timer', $tm, $id))  
      {  
           $timeSet_message = 'Time Set Successfully';  
      }       
 }
 ?>
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .container{
            margin-top: 5%;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
        
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" style="cursor:pointer;" onclick="document.getElementById('pending_list').style.display='inline';document.getElementById('approved_list').style.display='none';">Pending List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="cursor:pointer;" onclick="document.getElementById('approved_list').style.display='inline';document.getElementById('pending_list').style.display='none';">Approved List</a>
                </li>
            <ul>
        </div>
    </nav>

    <main role="main" class="container">
        <h3>Customer Data</h3>
    <div class="jumbotron">

    <div id="pending_list">
        <table class="table table-hover"id="userTbl">
            <?php
                $con=mysqli_connect("localhost","root","","chaiya");
                $query="SELECT * FROM customer WHERE status='pending' ORDER BY amount ASC; ";
                $search_result=mysqli_query($con,$query); 
            ?>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Amount</th>
                <th>Action</th>
            <tr>
            <tbody>
                <?php while($row=mysqli_fetch_array($search_result)):?>
                    <tr>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['amount'];?></td>
                        <td>   
                            <form method="post">
                                <input type="hidden" name="post_id" value="<?php echo $row["id"]; ?>" />
                                <Input type ="submit" class="btn btn-success" value="Approve" name="approve">
                            </form>
                        </td>
                    </tr>
                <?php endwhile;?>
            </tbody>
        </table>
        <span class="text-success">  
            <?php  
                if(isset($success_message)){  
                    echo $success_message;  
                }  
            ?>  
        </span>
    </div>
    <div id="approved_list" style="display: none;">
        <table class="table table-hover"id="userTbl">
            <?php
                $con=mysqli_connect("localhost","root","","chaiya");
                $query="SELECT * FROM customer WHERE status='approved' ORDER BY amount ASC; ";
                $search_result=mysqli_query($con,$query); 
            ?>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Amount</th>
                <th>Action</th>
            <tr>
            <tbody>
                <?php while($row=mysqli_fetch_array($search_result)):?>
                    <tr>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['amount'];?></td>
                        <td>   
                            <form method="post">
                                <input type="hidden" name="post_id" value="<?php echo $row["id"]; ?>" />
                                <Input type ="submit" class="btn btn-danger" value="Delete" name="remove" onclick="return confirm('Are you sure?')">
                            </form>
                        </td>
                    </tr>
                <?php endwhile;?>
            </tbody>
        </table>
        <span class="text-success">  
            <?php  
                if(isset($success_message)){  
                    echo $success_message;  
                }  
            ?>  
        </span>
    </div>

    </div>
    </main>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <h3>Set time</h3>
            <div id="setTime">
                <form method="post">
                    <input type="datetime-local" name="date_time">
                    <input type="submit" name="setDateTime" value="Set Data">
                </form>
                <span class="text-success">  
                    <?php  
                        if(isset($timeSet_message)){  
                            echo $timeSet_message;  
                        }  
                    ?>  
                </span>
                <p id="setDate">
                    <?php
                        $con=mysqli_connect("localhost","root","","chaiya");
                        $query="SELECT time FROM timer WHERE id=3 ";
                        $search_result=mysqli_query($con,$query); 
                    ?>
                    <?php while($row=mysqli_fetch_array($search_result)):?>
                        <?php echo"<h4>Time Set to: </h4>". $row['time'];?></td>
                    <?php endwhile;?>
                </p>      
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    
</body>
</html>
