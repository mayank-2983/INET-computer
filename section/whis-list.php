<div class="cart-wrap">
		<div class="container">
	        <div class="row">
			    <div class="col-md-12">
			        <div class="main-heading mb-10">My wishlist</div>
			        <div class="table-wishlist">
				        <table cellpadding="0" cellspacing="0" border="0" width="100%">
				        	<thead>
					        	<tr>
					        		<th width="45%">Product Name</th>
					        		<th width="15%">Unit Price</th>
					        		<th width="15%">Stock Status</th>
					        		<th width="15%"></th>
					        		<th width="10%"></th>
					        	</tr>
					        </thead>
					        <tbody>

							<?php 
								$u_id = "";
                        		if(isset($_COOKIE['u_id'])){
                        		    $u_id = $_COOKIE['u_id'];
                        		}else{
                        		    $u_id = $_SESSION['u_id'];
                        		}

								
								
								$view_wishllist = mysqli_query($con,"SELECT * from wishlist, product where product.p_id = wishlist.p_id and wishlist.u_id='$u_id' ");
								if (mysqli_num_rows($view_wishllist) == 0) {
					
								    echo '<tr><td colspan="8" align="center" class="text-center">No Wish List</td></tr>';
				
								}else{
									while($wish = mysqli_fetch_array($view_wishllist)){
										$res=$wish['PImage'];
										$res=explode(",",$res);
							?>
									<tr>
					        		<td width="45%">
					        			<div class="display-flex align-center">
		                                    <div class="img-product">
		                                        <img src="<?php echo 'uploads/products/'.$res[0]; ?>" alt="" class="mCS_img_loaded">
		                                    </div>
		                                    <div class="name-product">
		                                        <?= $wish['Title'] ?>
		                                    </div>
	                                    </div>
	                                </td>
					        		<td width="15%" class="price">&#8377;<?= $wish['SellPrice'].'.00' ?></td>

									<?php
									
									if($wish['QTY'] ==0){
										?>
											<td width="15%"><span class="out-stock-box">Out Stock</span></td>
										<?php
									}else{
										?>
											<td width="15%"><span class="in-stock-box">In Stock</span></td>
										<?php
									}
									
									?>
					        		

					        		
					        		<td width="15%"><a href="product.php?p_id=<?= $wish['p_id'] ?>" class="round-black-btn small-btn">view</a></td>
					        		<td width="10%" class="text-center"><a href="delwish.php?w_id=<?= $wish['w_id'] ?>" class="trash-icon"><i class="bi bi-trash text-danger"></i></a></td>
					        	</tr>
					        	

							<?php
									}
								}
									
								
							?>

					        	</tbody>
				        </table>
						<hr>
				    </div>
			    </div>
			</div>
		</div>
	</div>