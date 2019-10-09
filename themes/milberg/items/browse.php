<?php
$pageTitle = __('Browse Illustrations');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation" id="secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<?php echo pagination_links(); ?>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Creator')] = 'Dublin Core,Creator';
$sortLinks[__('Date Published')] = 'Dublin Core,Date';
//$sortLinks[__('Date Added')] = 'added';
$sortLinks[__('Notional Number')] = 'Item Type Metadata,Notional Number';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php endif; ?>

<?php foreach (loop('items') as $item): ?>
<div class="item hentry">
    <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h2>
    <div class="item-meta">
    <?php if (metadata('item', 'has thumbnail')): ?>
    <div class="item-img">
        <?php echo link_to_item(item_image('square_thumbnail')); ?>
    </div>
    <?php endif; ?>

    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
    <div class="item-description">
        <?php echo $description; ?>
    </div>
    <?php endif; ?>

    <?php if ($creator = metadata('item', array('Dublin Core', 'Creator'), array('snippet'=>250))): ?>
    <div class="item-creator">
	<span>Creator:&nbsp;</span>
        <?php echo $creator; ?>
    </div>
    <?php endif; ?>

    <?php if ($notional_number = metadata('item', array('Item Type Metadata', 'Notional Number'), array('snippet'=>250))): ?>
    <div class="item-notional-number">
        <span>Notional Number:&nbsp;</span>
        <?php echo $notional_number; ?>
    </div>
    <?php endif; ?>


    <?php if (metadata('item', 'has tags')): ?>
    <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
        <?php echo tag_string('items'); ?></p>
    </div>
    <?php endif; ?>

    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

    </div><!-- end class="item-meta" -->
</div><!-- end class="item hentry" -->
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse_each', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
