<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li>

				<a href="proyectos">

					<i class="fa fa-th"></i>
					<span>Proyectos</span>

				</a>

			</li>

			<li>

			<a href="administrar-pyc">

					<i class="fa fa-gg"></i>
					<span>Gestionar PYC</span>

				</a>

			</li>

			<li>

				<a href="materiales">

					<i class="fa fa-product-hunt"></i>
					<span>Materiales</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

				<a href="mapa">

				<i class="fas fa-globe-americas"></i>
					<span>Mapa</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

				<i class="fas fa-file-signature"></i>
					
					<span>Censos y registros</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					

					<li>

						<a href="nuevo-censo">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear nuevo censo</span>

						</a>

					</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li>

						<a href="administrar-censos">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar censos</span>

						</a>

					</li>
					
					<li>

						<a href="administrar-registros">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar registros</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Progreso</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="historial-progresos">
							
							<i class="fa fa-circle-o"></i>
							<span>Historial de progresos</span>

						</a>

					</li>

					<li>

						<a href="agregar-progreso">
							
							<i class="fa fa-circle-o"></i>
							<span>Agregar progreso</span>

						</a>

					</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li>

						<a href="#">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de avances</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}

		?>

		</ul>

	 </section>

</aside>