    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?=NOMBRE_SISTEMA;?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li><a href="#"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Inicio</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Apuestas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'PartidosApuestasUsers',
                'action' => 'fixture'
            ));
            ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nueva</a></li>
           	<li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'PartidosApuestasUsers',
                'action' => 'resultados'
            ));
            ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ver resultados</a></li>
            <li role="separator" class="divider"></li>
<!--             <li><a href="#">Categories</a></li> -->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Torneos <span class="caret"></span></a>
          <ul class="dropdown-menu">
           	<li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'Torneos',
                'action' => 'add'
            ));
            ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo torneo</a></li>
   			<li><a href="<?php
    
    echo \Cake\Routing\Router::url(array(
        'controller' => 'Torneos',
        'action' => 'index'
    ));
    ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ver torneos</a></li>
          </ul>
        </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Partidos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'Partidos',
                'action' => 'add'
            ));
            ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cargar partido</a></li>
   			<li><a href="<?php
    
    echo \Cake\Routing\Router::url(array(
        'controller' => 'Partidos',
        'action' => 'cargarResultados'
    ));
    ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cargar resultado</a></li>
   		    <li><a href="<?php
        
        echo \Cake\Routing\Router::url(array(
            'controller' => 'Partidos',
            'action' => 'index'
        ));
        ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ver partidos</a></li>
          </ul>
      </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'Equipos',
                'action' => 'add'
            ));
            ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cargar equipo</a></li>
   		    <li><a href="<?php
        
        echo \Cake\Routing\Router::url(array(
            'controller' => 'Equipos',
            'action' => 'index'
        ));
        ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ver equipo</a></li>
          </ul>
      </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'Users',
                'action' => 'add'
            ));
            ?>"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo usuario</a></li>
   		    <li><a href="<?php
        
        echo \Cake\Routing\Router::url([
            'controller' => 'Users',
            'action' => 'index'
        
        ]);
        ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ver usuarios</a></li>
          </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Links<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://www.promiedos.com.ar/mundial2018.php" target="_blank">Fixture</a></li>
<!--             <li role="separator" class="divider"></li> -->
<!--             <li><a href="http://www.google.ch" target="_blank">Timelogger</a></li> -->
<!--             <li><a href="http://www.cubetech.ch" target="_blank">cubetech.ch</a></li> -->
         </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?=$current_user['nombre'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'Users',
                'action' => 'view',
                $current_user['id']
            ));
            ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Mi cuenta</a></li>
            <li><a href="<?php
            
            echo \Cake\Routing\Router::url(array(
                'controller' => 'Users',
                'action' => 'logout'
            ));
            ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</a></li>
         </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
