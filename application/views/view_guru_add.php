<div class="row">
<form class="form-horizontal" role="form" action="<?php echo base_URL()?>report/guru/simpan" method="post">
<input type="hidden" name="kode" value="<?=(isset($data)) ? $data->nip : ""?>">
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter smaller">Biodata</h4>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> NIP </label>
														<div class="col-xs-8 col-sm-8">
															<input id="form-field-1" placeholder="NIP Guru" readOnly class="form-control" type="text" name="nip" value="<?=(isset($data)) ? $data->nip : $nip?>">
														</div>
													</div>		
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
														<div class="col-xs-8 col-sm-8">
															<input id="form-field-1" placeholder="Nama Guru" class="form-control" type="text" name="nama" value="<?=(isset($data)) ? $data->nama_guru : ""?>">
														</div>
													</div>																				
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin</label>
														<div class="col-xs-8 col-sm-8">
															<div class="radio">
																<label>
																	<input <?=(isset($data) && $data->jenis_kelamin=='L') ? "checked" : ""?> value="L" name="kelamin" class="ace" type="radio">
																	<span class="lbl"> Laki - laki</span>
																</label>
																
																<label>
																	<input <?=(isset($data) && $data->jenis_kelamin=='P') ? "checked" : ""?> value="P" name="kelamin" class="ace" type="radio">
																	<span class="lbl"> Perempuan</span>
																</label>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat/Tgl Lahir </label>
														<div class="col-xs-8 col-sm-4">
															<input id="form-field-1" placeholder="Tempat Lahir" class="form-control" type="text" name="tempat_lahir" value="<?=(isset($data)) ? $data->tempat_lahir : ""?>">
														</div>
														<div class="col-xs-8 col-sm-4">
															<div class="input-group">
														<input name="tgl_lahir" class="form-control date-picker" id="id-date-picker-1" data-date-format="yyyy-mm-dd" type="text" value="<?=(isset($data)) ? $data->tgl_lahir : ""?>">
																<span class="input-group-addon">
																	<i class="fa fa-calendar bigger-110"></i>
																</span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Agama </label>
														<div class="col-xs-8 col-sm-8">
															<select class="form-control" name="agama" id="form-field-select-1">
															<option value="">-Pilih Agama-</option>
															<? 
															foreach($agama as $k=>$nama)
																{																	
																	$sel = (isset($data) && $k==$data->agama) ? "selected": "";
																	echo "<option $sel value='".$k."'>".$nama."</option>";
																}															
															?>																
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat</label>
														<div class="col-xs-8 col-sm-8">
															<textarea class="form-control" name="alamat" id="form-field-8" placeholder="Alamat"><?=(isset($data)) ? $data->alamat : ""?></textarea>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Pendidikan </label>
														<div class="col-xs-8 col-sm-8">
															<select class="form-control" name="pendidikan" id="form-field-select-1">
																<option value="">-Pendidikan terakhir-</option>
																<? 
																foreach($tamatan as $t)
																{																
																	$sel = (isset($data) && $t->id==$data->pendidikan) ? "selected": "";
																	echo "<option $sel value='".$t->id."'>".$t->keterangan."</option>";
																}															
															?>		
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Lulus </label>
														<div class="col-xs-8 col-sm-8">
															<input id="form-field-1" value="<?=(isset($data)) ? $data->tahun_lulus : ""?>" placeholder="Tahun Lulus" class="form-control" type="text" name="tahun_lulus">
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Telp/No.HP </label>
														<div class="col-xs-8 col-sm-4">
															<input id="form-field-1" placeholder="Nomor telp" class="form-control" type="text" name="telp" value="<?=(isset($data)) ? $data->telp : ""?>">
														</div>														
														<div class="col-xs-8 col-sm-4">
															<input id="form-field-1" placeholder="Nomor HP" class="form-control" type="text" name="hp" value="<?=(isset($data)) ? $data->hp : ""?>">
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> NPWP </label>
														<div class="col-xs-8 col-sm-8">
															<input id="form-field-1" placeholder="NPWP" class="form-control" type="text" name="npwp" value="<?=(isset($data)) ? $data->npwp : ""?>">
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>
														<div class="col-xs-8 col-sm-8">
															<input id="form-field-1" placeholder="Password" class="form-control" type="text" name="password">
														</div>
													</div>	
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter smaller">
													Data Pegawai
												</h4>
											</div>
											<div class="widget-body">
												<div class="widget-main padding-8">
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> NIK </label>
														<div class="col-xs-8 col-sm-8">
															<input id="form-field-1" placeholder="NIK Guru" class="form-control" type="text" name="nik" value="<?=(isset($data)) ? $data->nik : ""?>">
														</div>
													</div>		
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan </label>
														<div class="col-xs-8 col-sm-8">
															<select class="form-control" name="jabatan" id="form-field-select-1">
																<option value="">- Jabatan -</option>
																<option <?= (isset($data) && $data->jabatan=='Kepala Sekolah') ? "selected":"" ?> value="Kepala Sekolah">Kepala Sekolah</option>
																<option <?= (isset($data) && $data->jabatan=='Guru') ? "selected":"" ?> value="Guru">Guru</option>
																<option <?= (isset($data) && $data->jabatan=='TU') ? "selected":"" ?> value="TU">TU</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Status  Guru</label>
														<div class="col-xs-8 col-sm-8">
															<select class="form-control" name="status_guru" id="form-field-select-1">
																<option<?= (isset($data) && $data->status_guru=='PNS') ? "selected":"" ?> value="">- pilih status pns -</option>
																<option value="PNS">PNS</option>
												 				<option <?= (isset($data) && $data->status_guru=='Non PNS') ? "selected":"" ?> value="Non PNS">Non PNS</option>
															</select>
														</div>
													</div>	
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Golongan</label>
														<div class="col-xs-8 col-sm-8">
															<select class="form-control" name="golongan" id="form-field-select-1">
																<option value="">- Golongan -</option>
																<? 
																foreach($golongan as $g=>$nama_gol)
																{
																		$g=$g+1;
																	$sel = (isset($data) && $g==$data->golongan) ? "selected": "";
																	echo "<option $sel value='".$g."'>".$nama_gol."</option>";
																}															
															?>		
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Bidang Sertifikasi</label>
														<div class="col-xs-8 col-sm-8">
															<input id="form-field-1" placeholder="Pelajaran" class="form-control" type="text" name="bidang" value="<?=(isset($data)) ? $data->bidang : ""?>">
														</div>
													</div>													
													
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Mulai mengajar </label>
														<div class="col-xs-8 col-sm-8">
															<div class="input-group">
																<input name="mulai" class="form-control date-picker" id="id-date-picker-1" data-date-format="yyyy-mm-dd" type="text" value="<?=(isset($data)) ? $data->tgl_mulai_ajar : ""?>">
																<span class="input-group-addon">
																	<i class="fa fa-calendar bigger-110"></i>
																</span>
															</div>
														</div>
													</div>													
												</div>
											</div>
										</div>
										<div class="clearfix form-actions">
											<div class="col-md-offset-3 col-md-9">
												<button class="btn btn-info" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>												
												&nbsp; &nbsp; &nbsp;
												<button class="btn" type="reset">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Reset
												</button>
											</div>
										</div>	
									</div>							
									</form>									
								</div>