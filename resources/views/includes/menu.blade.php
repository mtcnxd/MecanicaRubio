@section('menu')
<div class="menu-container">
	<ul class="dropdown">
		<li>			
			<a href="#clients">
				<h5 class="menu-title">Clientes</h5>
			</a>
			<ul class="menu-dropdown">
				<li><a href="{{ route('clients.index') }}">Buscar cliente</a></li>
				<li><a href="{{ route('clients.create') }}">Nuevo cliente</a></li>
				<li><a href="{{ route('autos.index') }}">Buscar Automovil</a></li>
				<li><a href="{{ route('autos.create') }}">Nuevo Automovil</a></li>
			</ul>
		</li>
		<li>
			<a href="#services">
				<h5 class="menu-title">Servicios</h5>
			</a>
			<ul class="menu-dropdown">
				<li><a href="{{ route('services.index') }}">Buscar servicio</a></li>
				<li><a href="{{ route('services.create') }}">Nuevo servicio</a></li>
			</ul>
		</li>
		<li>
			<a href="#finance">
				<h5 class="menu-title">Finanzas</h5>
			</a>
			<ul class="menu-dropdown">
				<li><a href="{{ route('dashboard') }}">Resumen</a></li>
				<li><a href="{{ route('expenses.index') }}">Listado de egresos</a></li>
				<li><a href="{{ route('expenses.create') }}">Nuevo egreso</a></li>
			</ul>
		</li>
		<li>
			<a href="#settings">
				<h5 class="menu-title">Configuracion</h5>
			</a>
			<ul class="menu-dropdown">
				<li>Perfil</li>
			</ul>
		</li>
	</ul>
</div>
@endsection