
<?php 
$res=$product['PImage'];
$res=explode(",",$res);

?>

<section class="pro-menu-bar">
            <div class="pro-menu-bar-cont">
                <div class="pro-menu-left">
                    <div class="pro-menu-img">
                        <img width="100px" src="<?php echo 'uploads/products/' . $res[0]; ?>" alt="">
                    </div>
                    <div class="pro-menu-txt">
                        <p class="m-0"><?= $product['Title'] ?></p>
                        <h5> &#8377;<?= $product['SellPrice'] ?></h5>
                    </div>
                </div>
                <div class="pro-menu-right">
                    <div class="quantity m-0 mob-dis-none">
                    <a href="#" data-id="<?= 'a' . $product['p_id'] ?>" class="quantity__minus"><span>-</span></a>
                    <input name="quantity" data-id="<?= 'a' . $product['p_id'] ?>" type="text" class="quantity__input" value="1">
                    <a href="#" data-max="<?= $product['QTY'] ?>" data-id="<?= 'a' . $product['p_id'] ?>" class="quantity__plus"><span>+</span></a>

                    </div>
                    <div class="like-icn only-mob-dis">
                        <i class="bi bi-heart"></i>
                    </div>
                    <!-- <button class="crt-btn"  >
                        Add to cart
                    </button> -->
                    <button class=" addTocartBtn" data-id="<?= 'a' . $product['p_id'] ?>" value="<?= $product['p_id'] ?>">
                            <i class="bi bi-bag-heart"></i> Add to cart
                    </button>
                </div>
            </div>
        </section>

 