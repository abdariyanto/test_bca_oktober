<div class="container-fluid">

    <div class="row">

        <div class="col-md-12 mb-4">

            <div class="card shadow border-left-primary">

                <div class="card-header">

                    <h2 class=" font-weight-bold text-primary text-uppercase mb-1">Test 1</h2>
                    <div class="alert"><?= $this->session->flashdata('msg'); ?></div>
                </div>

                <div class="card-body">

                    <form class="user" method="post" action="<?= base_url('test1/action_test'); ?>">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="number" name="number" placeholder="Enter Number" value=<?= set_value('number') ?>>
                            <?= form_error('number', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Proses
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>



</div>

<!-- Scroll to Top Button-->

<a class="scroll-to-top rounded" href="#page-top">

    <i class="fas fa-angle-up"></i>

</a>