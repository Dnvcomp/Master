<?php if($sliders): ?>
    <div class="bnr" id="home">
        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                <?php foreach ($sliders as $slider): ?>
                    <li>
                        <img src="/public/images/<?=$slider->img; ?>" alt="<?= $slider->title; ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
<?php endif; ?>

<?php if($brands): ?>
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            <?php foreach ($brands as $brand): ?>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="/public/images/<?=$brand->img; ?>" alt="<?=$brand->title; ?>">
                        <figcaption>
                            <h2><?=$brand->title; ?></h2>
                            <p><?=$brand->description; ?></p>
                        </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php endif; ?>

<!--product-starts-->
<?php if($hits): ?>
<?php $curr = \dnvmaster\App::$app->getProperty('currency'); ?>
<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                <?php foreach ($hits as $hit): ?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="product/<?=$hit->alias; ?>" class="mask"><img class="img-responsive zoom-img" src="/public/images/<?= $hit->img; ?>"  alt="<?= $hit->title; ?>" /></a>
                        <div class="product-bottom">
                            <h3><a href="product/<?= $hit->alias; ?>"><?= $hit->alias; ?></a></h3>
                            <p><?= $hit->content; ?></p>
                            <h4>
                                <a class="add-to-cart-link" href="cart/add?id=<?= $hit->id; ?>"><i></i></a>
                                <span class=" item_price"><?= $curr['symbol_left']; ?> <?= $hit->price * $curr['value']; ?></span>
                                <?php if($hit->old_price): ?>
                                    <smail>
                                        <del>
                                            <?= $hit->old_price * $curr['value']; ?>
                                        </del>
                                    </smail>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <!--
                        <div class="srch">
                            <span>-50%</span>
                        </div>
                        -->
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>