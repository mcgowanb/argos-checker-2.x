<div class="all">
    <div class="row">
        <div class="col-xs-2">
            <?php echo $this->Element('keypad'); ?>
        </div>
        <?php
        if ($result['status']) {
            echo $this->Element('details');
        } else {
            echo $this->Element('not_found');
        }
        ?>
    </div>
</div>
