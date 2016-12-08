<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Guru Mengajar</h4>
	</div>	
<div class="widget-body">
	<div class="widget-main">
		<form class="form-horizontal" role="form" action="<?php echo base_URL()?>report/kelas_siswa/simpan" method="post">			
		<input type="hidden" id="kode" name="kode">
			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Pelajaran</label>
				<div class="col-sm-3">
					<select class="chosen-select form-control" name="siswa" id="siswa" data-placeholder="- pilih Peserta Didik...- ">
						<option value="">  </option>
						 <?                           
                             if(isset($siswa)){									
                                foreach($siswa as $row){                                
                                echo "<option value='".$row->id_peserta."'> ".$row->nama_lengkap." </option>";
                                }
                            }	?>
					</select>
				</div>
			</div>		
			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Nama Kelas</label>
				<div class="col-sm-3">
					<select class="chosen-select form-control" name="kelas" id="kelas" data-placeholder="pilih Kelas...">
						<option value="">  </option>
						 <?                           
                             if(isset($kelas)){									
                                foreach($kelas as $row){                                
                                echo "<option value='".$row->id_kelas."'> ".$row->nama_kelas." </option>";
                                }
                            }	?>
					</select>
				</div>
			</div>		
			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tahun Ajaran</label>
				<div class="col-sm-9">
					<input id="tahun_ajaran" placeholder="Tahun Ajaran" class="col-xs-10 col-sm-3" type="text" name="tahun_ajaran" value="">
				</div>
			</div>					
			<div class="clearfix form-actions">
				<div class="col-md-offset-1 col-md-10">
					<button id="simpan" class="btn btn-sm btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>
					&nbsp; &nbsp; &nbsp;
					<button class="btn btn-sm btn-default" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
					<div class="pull-right"><div class="input-group">
						<input class="form-control input-mask-date" id="form-field-mask-1" type="text">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default no-border btn-sm">
								<i class="ace-icon fa fa-search icon-on-right bigger-110"></i></button>
						</span>
						</div>
					</div>
				</div>
			</div>
		</form>
</div></div>	
</div>										
  <div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>											
												<tr>													
													<th class="col-xs-1">No</th>
													<th >Nama Peserta Didik</th>
													<th >Kelas</th>
													<th >Tahun Ajaran</th>
													<th class="col-xs-3 col-sm-1">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?
											if(isset($kelas_siswa)){ $no=$no+1;
												foreach($kelas_siswa as $row){
											?>
												<tr>
													<td><?=$no;?></td>
													<td><?=$row->nama_lengkap;?></td>
													<td><?=$row->nama_kelas;?></td>
													<td><?=$row->tahun_ajaran;?></td>
													<td><div class="btn-group">	
														<a href="#" onclick="Tampil('<?=$row->id_kelas_siswa;?>','<?=$row->id_kelas;?>','<?=$row->id_siswa;?>','<?=$row->tahun_ajaran;?>')" >
															<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i>
														</button></a>						
														<a href="<?=base_URL();?>report/kelas_siswa/hapus/<?=$row->id_kelas_siswa;?>"><button class="btn btn-xs btn-danger">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</button></a>
													</div></td>
												</tr>
											<? $no++;
											}} ?>
											</tbody>
										</table>
										<?php echo $page_links; ?>
									</div><!-- /.span -->
								</div><!-- /.row -->
								
<script>
	function Tampil(kode, kelas, siswa, thn) {
		$("#kode").val(kode);
		$("#kelas").val(kelas).trigger("chosen:updated");
		$("#siswa").val(siswa).trigger("chosen:updated");
		$("#tahun_ajaran").val(thn);
		$("#simpan").text("Update");
	}
</script>