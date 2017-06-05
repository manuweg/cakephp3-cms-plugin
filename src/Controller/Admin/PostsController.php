<?php
namespace Cms\Controller\Admin;

use Cms\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \Cms\Model\Table\PostsTable $Posts
 *
 * @method \Cms\Model\Entity\Post[] paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index($postType = null)
    {
	    $query = $this->Posts->find('all')->where(['PostTypes.title' => $postType]);
        $this->paginate = [
            'contain' => ['PostTypes'],
        ];
        $this->set('posts', $this->paginate($query));
        $this->set('postType', $postType);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     *
     * @return void
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['PostTypes']
        ]);
        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($postType = null)
    {
        if(!$postType) {
	        $this->Flash->error(__('You must supply a valid post type!'));
	        return $this->redirect(['controller' => 'PostTypes', 'action' => 'index']);
	    }
	    $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $postTypes = $this->Posts->PostTypes->find('list');
        $categories = $this->Posts->Categories->find('treeList');
        $this->set(compact('post', 'postType', 'postTypes', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $postTypes = $this->Posts->PostTypes->find('list');
        $this->set(compact('post', 'postTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
