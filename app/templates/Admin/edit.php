<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<div class="row">

    <aside class="column">
        <div>
            <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class'=>'bi bi-arrow-left-circle-fill']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admin form content">
            <?= $this->Form->create($admin) ?>
            <fieldset>
                <legend><?= __('Edit Admin') ?></legend>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('email');

                ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
