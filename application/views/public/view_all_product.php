<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br><br>
<br>
<br>

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
     <!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
            <div class="well well-small ">
                    <a id="myCart" href="#"><img src="../../../../assets/themes/images/ico-cart.png" alt="cart"> 
                    8
                  Itemes in your cart  </a>
                </div>
   	<ul id="sideManu" class="nav nav-tabs nav-stacked">
        <?php foreach ($sector as $menu) { ?>
            <li class="subMenu"><a><?= $menu->sector_name ?></a>
                 <ul>
            <?php
            if (isset($menu->children)) {
                foreach ($menu->children as $child) {
                    ?>
                 <li>
                   <a href="    <?= base_url('public/client/views/'.$child->category_id.'/'.$child->sector_id.'')   ?>">
                <i class="icon-chevron-right"></i><?=  $child->category_name ?>   </a> </li>
                    <?php
                }
            }
            ?>
                   </ul>
        </li>
        <?php } ?>
    </ul>    

		
		<br/>
		 
	</div>
<!-- Sidebar end=============================================== -->
            
          <div class="span9">		
	
		<h4>Latest Products </h4>
			  <ul class="thumbnails col-md-push-3">
                       <?php foreach ($product as $menu) { ?>           
                             <ul>
           
                                 <li class="span4">
				  <div class="thumbnail">
                                      <a  href="<?= base_url('public/client/viewt/'.$menu->post_title.'/'.$menu->post_content.'/'.$menu->post_id.'')   ?>"><img src="<?= base_url('files/product/'.$menu->post_title.'/'.$menu->post_content.'/'.$menu->post_id.'.png')   ?>" alt=""/></a>
					<div class="caption">
					   <h5><?=  $menu->name ?> </h5>
					  <p> 
						<?=  $menu->descr ?>  
					  </p>				 
					  <h4 style="text-align:center"><a class="btn" href="#"> <i class="icon-zoom-in"></i></a> 
                                          <a class="btn" href="<?= base_url('public/client/viewt/'.$menu->post_title.'/'.$menu->post_content.'/'.$menu->post_id.'')   ?>">Add to <i class="icon-shopping-cart"></i></a> 
                                          <a class="btn btn-primary" href="#">$<?=  $menu->price ?> </a></h4>
					</div>
				  </div>
				</li>
                                    <?php
                }
                     ?>
                   </ul>  
                           
                          </ul>             
		</div>
            
		</div>
	</div>
</div>
