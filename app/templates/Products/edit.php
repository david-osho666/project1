<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">

    <aside class="column">
        <div>
            <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class'=>'bi bi-arrow-left-circle-fill']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products form content">
            <?= $this->Form->create($product,['type'=>'file']) ?>
            <fieldset class ="row g-3 was-validated">
                <legend><?= __('Edit Product') ?></legend>
                <?php   echo $this->Form->control('change_image',['type'=>'file']);?>
                <div class="col-md-6">
                    <?php   echo $this->Form->control('code');?>
                </div>
                <div class="col-md-6">
                    <?php   echo $this->Form->control('name');?>
                </div>
                <?php   echo $this->Form->control('price');?>
                <?php   echo $this->Form->control('size',['options' => ['S'=>'S', 'M'=>'M', 'L'=>'L', 'XL'=>'XL', 'XXL'=>'XXL', 'XXXL'=>'XXXL']]);?>
                <?php   echo $this->Form->control('color');?>
                <?php   echo $this->Form->control('description',['type'=>'textarea','style'=>'height:130px']);?>

            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
