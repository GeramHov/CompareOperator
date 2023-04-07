<?php session_start(); 

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== 1) {
    header("Location: ./index.php");
    exit();
}
if (!isset($_GET['info']) || ($_GET['info'] !== 'travel' && $_GET['info'] !== 'users' && $_GET['info'] !== 'partners' && $_GET['info'] !== 'reviews')) {
    header('Location: ./index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php session_start();





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="./SCSS/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">ComparOperator</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown px-3">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./profile.php">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="admin.php?info=users">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="admin.php?info=travel">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-location-dot"
                                    style="color: #383c3f;"></i></div>
                            Destinations

                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plane" style=" color: #383c3f;"></i>
                            </div>
                            Tour Operator
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="admin.php?info=partners"><i
                                        class="fa-solid fa-handshake" style=" color: #383c3f; padding-right: 1vh;"></i>
                                    Partners
                                </a>

                                <a class="nav-link collapsed" href="admin.php?info=reviews"><i class="fa-solid fa-star"
                                        style=" color: #383c3f; padding-right: 1vh;"></i>
                                    Review
                                </a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-footer fixed-bottom">
                            <div class="small">Logged in as:</div>
                            <?php
                            echo $_SESSION["firstname"]; ?>
                        </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Be a modal addict</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Don't abuse modal</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Css is bad, just gif instead</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <?php if (isset($_GET['info']) && $_GET['info'] === 'users')
                                echo '<table id="datatablesSimple">
                                <thead>   
                                <tr>
                                        <th>Name</th>
                                        <th>Firstname</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Last Activity</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Firstname</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Last Activity</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                               ';
                            if (isset($_GET['info']) && $_GET['info'] === 'travel') {
                                echo '<table id="datatablesSimple">
                                <thead> 
                                <tr>
                                        <th>Location</th>
                                        <th>Location</th>
                                        <th>Starting Price</th>
                                        <th>ID</th>
                                        <th>Undefined</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Location</th>
                                        <th>Country</th>
                                        <th>Starting Price</th>
                                        <th>ID</th>
                                        <th>Undefined</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody>';
                            }
                            if (isset($_GET['info']) && $_GET['info'] === 'partners') {
                                echo '<table id="datatablesSimple">
                                <thead> 
                                <tr>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Icon</th>
                                        <th>ID</th>
                                        <th>Undefined</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       <th>Name</th>
                                        <th>Link</th>
                                        <th>Icon</th>
                                        <th>ID</th>
                                        <th>Undefined</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody>';
                            } ?>
                            <?php
                            require_once("./CONFIG/db.php");
                            require_once('./CONFIG/autoload.php');
                            if (isset($_GET['info']) && $_GET['info'] === 'users') {
                                $Manager = new Manager($db);
                                $usersData = $Manager->getAllUsers();
                                // $Manager->pretyDump($usersData);
                                $users = [];

                                foreach ($usersData as $userData) {
                                    // Créer un nouvel objet User avec les données de chaque utilisateur
                                    $user = new User($userData);
                                    // Ajouter l'objet User créé au tableau $users
                                    $users[] = $user;
                                }
                                $clear = "";
                                foreach ($users as $user) {
                                    echo "<tr>";
                                    echo "<td>" . $user->getLastName() . "</td>";
                                    echo "<td>" . $user->getFirstName() . "</td>";
                                    echo "<td>" . $user->getEmail() . "</td>";
                                    echo "<td>" . $user->getCreated_at();
                                    if ($user->getBanned() == 1) {
                                        echo '<i class="fa-solid fa-ban px-2" style="color: #6f0003;"></i>'; // afficher l'icône de marteau si l'user est ban
                                    }
                                    echo "</td>";
                                    echo "<td>" . $user->getLast_connection() . "</td>";
                                    echo "<td> 
                                                <form method='POST' action=''>
                                                    <input type='hidden' name='userId' value='" . $user->getId() . "'>
                                                    <select name='method' onchange='this.form.submit()'>
                                                        <option value=''>Selectionnez une methode</option>
                                                        <option value='method1'>Ban user</option>
                                                        <option value='method2'>Unban user</option>
                                                    </select>" . $clear . "
                                                </form>
                                            </td>";

                                    echo "</tr>";
                                }
                                if (isset($_POST['method']) && isset($_POST['userId'])) {
                                    // récupérer la valeur sélectionnée
                                    $selectedMethod = $_POST['method'];
                                    $userId = $_POST['userId'];
                                    // créer une instance de la classe Manager avec la connexion à la base de données
                                    $manager = new Manager($db);

                                    // vérifier la valeur sélectionnée et appeler la méthode correspondante
                                    if ($selectedMethod === 'method1') {
                                        $manager->banUser($userId);
                                    } elseif ($selectedMethod === 'method2') {
                                        $manager->unbanUser($userId);
                                    } else {
                                        echo "Veuillez sélectionner une méthode.";
                                    }
                                }
                            }

                            if (isset($_GET['info']) && $_GET['info'] === 'travel') {
                                $Manager = new Manager($db);
                                $destinations = $Manager->getAllDestinations();
                                // $Manager->pretyDump($destinations);
                            
                                $clear = "";


                                foreach ($destinations as $destination) {
                                    echo "<tr>";
                                    echo "<td>" . $destination->getLocation() . "</td>";
                                    echo "<td>" . $destination->getCountry() . "</td>";
                                    echo "<td>" . $destination->getstartingPrice() . "</td>";
                                    echo "<td>" . $destination->getId() . "</td>";

                                    echo "<td> 
                                <form method='POST' action=''>
                                <input type='hidden' id='field1' name='location' value=''>
                                <input type='hidden' id='field2' name='country' value=''>
                                <input type='hidden' id='field3' name='price' value=''>
                                <input type='hidden' name='id' value='" . $destination->getId() . "'>
                                <select name='method' onchange='this.form.submit()'>
                                    <option value=''>Selectionnez une methode</option>
                                    <option value='method3'>A DEFINIR</option>
                                    <option value='method4'>A DEFINIR</option>
                                    <option value='method5'>A DEFINIR</option>
                                </select>
                                </form> </td> 

                                <td>
                                <button class='edit-button btn btn-light' onclick='activateEditMode(this)'>Editer</button>
                                <button class='btn btn-light' onclick='submitForm(this)' style='display:none'>Enregistrer</button>
                                <button  class='btn btn-light' onclick='cancelEditMode(this)' style='display:none'>Annuler</button>
                                </td>";

                                    echo "</tr>";
                                }


                            }
                            if (isset($_GET['info']) && $_GET['info'] === 'partners') {
                                $Manager = new Manager($db);
                                $Companies = $Manager->getAllCompanies();
                                // $Manager->pretyDump($destinations);
                            
                                $clear = "";


                                foreach ($Companies as $company) {
                                    echo "<tr>";
                                    echo "<td>" . $company->getName() . "</td>";
                                    echo "<td>" . $company->getLink() . "</td>";
                                    echo "<td>" . $company->getIcon() . "</td>";
                                    echo "<td>" . $company->getId() . "</td>";

                                    echo "<td> 
                                <form method='POST' action=''>
                                <input type='hidden' id='field1' name='location' value=''>
                                <input type='hidden' id='field2' name='country' value=''>
                                <input type='hidden' id='field3' name='price' value=''>
                                <input type='hidden' name='id' value='" . $company->getId() . "'>
                                <select name='method' onchange='this.form.submit()'>
                                    <option value=''>Selectionnez une methode</option>
                                    <option value='method3'>A DEFINIR</option>
                                    <option value='method4'>A DEFINIR</option>
                                    <option value='method5'>A DEFINIR</option>
                                </select>
                                </form> </td> 

                                <td>
                                <button class='edit-button btn btn-light' onclick='activateEditMode(this)'>Editer</button>
                                <button class='btn btn-light' onclick='submitForm(this)' style='display:none'>Enregistrer</button>
                                <button  class='btn btn-light' onclick='cancelEditMode(this)' style='display:none'>Annuler</button>
                                </td>";

                                    echo "</tr>";
                                }


                            }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        var originalValues = [];

        function activateEditMode(button) {

            var row = button.parentNode.parentNode;

            for (var i = 0; i < 3; i++) {
                var text = row.cells[i].textContent.trim();

                var input = document.createElement("input");
                input.type = "text";
                input.value = text;

                originalValues.push(text);

                // remplacer le texte par le champ de formulaire
                row.cells[i].textContent = "";
                row.cells[i].appendChild(input);

                // ajouter un écouteur d'événements pour mettre à jour les valeurs d'origine lorsque la valeur d'un champ de formulaire est modifiée
                input.addEventListener("input", function (event) {
                    var index = Array.from(row.cells).indexOf(event.target.parentNode);
                    originalValues[index] = event.target.value;
                });
            }

            // cacher le bouton "Editer"
            button.style.display = "none";

            // afficher "Enregistrer" & "Annuler"
            button.nextElementSibling.style.display = "inline-block";
            button.nextElementSibling.nextElementSibling.style.display = "inline-block";
        }

        function cancelEditMode(button) {
            var row = button.parentNode.parentNode;

            for (var i = 0; i < 3; i++) {
                var input = row.cells[i].querySelector("input");

                input.value = originalValues[i];
                row.cells[i].textContent = originalValues[i];
            }

            // cacher "Enregistrer" et "Annuler"
            button.style.display = "none";
            button.previousElementSibling.style.display = "none";

            // afficher bouton "Editer"
            button.previousElementSibling.previousElementSibling.style.display = "inline-block";

            // wipe
            originalValues = [];
        }

        function submitForm(button) {
            var row = button.parentNode.parentNode;
            var formData = new FormData(row.querySelector("form"));

            // remplacer les valeurs actuelles du formulaire par les valeurs d'origine stockées dans le tableau originalValues
            for (var i = 0; i < 3; i++) {
                formData.set("field" + (i + 1), originalValues[i]);
            }

            // parcourir les données du formulaire et remplacer les champs vides avec les valeurs de field1, field2, ou field3
            for (const [name, value] of formData.entries()) {
                if (value === '') {
                    if (name === 'location') {
                        formData.set('location', document.getElementById('field1').value);
                    } else if (name === 'country') {
                        formData.set('country', document.getElementById('field2').value);
                    } else if (name === 'price') {
                        formData.set('price', document.getElementById('field3').value);
                    }
                }
            }

            // envoyer les données via une requête fetch
            fetch("adminprocess.php", {
                method: "POST",
                body: formData
            })
                .then(response => {
                    // gérer la réponse du serveur
                    console.log(response);
                    // afficher les données du formulaire dans la console
                    for (const [name, value] of formData.entries()) {
                        console.log(name, value);
                    }

                    // remplacer les champs de saisie par du texte
                    const tds = row.querySelectorAll("td");
                    for (const td of tds) {
                        const input = td.querySelector("input");
                        if (input) {
                            const text = document.createTextNode(input.value);
                            td.removeChild(input);
                            td.appendChild(text);
                        }
                    }
                })
                .catch(error => {
                    // gérer les erreurs de la requête
                    console.error(error);
                });

            // cacher les boutons "Enregistrer" et "Annuler"
            button.style.display = "none";
            button.previousElementSibling.style.display = "none";

            // afficher le bouton "Editer"
            row.querySelector(".edit-button").style.display = "inline-block";

            // réinitialiser l'état des boutons
            row.querySelector(".edit-button").disabled = false;
            row.querySelector(".edit-button").style.pointerEvents = "auto";
            button.nextElementSibling.style.display = "none";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>