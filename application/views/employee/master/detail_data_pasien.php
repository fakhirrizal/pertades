<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-text">
            <h3>Catatan</h3>
        </div>
    </div>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-file-2"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Data Pasien
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-widget kt-widget--user-profile-3">
                <div class="kt-widget__top">
                    <div class="kt-widget__media kt-hidden-">
                        <img src="<?= base_url(); ?>data_upload/photo_profile/no-image.png" alt="image">
                    </div>
                    <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                        JM
                    </div>
                    <div class="kt-widget__content">
                        <div class="kt-widget__head">
                            <a href="javascript:void(0)" class="kt-widget__username">
                                <?= $data_utama->nama; ?>
                                <i class="flaticon2-correct"></i>
                            </a>
                            <div class="kt-widget__action">
                            </div>
                        </div>
                        <div class="kt-widget__subhead">
                            <a href="javascript:void(0)"><i class="fa fa-address-card"></i>Nomor Pasien: <?= $data_utama->nomor_pasien; ?></a><br>
                            <a href="javascript:void(0)"><i class="flaticon2-calendar-3"></i>Jenis Kelamin: <?= $data_utama->jenis_kelamin; ?></a><br>
                            <a href="javascript:void(0)"><i class="flaticon2-placeholder"></i>Alamat: <?= $data_utama->alamat; ?></a><br>
                            <a href="javascript:void(0)"><i class="flaticon2-phone"></i>Nomor HP: <?= $data_utama->no_hp; ?></a><br>
                            <a href="javascript:void(0)"><i class="flaticon-calendar"></i>Tanggal Lahir: <?= $this->Main_model->convert_tanggal($data_utama->tanggal_lahir); ?></a><br>
                            <a href="javascript:void(0)"><i class="flaticon-users"></i>Nama Wali: <?= $data_utama->nama_wali; ?></a>
                        </div>
                    </div>
                </div>
                <div class="kt-widget__bottom">
                    <div class="kt-portlet ">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Riwayat Pemeriksan
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="accordion  accordion-toggle-arrow" id="accordionExample4">
                                <?php
                                if($data_pemeriksaan==NULL){
                                    echo'Data Kosong.';
                                }else{
                                    foreach ($data_pemeriksaan as $key => $value) {
                                        $body_function_and_body_structure = $this->Main_model->getSelectedData('detail_pemeriksaan_1 a', 'a.*', array('a.id_pemeriksaan'=>$value->id_pemeriksaan))->result();
                                        $activities = $this->Main_model->getSelectedData('detail_pemeriksaan_2 a', 'a.*', array('a.id_pemeriksaan'=>$value->id_pemeriksaan))->result();
                                        $participation_restriction = $this->Main_model->getSelectedData('detail_pemeriksaan_3 a', 'a.*', array('a.id_pemeriksaan'=>$value->id_pemeriksaan))->result();
                                        $diagnosa = $this->Main_model->getSelectedData('detail_pemeriksaan_4 a', 'a.*', array('a.id_pemeriksaan'=>$value->id_pemeriksaan))->result();
                                ?>
                                <div class="card">
                                    <div class="card-header" id="headingTwo4<?= $value->id_pemeriksaan; ?>">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo4<?= $value->id_pemeriksaan; ?>" aria-expanded="false" aria-controls="collapseTwo4<?= $value->id_pemeriksaan; ?>">
                                            <i class="fa fa-thumbtack"></i> Pemeriksaan tanggal <?= $this->Main_model->convert_datetime($value->created_at); ?>
                                        </div>
                                    </div>
                                    <div id="collapseTwo4<?= $value->id_pemeriksaan; ?>" class="collapse" aria-labelledby="headingTwo1<?= $value->id_pemeriksaan; ?>" data-parent="#accordionExample4">
                                        <div class="card-body">
                                            <div class="kt-notification-v2">
												<a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-user kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
                                                            Fisioterapi
														</div>
														<div class="kt-notification-v2__item-desc">
															<?= $value->nama; ?>
														</div>
													</div>
												</a>
                                                <a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-file-2 kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
															Diagnosa/ Condition
														</div>
													</div>
                                                </a>
                                                <?php
                                                if($diagnosa==NULL){
                                                    echo'';
                                                }else{
                                                    echo'
                                                    <div class="kt-notification-v2__item">
                                                        <div class="kt-list-timeline">
                                                            <div class="kt-list-timeline__items">';
                                                            foreach ($diagnosa as $key => $row) {
                                                                echo'
                                                                <div class="kt-list-timeline__item">
                                                                    <span class="kt-list-timeline__badge"></span>
                                                                    <span class="kt-list-timeline__text">'.$row->diagnosa.'</span>
                                                                </div>';
                                                            }
                                                            echo'
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                ?>
												<a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-file-2 kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
															Body function and body structure
														</div>
													</div>
                                                </a>
                                                <?php
                                                if($body_function_and_body_structure==NULL){
                                                    echo'';
                                                }else{
                                                    echo'
                                                    <div class="kt-notification-v2__item">
                                                        <div class="kt-list-timeline">
                                                            <div class="kt-list-timeline__items">';
                                                            foreach ($body_function_and_body_structure as $key => $row) {
                                                                echo'
                                                                <div class="kt-list-timeline__item">
                                                                    <span class="kt-list-timeline__badge"></span>
                                                                    <span class="kt-list-timeline__text">'.$row->body_function_and_body_structure.'</span>
                                                                </div>';
                                                            }
                                                            echo'
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                ?>
                                                <a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-file-2 kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
															Activities (activity limitation)
														</div>
													</div>
                                                </a>
                                                <?php
                                                if($activities==NULL){
                                                    echo'';
                                                }else{
                                                    echo'
                                                    <div class="kt-notification-v2__item">
                                                        <div class="kt-list-timeline">
                                                            <div class="kt-list-timeline__items">';
                                                            foreach ($activities as $key => $row) {
                                                                echo'
                                                                <div class="kt-list-timeline__item">
                                                                    <span class="kt-list-timeline__badge"></span>
                                                                    <span class="kt-list-timeline__text">'.$row->activities.'</span>
                                                                </div>';
                                                            }
                                                            echo'
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                ?>
												<a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-file-2 kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
															Participation restriction
														</div>
													</div>
                                                </a>
                                                <?php
                                                if($participation_restriction==NULL){
                                                    echo'';
                                                }else{
                                                    echo'
                                                    <div class="kt-notification-v2__item">
                                                        <div class="kt-list-timeline">
                                                            <div class="kt-list-timeline__items">';
                                                            foreach ($participation_restriction as $key => $row) {
                                                                echo'
                                                                <div class="kt-list-timeline__item">
                                                                    <span class="kt-list-timeline__badge"></span>
                                                                    <span class="kt-list-timeline__text">'.$row->participation_restriction.'</span>
                                                                </div>';
                                                            }
                                                            echo'
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                ?>
												<a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-file-2 kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
															Enviromental factors
														</div>
														<div class="kt-notification-v2__item-desc">
															<?= $value->enviromental_factors; ?>
														</div>
													</div>
												</a>
												<a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-file-2 kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
															Personal factors
														</div>
														<div class="kt-notification-v2__item-desc">
															<?= $value->personal_factors; ?>
														</div>
													</div>
												</a>
                                                <a href="javascript:void(0)" class="kt-notification-v2__item">
													<div class="kt-notification-v2__item-icon">
														<i class="flaticon-signs-1 kt-font-brand"></i>
													</div>
													<div class="kt-notification-v2__itek-wrapper">
														<div class="kt-notification-v2__item-title">
															Catatan
														</div>
														<div class="kt-notification-v2__item-desc">
															<?= $value->catatan; ?>
														</div>
													</div>
												</a>
											</div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>