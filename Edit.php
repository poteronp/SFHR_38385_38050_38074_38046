<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$getid = $_GET['edit'];
$sql = "SELECT id_user, full_name, position, type, status, email, end_date FROM users WHERE `id_user` = '$getid'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
$id = $result['id_user'];
$fn = $result['full_name'];
$stanowisko = $result['position'];
$tp = $result['type'];
$status = $result['status'];
$email = $result['email'];
$datakonca = $result['end_date'];

if(isset($_POST['edit'])){
        $updfn = $_POST['updfn'];
        $updstan = $_POST['updstan'];
        $updtp = $_POST['updtp'];
        $updstat = $_POST['updstat'];

        $updem = $_POST['updem'];

        $query = mysqli_query($conn,"SELECT id_user FROM users WHERE email='$updem'");    
        $ile_takich_maili = $query->num_rows;
        if ($updem == $email){
            $ile_takich_maili--;
        }
        if($ile_takich_maili>0)
        {
            $_SESSION['error']="Istnieje już konto przypisane do tego adresu e-mail!";
        }
        else{
            
            $upded = $_POST['upded'];
            
            $nowedane = "UPDATE `users` SET `full_name`='$updfn',`position`='$updstan',`type`='$updtp',`status`='$updstat',`email`='$updem',`end_date`='$upded' WHERE `id_user`='$getid'";
            $query = mysqli_query($conn, $nowedane);    
            if($query) {
            header("location: Lista_pracownikow.php");
            unset($_SESSION['error']);
            } else{   
            echo $_SESSION['error'];
            }
        }
}    
    
?>
<!DOCTYPE html>
<html lang="en">
    
    
<!-- W znaczniku Head znajdują się wszelkie informacje na temat strony. Autor, opis, tytuł, powiązania do CSS-->
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Lista Pracowników" />
        <meta name="author" content="Zespół I" />
        <title>Edytuj dane pracownika</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<!-- END W znaczniku Head znajdują się wszelkie informacje na temat strony. Autor, opis, tytuł, powiązania do CSS--->
    

<!-- W znaczniku Body znajdują się wszelkie informacje zawarte na stronie-->    
    <body class="body_class">      
<!-- Kontener panelu górnego-->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">  
            
<!-- Miejsce Brandingowe w panelu górnym-->
            <a class="Branding_Panel ps-3" href="homepage.php">SFHR</a>
<!-- END Miejsce Brandingowe w panelu górnym--> 
           
            
<!-- Guzik odpowiedzialny za "Menu Hamburgerowe"-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
<!-- END Guzik odpowiedzialny za "Menu Hamburgerowe"--> 
            
            
<!-- Formularz oraz Div odpowiedzialny za ułożenie ikonek na panelu górnym-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
<!-- END Formularz oraz Div odpowiedzialny za ułożenie ikonek na panelu górnym-->
            
            
<!-- Ustawienia ikonki odpowiedzialnej za menu użytkownika-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="Ustawienia_uzytkownika.php">Ustawienia</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login.php">Wyloguj</a></li>
                    </ul>
                </li>
            </ul>
<!-- END Ustawienia ikonki odpowiedzialnej za menu użytkownika-->
            
        </nav>
<!-- END Kontener panelu górnego--> 
      
<!-- Kontener panelu dolnego-->        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
<!--Panel nawigacyjny (lewy) całość-->                
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<!--Panel nawigacyjny (lewy) menu-->                      
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                                                  
<!-- Sekcja Main w Panelu nawigacyjny menu-->                            
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="homepage.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Strona Główna
                            </a>
<!-- END Sekcja Main w Panelu nawigacyjny menu-->

                            
<!-- Sekcja Zarzadzanie w Panelu nawigacyjny menu--> 
                            <div class="sb-sidenav-menu-heading">Zarzadzanie</div>         
<!-- Planner-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Planner
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>  
<!-- Przycisk rozwijany 
Zaplanuj czas pracy -> Pracownik mam możliwość wypełnienia swojego TimeSheetu
-->
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="zaplanuj_czas_pracy.php">Zaplanuj czas pracy</a>
                                </nav>
                            </div>
<!-- END Planner-->
                            
                            
                            
<!-- Pracownicy-->                          
                            <a class = "nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded = "false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pracownicy
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
<!-- Przycisk rozwijany
Lista Pracowników -> Możliwość podglądu standardowych informacji o innych pracownikach
Stwórz Nowego Pracownika -> *Dostępne tylko dla HR* Możliwość utworzenia nowego pracownika
-->
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="lista_pracownikow.php">Lista Pracownikow</a>
                                    <a class="nav-link" href="Stworz_Nowego_Pracownika.php">Stworz Nowego Pracownika</a>
                                </nav>
                            </div>
<!-- END Pracownicy--> 

                            
                            
<!-- Raportowanie *Dostępne tylko dla Managera*-->                         
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Raportowanie
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
<!-- Przycisk rozwijany
Utwórz nowy raport -> Możliwość poprzez wybranie filtrów utworzenia nowego raportu z bazy danych Plannerów
-->
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="nowy_raport.php">Utworz nowy raport</a>
                                </nav>
                            </div>
<!-- END Raportowanie-->   
          
<!-- END Sekcja Zarzadzanie w Panelu nawigacyjny menu-->  
                        </div>
                    </div>
<!--END Panel nawigacyjny (lewy) menu-->  

<!-- Panel nawigacyjny (lewy) miejsce ze statusem zalogowania-->
                    <div class="sb-sidenav-footer">
                        <div class="small">Jesteś zalogowany jako:</div>
                        <?php echo $_SESSION['user_full_name'];?>
                    </div>
<!-- END Panel nawigacyjny (lewy) miejsce ze statusem zalogowania-->                    
                </nav>
<!--END Panel nawigacyjny (lewy) całość-->                 
            </div>

            
            
<!-- Miejsce Główne do wyświetlania informacji i treści--> 
            <div id="layoutSidenav_content">
<!-- Nagłowek do powitania-->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edytuj dane pracownika</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </main>
<!-- END Nagłowek do powitania-->
                
<!-- Miejsce na treść właściwą-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-body">
                                        <form method="POST">
                                            <p>Numer pracownika którego dane chcesz edytować: <b> <?php echo $id; ?> </b></p>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">    
                                                        <input class="form-control" type="text" name="updfn" value="<?php echo $fn; ?>"/>
                                                        <label>Nazwisko i Imię</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" name="updstat" value="<?php echo $status; ?>"/>
                                                        <label>Status pracownika</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="email" name="updem" value="<?php echo $email; ?>"/>
                                                <label>Adres e-mail</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" name="updstan" value="<?php echo $stanowisko; ?>"/>
                                                        <label>Stanowisko</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" id="inputTypPracownika" name="updtp" type="text" Size="1">
                                                        <option selected disabled hidden><?php echo $tp; ?></option>
                                                        <option>Pracownik</option>
                                                        <option>Menadżer</option>
                                                        <option>HR</option>
                                                        <option>Administrator Systemu</option>
                                                        </select>
                                                        <label>Typ pracownika</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="date" name="upded" value="<?php echo $datakonca; ?>" />
                                                        <label for="inputPassword">Data końca umowy</label>
                                                </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <p class="mb-2">WAŻNE - Przypomnienie w sprawie zmiany danych</p>
                                                        <p class="small text-muted mb-2">Podczas zmiany danych należy pamiętać o:</p>
                                                        <ul class="small text-muted pl-4 mb-0">
                                                        <li>Wskazaniu typu pracownika - wyświetlana wartość to tylko podgląd</li>
                                                        <li>Data końca umowy musi być w formacie YYYY-MM-DD</li>
                                                        <li>Należy wpisywać najpierw Nazwisko a potem Imię oddzielone spacja</li>
                                                        </ul>
                                                        <p><?php if(isset($_SESSION['error'])){
                                                             echo $_SESSION['error'];
                                                             unset($_SESSION['error']);
                                                            }
                                                             ?> </p>
                                                    </div>    
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" name="edit" type="submit" value="Aktualizuj dane"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
<!-- END Miejsce na treść właściwą-->
                
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
<!-- END Miejsce Główne do wyświetlania informacji i treści-->             
        </div>
<!-- END Kontener panelu dolnego-->  
        
<!-- Sekcja Script - skrypty-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
<!-- END Sekcja Script - skrypty--> 
        
    </body>
<!-- END W znaczniku Body znajdują się wszelkie informacje zawarte na stronie-->     
</html>
