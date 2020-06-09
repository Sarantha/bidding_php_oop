<?php
$con=mysqli_connect("localhost","root","","test");
if(isset($_POST['setDateTime'])){
    $time = $_POST['date_time'];
    $query = "INSERT INTO timer(time)values('$time')";
    $result=mysqli_query($con,$query);
    if($result){
        echo "<script>alert('Success')</script>";
    }else{
        echo "<script>alert('Success')</script>";
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
   </head>
    <body>
        <input type="button" value="Stop me if you can" id="button">
        <p id="demo"></p>
        <form method="post">
            <input type="datetime-local" name="date_time">
            <input type="submit" name="setDateTime" value="Set Data">
        </form>
        <p id="setDate">
            <?php
                $con=mysqli_connect("localhost","root","","test");
                $query="SELECT time FROM timer WHERE id=5 ";
                $search_result=mysqli_query($con,$query); 
            ?>
            <?php while($row=mysqli_fetch_array($search_result)):?>
                <?php echo $row['time'];?></td>
            <?php endwhile;?>
        </p>

        <h1 id="test"></h1>
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
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";
            document.getElementById("test").innerHTML = setDate;
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                document.getElementById("button").disabled = true;
            }
            }, 1000);
        </script>
    </body>
</html>