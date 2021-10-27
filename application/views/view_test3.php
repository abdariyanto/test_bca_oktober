<div class="container-fluid">

    <div class="row">

        <div class="col-md-12 mb-4">

            <div class="card shadow border-left-primary">

                <div class="card-header">

                    <h2 class=" font-weight-bold text-primary text-uppercase mb-1">Test 3</h2>
                    <div class="alert"><?= $this->session->flashdata('msg'); ?></div>
                </div>

                <div class="card-body">

                    <form class="user" method="post" action="<?= base_url('test3/action_test'); ?>">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="number1" name="number1" placeholder="Enter Number1" value=<?= set_value('number1') ?>>
                            <?= form_error('number1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="number2" name="number2" placeholder="Enter Number2" value=<?= set_value('number2') ?>>
                            <?= form_error('number2', '<small class="text-danger pl-3">', '</small>'); ?>
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