<?php
include ('../inc/config.php');
?>				
				<ul class="nav nav-list">
					<li class="active">
						<a href="index1.php">
						<!--	<i class="icon-home"></i>-->
							<span>Beranda</span>
						</a>
					</li>
						<li>
						<a href="#" class="dropdown-toggle">
							<!--<i class="icon-user"></i>-->
							<span> Agen</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="index.php?mod=agen&pg=agen_view">
									<i class="icon-double-angle-right"></i>
									Daftar Agen
								</a>
							</li>						
						</ul>
					</li>
					
							<li>
						<a href="#" class="dropdown-toggle">
							<!--<i class="icon-th"></i>-->
							<span> Kontainer</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">	
							<li>
								<a href="index.php?mod=kontainer&pg=kontainer_view">
									<i class="icon-double-angle-right"></i>
									Daftar Kontainer
								</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<!--<i class="icon-cog"></i>-->
							<span> Alat</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="index.php?mod=alat&pg=alat_view">
									<i class="icon-double-angle-right"></i>
									Daftar Alat
								</a>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<!--<i class="icon-plane"></i>-->
							<span> Kapal</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="index.php?mod=kapal&pg=kapal_view">
									<i class="icon-double-angle-right"></i>
									Daftar Kapal
								</a>
							</li>	
						</ul>
					</li>
							<li>
						<a href="#" class="dropdown-toggle">
							<!--<i class="icon-shopping-cart"></i>-->
							<span> Transaksi</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
							<li>
								<a href="index.php?mod=invoice&pg=ts_view">
									<i class="icon-double-angle-right"></i>
									Transaksi
								</a>
							</li>
							
							<li>
								<a href="index.php?mod=invoice&pg=grafik">
									<i class="icon-double-angle-right"></i>
									Grafik 
								</a>
							</li>
						</ul>
					</li>
							<!--	<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-cog"></i>
							<span> Pengaturan</span>
							<b class="arrow icon-angle-down"></b>
						</a>
						<ul class="submenu">
						<li>
								<a href="index.php?mod=pengelola&pg=pengelola_view">
									<i class="icon-double-angle-right"></i>
									Pengelola
								</a>
							</li>
							<li>
								<a href="index.php?mod=login&pg=cp_form">
									<i class="icon-double-angle-right"></i>
									Ganti Password
								</a>
							</li>
							<li>
								<a href="login/logout.php">
									<i class="icon-double-angle-right"></i>
									Keluar
								</a>
							</li>	
						</ul>
					</li>-->
				</ul><!--/.nav-list-->
				<div id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>	
					<?php list_links1();?><?php list_links();?> 
							
						