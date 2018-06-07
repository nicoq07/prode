<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class ApuestaComponent extends Component
{

    public function puedeEditar(\DateTime $horaPartido)
    {
        $now = new \DateTime();
        $diff = $horaPartido->diff($now);
        $hours = $diff->h;
        $hours = $hours + ($diff->days * 24);
        
        if ($hours > 2)
            return true;
        else
            return false;
    }

    public function calcularPuntaje($apuesta, $partido)
    {
        return 'partido sin resultados';
    }
}