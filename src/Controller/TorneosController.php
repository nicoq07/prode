<?php
namespace App\Controller;

/**
 * Torneos Controller
 *
 *
 * @method \App\Model\Entity\Torneo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TorneosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $torneos = $this->paginate($this->Torneos, [
            'contain' => 'Users'
        ]);
        
        $this->set(compact('torneos'));
    }

    /**
     * View method
     *
     * @param string|null $id
     *            Torneo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $torneo = $this->Torneos->get($id, [
            'contain' => []
        ]);
        
        $this->set('torneo', $torneo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $torneo = $this->Torneos->newEntity();
        if ($this->request->is('post')) {
            $torneo = $this->Torneos->patchEntity($torneo, $this->request->getData());
            if ($this->Torneos->save($torneo)) {
                $this->Flash->success(__('The torneo has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The torneo could not be saved. Please, try again.'));
        }
        $this->set(compact('torneo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            Torneo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $torneo = $this->Torneos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $torneo = $this->Torneos->patchEntity($torneo, $this->request->getData());
            if ($this->Torneos->save($torneo)) {
                $this->Flash->success(__('The torneo has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The torneo could not be saved. Please, try again.'));
        }
        $this->set(compact('torneo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            Torneo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $torneo = $this->Torneos->get($id);
        if ($this->Torneos->delete($torneo)) {
            $this->Flash->success(__('The torneo has been deleted.'));
        } else {
            $this->Flash->error(__('The torneo could not be deleted. Please, try again.'));
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }
}
