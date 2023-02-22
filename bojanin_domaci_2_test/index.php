<?php
require_once('php/classes/Studenti.php');

$student = new Student();

if (isset($_POST['create'])) {
    $student->create($_POST['ime'], $_POST['prezime'], $_POST['email'], $_POST['telefon']);
    header('Location: index.php');
}

if (isset($_POST['update'])) {
    $student->update($_POST['ime'], $_POST['prezime'], $_POST['email'], $_POST['telefon']);
    header('Location: index.php');
}

if (isset($_POST['delete'])) {
    $student->delete($_POST['id']);
    header('Location: index.php');
}

$studenti = $student->read();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        /* Make the table the same width as the monitor */
        .table {
            width: 100%;
        }

        /* Make the navbar and fonts more modern */
        .navbar {
            font-family: 'Roboto', sans-serif;
            background-color: #333333;
        }

        .nav-link {
            color: #ffffff;
        }

        .nav-link:hover {
            color: #cccccc;
        }
    </style>

    <title>My CRUD App</title>
</head>
<body>
<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Fakultet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Studenti</a>
            </li>
        </ul>
        <!-- Search field in the menu -->
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <!-- User information with a sign out option -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    User Name
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Sign Out</a>
                </div>
            </div>
        </form>
    </div>
</nav>

<!-- Table with CRUD options -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <!-- Add button above the table -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add
                </button>

                <!-- Counter that counts how many rows are in the table -->
                <div class="text-right mt-3">
                    <span>Rows:</span>
                    <span id="rowCount" class="badge badge-secondary">0</span>
                </div>
            </div>

            <!-- Table -->
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Akcija</th>
                </tr>
                </thead>
                <tbody>
                <!-- Table rows -->
                <?php foreach ($studenti as $student) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $student['id'] ?></td>
                        <td><?= $student['ime'] ?></td>
                        <td><?= $student['prezime'] ?></td>
                        <td><?= $student['email'] ?></td>
                        <td><?= $student['telefon'] ?></td>
                        <td>
                            <!-- CRUD options -->
                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#readModal">Read
                            </button>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal">Edit
                            </button>
                            <button class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target="#deleteModal">Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Modals for the CRUD options -->

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a new row -->
                <form method="post">
                    <div class="form-group">
                        <label for="ime">Ime</label>
                        <input type="text" class="form-control" id="ime" placeholder="Unesite ime" name="ime">
                    </div>
                    <div class="form-group">
                        <label for="prezime">Prezime</label>
                        <input type="text" class="form-control" id="prezime" placeholder="Unesite prezime"
                               name="prezime">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Unesite prezime" name="email">
                    </div>
                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" class="form-control" id="telefon" placeholder="Unesite prezime"
                               name="telefon">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="addStudentBtn" name="create">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Read Modal -->
<div class="modal fade" id="readModal" tabindex="-1" role="dialog" aria-labelledby="readModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readModalLabel">Read</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for reading a row -->
                <form>
                    <div class="form-group">
                        <label for="readColumn1Input">Column 1</label>
                        <input type="text" class="form-control" id="readColumn1Input" readonly>
                    </div>
                    <div class="form-group">
                        <label for="readColumn2Input">Column 2</label>
                        <input type="text" class="form-control" id="readColumn2Input" readonly>
                    </div>
                    <div class="form-group">
                        <label for="readColumn3Input">Column 3</label>
                        <input type="text" class="form-control" id="readColumn3Input" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing a row -->
                <form>
                    <div class="form-group">
                        <label for="editColumn1Input">Column 1</label>
                        <input type="text" class="form-control" id="editColumn1Input">
                    </div>
                    <div class="form-group">
                        <label for="editColumn2Input">Column 2</label>
                        <input type="text" class="form-control" id="editColumn2Input">
                    </div>
                    <div class="form-group">
                        <label for="editColumn3Input">Column 3</label>
                        <input type="text" class="form-control" id="editColumn3Input">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this row?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script>
    // Select all the rows in the table
    const rows = document.querySelectorAll('table tbody tr');

    // Get the number of rows and update the rowCount element
    document.getElementById('rowCount').innerHTML = rows.length;
</script>
<script>
    $(document).on("click", ".edit-btn", function () {
        var id = $(this).data('id');
        var ime = $(this).data('ime');
        var prezime = $(this).data('prezime');
        var email = $(this).data('email');
        var telefon = $(this).data('telefon');
        $("#editModal #id").val(id);
        $("#editModal #ime").val(ime);
        $("#editModal #prezime").val(prezime);
        $("#editModal #email").val(email);
        $("#editModal #telefon").val(telefon);
    });

    $(document).on("click", ".delete-btn", function () {
        var id = $(this).data('id');
        $("#deleteModal #id").val(id);
    });
</script>
</body>
</html>



