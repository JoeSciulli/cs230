<?php
require'includes/header.php';
?>
<main>
    <link rel="stylesheet" hrefs="css/login.css">
    <div class="bg-cover">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block mx-auto" src="Image/login.jpeg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block mx-auto" src="Image/login2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block mx-auto" src="Image/login3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="h-40 center-me">
            <div class="my-auto">
                <form class="form-signin" action="Includes/login-helper.php" method="post">
                   <h2>Login</h2>
                   <p class="hint-text">Login Nerd</p>
                   <div class="form-group">
                       <input type="text" class="form-control" name="uname-email" placeholder="Username/Email" required="required">
                   </div>
                   <div class="form-group">
                       <input type="password" class= "form-control" name="pwd" placeholder="Password" required="required">
                   </div>
                   <div class="form-group">
                       <button type="submit" name="signup-submit" class= "btn btn-outline-success btn-lg btn-block"> Register</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</main>