<script>
    var pin = '';
    $(document).ready(function () {
        $("#display").val('');

        $(".num").click(function (e) {
            e.preventDefault();
            addCode($(this).text());
        });
    });

    function addCode(val) {
        switch (val) {
            case "←":
                removeCode();
                break;
            case "C":
                pin = '';
                $("#display").val(pin);
                break;
            default :
                pin += val;
                $("#display").val(pin);
        }
    }
    ;
    function removeCode() {
        pin = pin.substring(0, pin.length - 1);
        $("#display").val(pin);
    }
    $(document).keydown(function (e) {
        // prevent "back button" on backspace || del keydown
        if (e.keyCode == 8 || e.keyCode == 46) {
            e.preventDefault();
            removeCode();
        }

        if (e.keyCode == 48 || e.keyCode == 96) {
            addCode(0);
        }

        if (e.keyCode == 49 || e.keyCode == 97) {
            addCode(1);
        }

        if (e.keyCode == 50 || e.keyCode == 98) {
            addCode(2);
        }

        if (e.keyCode == 51 || e.keyCode == 99) {
            addCode(3);
        }

        if (e.keyCode == 52 || e.keyCode == 100) {
            addCode(4);
        }

        if (e.keyCode == 53 || e.keyCode == 101) {
            addCode(5);
        }

        if (e.keyCode == 54 || e.keyCode == 102) {
            addCode(6);
        }

        if (e.keyCode == 55 || e.keyCode == 103) {
            addCode(7);
        }

        if (e.keyCode == 56 || e.keyCode == 104) {
            addCode(8);
        }

        if (e.keyCode == 57 || e.keyCode == 105) {
            addCode(9);
        }
        if (e.keyCode == 13) {
            e.preventDefault();
            if (pin.length != 7) {
                alert('Product number must be 7 digits in length \n without the / character. Please try again.');
                pin = '';
                $("#display").val(pin);
            }
            else {
                $("#StoreIndexForm").submit();
            }
        }
    });

</script>
<?php
$secret = 'text';
?>
<div>
    <div class="numpad">
        <div class="row numrow">
            <?php echo $this->Form->create('Store', array('type' => 'get')); ?>
            <div class="col-xs-12" style="padding: 10px 5px">
                <?php echo $this->Form->input('product_id', array(
                    'label' => false,
                    'readonly' => true,
                    'class' => 'shadow',
                    'id' => 'display',
                    'type' => $secret,
                )); ?>
            </div>
        </div>
        <div class="row numrow">
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(7, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(8, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(9, array(
                    'class' => 'btn btn-default btn-lg num shadow',
                )); ?>
            </div>
        </div>

        <div class="row numrow">
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(4, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(5, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(6, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
        </div>
        <div class="row numrow">
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(1, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(2, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(3, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
        </div>
        <div class="row numrow">
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button('C', array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button(0, array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
            <div class="col-xs-4 numnone">
                <?php echo $this->Form->button('←', array(
                    'class' => 'btn btn-default btn-lg num shadow'
                )); ?>
            </div>
        </div>
        <div class="row numrow">
            <div class="col-xs-12" style="padding: 5px 2px">
                <?php echo $this->Form->button('Check', array(
                    'class' => 'btn btn-default btn-lg check shadow'
                )); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>