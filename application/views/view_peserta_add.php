<div class="col-xs-12">
<form class="form-horizontal" role="form" action="<?php echo base_URL()?>report/peserta_didik/simpan" method="post">
								<input type="hidden" name="kode" value="<?=(isset($data)) ? $data->id_peserta : ""?>">
	<div class="col-sm-6">
				<div class="widget-box">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter smaller">Biodata Siswa</h4>
					</div>
							<div class="widget-body">
								<div class="widget-main">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">NISN </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="NISN Siswa" class="form-control" type="text" name="nisn" value="<?=(isset($data)) ? $data->nisn : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Lengkap</label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Nama Lengkap" class="form-control" type="text" name="nama_lengkap" value="<?=(isset($data)) ? $data->nama_lengkap : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Panggil</label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Nama Panggilan" class="form-control" type="text" name="nama_panggil" value="<?=(isset($data)) ? $data->nama_panggil : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin</label>
										<div class="col-xs-8 col-sm-8">
											<label class="inline">
												<input value="L" <?=(isset($data) && $data->jenis_kelamin == 'L') ? "checked=checked" : '';?> name="kelamin" class="ace" type="radio">
												<span class="lbl middle"> Laki-Laki</span>
											</label>
											
											&nbsp; &nbsp; &nbsp;
											<label class="inline">
												<input value="P" <?=(isset($data) && $data->jenis_kelamin == 'P') ? "checked=checked" : '';?> name="kelamin" class="ace" type="radio">
												<span class="lbl middle"> Perempuan</span>
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat</label>
										<div class="col-xs-8 col-sm-8">
											<textarea class="form-control" name="alamat" id="form-field-8" placeholder="Alamat"><?=(isset($data)) ? $data->alamat : ""?></textarea>
										</div>
									</div>		
									<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat/Tgl Lahir </label>
														<div class="col-xs-8 col-sm-4">
															<input id="form-field-1" placeholder="Tempat Lahir" class="form-control" name="tempat_lahir" value="<?=(isset($data)) ? $data->tempat_lahir : ""?>" type="text">
														</div>
														<div class="col-xs-8 col-sm-4">
															<div class="input-group">
														<input name="tgl_lahir" class="form-control date-picker" id="id-date-picker-1" data-date-format="yyyy-mm-dd" value="<?=(isset($data)) ? $data->tgl_lahir : ""?>" type="text">
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
												
												</div>
											</div>
										</div>
									</div>
			<div class="col-sm-6">
				<div class="widget-box">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter smaller">Orang Tua Siswa</h4>
					</div>
							<div class="widget-body">
								<div class="widget-main">
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Ayah </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Nama Ayah" class="form-control" type="text" name="nama_ayah" value="<?=(isset($data)) ? $data->nama_ayah : ""?>">
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Ibu </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Nama Ibu" class="form-control" type="text" name="nama_ibu" value="<?=(isset($data)) ? $data->nama_ibu : ""?>">
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pekerjaan Ayah </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Pekerjaan Ayah" class="form-control" type="text" name="pekerjaan_ayah" value="<?=(isset($data)) ? $data->pekerjaan_ayah : ""?>">
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pekerjaan Ibu </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Pekerjaan Ibu" class="form-control" type="text" name="pekerjaan_ibu" value="<?=(isset($data)) ? $data->pekerjaan_ibu : ""?>">
										</div>
									</div>									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Orang Tua </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Alamat Orang Tua" class="form-control" type="text" name="alamat_ortu" value="<?=(isset($data)) ? $data->alamat_ortu : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Telp </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Nomor Telp" class="form-control" type="text" name="telp_ortu" value="<?=(isset($data)) ? $data->telp_ortu : ""?>">
										</div>
									</div>								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>
										<div class="col-xs-8 col-sm-8">
											<input id="form-field-1" placeholder="Password" class="form-control" type="text" name="password">
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
											</div>
										</div>
									</div>
									
								</form>
							</div>