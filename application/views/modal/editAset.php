<!-- Modal Ubah Aset -->
<div class="modal fade" id="editAsetModal">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Aset</h4>
				<button type="button" class="close" id="close-modal" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="edit_modal_aset" name="form" role="form">
				<div class="modal-body">
					<input type="hidden" id="id_esummary" name="id_esummary" value="">
					<input type="hidden" id="id_ekontrak" name="id_ekontrak" value="">
					<input type="hidden" id="id_ecalculation" name="id_ecalculation" value="">
					<!-- One "tab" for each step in the form: -->
					<!-- CONTRACT FORM -->
					<div class="tab_step_edit">
					 	<div class="card card-secondary">
					 	    <div class="card-header">
					 	        <h3 class="card-title">Contract Form</h3>
					 	    </div>
					 	    <!-- /.card-header -->
					 	    <div class="card-body">
					 	        <div class="row">
					 	            <div class="col-md-8">
					 	                <div class="form-group">
					 	                    <label>Nama Perusahaan / PT *</label>
					 	                    <!-- <input class="form-control wajib" type="text" name="nama_pt" id="enamapt" oninput="this.className = 'form-control wajib'"> -->
											<select class="form-control" name="nama_pt" id="enamapt">
												<?php foreach($perusahaan as $p):?>
												  <option value="<?php echo $p->id;?>"><?php echo $p->nama_perusahaan;?></option>
												<?php endforeach;?>
											</select>
					 	                </div>
					 	            </div>
					 	            <div class="col-md-4">
					 	                <div class="form-group">
					 	                    <label for="exampleInputFile">Upload file</label>
					 	                    <div class="custom-file">
					 	                        <input type="file" class="custom-file-input" id="customFile" name="file">
					 	                        <label class="custom-file-label" for="customFile">Choose file</label>
					 	                    </div>
					 	                </div>
					 	            </div>
					 	        </div>
					 	        <div class="row">
					 	            <div class="col-md-12">
					 	                <div class="form-group">
					 	                    <label>Nomor Kontrak *</label>
					 	                    <input class="form-control wajib" type="text" name="nomor_kontrak" id="enomorkontrak" oninput="this.className = 'form-control wajib'">
					 	                </div>
					 	            </div>
					 	        </div>
					 	        <div class="row">
					 	            <div class="col-md-12">
					 	                <div class="form-group">
					 	                    <label>Vendor *</label>
					 	                    <input class="form-control wajib" type="text" name="vendor" id="evendor" oninput="this.className = 'form-control wajib'">
					 	                </div>
					 	            </div>
					 	        </div>
					 	    </div>
					 	    <div class="card-footer">
					 	        * Wajib diisi
					 	    </div>
					 	</div>
					</div>
					<!-- JENIS SEWA FORM -->
					<div class="tab_step_edit">
					  <div class="card card-secondary">
					      <div class="card-header">
					          <h3 class="card-title">Jenis Sewa *</h3>
					      </div>
					      <!-- /.card-header -->
					      <div class="card-body">
					          <div class="row">
					              <div class="col-md-8">
					                  <div class="form-group">
					                      <label>Jenis Sewa</label>
					                      <input class="form-control wajib" name="jenis_sewa" type="text" id="ejenissewa" oninput="this.className = 'form-control wajib'">
					                  </div>
					              </div>
					              <div class="col-md-4">
					                  <div class="form-group">
					                      <label>Halaman di dalam PDF ?</label>
					                      <input class="form-control" name="pageinpdf" type="number" id="epageinpdf" oninput="this.className = 'form-control wajib'">
					                  </div>
					              </div>
					          </div>
					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>Serial Number / Nomor Polisi</label>
					                      <input class="form-control" name="serialnumber" type="text" id="eserialnumber">
					                  </div>
					              </div>
					          </div>
					      </div>
					      <div class="card-footer">
					          * Wajib diisi
					      </div>
					  </div>
					</div>
					<!-- NATURE SEWA FORM -->
					<div class="tab_step_edit">
					  <div class="card card-secondary">
					      <div class="card-header">
					          <h3 class="card-title">Nature Sewa</h3>
					      </div>
					      <!-- /.card-header -->
					      <div class="card-body">
					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>a. Apakah terdapat modifikasi ?</label>
					                      <select class="form-control" name="nsa" id="nsa">
					                          <option value="Yes">Yes</option>
					                          <option value="No">No</option>
					                      </select>
					                  </div>
					              </div>
					          </div>
					          
					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>a. 1. Tuliskan nomor kontrak original ?</label>
					                      <input class="form-control" type="text" name="nsa1" id="ensa1">
					                  </div>
					              </div>
					          </div>

					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>b. Apakah kontrak dinegosiasikan dengan kontrak lain ?</label>
					                      <select class="form-control" name="nsb" id="ensb">
					                          <option value="Yes">Yes</option>
					                          <option value="No">No</option>
					                      </select>
					                  </div>
					              </div>
					          </div>
					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>c. 1. Apakah kontrak mengandung opsi perpanjangan ?</label>
					                      <select class="form-control" name="nsc1" id="ensc1">
					                          <option value="Yes">Yes</option>
					                          <option value="No">No</option>
					                      </select>
					                  </div>
					              </div>
					          </div>
					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>c. 2. Penyewa cukup pasti untuk mengeksekusi Opsi tersebut ?</label>
					                      <input class="form-control" type="text" name="ns_c2" id="ensc2">
					                  </div>
					              </div>
					          </div>
					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>d. 1. Apakah kontrak mengandung Opsi terminasi ?</label>
					                      <select class="form-control" name="nsd1" id="ensd1">
					                          <option value="Yes">Yes</option>
					                          <option value="No">No</option>
					                      </select>
					                  </div>
					              </div>
					          </div>
					          <div class="row">
					              <div class="col-md-12">
					                  <div class="form-group">
					                      <label>d. 2. Penyewa cukup pasti untuk tidak mengeksekusi Opsi tersebut ?</label>
					                      <input class="form-control" type="text" name="ns_d2" id="ensd2">
					                  </div>
					              </div>
					          </div>
					      </div>
					      <div class="card-footer">
					          * Wajib diisi
					      </div>
					  </div>
					</div>
					<!-- IDENTIFIKASI SEWA FORM -->
					<div class="tab_step_edit">
					  <div class="card card-secondary">
					      <div class="card-header">
					          <h3 class="card-title">Identifikasi Sewa</h3>
					      </div>
					      <div class="card-body">
					          <!--  -->
					          <div class="col">
					              <div class="row">
					                  <div class="col-sm-12">
					                      <div class="form-group">
					                          <label>1. Certain Asset ? *</label>
					                          <select class="form-control" name="is_1" id="eis1">
					                              <option value="Yes">Yes</option>
					                              <option value="No">No</option>
					                          </select>
					                      </div>
					                  </div>
					              </div>
					              <div class="row">
					                  <div class="col-sm-12">
					                      <div class="form-group">
					                          <label>2. Right to Operate ? *</label>
					                          <select class="form-control" name="is_2" id="eis2">
					                              <option value="Yes">Yes</option>
					                              <option value="No">No</option>
					                          </select>
					                      </div>
					                  </div>
					              </div>
					              <div class="row">
					                  <div class="col-sm-12">
					                      <div class="form-group">
					                          <label>3. Control of the Output or other utility ? *</label>
					                          <select class="form-control" name="is_3" id="eis3">
					                              <option value="Yes">Yes</option>
					                              <option value="No">No</option>
					                          </select>
					                      </div>
					                  </div>
					              </div>
					              <div class="row">
					                  <div class="col-sm-12">
					                      <div class="form-group">
					                          <label>4. Control Physical Asset ? *</label>
					                          <select class="form-control" name="is_4" id="eis4">
					                              <option value="Yes">Yes</option>
					                              <option value="No">No</option>
					                          </select>
					                      </div>
					                  </div>
					              </div>
					              <div class="row">
					                  <div class="col-sm-12">
					                      <div class="form-group">
					                          <label>5. Contract Price ? *</label>
					                          <select class="form-control" name="is_5" id="eis5">
					                              <option value="Yes">Yes</option>
					                              <option value="No">No</option>
					                          </select>
					                      </div>
					                  </div>
					              </div>
					              <div class="row">
					                  <div class="col-sm-12">
					                      <div class="form-group">
					                          <label>6. Output used by third party ? *</label>
					                          <select class="form-control" name=is_6 id=eis6>
					                              <option value="Yes">Yes</option>
					                              <option value="No">No</option>
					                          </select>
					                      </div>
					                  </div>
					              </div>
					              <div class="row">
					                  <div class="col-sm-12">
					                      <div class="form-group">
					                          <label>7. Right to control the use of Asset ? *</label>
					                          <select class="form-control" name="is_7" id="eis7">
					                              <option value="Yes">Yes</option>
					                              <option value="No">No</option>
					                          </select>
					                      </div>
					                  </div>
					              </div>
					          </div>
					      </div>
					      <div class="card-footer">
					          * Wajib diisi
					      </div>
					  </div>
					</div>
					<!-- KOMPONEN SEWA FORM -->
					<div class="tab_step_edit">
						<div class="card card-secondary">
						    <div class="card-header">
						        <h3 class="card-title">Komponen Sewa</h3>
						    </div>
						    <!-- /.card-header -->
						    <div class="card-body">
						    	<div class="col">
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>1. Kontrak terdiri dari beberapa komponen (lease dan nonlease) ?</label>
						    		            <select class="form-control" name="kontrak_dari_beberapa_komponen" id="eks1">
						    		                <option value="Yes">Yes</option>
						    		                <option value="No">No</option>
						    		            </select>
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>2. Tuliskan komponen dalam kontrak ?</label>
						    		            <input class="form-control" type="text" name="komponen_dalam_kontrak" id="eks2">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>3. Komponen merupakan sewa ?</label>
						    		            <select class="form-control" name="komponen_merupakan_sewa" id="eks3">
						    		                <option value="Yes">Yes</option>
						    		                <option value="No">No</option>
						    		            </select>
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>4. Penyewa mendapat manfaat dari penggunaan aset pendasar secara terpisah atau bersamaan dengan sumber daya lain yang tersedia untuk penyewa ?</label>
						    		            <select class="form-control" name="penyewa_mendapat_manfaat" id="eks4">
						    		                <option value="Yes">Yes</option>
						    		                <option value="No">No</option>
						    		            </select>
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>5. Aset pendasar tersebut tidak memiliki ketergantungan yang tinggi dengan, maupun memiliki interelasi yang tinggi dengan, aset pendasar lainnya dalam kontrak ?</label>
						    		            <select class="form-control" name="aset_dasar" id="eks5">
						    		                <option value="Yes">Yes</option>
						    		                <option value="No">No</option>
						    		            </select>
						    		        </div>
						    		    </div>
						    		</div>
						    	</div>
						    </div>
						    <div class="card-footer">
						        * Wajib diisi
						    </div>
						</div>
					</div>
					<!-- LOKASI, PANJANG & NILAI KONTRAK FORM -->
					<div class="tab_step_edit">
						<div class="card card-secondary">
						    <div class="card-header">
						        <h3 class="card-title">Lokasi, Panjang & Nilai Kontrak</h3>
						    </div>
						    <!-- /.card-header -->
						    <div class="card-body">
						    	<div class="col">
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Lokasi sewa ? *</label>
						    		            <input class="form-control wajib" type="text" name="lokasi" id="elokasi" oninput="this.className = 'form-control wajib'">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <label>Panjang Kontrak</label>
						    		</div>
						    		<div class="row">
						    		    <div class="col">
						    		        <div class="form-group">
						    		            <label>Start Date *</label>
						    		            <input class="form-control wajib" type="date" placeholder="01/01/20" name="start_date" id="estartdate" oninput="this.className = 'form-control wajib'">
						    		        </div>
						    		    </div>
						    		    <div class="col">
						    		        <div class="form-group">
						    		            <label>End Date *</label>
						    		            <input class="form-control wajib" type="date" placeholder="01/01/20" name="end_date" id="eenddate" oninput="this.className = 'form-control wajib'">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Besar nilai kontrak ? *</label>
						    		            <input class="form-control wajib" type="text" onkeyup="splitInDots(this)" name="nilai_kontrak" id="enilaikontrak" oninput="this.className = 'form-control wajib'">
						    		        </div>
						    		    </div>
						    		</div>
						    	</div>
						    </div>
						</div>
					</div>
					<!-- CALCULATION -->
					<div class="tab_step_edit">
						<div class="card card-secondary">
						    <div class="card-header">
						        <h3 class="card-title">Calculation</h3>
						    </div>
						    <!-- /.card-header -->
						    <div class="card-body">
						    	<div class="col">
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <label>Discount Rate</label>
						    		        <input class="form-control" type="text" name="dr" id="edr">
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Payment Amount Term</label>
						    		            <input class="form-control" onkeyup="splitInDots(this)" type="text" name="pat" id="epat">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Term of Payment</label>
						    		            <select class="form-control" name="top" id="etop">
						    		                <option value="1">1 (Tahunan)</option>
						    		                <option value="2">2 (Semester)</option>
						    		                <option value="4">4 (Kuartal)</option>
						    		                <option value="12">12 (Bulanan)</option>
						    		            </select>
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Awal Bulan / Akhir Bulan</label>
						    		            <select class="form-control" name="awak" id="eawak">
						    		                <option value="1">Awal Bulan</option>
						    		                <option value="0">Akhir Bulan</option>
						    		            </select>
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Frekuensi Pembayaran</label>
						    		            <input type="number" class="form-control" name="frekuensi" id="efrekuensi">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Payment Date</label>
						    		            <input class="form-control" name="pd" type="date" id="epd">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Prepaid</label>
						    		            <input class="form-control" onkeyup="splitInDots(this)" name="prepaid" type="text" id="eprepaid">
						    		        </div>
						    		    </div>
						    		</div>
						    	</div>
						    </div>
						</div>
					</div>
					<!-- DETAIL CONTRACT FORM -->
					<div class="tab_step_edit">
						<div class="card card-secondary">
						    <div class="card-header">
						        <h3 class="card-title">Detail Contract Form</h3>
						    </div>
						    <!-- /.card-header -->
						    <div class="card-body">
						    	<div class="col">
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Status PPN</label>
						    		            <select class="form-control" name="status_ppn" id="estatus_ppn">
						    		                <option value="0">Belum Termasuk PPN</option>
						    		                <option value="1">Sudah Termasuk PPN</option>
						    		            </select>
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>PPN %</label>
						    		            <input class="form-control" type="text" name="ppn" id="eppn">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Jumlah Unit</label>
						    		            <input class="form-control" type="text" name="jumlah_unit" id="ejumlah_unit">
						    		        </div>
						    		    </div>
						    		</div>
						    		<div class="row">
						    		    <div class="col-md-12">
						    		        <div class="form-group">
						    		            <label>Satuan</label>
						    		            <input class="form-control" name="satuan" type="text" id="esatuan">
						    		        </div>
						    		    </div>
						    		</div>
						    	</div>
						    </div>
						</div>
					</div>
					<!-- PERPANJANGAN -->
					<div class="tab_step_edit">
						<div class="card card-secondary">
						    <div class="card-header">
						        <h3 class="card-title">Perpanjangan</h3>
						    </div>
						    <!-- /.card-header -->
						    <div class="card-body">
						        <div class="row">
						            <div class="col-md-12">
						                <div class="form-group">
						                    <label>Nilai Asumsi Perpanjang</label>
						                    <input class="form-control" type="text" onkeyup="splitInDots(this)" name="nilai_asumsi_perpanjangan" id="enilai_asumsi_perpanjangan">
						                </div>
						            </div>
						        </div>
						        <div class="row">
						            <div class="col-md-12">
						                <div class="form-group">
						                    <label>Tanggal Perpanjang</label>
						                    <input class="form-control" type="date" name="tgl_perpanjangan" id="etgl_perpanjangan">
						                </div>
						            </div>
						        </div>
						    </div>
						    <div class="card-footer">
						        * Wajib diisi
						    </div>
						</div>
					</div>
					<!-- <div style="text-align:center;margin-top:1%;margin-bottom: 5%;" class="float-right"> -->
					  <!-- Form <span id="step">1</span>/<span id="jumlah"></span> -->
					  <!-- <span class="step">1</span> -->
					  <!-- <span class="step">2</span> -->
					  <!-- <span class="step">3</span> -->
					  <!-- <span class="step">4</span> -->
					  <!-- <span class="step">5</span> -->
					<!-- </div> -->
					<input type="hidden" id="logsesid" value="<?php echo $this->session->userdata('ses_id'); ?>" />
				</div>
				<div class="modal-footer">
					<div class="col">
						<div class="row">
							<div class="ml-auto">
								<strong><span>Form</span> <span id="stepEdit"> 1</span>/<span id="jumlahEdit"></span></strong>	
							</div>
						</div>
						<div class="row">
							<div class="ml-auto">
								<button type="button" class="btn btn-light" id="prevBtnEdit" onclick="nextPrevEdit(-1)">Sebelumnya</button>
								<button type="button" class="btn btn-primary" id="nextBtnEdit" onclick="nextPrevEdit(1)">Selanjutnya</button>
								<button type="submit" class="btn btn-danger" id="submit_form_edit">Submit</button>
								<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>