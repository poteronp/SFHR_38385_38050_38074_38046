<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/AEH/index.php");
}



?>
<!DOCTYPE html>
<html lang="en">
    
    
<!-- W znaczniku Head znajdują się wszelkie informacje na temat strony. Autor, opis, tytuł, powiązania do CSS-->
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Strona główna" />
        <meta name="author" content="Zespół I" />
        <title>Strona główna</title>
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
                        <li><a class="dropdown-item" href="logout.php">Wyloguj</a></li>
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
               <?php
                if($_SESSION['type'] == "Manager" || $_SESSION['type'] == "Administrator Systemu" || $_SESSION['type'] == "Administrator Techniczny"){
                
               echo '
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
            ';}?>
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
                        <h1 class="mt-4">Witaj, <?php echo $_SESSION['user_full_name'];?>!</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </main>
<!-- END Nagłowek do powitania-->
                
<!-- Miejsce na treść właściwą-->              
                <div class="homepagemaindiv">
                    <center><img src="img/Hello.gif"/></center>
                    <center><img src="img/P5.jpg"/></center>
                    <p>Nowe wiadomości od ostatniego logowania: 0</p>
                    <p>Niewypełnione Planner'y: 0</p>
                    <p>Błędy w Planner'ach: 0</p>
                </div>
<!-- END Miejsce na treść właściwą-->
                
<!-- Stopka-->                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Najzajebistsza grupa ever ZESPÓŁ I 2022/2023</div>
                            <div>
                                <a href="">Polityka prywatności</a>
                                &middot;
                                <a href="">Zasady &amp; Warunki</a>
                            </div>
                        </div>
                    </div>
                </footer>
<!-- END Stopka-->                 
                
<!-- Miejsce na treść właściwą-->                 
            </div>
<!-- END Miejsce Główne do wyświetlania informacji i treści-->             
        </div>
<!-- END Kontener panelu dolnego-->  
        
<!-- Sekcja Script - skrypty-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<!-- END Sekcja Script - skrypty--> 
        
    </body>
<!-- END W znaczniku Body znajdują się wszelkie informacje zawarte na stronie-->     
</html>
