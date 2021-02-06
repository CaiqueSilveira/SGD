<!-- <div id="loader" ></div> -->
<div class="wrapper">
    <header class="main-header">
        <!--<div id="loader"></div> -->
        <!-- LOGO -->
        <a href="/sys/view/index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini" style="font-size: 15px"><b>SGD</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lgg"><b>SGD</b> </span>
        </a>
        <!-- LOGO -->
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Alternar a navegação</span>
            </a>
               <div style="float: right; width: 231px; margin-right: 5px;">
                
                   .
                       
                
            </div>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- DROPDOWN USUÁRIO -->

                    <li class="dropdown user user-menu">
                        <a href="/sys/view/usuario/senha.php" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>
                                <?php echo utf8_encode($_SESSION['usuarioNome']); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="/sys/secure/destroy.php">
                            <i class="glyphicon glyphicon-off"> </i>
                        </a>
                    </li>
                </ul>
                <!-- DROPDOWN USUÁRIO -->
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- MENU -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header" style="font-weight: bold;">MENU DE NAVEGAÇÃO</li>
                <!-- PÁGINA INICIAL -->
                <li class=" <?php if ($page == 'index') {
                                echo 'active';
                            } ?>">
                    <a href="/sys/view/index.php">
                        <i class="fa fa-home"></i> <span style="font-weight: bold;">Página Inicial</span>
                    </a>
                </li>
                <!-- PÁGINA INICIAL -->

                <!-- CADASTROS -->
                <!-- CADASTRO CLIENTE-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-plus"></i>
                        <span style="font-weight: bold;">Cadastro de Clientes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/sys/view/cliente/cadastrar.php"><i class="fa fa-user-o"></i>Cadastrar Clientes</a></li>
                        <li><a href="/sys/view/cliente/lista.php"><i class="fa fa-list"></i>Listar Clientes</a></li>
                    </ul>
                </li>
                <!-- /CADASTRO CLIENTE-->

                <!-- CADASTRO DIVIDA -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-plus"></i>
                        <span style="font-weight: bold;">Cadastro de Dívidas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/sys/view/divida/cadastrar.php"><i class="fa fa-user-o"></i> Cadastrar Dívidas</a></li>
                        <li><a href="/sys/view/divida/lista.php"><i class="fa fa-list"></i> Listar Dívidas</a></li>
                    </ul>
                </li>
                <!-- /CADASTRO DIVIDA -->
                
                <!-- CADASTRO DIVIDA -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span style="font-weight: bold;">Relatórios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                   
                        <li><a href="/sys/view/relatorio/imprime.php"><i class="fa fa-book"></i> Dívidas a Receber</a></li>
                        <li><a href="/sys/view/relatorio/pagas.php"><i class="fa fa-book"></i> Dívidas Pagas</a></li>
                        
                    </ul>
                </li>
                <!-- /CADASTRO DIVIDA -->



                <?php if ($_SESSION['permissao'] >= 2) { ?>
                    <!-- CADASTRO USUARIO -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle"></i>
                            <span style="font-weight: bold;">Administração</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/sys/view/usuario/cadastrar.php"><i class="fa fa-user-o"></i>Cadastrar Usuário</a></li>
                            <li><a href="/sys/view/usuario/lista.php"><i class="fa fa-list"></i>Listar Usuários</a></li>
                        </ul>
                    </li>
                    <!-- /CADASTRO USUARIO -->
                <?php } ?> 

                <!-- SUPORTE -->
                <li class="treeview"></li>
                <li class="header" style="font-weight: bold;">SUPORTE</li>
                <li><a><i class="fa fa-headphones"></i> <span>3131-3131</span></a></li>
                <!-- /SUPORTE -->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</div>

<script type="text/javascript">
    //ATIVA LINKS DO MENU
    $('.sidebar-menu ul li').find('a').each(function() {
        var link = new RegExp($(this).attr('href')); //Check if some menu compares inside your the browsers link
        if (link.test(document.location.href)) {
            if (!$(this).parents().hasClass('active')) {
                $(this).parents('li').addClass('menu-open');
                $(this).parents().addClass("active");
                $(this).addClass("active"); //Add this too

            }
        }
    });

    $(window).load(function() {
        //Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
        $("#loader").delay(1000).fadeOut("slow");
    });

    function aalert() {
        setTimeout(func, 300);

        function func() {
            drawChart();
        };
    };
</script>