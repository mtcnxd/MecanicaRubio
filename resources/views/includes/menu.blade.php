@section('menu')
<div class="menu-container">
	<ul class="dropdown">
		<li>			
			<a href="#clients">
				<h5 class="menu-title">Clientes</h5>
			</a>
			<ul class="menu-dropdown">
				<li><a class="menu-item" href="{{ route('clients.index') }}">Buscar cliente</a></li>
				<li><a class="menu-item" href="{{ route('clients.create') }}">Nuevo cliente</a></li>
				<li><a class="menu-item" href="{{ route('autos.index') }}">Buscar Automovil</a></li>
				<li><a class="menu-item" href="{{ route('autos.create') }}">Nuevo Automovil</a></li>
			</ul>
		</li>
		<li>
			<a href="#services">
				<h5 class="menu-title">Servicios</h5>
			</a>
			<ul class="menu-dropdown">
				<li><a class="menu-item" href="{{ route('services.index') }}">Buscar servicio</a></li>
				<li><a class="menu-item" href="{{ route('services.create') }}">Nuevo servicio</a></li>
				<li><a class="menu-item" href="{{ route('calendar') }}">Calendario</a></li>
			</ul>
		</li>
		<li>
			<a href="#finance">
				<h5 class="menu-title">Finanzas</h5>
			</a>
			<ul class="menu-dropdown">
				<li><a class="menu-item" href="{{ route('dashboard') }}">Resumen</a></li>
				<li><a class="menu-item" href="{{ route('expenses.index') }}">Listado de egresos</a></li>
				<li><a class="menu-item" href="{{ route('expenses.create') }}">Nuevo egreso</a></li>
			</ul>
		</li>
		<li>
			<a href="#settings">
				<h5 class="menu-title">Configuracion</h5>
			</a>
			<ul class="menu-dropdown">
				<li>
					<a class="menu-item" href="http://">Perfil</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
@endsection