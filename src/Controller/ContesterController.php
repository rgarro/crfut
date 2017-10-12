<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contester Controller
 *
 *
 * @method \App\Model\Entity\Contester[] paginate($object = null, array $settings = [])
 */
class ContesterController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contester = $this->paginate($this->Contester);

        $this->set(compact('contester'));
        $this->set('_serialize', ['contester']);
    }

    /**
     * View method
     *
     * @param string|null $id Contester id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contester = $this->Contester->get($id, [
            'contain' => []
        ]);

        $this->set('contester', $contester);
        $this->set('_serialize', ['contester']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contester = $this->Contester->newEntity();
        if ($this->request->is('post')) {
            $contester = $this->Contester->patchEntity($contester, $this->request->getData());
            if ($this->Contester->save($contester)) {
                $this->Flash->success(__('The contester has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contester could not be saved. Please, try again.'));
        }
        $this->set(compact('contester'));
        $this->set('_serialize', ['contester']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contester id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contester = $this->Contester->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contester = $this->Contester->patchEntity($contester, $this->request->getData());
            if ($this->Contester->save($contester)) {
                $this->Flash->success(__('The contester has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contester could not be saved. Please, try again.'));
        }
        $this->set(compact('contester'));
        $this->set('_serialize', ['contester']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contester id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contester = $this->Contester->get($id);
        if ($this->Contester->delete($contester)) {
            $this->Flash->success(__('The contester has been deleted.'));
        } else {
            $this->Flash->error(__('The contester could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
