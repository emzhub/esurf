
	
    <h2><?php echo $page_title;?></h2>
    
    
    <ul>
	<?php foreach($items->result() as $item): ?>
   	 
	 
    	
        <li>
			<?php echo form_open('cart/add');?>
			<?php echo $item->product_sku;?><br />
        	[<?php echo $item->product_description;?>] 
            <?php echo form_hidden('product_id',$item->product_id);?>
			<?php echo form_submit('submit_'.$item->product_id,'Buy Now');?>
			<?php echo form_close();?> 
        </li>
    	
     
       
    <?php endforeach;?>
    </ul>
    
	
