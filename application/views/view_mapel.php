<div class="row">
									<div class="col-sm-4">
									<form class="form-horizontal" role="form" action="<?php echo base_URL()?>report/mapel/simpan_kat" method="post">
										<input type="hidden" name="kode" value="<?=(isset($data)) ? $data->nip : ""?>">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter smaller">Kelompok Pelajaran</h4>
											</div>
											<div class="widget-body">
												<div class="widget-main">													
													<div class="form-group">
														<label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"> Kategori Mapel </label>
														<div class="col-xs-8 col-sm-8">
															<input id="keterangan" placeholder="Nama Kategori Mapel" class="form-control" type="text" name="keterangan" value="">
														</div>
													</div>												
												</div>
												<div class="clearfix form-actions">
														<div class="col-md-offset-3 col-md-9">
															<input id="simpan" name="simpan" value="Simpan Kategori" class="btn btn-info btn-sm" type="submit">
															&nbsp; &nbsp; &nbsp;
															<button class="btn btn-sm" type="reset">
																<i class="ace-icon fa fa-undo bigger-110"></i>
																Reset
															</button>
														</div>
													</div>	
												<table id="simple-table" class="table  table-bordered table-hover">
												<thead>											
													<tr>													
														<th class="col-xs-1">No</th>
														<th class="detail-col">Nama Kategori</th>									
														<th class="col-xs-3">Aksi</th>
													</tr>
												</thead>
												<tbody>
													<? 											
														if(isset($kategori)){ $n=1;
															foreach($kategori as $row){	
															?>
															<tr>
																<td><?=$n;?></td>
																<td><?=$row->keterangan;?></td>
																<td><div class="btn-group">	
																	<a href="#" onclick="Tampil_kategori('<?=$row->id;?>','<?=$row->keterangan;?>')">
																	<button class="btn btn-xs btn-info" type="button">
																		<i class="ace-icon fa fa-pencil bigger-120"></i>
																	</button></a>						
																	<a href="<?=base_URL();?>report/mapel/hapus_kat/<?=$row->id;?>">
																	<button class="btn btn-xs btn-danger" type="button">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</button></a>
																</div></td>
															</tr>
															<? $n++;
															}} ?>
												</tbody>
											</table>												
											</div>
										</div>
										</form>
									</div>

									<div class="col-sm-8">
									<form class="form-horizontal" role="form" action="<?php echo base_URL()?>report/mapel/simpan" method="post">
										<input type="hidden" name="kode_mapel" id="kode_mapel" value="">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter smaller">
													Data Pelajaran
												</h4>
											</div>
											<div class="widget-body">
												<div class="widget-main padding-8">
														<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori Mapel </label>
														<div class="col-xs-8 col-sm-8">
															<select class="form-control" name="kategori" id="kategori">
																<option value="">- Kategori Mapel -</option>
																<?
																foreach($kategori as $k)
																{
																	echo "<option value='$k->id'>$k->keterangan</option>";
																}
																?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-3 col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Mapel </label>
														<div class="col-xs-8 col-sm-8">
															<input placeholder="Nama Mapel" id="mapel" class="form-control" type="text" name="mapel" value="">
														</div>
													</div>
													<div class="clearfix form-actions">
														<div class="col-md-offset-3 col-md-9">
															<input name="simpan" value="Simpan Mapel" id="simpan_mapel" class="btn btn-info btn-sm" type="submit">						
															&nbsp; &nbsp; &nbsp;
															<button class="btn btn-sm" type="reset">
																<i class="ace-icon fa fa-undo bigger-110"></i>
																Reset
															</button>
														</div>
													</div>	
													<table id="simple-table" class="table  table-bordered table-hover">
													<thead>											
														<tr>													
															<th class="col-xs-1">No</th>
															<th class="detail-col">Nama Mapel</th>
															<th class="detail-col">Kategori</th>															
															<th class="col-xs-2">Aksi</th>
														</tr>
													</thead>
													<tbody>
														<? 				
															if(isset($mapel)){ $no=$no+1;
																foreach($mapel as $row){	
																?>
																<tr>
																	<td><?=$no;?></td>
																	<td><?=$row->nama_mapel;?></td>
																	<td><?=$row->keterangan;?></td>
																	<td><div class="btn-group">	
																		<a href="#" onclick="Tampil_mapel('<?=$row->id_mapel;?>','<?=$row->kategori;?>','<?=$row->nama_mapel;?>')">
																		<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button></a>
																		<a href="<?=base_URL();?>report/mapel/hapus/<?=$row->id_mapel;?>">
																		<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button></a>
																	</div></td>
																</tr>
																<? $no++;
																}} ?>
													</tbody>
												</table>
												<?=(isset($page_links)) ?  $page_links: ""; ?>													
												</div>
											</div>
										</div>
										</form>	
									</div>					
								</div>
								
<script>
	function Tampil_kategori(kode, keterangan) {		
		$("#keterangan").val(keterangan);
		$("#kode").val(kode);
		$("#simpan").text("Update");
	}
	function Tampil_mapel(kode, kategori, mapel) {		
		$("#mapel").val(mapel);
		$("#kategori").val(kategori);
		$("#kode_mapel").val(kode);
		$("#simpan_mapel").text("Update");
	}
</script>								