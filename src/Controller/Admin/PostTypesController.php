<?php
namespace Cms\Controller\Admin;

use Cms\Controller\AppController;

/**
 * PostTypes Controller
 *
 * @property \Cms\Model\Table\PostTypesTable $PostTypes
 *
 * @method \Cms\Model\Entity\PostType[] paginate($object = null, array $settings = [])
 */
class PostTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('postTypes', $this->paginate($this->PostTypes));
    }

    /**
     * View method
     *
     * @param string|null $id Post Type id.
     *
     * @return void
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postType = $this->PostTypes->get($id, [
            'contain' => ['Categories']
        ]);
        $this->set('postType', $postType);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postType = $this->PostTypes->newEntity();
        if ($this->request->is('post')) {
            $postType = $this->PostTypes->patchEntity($postType, $this->request->data);
            if ($this->PostTypes->save($postType)) {
                $this->Flash->success(__('The post type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('postType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post Type id.
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postType = $this->PostTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postType = $this->PostTypes->patchEntity($postType, $this->request->data);
            if ($this->PostTypes->save($postType)) {
                $this->Flash->success(__('The post type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('postType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postType = $this->PostTypes->get($id);
        if ($this->PostTypes->delete($postType)) {
            $this->Flash->success(__('The post type has been deleted.'));
        } else {
            $this->Flash->error(__('The post type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
