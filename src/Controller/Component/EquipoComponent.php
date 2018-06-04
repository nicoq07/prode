<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class EquipoComponent extends Component
{

    public function banderaPaises()
    {
        $imagenes = scandir(WWW_ROOT . 'img' . DS . 'ico' . DS);
        $banderas = null;
        foreach ($imagenes as $img) {
            if (strpos($img, '.ico') == true) {
                $banderas[$img] = str_replace('.ico', '', $img);
            }
        }
        
        return $banderas;
    }
}