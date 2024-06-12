<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    
<!-- W znaczniku Head znajdują się wszelkie informacje na temat strony. Autor, opis, tytuł, powiązania do CSS-->
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Strona główna" />
        <meta name="author" content="Zespół I" />
        <title>SFHR Management</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<!-- END W znaczniku Head znajdują się wszelkie informacje na temat strony. Autor, opis, tytuł, powiązania do CSS--->
    
 <!-- W znaczniku Body znajdują się wszelkie informacje zawarte na stronie-->    
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
<!-- Kontener odpowiedzialny za formularz logowania-->                    
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Logowanie</h3></div>
                                    <div class="card-body">
                                        <form action="login.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Adres e-mail</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Haslo</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <p style="color:red"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];unset($_SESSION['error']);} ?></p>
                                                <input name="submit" type="submit" class="btn btn-primary" href="index.php" value="Zaloguj">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- END Kontener odpowiedzialny za formularz logowania-->                    
                </main>
            </div>

                
 <!-- Stopka-->                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Najzajebistsza grupa ever ZESPÓŁ I 2022/2023</div>
                            <div>
                                <a href="#">Polityka prywatności</a>
                                &middot;
                                <a href="#">Zasady &amp; Warunki</a>
                            </div>
                        </div>
                    </div>
                </footer>
<!-- END Stopka-->       
                
        </div>
<!-- Sekcja Script - skrypty-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
<!-- END Sekcja Script - skrypty-->   
    </body>
<!-- END W znaczniku Body znajdują się wszelkie informacje zawarte na stronie-->     
</html>