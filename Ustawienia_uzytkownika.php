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
$getemail = $_SESSION['email'];
$sql = "SELECT id_user, full_name, position, type, status, email, end_date FROM users WHERE `email` = '$getemail'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
$id = $result['id_user'];
$fn = $result['full_name'];
$stanowisko = $result['position'];
$tp = $result['type'];
$status = $result['status'];
$email = $result['email'];
$datakonca = $result['end_date'];
?>
<!DOCTYPE html>
<html lang="en">
 
    
<!-- W znaczniku Head znajdują się wszelkie informacje na temat strony. Autor, opis, tytuł, powiązania do CSS-->
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Utwórz nowy raport" />
        <meta name="author" content="Zespół I" />
        <title>Utwórz nowy raport</title>
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
                        <h1 class="mt-4">Ustawienia Użytkownika</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </main>
<!-- END Nagłowek do powitania-->


<body>
<!-- Kontener do wyświetlenia panelu Ustawień użytkownika-->    
<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8 mx-auto">

        <div class="my-4">
<!-- Zakładki ustawień-->            
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="false">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="false">Projekty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="false">Dokumenty</a>
                </li>
            </ul>
<!-- END Zakładki ustawień-->  
            
<!-- Formularz z danymi pobieranymi z bazy-->            
            <form>
                <div class="row mt-5 align-items-center">
                    <div class="col-md-3 text-center mb-5">
                        <div class="avatar avatar-xl">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="avatar-img rounded-circle" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h4 class="mb-1"><?php echo $_SESSION['user_full_name']?></h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-7">
                            </div>
                            <div class="col">
                                <p class="small mb-0 text-muted">ID: <?php echo $id; ?> </p>
                                <p class="small mb-0 text-muted">Stanowisko: <?php echo $stanowisko; ?> </p>
                                <p class="small mb-0 text-muted">Typ: <?php echo $tp; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />              
                <div class="form-group">
                    <label for="inputStanowisko">Status</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $status ?>" />
                </div>               
                <div class="form-group">
                    <label for="inputStanowisko">E-mail</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $email ?>" />
                </div>
                <div class="form-group">
                    <label for="inputStanowisko">Data końca umowy</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $datakonca ?>" />
                </div>
            </form>
<!-- END Formularz z danymi pobieranymi z bazy-->            
        </div>
    </div>
</div>
</div>
<!-- END Kontener do wyświetlenia panelu Ustawień użytkownika-->
    
<!-- Specjalny CSS do formularza z danymi-->    
<style type="text/css">
body{
    color: #8e9194;
    background-color: #f4f6f9;
}
.avatar-xl img {
    width: 110px;
}
.rounded-circle {
    border-radius: 50% !important;
}
img {
    vertical-align: middle;
    border-style: none;
}
.text-muted {
    color: #aeb0b4 !important;
}
.text-muted {
    font-weight: 300;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #4d5154;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #eef0f3;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
<!-- END Specjalny CSS do formularza z danymi-->

</body>
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
<!-- END Sekcja Script - skrypty-->
        
</body>
<!-- END W znaczniku Body znajdują się wszelkie informacje zawarte na stronie-->     
</html>