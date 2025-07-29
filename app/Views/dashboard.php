<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>IFRO Calama - Sistemas - by Calama Devs</title>

	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/mdi/css/materialdesignicons.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/vendor.bundle.base.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/select2/select2.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/modern-vertical/style.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/jquery-toast-plugin/jquery.toast.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>">

	<link rel="shortcut icon" href="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" />

	<script src="<?php echo base_url("assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
	<script src="<?php echo base_url("assets/vendors/jquery-validation/jquery.validate.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/vendors/jquery-toast-plugin/jquery.toast.min.js"); ?>"></script>

	<script src="<?php echo base_url("assets/vendors/select2/select2.min.js"); ?>"></script>
	<script src="<?php echo base_url('assets/vendors/typeahead.js/typeahead.bundle.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/typeahead.js') ?>"></script>

	<style>
		/* Ajuste para o texto digitado ficar cinza */
		.select2-container--default .select2-search--dropdown .select2-search__field,
		.select2-container--default .select2-search--inline .select2-search__field {
			color: #999 !important;
			background-color: transparent !important;
		}
		.sidebar .nav.sub-menu {			
			padding: 0 0 0 2rem;
		}
		.sidebar .nav .nav-item .nav-link .menu-title {
			font-size: 0.80rem;
		}
	</style>

</head>

<body>
	<div class="container-scroller">
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
				<a href="<?php echo base_url("/") ?>">
					<img src="<?php echo base_url("assets/images/logo-ifro.png"); ?>" class="sidebar-brand brand-logo" alt="logo" />
					<img src="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" class="sidebar-brand brand-logo-mini" alt="logo" />
				</a>
			</div>
			<ul class="nav">
				
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url("/") ?>" style="margin-top:20px;">
						<span class="menu-icon">
							<i class="mdi mdi-home" style="color: #0090e7"></i>
						</span>
						<span class="menu-title">Página inicial</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#refeicoes" aria-expanded="true" aria-controls="refeicoes">
						<span class="menu-icon">
							<i class="mdi mdi-calendar-clock" style="color: #00d25b"></i>
						</span>
						<span class="menu-title">Gestão de Refeições</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse show" id="refeicoes">
						<ul class="nav flex-column sub-menu">

							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('sys/uque'); ?>">
									<span class="menu-icon">
										<i class="mdi mdi-clock-time-eight"></i>
									</span>
									<span class="menu-title">Link 1</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('sys/versao'); ?>">
									<span class="menu-icon">
										<i class="mdi mdi-multicast"></i>
									</span>
									<span class="menu-title">Link 2</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('sys/relatorios'); ?>">
									<span class="menu-icon">
										<i class="mdi mdi-laptop"></i>
									</span>
									<span class="menu-title">Link 3</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#cadastros" aria-expanded="false" aria-controls="cadastros">
						<span class="menu-icon">
							<i class="fa fa-database" style="color: #8f5fe8"></i>
						</span>
						<span class="menu-title">Cadastros</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="cadastros">
					
						<ul class="nav flex-column sub-menu">
						
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('sys/professor'); ?>">
									<span class="menu-icon">
										<i class="mdi mdi-account"></i>
									</span>
									<span class="menu-title">Cadastro 1</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('sys/matriz'); ?>">
									<span class="menu-icon">
										<i class="mdi mdi-notebook-check"></i>
									</span>
									<span class="menu-title">Cadastro 2</span>
								</a>
							</li>
							
						</ul>
					</div>
				</li>				

				<?php //if (auth()->user()->inGroup('admin')): ?>					

					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="collapse" href="#op_avancadas" aria-expanded="false" aria-controls="op_avancadas">
							<span class="menu-icon">
								<i class="fa fa-gears" style="color: #fc424a"></i>
							</span>
							<span class="menu-title">Avançado</span>
							<i class="menu-arrow"></i>
						</a>						

						<div class="collapse" id="op_avancadas">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"> 
									<a class="nav-link" href="<?php echo base_url('sys/admin'); ?>">
										<span class="menu-icon">
											<i class="fa fa-users"></i>
										</span>
										<span class="menu-title">Usuários do Sistema</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span class="menu-icon">
											<i class="mdi mdi-backup-restore"></i>
										</span>
										<span class="menu-title">Backup</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										<span class="menu-icon">
											<i class="fa fa-trash"></i>
										</span>
										<span class="menu-title">Limpeza</span>
									</a>
								</li>								
							</ul>
						</div>
					</li>					
					
				<?php //endif; ?>

			</ul>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:../../partials/_navbar.html -->
			<nav class="navbar p-0 fixed-top d-flex flex-row">
				<div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
					<a class="navbar-brand brand-logo-mini" href="<?php echo base_url("/sys/home") ?>"><img src="<?php echo base_url("assets/images/logo-ifro-mini.png"); ?>" alt="logo" /></a>
				</div>
				<div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
					<button id="navbar-toggle" class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-menu"></span>
					</button>

					<ul class="navbar-nav navbar-nav-right">
					
						<!--<li class="nav-item">
							<a class="nav-link count-indicator" id="indicadorVersao" href="<?php echo base_url('sys/versao'); ?>">
								<i class="mdi mdi-multicast"></i> Versão ativa: <span class="badge badge-primary"> <?php //echo $versao_nome; ?> </span>
							</a>
						</li>-->
						
						<li class="nav-item dropdown">
							<a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
								<div class="navbar-profile">
									<!--<img class="img-xs rounded-circle" src="<?php echo base_url("assets/images/faces/face15.jpg"); ?>" alt="">-->
									<p class="mb-0 d-none d-sm-block navbar-profile-name"><?php //echo auth()->user()->username; ?></p>
									<i class="mdi mdi-menu-down d-none d-sm-block"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="profileDropdown">
								<h6 class="p-3 mb-0">Perfil</h6>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-cog text-success"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Configurações</p>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item preview-item" href="<?php echo base_url('logout'); ?>">
									<div class="preview-thumbnail">
										<div class="preview-icon bg-dark rounded-circle">
											<i class="mdi mdi-logout text-danger"></i>
										</div>
									</div>
									<div class="preview-item-content">
										<p class="preview-subject mb-1">Sair</p>
									</div>
								</a>
							</div>
						</li>
					</ul>
					<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
						<span class="mdi mdi-format-line-spacing"></span>
					</button>
				</div>
			</nav>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<?php echo $content; ?>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:../../partials/_footer.html -->
				<footer class="footer">
					<div class="d-sm-flex justify-content-center justify-content-sm-between">

						<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright© 2025~ <a href="javascript: void()">Calama Dev's</a>.</span>

						<?php //if (auth()->user()->inGroup('admin')): ?>
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
								[CI <?php echo CodeIgniter\CodeIgniter::CI_VERSION ?>] | 
								[PHP <?php echo phpversion(); ?>] |
								[Database <?php echo \Config\Database::connect()->getVersion(); ?>]
							</span>
						<?php //endif; ?>

						<span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Feito a mão e com <i class="mdi mdi-heart text-danger"></i></span>

					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->

	<script src="<?php echo base_url("assets/vendors/chart.js/chart.umd.js"); ?>"></script>
	<script src="<?php echo base_url("assets/vendors/progressbar.js/progressbar.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/vendors/jvectormap/jquery-jvectormap.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"); ?>"></script>
	<script src="<?php echo base_url("assets/vendors/datatables.net/jquery.dataTables.js"); ?>"></script>
	<script src="<?php echo base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"); ?>"></script>

	<script src="<?php echo base_url("assets/js/off-canvas.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/hoverable-collapse.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/misc.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/settings.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/todolist.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/tabs.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/file-upload.js"); ?>"></script>

	<script src="<?php echo base_url("assets/js/dashboard.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/form-validation.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/validacoes/cadastro-professor.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/validacoes/edicao-professor.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/validacoes/cadastro-disciplina.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/validacoes/cadastro-cursos.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/dashboards/dashboards.js"); ?>"></script>

</body>

</html>