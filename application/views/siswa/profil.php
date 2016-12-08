											<form class="form-horizontal" role="form" action="<?php echo base_URL()?>siswa/save_profil" method="post">
												<div class="tabbable">
													<ul class="nav nav-tabs padding-16">
														<li class="active">
															<a data-toggle="tab" href="#edit-basic" aria-expanded="true">
																<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
																Basic Info
															</a>
														</li>
													</ul>

													<div class="tab-content profile-edit-tab-content">
														<div id="edit-basic" class="tab-pane active">
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Nama Lengkap</label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Nama Lengkap" class="col-xs-10 col-sm-5" type="text" name="nama_lengkap" value="<?=(isset($data)) ? $data->nama_lengkap : ""?>">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Nama Panggil</label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Nama Panggilan" class="col-xs-10 col-sm-5" type="text" name="nama_panggil" value="<?=(isset($data)) ? $data->nama_panggil : ""?>">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right">Jenis Kelamin</label>
																<div class="col-sm-9">
																	<label class="inline">
																		<input name="form-field-radio" <?=(isset($data) && $data->jenis_kelamin == 'L') ? "checked=checked" : '';?> name="kelamin" class="ace" type="radio">
																		<span class="lbl middle"> Laki-Laki</span>
																	</label>
																	
																	&nbsp; &nbsp; &nbsp;
																	<label class="inline">
																		<input name="form-field-radio" <?=(isset($data) && $data->jenis_kelamin == 'P') ? "checked=checked" : '';?> name="kelamin" class="ace" type="radio">
																		<span class="lbl middle"> Perempuan</span>
																	</label>
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat</label>
																<div class="col-sm-9">
																	<textarea class="col-xs-10 col-sm-5" name="alamat" id="form-field-8" placeholder="Alamat"><?=(isset($data)) ? $data->alamat : ""?></textarea>
																</div>
															</div>									
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Nama Guru" class="col-xs-10 col-sm-5" type="text" name="tempat_lahir" value="<?=(isset($data)) ? $data->tempat_lahir : ""?>">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>
																<div class="col-xs-10 col-sm-4">
																	<div class="input-group">
																		<input name="tgl_lahir" class="form-control date-picker" id="id-date-picker-1" data-date-format="yyyy-mm-dd" type="text" value="<?=(isset($data)) ? $data->tgl_lahir : ""?>">
																		<span class="input-group-addon">
																			<i class="fa fa-calendar bigger-110"></i>
																		</span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Ayah </label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Nama Ayah" class="col-xs-10 col-sm-5" type="text" name="nama_ayah" value="<?=(isset($data)) ? $data->nama_ayah : ""?>">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Ibu </label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Nama Ibu" class="col-xs-10 col-sm-5" type="text" name="nama_ibu" value="<?=(isset($data)) ? $data->nama_ibu : ""?>">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pekerjaan Ayah </label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Pekerjaan Ayah" class="col-xs-10 col-sm-5" type="text" name="pekerjaan_ayah" value="<?=(isset($data)) ? $data->pekerjaan_ayah : ""?>">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pekerjaan Ibu </label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Pekerjaan Ibu" class="col-xs-10 col-sm-5" type="text" name="pekerjaan_ibu" value="<?=(isset($data)) ? $data->pekerjaan_ibu : ""?>">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat Orang Tua </label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Alamat Orang Tua" class="col-xs-10 col-sm-5" type="text" name="alamat_ortu" value="<?=(isset($data)) ? $data->alamat_ortu : ""?>">
																</div>
															</div>														
															<div class="form-group">
																<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> No Telp </label>
																<div class="col-sm-9">
																	<input id="form-field-1" placeholder="Nomor Telp" class="col-xs-10 col-sm-5" type="text" name="telp_ortu" value="<?=(isset($data)) ? $data->telp_ortu : ""?>">
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="clearfix form-actions">
													<div class="col-md-offset-3 col-md-9">
														<button class="btn btn-info" type="submit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															Update Biodata 
														</button>
													</div>
												</div>
											</form>