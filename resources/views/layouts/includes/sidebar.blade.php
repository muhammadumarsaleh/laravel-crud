<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="/forum" class=""><i class="lnr lnr-cloud"></i> <span>Forum</span></a></li>
						@if(auth()->user()->role == 'admin')
							<li><a href="/siswa" class="active"><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
							<li><a href="/posts" class="active"><i class="lnr lnr-pencil"></i> <span>Posts</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
</div>