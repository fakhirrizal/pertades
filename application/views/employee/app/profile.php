<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <?php
                    $name_file = '';
                    if($data_utama->photo=='' OR $data_utama->photo==NULL){
                        $name_file = 'data_upload/photo_profile/no-image.png';
                    }else{
                        $name_file = 'data_upload/photo_profile/'.$data_utama->photo;
                    }
                    ?>
                    <img src="<?= base_url().$name_file; ?>" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-10"><?= $data_utama->fullname; ?></h4>
                    <!-- <p class="card-subtitle">Front End Developer</p>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                    </div> -->
                </div>
            </div>
            <hr class="mb-0"> 
            <div class="card-body"> 
                <small class="text-muted d-block">Email address </small>
                <h6>johndoe@admin.com</h6> 
                <small class="text-muted d-block pt-10">Phone</small>
                <h6>(123) 456 7890</h6> 
                <small class="text-muted d-block pt-10">Address</small>
                <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <!-- <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true"></a>
                </li>
            </ul> -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="example-name">Full Name</label>
                                <input type="text" placeholder="Johnathan Doe" class="form-control" name="example-name" id="example-name">
                            </div>
                            <div class="form-group">
                                <label for="example-email">Email</label>
                                <input type="email" placeholder="johnathan@admin.com" class="form-control" name="example-email" id="example-email">
                            </div>
                            <div class="form-group">
                                <label for="example-password">Password</label>
                                <input type="password" value="password" class="form-control" name="example-password" id="example-password">
                            </div>
                            <div class="form-group">
                                <label for="example-phone">Phone No</label>
                                <input type="text" placeholder="123 456 7890" id="example-phone" name="example-phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="example-message">Message</label>
                                <textarea name="example-message" name="example-message" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="example-country">Select Country</label>
                                <select name="example-message" id="example-message" class="form-control">
                                    <option>London</option>
                                    <option>India</option>
                                    <option>Usa</option>
                                    <option>Canada</option>
                                    <option>Thailand</option>
                                </select>
                            </div>
                            <button class="btn btn-success" type="submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>