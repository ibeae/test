<div class="widget-box">
	<div class="widget-header">
		<h4 class="widget-title">Olah Nilai Peserta Didik</h4>
	</div>	
<div class="widget-body">
	<div class="widget-main">
		<form class="form-horizontal" role="form" action="<?php echo base_URL()?>report/nilai/simpan" method="post">			
		<input type="hidden" id="kode" name="kode">
			<div class="form-group">			
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Semester</label>
				<div class="col-sm-7">
					<select class="form-control" name="semester" id="semester">
						<option value="">  </option>
						<?
							if(isset($semester)){								
                                foreach($semester as $s){							
									echo "<option value='".$s."'> ".$s." </option>";
                                }
                            }	?>
					</select>
				</div>
			</div>		

			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Data Siswa</label>
				<div class="col-sm-3">
					<select class="chosen-select form-control" name="kelas" id="kelas" data-placeholder="Pilih Kelas Siswa...">
						<option value="">  </option>
						 <?                           
                             if(isset($kelas)){									
                                foreach($kelas as $row){                                
                                echo "<option value='".$row->id_kelas."'> ".$row->nama_kelas." </option>";
                                }
                            }	?>
					</select>
				</div>
				<div class="col-sm-4">
					<select class="chosen-select form-control" name="siswa" id="siswa" data-placeholder="Pilih Siswa...">
						<option value="">  </option>						
					</select>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Pelajaran</label>
				<div class="col-sm-3">
					<select class="chosen-select form-control" name="mapel" id="mapel" data-placeholder="Pilih Pelajaran...">
						<option value="">  </option>
						<?
							if(isset($mapel)){
                                foreach($mapel as $row){							
									echo "<option value='".$row->id_mapel."'> ".$row->nama_mapel." </option>";
                                }
                            }	?>
					</select>
				</div>
			</div>				
			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tahun Ajaran</label>
				<div class="col-sm-3">
					<input id="tahun_ajaran" placeholder="Tahun Ajaran" class="form-control" type="text" name="tahun_ajaran" value="">
				</div>
			</div>	
			<div class="form-group">
				<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Nilai Siswa</label>
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">U harian 1</span>     
						<input id="nilai_uharian1" placeholder="0" class="form-control" name="nilai_uharian1" type="number">
					</span>					
				</div>
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">U harian 2</span>     
						<input id="nilai_uharian2" placeholder="0" class="form-control" name="nilai_uharian2" type="number">
					</span>					
				</div>
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">U harian 3</span>     
						<input id="nilai_uharian3" placeholder="0" class="form-control" type="number" name="nilai_uharian3">
					</span>					
				</div>
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">Tugas 1</span>     
						<input id="nilai_tugas1" placeholder="0" class="form-control" type="number" name="nilai_tugas1">
					</span>					
				</div>				
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">Tugas 2</span>     
						<input id="nilai_tugas2" placeholder="0" class="form-control" type="number" name="nilai_tugas2">
					</span>					
				</div>
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">Tugas 3</span>     
						<input id="nilai_tugas3" placeholder="0" class="form-control" type="number" name="nilai_tugas3">
					</span>					
				</div>
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">UTS </span>     
						<input id="nilai_uts" placeholder="UTS" class="form-control" type="number" name="nilai_uts">
					</span>					
				</div>
				<div class="col-sm-1">
					<span class="info-container">    
						<span class="info">UAS</span>     
						<input id="nilai_uas" placeholder="UAS" class="form-control" type="number" name="nilai_uas">
					</span>					
				</div>
			</div>			
			<div class="hr hr-16 hr-dotted"></div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-2 col-md-10">
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
													<th >Tahun Ajaran</th>
													<th >Kelas</th>
													<th >Nama Peserta Didik</th>
													<th class="col-xs-3 col-sm-1">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?
											if(isset($nilai)){ $no=$no+1;
												foreach($nilai as $row){
											?>
												<tr>
													<td><?=$no;?></td>
													<td><?=$row->tahun_ajaran;?></td>
													<td><?=$row->nama_kelas;?></td>
													<td><?=$row->nama_lengkap;?></td>
													<td><div class="btn-group">	
														<a href="#" onclick="Tampil('<?=$row->id_kelas_anakdidik;?>','<?=$row->id_kelas;?>','<?=$row->no_induk;?>','<?=$row->tahun_ajaran;?>')" >
															<button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i>
														</button></a>						
														<a href="<?=base_URL();?>report/guru_kelas/hapus/<?=$row->id_kelas_anakdidik;?>"><button class="btn btn-xs btn-danger">
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
								

<script type="text/javascript">		
$(document).ready(function(){
	$('#kelas').change(function(){		
	    var state_id = $('#kelas').val();
	    if (state_id != ""){
	        var post_url = "get_siswa/" + state_id;
	       $.ajax({
				type: "GET",
				url: post_url,
				data: {},
				beforeSend:function(){
				 myApp.showPleaseWait();
				},
				success: function(response)
				{
					myApp.hidePleaseWait();
					//$('#siswa').empty();	                
	                $.each(response,function(id,city)
	                {
	                	console.log(city);
	                    var opt = $('<option />'); // here we're creating a new select option for each group
	                    opt.val(city.id_peserta);
	                    opt.text(city.nama_lengkap);
	                    $('#siswa').html("<option>"+city.nama_lengkap+"</option>");
	                    //$('#siswa_chosen').append(opt).trigger("chosen:updated");
	                });
				}
			}); 
				return false;
	    } else {
	        $('#f_city').empty();
	        $('#f_city, #f_city_label').hide();
	    }//end if
	}); //end change
});
	function Tampil(kode, kelas, anak, thn) {
		$("#kode").val(kode);
		$("#kelas").val(kelas).trigger("chosen:updated");
		$("#peserta_didik").val(anak).trigger("chosen:updated");
		$("#tahun_ajaran").val(thn);
		$("#simpan").text("Update");
	}
</script>