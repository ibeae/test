<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="<?php echo base_URL()?>report/guru/simpan" method="post">
								<input type="hidden" name="kode" value="<?=(isset($data)) ? $data->nip : ""?>">
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Nama </label>
										<div class="col-xs-8 col-sm-5">
											<input id="form-field-1" placeholder="Nama Guru" class="form-control" type="text" name="nama" value="<?=(isset($data)) ? $data->nama_guru : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat</label>
										<div class="col-xs-8 col-sm-5">
											<textarea class="form-control" name="alamat" id="form-field-8" placeholder="Alamat"><?=(isset($data)) ? $data->alamat : ""?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Jenis Kelamin</label>
										<div class="col-xs-8 col-sm-5">
											<label class="form-inline">
															<input class="radio" <?=(isset($data) && $data->jenis_kelamin=='L') ? "checked" : ""?> value="L" name="kelamin" type="radio">
															<span class="lbl"> Laki - laki</span>
														</label>
											<label class="form-inline">
												<input class="radio" type="radio" <?=(isset($data) && $data->jenis_kelamin=='P') ? "checked" : ""?> value="P" name="kelamin">
												<span class="lbl"> Perempuan</span>
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>
										<div class="col-xs-8 col-sm-5">
											<input id="form-field-1" placeholder="Nama Guru" class="form-control" type="text" name="tempat_lahir" value="<?=(isset($data)) ? $data->tempat_lahir : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>
										<div class="col-xs-8 col-sm-5">
											<div class="input-group">
													<input name="tgl_lahir" class="form-control date-picker" id="id-date-picker-1" data-date-format="yyyy-mm-dd" type="text" value="<?=(isset($data)) ? $data->tgl_lahir : ""?>">
													<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
													</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Pendidikan </label>
										<div class="col-xs-8 col-sm-5">
											<input id="form-field-1" placeholder="pendidikan" class="form-control" type="text" name="pendidikan" value="<?=(isset($data)) ? $data->pendidikan : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Telp </label>
										<div class="col-xs-8 col-sm-5">
											<input id="form-field-1" placeholder="Nomor telp" class="form-control" type="text" name="telp" value="<?=(isset($data)) ? $data->telp : ""?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Jabatan </label>
										<div class="col-xs-8 col-sm-5">
											<input id="form-field-1" placeholder="Jabatan" class="form-control" type="text" name="jabatan" value="<?=(isset($data)) ? $data->jabatan : ""?>">
										</div>
									</div>
								
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Mulai mengajar </label>
										<div class="col-xs-8 col-sm-5">
											<div class="input-group">
												<input name="mulai" class="form-control date-picker" id="id-date-picker-1" data-date-format="yyyy-mm-dd" type="text" value="<?=(isset($data)) ? $data->tgl_mulai_ajar : ""?>">
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-xs-3 col-sm-2 control-label no-padding-right" for="form-field-1"> Password </label>
										<div class="col-xs-8 col-sm-5">
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
								</form>

							</div>