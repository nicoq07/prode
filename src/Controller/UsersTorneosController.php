<?php
namespace App\Controller;

/**
 * UsersTorneos Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\TorneosTable $Torneos
 * @property \App\Model\Table\UsersTorneosTable $UsersTorneos
 * @method \App\Model\Entity\UsersTorneo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersTorneosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usersTorneos = $this->paginate($this->UsersTorneos);
        
        $this->set(compact('usersTorneos'));
    }

    /**
     * View method
     *
     * @param string|null $id
     *            Users Torneo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersTorneo = $this->UsersTorneos->get($id, [
            'contain' => []
        ]);
        
        $this->set('usersTorneo', $usersTorneo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersTorneo = $this->UsersTorneos->newEntity();
        if ($this->request->is('post')) {
            $usersTorneo = $this->UsersTorneos->patchEntity($usersTorneo, $this->request->getData());
            if ($this->UsersTorneos->save($usersTorneo)) {
                $this->Flash->success(__('The users torneo has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The users torneo could not be saved. Please, try again.'));
        }
        $this->set(compact('usersTorneo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            Users Torneo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersTorneo = $this->UsersTorneos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $usersTorneo = $this->UsersTorneos->patchEntity($usersTorneo, $this->request->getData());
            if ($this->UsersTorneos->save($usersTorneo)) {
                $this->Flash->success(__('The users torneo has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The users torneo could not be saved. Please, try again.'));
        }
        $this->set(compact('usersTorneo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            Users Torneo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $usersTorneo = $this->UsersTorneos->get($id);
        if ($this->UsersTorneos->delete($usersTorneo)) {
            $this->Flash->success(__('The users torneo has been deleted.'));
        } else {
            $this->Flash->error(__('The users torneo could not be deleted. Please, try again.'));
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }

    /**
     *
     * @return \Cake\Http\Response|NULL
     */
    public function inscripcion(int $torneo_id)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $this->autoRender = false;
        $usersTorneo = $this->UsersTorneos->newEntity();
        if ($this->request->is('post')) {
            
            $user_id = $this->Auth->user('id');
            $usersTorneo->set('torneo_id', $torneo_id);
            $usersTorneo->set('user_id', $user_id);
            $this->UsersTorneos->patchEntity($usersTorneo, $this->request->getData());
            debug($this->UsersTorneos->save($usersTorneo));
            if ($this->UsersTorneos->save($usersTorneo)) {
                
                $this->Flash->success(__('Te inscribiste en el torneo.'));
                
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The users torneo could not be saved. Please, try again.'));
        }
    }
}
