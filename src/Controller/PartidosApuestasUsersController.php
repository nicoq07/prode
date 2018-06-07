<?php
namespace App\Controller;

/**
 * PartidosApuestasUsers Controller
 *
 * @property \App\Model\Table\PartidosTable $Partidos
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\PartidosApuestasUsersTable $PartidosApuestasUsers
 * @method \App\Model\Entity\PartidosApuestasUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PartidosApuestasUsersController extends AppController
{

    // FIXME
    public function isAuthorized($user)
    {
        return true;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $partidosApuestasUsers = $this->paginate($this->PartidosApuestasUsers);
        
        $this->set(compact('partidosApuestasUsers'));
    }

    public function fixture()
    {
        $this->loadComponent('Partido');
        $user_id = $this->Auth->user('id');
        
        $equipos = $this->PartidosApuestasUsers->Partidos->Equipos->find('list')->toArray();
        
        $listado_partidos = $this->PartidosApuestasUsers->Partidos->setDisplayField('presentacionSinFecha')
            ->find()
            ->orderAsc('Partidos.fecha');
        
        $partidos = null;
        $i = 0;
        foreach ($listado_partidos as $partido) {
            
            $apuestaHecha = $this->PartidosApuestasUsers->find()
                ->where([
                'user_id' => $user_id,
                'partido_id' => $partido->id
            ])
                ->first();
            
            $partidos[$i]['id'] = $partido->id;
            $partidos[$i]['editable'] = $this->Partido->puedeEditar(new \DateTime($partido->dia_partido->format('Y-m-d H:i:s')));
            $partidos[$i]['fecha'] = $partido->fecha;
            $partidos[$i]['dia'] = $partido->dia_partido->format('d-m-Y');
            $partidos[$i]['hora'] = $partido->dia_partido->format('H:i') . ' hs ';
            $partidos[$i]['equipo_local'] = $equipos[$partido->equipo_id_local];
            $partidos[$i]['equipo_visitante'] = $equipos[$partido->equipo_id_visitante];
            $partidos[$i]['goles_local'] = $partido->goles_local;
            $partidos[$i]['goles_visitante'] = $partido->goles_visitante;
            $partidos[$i]['equipo_ganador'] = $partido->equipo_id_ganador;
            if ($apuestaHecha) {
                $partidos[$i]['apuesta_goles_local'] = $apuestaHecha->goles_local;
                $partidos[$i]['apuesta_goles_visitante'] = $apuestaHecha->goles_local;
            }
            
            $i ++;
        }
        
        // debug($partidos);
        // die();
        
        $this->set(compact('partidos'));
    }

    /**
     * View method
     *
     * @param string|null $id
     *            Partidos Apuestas User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partidosApuestasUser = $this->PartidosApuestasUsers->get($id, [
            'contain' => []
        ]);
        
        $this->set('partidosApuestasUser', $partidosApuestasUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $user_id = $this->Auth->user('id');
        $partidosApuestasUser = $this->PartidosApuestasUsers->newEntity();
        
        if ($this->request->is('post')) {
            $id_partido = $this->request->getData('partido_id');
            
            $apuestaHecha = $this->PartidosApuestasUsers->find()
                ->where([
                'user_id' => $user_id,
                'partido_id' => $id_partido
            ])
                ->first();
            
            if ($apuestaHecha) {
                $partidosApuestasUser = $this->PartidosApuestasUsers->get($apuestaHecha->id);
            }
            // si es nuevo
            $partidosApuestasUser = $this->PartidosApuestasUsers->patchEntity($partidosApuestasUser, $this->request->getData());
            
            // seteo el cargado en true
            $partidosApuestasUser->user_id = intval($user_id);
            $partidosApuestasUser->cargado = true;
            $partidosApuestasUser->acertado = false;
            if ($this->PartidosApuestasUsers->save($partidosApuestasUser)) {
                $this->Flash->success(__('The partidos apuestas user has been saved.'));
                
                return $this->redirect([
                    'action' => 'add'
                ]);
            }
            $this->Flash->error(__('The partidos apuestas user could not be saved. Please, try again.'));
        }
        
        $una_hora_menos = strtotime('+1 hour', strtotime(date('Y-m-d H:i')));
        
        $listado_partidos = $this->PartidosApuestasUsers->Partidos->find('list')->where([
            "Partidos.dia_partido >=" => date('Y-m-d H:i', $una_hora_menos)
        ]);
        
        $partidos = null;
        if ($listado_partidos) {
            foreach ($listado_partidos as $id_partido => $partido) {
                $apuestaHecha = $this->PartidosApuestasUsers->find()
                    ->where([
                    'user_id' => $user_id,
                    'partido_id' => $id_partido
                ])
                    ->first();
                $prediccion = "";
                
                if ($apuestaHecha) {
                    $prediccion = " Predije: (" . $apuestaHecha->goles_local . "-" . $apuestaHecha->goles_visitante . ")";
                }
                
                $partidos[$id_partido] = $partido . $prediccion;
            }
        }
        $this->set(compact('partidosApuestasUser', 'partidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            Partidos Apuestas User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partidosApuestasUser = $this->PartidosApuestasUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $partidosApuestasUser = $this->PartidosApuestasUsers->patchEntity($partidosApuestasUser, $this->request->getData());
            if ($this->PartidosApuestasUsers->save($partidosApuestasUser)) {
                $this->Flash->success(__('The partidos apuestas user has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The partidos apuestas user could not be saved. Please, try again.'));
        }
        $this->set(compact('partidosApuestasUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            Partidos Apuestas User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $partidosApuestasUser = $this->PartidosApuestasUsers->get($id);
        if ($this->PartidosApuestasUsers->delete($partidosApuestasUser)) {
            $this->Flash->success(__('The partidos apuestas user has been deleted.'));
        } else {
            $this->Flash->error(__('The partidos apuestas user could not be deleted. Please, try again.'));
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }
}
