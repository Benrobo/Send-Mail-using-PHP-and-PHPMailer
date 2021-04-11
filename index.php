<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="form-cont">
            <h3>Contact Form</h3>
            <br>
            <div class="err-cont">
                <?php if(isset($_GET['err'])){?>
                <div class="alert alert-danger"><small><?php echo $_GET['err'];?></small></div>
                <?php }else if(isset($_GET['pass'])){?>
                <div class="alert alert-success"><small><?php echo $_GET['pass'];?></small></div>
                <?php }?>
            </div>
            <form action="sendmail.php" class="form-group" method="POST">
                <label for="fname">Fullname</label>
                <input type="text" name="name" placeholder="Your name.." class="form-control">
                
                <label for="fname">Email</label>
                <input type="email" name="email" placeholder="Your Email Address.." class="form-control">
                
                <label for="subject">Message</label>
                <textarea name="msg" placeholder="Write something.." class="form-control"></textarea>
            
                <input type="submit" name="submit" value="Send Message" class="btn btn-block btn-primary mt-2">
            
              </form>
        </div>
    </div>
</body>
</html>