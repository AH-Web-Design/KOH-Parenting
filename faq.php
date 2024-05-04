<?php
/*
	Template name: Faq
*/
	get_header();
	?>

	<div class="inr-ban">     
    	<img class="img-fluid" src="<?php echo bloginfo('template_url')?>/images/inr-ban.jpg" alt="" />
    </div>
    <div class="clearfix"></div>
    
    <section class="main-wrap">
    	<div class="container">
        	<h2 class="main-title">FAQ’s</h2>
            
            <div class="row mt-5">
            	<div class="col-md-10 offset-md-1">
                        <div class="accordion-prt">
                            <div id="accordion">
<?php
						$i=1;
						if( have_rows('faq_list') ):
							while ( have_rows('faq_list') ) : the_row();
								$title = get_sub_field('faq_title');
								$content = get_sub_field('faq_content');
								?>

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <button class="btn" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne"><?php echo $title;?> <i class="fa" aria-hidden="true"></i></button>
                                    </div>
                            
                                    <div id="collapse<?php echo $i; ?>" <?php if($i==1) { ?>class="collapse show"<?php }else{ ?>class="collapse" <?php } ?> aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                               <?php echo $content;?>
                                        </div>
                                    </div>
                                </div>
                        <?php
								$i++;
							endwhile;


						else :
							?>

							no rows found
							<?php
						endif;
						?>

                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>




	
	<?php
	get_footer();
	?>