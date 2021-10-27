<!-- kodingan jawa pro -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-left-primary shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('profile/editprofile'); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $z->row()->id ?>">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="Name" required style="border-radius: 2rem;" value="<?= $z->row()->nama; ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Email" required style="border-radius: 2rem;" value="<?= $z->row()->email; ?>"></input>
                        </div>


                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Edit Profile <i class="fa fa-upload"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>