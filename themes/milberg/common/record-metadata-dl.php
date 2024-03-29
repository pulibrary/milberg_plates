<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <!--
    <h2><?php echo html_escape(__($setName)); ?></h2>
    -->
    <dl class="item-element-set">
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <dt id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <?php echo html_escape(__($elementName)); ?>
     </dt>
     <dd>
     <?php foreach ($elementInfo['texts'] as $text): ?>
        <div class="element-text"><?php echo $text; ?></div>
     <?php endforeach; ?>
    </dd>
    <!-- end element -->
    <?php endforeach; ?>
    </dl>
</div><!-- end element-set -->
<?php endforeach;
