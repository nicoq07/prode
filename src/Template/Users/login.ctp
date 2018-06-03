<?php
$this->assign('title', 'Ingreso');
?>
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-md-12">
    	     <?=$this->Flash->render('auth')?>
        	     <div class="col-lg-4 col-lg-offset-4">
                <h1>Ingreso a <?=h(NOMBRE_SISTEMA);?> </h1>
                    <?=$this->Form->create('login-form')?>
                        <div class="form-group">
                        <?=$this->Form->control('username', ['class' => 'form-control','placeholder' => 'Nombre de usuario','label' => false,'require'])?>
                        </div>
                        <div class="form-group">
                                <?=$this->Form->control('password', ['name' => "password",'class' => 'form-control','placeholder' => 'Password','label' => false,'require'])?>
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span>Mostrar password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Ingresar">
                    <?=$this->Form->end()?>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>© - 2017</p>
                <p>Powered by <strong><a href="https://www.linkedin.com/in/nicol%C3%A1s-quiroga-20a541b6/" target="_blank">Nicolas Quiroga</a></strong></p>
            </div>
        </div>
    </div>
</footer>