<div class="menu-container" style="display: flex; justify-content: space-around;">
	<ul class="dropdown p-0">
		<li>
			<a href="#clients">
				<h5 class="menu-title">
					<x-feathericon-users class="table-icon" style="margin-top:-4px;"/>
					Clientes
				</h5>
			</a>
			<ul class="menu-dropdown">
				<li>
					<a class="a-item" href="{{ route('clients.index') }}">Clientes</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('clients.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('clients.index') }}">Buscar</a></li>
					</ul>
				</li>
				<li>
					<a class="a-item" href="{{ route('cars.index') }}">Automoviles</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('cars.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('cars.index') }}">Buscar</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a href="#services">
				<h5 class="menu-title">
					<x-feathericon-tool class="table-icon" style="margin-top:-4px;"/>
					Servicios
				</h5>
			</a>
			<ul class="menu-dropdown">
				<li>
					<a class="a-item" href="{{ route('services.index') }}">Servicios</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('services.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('services.index') }}">Buscar</a></li>
					</ul>
				</li>
				<li><a class="a-item" href="{{ route('calendar.index') }}">Calendario</a></li>
			</ul>
		</li>
		<li>
			<a href="#finance">
				<h5 class="menu-title">
					<x-feathericon-dollar-sign class="table-icon" style="margin-top:-4px;"/>
					Finanzas
				</h5>
			</a>
			<ul class="menu-dropdown">
				<li><a class="a-item" href="{{ route('dashboard.index') }}">Resumen</a></li>
				<li>
					<a class="a-item" href="{{ route('payroll.index') }}">Nominas</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('payroll.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('payroll.index') }}">Buscar</a></li>
					</ul>
				</li>
				<li>
					<a class="a-item" href="{{ route('expenses.index') }}">Egresos</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('expenses.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('expenses.index') }}">Buscar</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a href="#reports">
				<h5 class="menu-title">
					<x-feathericon-settings class="table-icon" style="margin-top:-4px;"/>
					Reportes
				</h5>
			</a>
			<ul class="menu-dropdown">
				<li>
					<a class="a-item" href="#">Reportes</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('reports.autos') }}">Autos</a></li>
						<li>
							<a class="a-item" href="#">Servicios</a>
							<ul class="menu-dropdown">
								<li>
									<a class="a-item" href="#">Por cliente</a>
								</li>
							</ul>
						</li>
						<li><a class="a-item" href="{{ route('reports.employees') }}">Empleados</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a href="#settings">
				<h5 class="menu-title">
					<x-feathericon-settings class="table-icon" style="margin-top:-4px;"/>
					Configuracion
				</h5>
			</a>
			<ul class="menu-dropdown">
				<!--
				<li>
					<a class="a-item" href="{{ route('clients.index') }}">Clientes</a>
				</li>
				-->
				<li>
					<a class="a-item" href="{{ route('employees.index') }}">Empleados</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('employees.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('employees.index') }}">Buscar</a></li>
					</ul>
				</li>
				<li><a class="a-item" href="{{ route('setting.index') }}">Configuración</a></li>
			</ul>
		</li>
	</ul>
	
	<ul class="dropdown p-0">
		<li>
			<a href="#clients">
				<h5 class="menu-title">
					<x-feathericon-user class="table-icon" style="margin-top:-4px;"/>
					{{ Auth::user()->name }}
				</h5>
			</a>
			<ul class="menu-dropdown">
				<li>
					<a class="a-item" href="{{ route('profile.index') }}">Perfil</a>
				</li>
				<li>
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button class="btn btn-logout a-item" type="submit">Cerrar sesion</button>
					</form>
				</li>
			</ul>
		</li>
	</ul>
</div>