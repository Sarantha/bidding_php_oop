<?php  
 include 'database.php';  
 $data = new Databases;  
 $success_message = '';  
 if(isset($_POST["submit"]))  
 {  
      $insert_data = array(  
           'fname'     =>     mysqli_real_escape_string($data->con, $_POST['fname']),  
           'lname'     =>     mysqli_real_escape_string($data->con, $_POST['lname']),
           'email'     =>     mysqli_real_escape_string($data->con, $_POST['email']),
           'phone'     =>     mysqli_real_escape_string($data->con, $_POST['phone']),
           'amount'    =>     mysqli_real_escape_string($data->con, $_POST['amount']),  
      );  
      if($data->insert('customer', $insert_data))  
      {  
           $success_message = 'Your bid has been submitted successfully';  
      }       
 }  
 ?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Customer</title>

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
        <a class="navbar-brand" href="#">Customer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <main role="main" class="container">
        <h3>Fill the form below</h3>
    <div class="jumbotron">
        <form class="needs-validation" novalidate method="POST">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" required name="fname">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" required name="lname">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom03">Email</label>
                <input type="email" class="form-control" id="validationCustom03" required name="email">
                <div class="invalid-feedback">
                  Please provide a valid email.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom05">Phone No</label>
                <input type="number" class="form-control" id="validationCustom05" required name="phone">
                <div class="invalid-feedback">
                  Please provide a valid Phone number.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom05">Amount</label>
                <input type="number" class="form-control" id="validationCustom05" required name="amount">
                <div class="invalid-feedback">
                  Please provide a valid amount.
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit" id="button">Submit</button>
            <br>
            <span class="text-success">  
                     <?php  
                     if(isset($success_message))  
                     {  
                          echo $success_message;  
                     }  
                     ?>  
            </span>
          </form>
          <br>
          <!-- Bidding information -->
          <h5 id="setDate">
            <?php
                $con=mysqli_connect("localhost","root","","chaiya");
                $query="SELECT time FROM timer WHERE id=3 ";
                $search_result=mysqli_query($con,$query); 
            ?>
            <?php while($row=mysqli_fetch_array($search_result)):?>
                <?php echo"Bid Ends at : ". $row['time'];?></td>
            <?php endwhile;?>
          </h5>
          <h5 id="demo"></h5>
          <!-- Bidding information End-->
    </div>

    <div class="jumbotron">
    <h1>Bidders</h1>
    <table class="table table-hover"id="userTbl">
            <?php
                $con=mysqli_connect("localhost","root","","chaiya");
                $query="SELECT * FROM customer ORDER BY amount ASC; ";
                $search_result=mysqli_query($con,$query); 
            ?>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Amount</th>
            <tr>
            <tbody>
                <?php while($row=mysqli_fetch_array($search_result)):?>
                    <tr>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['amount'];?></td>
                    </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>


    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
    </script>

    <script>
            // Set the date we're counting down to
            var setDate = document.getElementById("setDate").innerHTML;
            var countDownDate = new Date(setDate).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML ="Time Remaining : "+ days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "The Bid has ended";
                document.getElementById("button").disabled = true;
            }
            }, 1000);
        </script>
</body>
</html>
