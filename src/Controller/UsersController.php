<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function isAuthorized($user)
    {
        if (isset($user['rol_id']) && $user['rol_id'] == USUARIO) {
            if (in_array($this->request->getParam('action'), [
                'cambiarPassword',
                'index',
                'view',
                'home',
                'misTorneos'
            ])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
        return true;
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'add',
            'login',
            'logout'
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id
     *            User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', [
            'limit' => 2
        ]);
        $gruposUsuarios = $this->Users->GruposUsuarios->find('list', [
            'limit' => 2
        ]);
        
        $this->set(compact('user', 'roles', 'gruposUsuarios'));
    }

    public function registrarse()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Datos inválidos. Por favor intente nuevamente', [
                    'key' => 'auth'
                ]);
            }
        }
        
        if ($this->Auth->user()) {
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'misTorneos'
            ]);
        }
    }

    public function misTorneos()
    {
        $torneos = TableRegistry::getTableLocator()->get('Torneos')
            ->find('all')
            ->where([
            'active' => true
        ])
            ->toArray();
        $this->set(compact('torneos'));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function cambiarPassword($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Password cambiada!'));
                
                return $this->redirect([
                    'action' => 'perfil'
                ]);
            }
            $this->Flash->error(__('Error, reitentá por favor!.'));
        }
        
        $this->set(compact('user'));
    }
}
