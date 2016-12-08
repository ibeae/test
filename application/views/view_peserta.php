<p><a href="<?=base_URL();?>report/peserta_didik/tambah"><button class="btn btn-sm btn-primary">
	<i class="ace-icon fa fa-pencil align-top bigger-125"></i> Tambah Data Peserta Didik
	</button></a>
  </p>
  <div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>											
												<tr>													
													<th class="detail-col">No</th>
													<th class="col-xs-1">NISN</th>
													<th class="col-xs-2">Nama</th>
													<th class="col-xs-2">Jenis Kelamin</th>
													<th class="hidden-sm hidden-xs col-xs-3">Alamat</th>
													<th class="hidden-480 col-xs-2">Orang Tua</th>		
													<th class="col-xs-1">No Telp</th>
													<th class="col-xs-2">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?
											if(isset($peserta_didik)){ $no=$no+1;
												foreach($peserta_didik as $row){
											?>
												<tr>
													<td><?=$no;?></td>													
													<td><?=$row->nisn;?></td>
													<td><?=$row->nama_lengkap;?></td>
													<td><?=($row->jenis_kelamin=='P') ? "Perempuan": "Laki - Laki";?></td>
													<td class="hidden-sm hidden-xs"><?=$row->alamat;?></td>
													<td class="hidden-480"><?=$row->nama_ayah;?></td>
													<td><?=$row->telp_ortu;?></td>
													<td><div class="btn-group">	
														<a href="<?=base_url()?>report/peserta_didik/edit/<?=$row->id_peserta;?>"><button class="btn btn-xs btn-info">
															<i class="ace-icon fa fa-pencil bigger-120"></i>
														</button></a>						
														<a href="<?=base_URL();?>report/peserta_didik/hapus/<?=$row->id_peserta;?>"><button class="btn btn-xs btn-danger">
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