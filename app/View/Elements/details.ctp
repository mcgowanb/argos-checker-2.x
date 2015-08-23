<div class="col-xs-10">
    <div class="row">
        <div class="col-xs-8">
            <h4><?php echo $result['title']; ?></h4><br>
            Price: <?php echo $this->Number->currency($result['pCode'], 'EUR', array(
                'thousands' => ',',
                'decimals' => '.'
            )); ?>
            <hr>
            <?php echo $result['desc']; ?>
        </div>
        <div class="col-xs-4">
            <?php echo $this->Html->link($this->Html->image($result['imgUrl'], array(
                'alt' => $result['alt']
            )), $result['url'], array(
                'target' => '_blank',
                'escape' => false
            ));
            ?>
        </div>
    </div>
</div>