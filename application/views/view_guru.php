<p><a href="<?=base_URL();?>report/guru/tambah"><button class="btn btn-sm btn-primary">
	<i class="ace-icon fa fa-pencil align-top bigger-125"></i> Tambah Data
	</button></a>
  </p>
  <div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>											
												<tr>													
													<th class="detail-col">No</th>
													<th class="col-xs-2">Nama</th>
													<th>Alamat</th>
													<th class="col-xs-2">Jabatan</th>
													<th class="col-xs-2">Telp</th>													
													<th class="col-xs-1">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<? 											
											if(isset($guru)){ $no=$no+1;
												foreach($guru as $row){													
												
											?>
												<tr>
													<td><?=$no;?></td>
													<td><?=$row->nama_guru;?></td>
													<td><?=$row->alamat;?></td>
													<td><?=$row->jabatan;?></td>
													<td><?=$row->telp;?></td>													
													<td><div class="hidden-sm hidden-xs btn-group">	
														<a href="<?=base_url()?>report/guru/edit/<?=$row->nip;?>"><button class="btn btn-xs btn-info">
															<i class="ace-icon fa fa-pencil bigger-120"></i>
														</button></a>						
														<a href="<?=base_URL();?>report/guru/hapus/<?=$row->nip;?>"><button class="btn btn-xs btn-danger">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</button></a>
													</div></td>
												</tr>
											<? $no++;
											}} ?>
											</tbody>
										</table>
										<?=(isset($page_links)) ?  $page_links: ""; ?>
									</div><!-- /.span -->
								</div><!-- /.row -->