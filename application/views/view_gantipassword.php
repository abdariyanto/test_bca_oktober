<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ubah Password</h1>
                                    </div>
                                    <?= $this->session->flashdata('msg'); ?>

                                    <form class="user" method="post" action="<?= base_url('profile/gantiPassword'); ?>">
                                        <input type="hidden" name="id" value="<?= $get_id; ?>">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="myInput" name="password" placeholder="Password" required>
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <input class="mt-2 ml-2" type="checkbox" onclick="myFunction()"> Show Password
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Retry Password" required>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            <input class="mt-2 ml-2" type="checkbox" onclick="myFunction1()"> Show Password
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Ubah Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script type="text/javascript">
        //munculin password 1
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text"
            } else {
                x.type = "password"
            }
        }

        //munculin password 2 atau retry password
        function myFunction1() {
            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text"
            } else {
                x.type = "password"
            }
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>