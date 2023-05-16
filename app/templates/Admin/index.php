<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Admin> $admin
 */
?>
<div class="admin index content">
    <?= $this->Html->link(__('New Admin'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Admin') ?></h3>
    <?= $this->Form->create(null, ['type'=>'get','class'=>' float-right'])?>
    <div class="input-group mb-3 ">
        <?= $this->Form->control('key', ['label'=>'', 'placeholder' => 'Enter admin first name','class'=>'col-11','value'=>$this->request->getQuery('key')])?>
        <?= $this->Form->button('', ['class' => 'button float-right bi bi-search'])?>
    </div>
    <?= $this->Form->end()?>
    <div class="table-responsive">
        <table class="table table-hover ">
            <thead>
                <tr>

                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin as $admin): ?>
                <tr>
                    <td><?= h($admin->first_name) ?></td>
                    <td><?= h($admin->last_name) ?></td>
                    <td><?= h($admin->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admin->id], ['class' => 'bi bi-pen-fill']) ?>
                        <?php if($this->Identity->isLoggedIn()) { ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id),'class' => 'bi bi-trash-fill']) ?>
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
