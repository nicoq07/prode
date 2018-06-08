<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\I18n\Time;
use App\Model\Entity\Partido;
use App\Model\Entity\PartidosApuestasUser;

class ApuestaComponent extends Component
{

    public function puedeEditar(\DateTime $horaPartido)
    {
        $now = new \DateTime();
        $aux = Time::fromNow($horaPartido);
        
        if ($aux->invert) {
            return false;
        }
        
        $hours = $aux->h + ($aux->d * 24);
        if ($hours >= 2)
            return true;
        else
            return false;
    }

    public function calcularPuntaje(PartidosApuestasUser $apuesta, Partido $partido)
    {
        /*
         * No acertó:
         * 3 Argentina - Islandia 1
         *
         * Resultado Real
         * 1 Argentina - Islandia 2
         *
         * Puntos ganados: 0
         * -------------------
         *
         * Acertó partido :
         * 3 Argentina - Islandia 1
         *
         * Resultado Real
         * 2 Argentina - Islandia 1
         *
         * Puntos ganados: 1
         * --------------------------
         *
         * Acertó resultado :
         *
         * 3 Argentina - Islandia 1
         *
         * Resultado Real
         * 3 Argentina - Islandia 1
         * -------------------------
         * Puntos ganados: 3
         */
        $arrayPartido[$partido->equipo_id_local] = $partido->goles_local;
        $arrayPartido[$partido->equipo_id_visitante] = $partido->goles_visitante;
        
        $arrayApuesta[$partido->equipo_id_local] = $apuesta->goles_local;
        $arrayApuesta[$partido->equipo_id_visitante] = $apuesta->goles_visitante;
        
        if ($arrayPartido === $arrayApuesta) {
            return 3;
        } else {
            $partidoEmpate = false;
            $equipoGanador = null;
            $equipoApuestaGanador = null;
            $empate = false;
            
            if ($arrayPartido[$partido->equipo_id_local] > $arrayPartido[$partido->equipo_id_visitante]) {
                $equipoGanador = $partido->equipo_id_local;
            } elseif ($arrayPartido[$partido->equipo_id_local] < $arrayPartido[$partido->equipo_id_visitante]) {
                $equipoGanador = $partido->equipo_id_visitante;
            } else {
                
                $partidoEmpate = true;
            }
            
            // gano el local
            if ($arrayApuesta[$partido->equipo_id_local] > $arrayApuesta[$partido->equipo_id_visitante]) {
                $equipoApuestaGanador = $partido->equipo_id_local;
            } elseif ($arrayApuesta[$partido->equipo_id_local] < $arrayApuesta[$partido->equipo_id_visitante]) {
                $equipoApuestaGanador = $partido->equipo_id_visitante;
            } else {
                
                $empate = true;
            }
            
            if ($empate && $partidoEmpate) {
                return 1;
            }
            
            if ($equipoGanador == $equipoApuestaGanador) {
                return 1;
            }
        }
        return 0;
    }
}