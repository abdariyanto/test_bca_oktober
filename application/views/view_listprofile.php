<div class="container-fluid">

    <div class="row">

        <div class="col-md-12 mb-4">

            <div class="card shadow border-left-primary">

                <div class="card-header">

                    <h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Profile</h2>
                    <div class="alert"><?= $this->session->flashdata('msg'); ?></div>
                </div>

                <div class="col-md-4">

                    <a href="<?= base_url('profile/tambahprofile'); ?>">

                        <p> <i class="fas fa-fw fa-upload"></i> Tambah Data</p>
                    </a>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

                            <thead style="background-color:#4e73df; color: white;">

                                <tr class="text-center">

                                    <th width="7%">Action</th>

                                    <th width="30%">Nama</th>

                                    <th width="25%">Email</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($z as $row) { ?>

                                    <tr>

                                        <td class="text-center">

                                            <a href="<?= base_url('profile?id=') . $row->id; ?>"><i class="fas fa-fw fa-edit p-2"></i></a>
                                            <a href="<?= base_url('profile/deleteprofile?id=') . $row->id; ?>" onClick="if(!confirm('Apakah Anda ingin hapus?')){ return false; }"><i class="fas fa-fw fa-trash p-2"></i></a>
                                        </td>


                                        <td class="text-center"><?= $row->nama ?></td>

                                        <td><?= $row->email ?></td>

                                    </tr>

                            </tbody>

                        <?php } ?>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>



</div>

<!-- Scroll to Top Button-->

<a class="scroll-to-top rounded" href="#page-top">

    <i class="fas fa-angle-up"></i>

</a>