<br><br><br><br><br>
<div class="span9">
    <ul class="breadcrumb">
    <li class="active"><a href="<?php echo site_url('public');?>">Home</a> <span class="divider">/</span></li>
    </ul>	
	<div class="row">
           
			<div id="gallery" class="span3">
                              <?php foreach ($it as $child) { ?>
                                        <a  href="<?= base_url('public/client/view/'.$child->post_title.'/'.$child->post_content.'/'. $child->post_id.'')   ?>">
			<img src="<?= base_url('files/product/'.$child->post_title.'/'.$child->post_content.'/'. $child->post_id.'.png')   ?>" alt=""/>
            </a>
                              <?php	  }  
            ?>
			</div>
			<div class="span6">
				<h3><?=$child->name?>  </h3>
<!--				<small>- (14MP, 18x Optical Zoom) 3-inch LCD</small>-->
				<hr class="soft"/>
				<form class="form-horizontal  form-item">
				  <div class="control-group">
					<label class="control-label"><span>$<?=$child->price?></span></label>
					<div class="controls">
                                            <input name="product_code" type="hidden" value="">
					<input type="number" class="span1" placeholder="Qty." name="product_qty" id="product_qty"/>
                                                <?php
                                    if($child->qt > 0){
                                        ?>         <button type="submit"  onclick="postComment()" id="btn_post" class="btn btn-large btn-primary pull-right"><i class="icon-shopping-cart"></i><span id="a_txt"> Add to Cart</span></button>
                                    <?php }  else {
                                echo' <button type="submit"  id="btn_post" disabled="" class="btn btn-large btn-primary pull-right"><i class="icon-shopping-cart"></i><span id="a_txt"> Add to Cart</span></button>';
                            }  ?>
                                        

<!--					  <button type="submit" class="btn btn-large btn-primary pull-right" onclick="postComment()" id="btn_post"> Add to cart <i class=" icon-shopping-cart"></i></button>-->
					</div>
				  </div>
				
				
				<hr class="soft"/>
				<h4>
                                  <?php
                                    if($child->qt > 0){
                                ?>        <?=$child->qt;?> items in stock</h4>
                                    <?php }  else {
                                echo"<h4> Sold out....</h4>";
                            }  ?>
				  <div class="control-group">
					<label class="control-label"><span>Color Available</span></label>
					<div class="controls">
					   <select name="colo" id="colo"  class="form-control">
                                      <option value="">Select Color</option>         
                                        <?php foreach ($color as $col) { ?>
                                        <option value="<?=$col->cob?>"><?=$col->cob?></option>
					            <?php	    }
            ?>		  
                               </select>
					</div>
				  </div>
				</form>
                                 
				<hr class="soft clr"/>
				<p>
			<?=$child->descr?>
				</p>
<!--				<a class="btn btn-small pull-right" href="#detail">More Details</a>-->
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
</div>
</div>   
