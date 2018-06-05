<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

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
        $user_id = $this->Auth->user('id');
        
        $torneos_user = TableRegistry::getTableLocator()->get('UsersTorneos')
            ->find()
            ->select([
            'Torneos.id'
        ])
            ->contain('Torneos', [
            'conditions' => [
                'Torneos.active' => true
            ]
        ])
            ->where([
            'user_id' => $user_id
        ]);
        // $partidos = $this->PartidosApuestasUsers->Partidos->find('all')->contain('Torneos', [
        // 'conditions' => [
        // 'Torneos.id IN' => $torneos_user
        // ]
        // ]);
        $partidosApuestasUsers = $this->paginate($this->PartidosApuestasUsers);
        
        $this->set(compact('partidosApuestasUsers', 'partidos'));
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
        
        $una_hora_menos = strtotime('-1 hour', strtotime(date('Y-m-d H:i')));
        
        $listado_partidos = $this->PartidosApuestasUsers->Partidos->find('list')->where([
            "DATE_FORMAT(Partido.dia_partido,'YYYY-MM-DD %H:%i)' " <= date('Y-m-d H:i', $una_hora_menos)
        ]);
        
        debug($listado_partidos->all());
        // ->toArray();
        $partidos = null;
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
