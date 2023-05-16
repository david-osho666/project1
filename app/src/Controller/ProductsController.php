<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $key = $this->request->getQuery('key');
        if($key){
            $query=$this->Products->find('all')
                ->where(['Or' => ['name like'=>'%'.$key.'%']]);
        }
        else{
            $query=$this->Products ;}
        $products = $this->paginate($query);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            if(!$product->getErrors()) {
                $image = $this->request->getData('image_file');

                $name = $image->getClientFilename();

                if(!is_dir(WWW_ROOT.'img'.DS.'product-img'))
                mkdir(WWW_ROOT.'img'.DS.'product-img',0775);

                $targetPath = WWW_ROOT . 'img' . DS .'product-img'.DS. $name;

                if ($name)
                    $image->moveTo($targetPath);

                $product->image ='product-img/' .$name;
            }

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());


            if(!$product->getErrors()) {
                $image = $this->request->getData('change_image');

                $name = $image->getClientFilename();

                if ($name) {

                    if (!is_dir(WWW_ROOT . 'img' . DS . 'product-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'product-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'product-img' . DS . $name;

                    $image->moveTo($targetPath);

                    $imagepath =WWW_ROOT.'img'.DS.$product->image;
                    if(file_exists($imagepath)){
                        unlink($imagepath);
                    }

                    $product->image = 'product-img/' . $name;
                }
            }


            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);

        $imagepath =WWW_ROOT.'img'.DS.$product->image;


        if ($this->Products->delete($product)) {
            if(file_exists($imagepath)){
                unlink($imagepath);
            }
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
