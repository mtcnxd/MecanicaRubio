<div class="menu-container">
	<ul class="dropdown">
		<li>
			<a href="#clients">
				<h5 class="menu-title">
					<x-feathericon-user class="table-icon" style="margin-top:-4px;"/>
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
					<a class="a-item" href="{{ route('autos.index') }}">Automoviles</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('autos.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('autos.index') }}">Buscar</a></li>
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
				<li><a class="a-item" href="{{ route('dashboard') }}">Resumen</a></li>
				<li>
					<a class="a-item" href="{{ route('expenses.index') }}">Egresos</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('expenses.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('expenses.index') }}">Buscar</a></li>
					</ul>
				</li>
				<li>
					<a class="a-item" href="{{ route('payroll.index') }}">Nominas</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('payroll.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('payroll.index') }}">Buscar</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a href="#settings">
				<h5 class="menu-title">
					<x-feathericon-settings class="table-icon" style="margin-top:-4px;"/>
					Reportes
				</h5>
			</a>
			<ul class="menu-dropdown">
				<li>
					<a class="a-item" href="#">Reportes</a>
					<ul class="submenu">
						<li><a class="a-item" href="#">Servicios</a></li>
						<li><a class="a-item" href="#">Empleados</a></li>
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
				<li>
					<a class="a-item" href="{{ route('users.index') }}">Usuarios</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('users.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('users.index') }}">Buscar</a></li>
					</ul>
				</li>
				<li>
					<a class="a-item" href="{{ route('employees.index') }}">Empleados</a>
					<ul class="submenu">
						<li><a class="a-item" href="{{ route('employees.create') }}">Crear nuevo</a></li>
						<li><a class="a-item" href="{{ route('employees.index') }}">Buscar</a></li>
					</ul>
				</li>
				<li><a class="a-item" href="{{ route('profile') }}">Mi perfil</a></li>
				<li><a class="a-item" href="#">Configuración</a></li>
			</ul>
		</li>
	</ul>
</div>