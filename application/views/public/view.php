
<p>Item Count: <?php echo $this->cart->total_items();?></p>
	<?php echo form_open('cart/update'); ?>

<table class="listbox" cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
  <th class="tdtop">QTY</th>
  <th class="tdtop">Item Description</th>
  <th class="tdtop">Delete</th>
  <th class="tdtop" style="text-align:right">Item Price</th>
  <th class="tdtop" style="text-align:right">Sub-Total</th>
</tr>

<?php if($this->cart->total_items() > 0): ?>
	<?php $i = 1; ?>
    
    <?php foreach($this->cart->contents() as $items): ?>
    
       
        
        <tr>
          <td>
		  <?php echo form_hidden('rowid[]', $items['rowid']); ?>
		  <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
         </td>
          <td>
            <?php echo $items['name']; ?>            
                        
                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                        
                    <p>
                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                            
                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                            
                        <?php endforeach; ?>
                    </p>
                    
                <?php endif; ?>
                    
          </td>
          <td>
          	<input type="checkbox" name="delete" value="<?php echo $items['rowid'];?>" />
          </td>
          <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
          <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>
    
    <?php $i++; ?>
    
    <?php endforeach; ?>
    


<tr>
  <td colspan="3"> </td>
  <td class="right"><strong>Total</strong></td>
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
<?php endif;
	if($this->cart->total_items() < 1):
?>

	<tr>
    	<td colspan="4">No items in your cart.</td>
    </tr>
<?php endif;?>



</table>

<p><?php echo form_submit('submit', 'Update your Cart'); ?> or <?php echo anchor('public/view_items','Continue Shopping');?></p>
<?php echo form_close();?>



