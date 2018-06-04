 <?php
foreach ($equipos as $equipo) :
    ?>
	<div class="col-lg-3  col-lg-offset-2 panel" style="box-shadow: 2px 2px 5px #999;">
		<div class="col-lg-12 text-center"><?=$this->Html->image('ico/' . h($equipo->bandera), ['width' => '100px','height' => '100px'])?></div>
		<div class="col-lg-12 text-center"><?=h($equipo->descripcion)?></div>
</div>
 <?php
endforeach
;
?>
