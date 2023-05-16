<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class="products index content">
    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Products') ?></h3>
    <?= $this->Form->create(null, ['type'=>'get','class'=>' float-right'])?>
    <div class="input-group mb-3 ">
        <?= $this->Form->control('key', ['label'=>'', 'placeholder' => 'Enter product name','class'=>'col-11','value'=>$this->request->getQuery('key')])?>
        <?= $this->Form->button('', ['class' => 'button float-right bi bi-search'])?>
    </div>
    <?= $this->Form->end()?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('size') ?></th>
                    <th><?= $this->Paginator->sort('color') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->code) ?></td>
                    <td><?= @$this ->Html->image($product->image,array('width'=>'50px')) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= $this->Number->format($product->price,['before'=>'$']) ?></td>
                    <td><?= h($product->size) ?></td>
                    <td><?= h($product->color) ?></td>
                    <td><?= h($product->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'bi bi-pen-fill']) ?>
                        <?php if($this->Identity->isLoggedIn()) { ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id),'class' => 'bi bi-trash-fill']) ?>
                        <?php } else{
                           echo "";
                        }?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
