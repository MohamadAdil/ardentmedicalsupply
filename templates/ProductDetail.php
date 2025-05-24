<?php
/* Template Name: ProductDetail */
get_header();
?>
<style>
    .rate {
        margin-bottom: 24px;
    }

    .rate span {
        font-size: 26px;
        line-height: 29px;
        font-weight: 500;
        color: #666666;
    }

    .rate .og-price {
        text-decoration: line-through;
        font-size: 16px;
    }

    .instocks {
        margin-left: 16px;
        padding-left: 7px;
        border-left: 1px solid #E5E5E5;
        /* height: 33px; */
        color: #2EB000 !important;
        font-size: 16px;
        line-height: 29px;
        font-weight: 500;
    }

    .heading-txt h2 {
        margin-bottom: 20px;
    }

    .heading-txt p {
        font-size: 16px;
        line-height: 29px;
        font-weight: 400;
        color: #666666;
    }

    button.cart-product-button.button {
        width: 36px;
        height: 49px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .prd-dtll.txt .heading-txt {
        margin-bottom: 22px;
    }

    .cart-and span {
        padding: 0 12px;
        border-left: 1px solid #E5E5E5;
    }

    .cart-and {
        margin-bottom: 36px;
    }

    .prd-btn {
        margin-bottom: 24px;
    }

    .prd-btn a {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-fe-wrap.hero-fe-product {
        padding: 17px 9px;
    }

    .hero-fe-product .hero-fe-item {
        padding: 0px;
    }

    .hero-fe-product .hero-fe-txt h6 {
        font-size: 9px;
        line-height: 13px;
    }

    .hero-fe-txt p {
        font-size: 9px;
        line-height: 13px;
    }

    .control.minus button {
        background-color: transparent;
        border: 1px solid #E5E5E5;
        border-radius: 5px 0px 0px 5px;
    }

    .control.plus button {
        background-color: #fa8232;
        border: 1px solid #E5E5E5;
        border-radius: 0px 5px 5px 0;
        color: #fff;
    }

    .control input.input.cart-qnt-input {
        width: 89px !important;
        height: 49px;
    }

    .wishlist a,
    .compare a {
        padding: 12px 21px;
        border-radius: 5px;
        border: 1px solid #E5E5E5;
        font-size: 16px;
        line-height: 26px;
        font-weight: 500;
    }

    /* rev */
    .rev-star-wrap {
        display: flex;
        border-radius: 15px;
        gap: 40px;
        height: 200px;
    }

    .chart {
        /* width: 500px; */
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        height: 100%;
    }

    .chart .rate-box {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        height: 30px;
        padding: 20px 0;
        padding: 10px;
    }

    .chart .rate-box>* {
        height: 100%;
        display: flex;
        align-items: center;
        font-weight: 500;
        color: #444;
    }

    .rate-box .value {
        display: flex;
        align-items: center;
    }

    .rate-box .value:hover {
        color: #66bb6a;
    }

    .chart .value {
        font-size: 30px;
        cursor: pointer;
    }

    .rate-box .progress-bar {
        border-width: 1px;
        position: relative;
        background-color: #cfd8dc91;

        height: 10px;
        border-radius: 100px;
        width: 350px;
    }

    .rate-box .progress-bar .progress {
        background-color: #66bb6a;
        height: 100%;
        border-radius: 100px;
        transition: 300ms ease-in-out;
    }

    .global {
        height: 100%;
        width: 150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .one .fas {
        color: #cfd8dc;
    }

    .two {
        background: linear-gradient(to right, #66bb6a 0%, transparent 0%);
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent;
        transition: 0.5s ease-in-out all;
    }

    .global>span {
        font-size: 90px;
        font-weight: 500;
    }

    .rating-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        width: 100%;
        height: 10%;
    }

    .rating-icons span {
        position: absolute;
        display: flex;
        font-size: 30px;
        left: 50%;
        transform: translateX(-50%);
        margin-bottom: 5px;
    }

    .total-reviews {
        font-size: 25px !important;
    }

    /* rev end */
</style>

<section class="prd-dtll">
    <div class="container">
        <div class="prd-dtll-wrap">
            <div class="row">
                <div class="col-lg-4">
                    <div class="prd-dtll-img">

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="prd-dtll txt">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Product Listing</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                            </ol>
                        </nav>
                        <div class="heading-txt">
                            <h2 class="common-h2">Motif Twist Double Electric Breast Pump</h2>
                            <div class="rate d-flex align-item-center">
                                <span>$129.00 <span class="og-price">$150.00</span></span>
                                <span class="instocks">In Stock</span>
                            </div>
                            <p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>
                        <div class="cart-and d-flex align-item-center">
                            <div class="cart-qnt-counter d-flex align-item-center">
                                <div class="control minus">
                                    <button class="cart-product-button button">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <div class="control">
                                    <input class="input cart-qnt-input" size="1" value="2" type="number" placeholder="2" style="width: 4ch;">
                                </div>
                                <div class="control plus">
                                    <button class="cart-product-button button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <span></span>
                            <div class="wishlist">
                                <a href="#" class="btn">wishlist</a>
                            </div>
                            <span></span>
                            <div class="compare">
                                <a href="#" class="btn">compare</a>
                            </div>
                        </div>

                        <div class="prd-btn">
                            <a href="#" class="btn btn-main">Add to card</a>
                        </div>
                        <div class="hero-fe-wrap hero-fe-product">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="hero-fe-item">
                                        <div class="hero-fe-img">
                                            <img width="40" height="40" src="http://49.249.236.30:2425/ardentmedicalsupply/wp-content/uploads/2024/02/fast-delivery.svg" class="attachment-full size-full" alt="" decoding="async">
                                        </div>
                                        <div class="hero-fe-txt">
                                            <h6>
                                                Fasted Delivery </h6>
                                            <p>
                                                Delivery in 24/H </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="hero-fe-item">
                                        <div class="hero-fe-img">
                                            <img width="40" height="40" src="http://49.249.236.30:2425/ardentmedicalsupply/wp-content/uploads/2024/02/24-hr.svg" class="attachment-full size-full" alt="" decoding="async">
                                        </div>
                                        <div class="hero-fe-txt">
                                            <h6>
                                                24 Hours Return </h6>
                                            <p>
                                                100% money-back guarantee </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="hero-fe-item">
                                        <div class="hero-fe-img">
                                            <img width="40" height="40" src="http://49.249.236.30:2425/ardentmedicalsupply/wp-content/uploads/2024/02/secure-pay.svg" class="attachment-full size-full" alt="" decoding="async">
                                        </div>
                                        <div class="hero-fe-txt">
                                            <h6>
                                                Secure Payment </h6>
                                            <p>
                                                Your money is safe </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="hero-fe-item">
                                        <div class="hero-fe-img">
                                            <img width="40" height="40" src="http://49.249.236.30:2425/ardentmedicalsupply/wp-content/uploads/2024/02/support-24.svg" class="attachment-full size-full" alt="" decoding="async">
                                        </div>
                                        <div class="hero-fe-txt">
                                            <h6>
                                                Support 24/7 </h6>
                                            <p>
                                                Live contact/message </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="tabs">
    <div class="container">
        <div class="tabs-wrap">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">Profile</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum&nbsp;is simply
                        dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s. Lorem Ipsum&nbsp;is simply dummy text of the
                        printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                        text ever since the 1500s. Lorem Ipsum&nbsp;is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                        the 1500s. Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem
                        Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s.</p>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse maiores provident aliquid
                        inventore repellendus corporis laudantium incidunt, quasi fugit modi temporibus cum eum
                        pariatur blanditiis vero quidem doloribus repellat excepturi!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="reviews">
    <div class="container">
        <div class="rev-wrap">
            <div class="heading d-flex align-item-center justify-content-between">
                <h2 class="common-h2">Customer Reviews</h2>
                <div class="btnrev">
                    <a href="#" class="btn">Write a review</a>
                </div>
            </div>
            <div class="rev-star-wrap">
                <div class="global">
                    <span class="global-value">0.0</span>
                    <div class="rating-icons">
                        <span class="one"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                        <span class="two"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                    </div>
                    <span class="total-reviews">0</span>
                </div>
                <div class="chart">
                    <div class="rate-box">
                        <span class="value">5</span>
                        <div class="progress-bar">
                            <span class="progress"></span>
                        </div>
                        <span class="count">0</span>
                    </div>
                    <div class="rate-box">
                        <span class="value">4</span>
                        <div class="progress-bar"><span class="progress"></span></div>
                        <span class="count">0</span>
                    </div>
                    <div class="rate-box">
                        <span class="value">3</span>
                        <div class="progress-bar"><span class="progress"></span></div>
                        <span class="count">0</span>
                    </div>
                    <div class="rate-box">
                        <span class="value">2</span>
                        <div class="progress-bar"><span class="progress"></span></div>
                        <span class="count">0</span>
                    </div>
                    <div class="rate-box">
                        <span class="value">1</span>
                        <div class="progress-bar"><span class="progress"></span></div>
                        <span class="count">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="client-rev-sec">
    <div class="container">
        <div class="clents-rev-wrap row">
            <div class="cl-img col-sm-1">
                <img src="./images/blog-detail-3.png" alt="" style="width: 80px; height: 80px;">
            </div>
            <div class="clents-rev-text col-sm-11">
                <div class="top-txt d-flex justify-content-between">
                    <div class="lft">
                        <h4>Viola Lucas</h4>
                        <h6>August 13, 2022</h6>
                        <span class="">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                    <div class="btnrev">
                        <a href="#" class="btn">Write a review</a>
                    </div>
                </div>
                <p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>
            </div>
        </div>
        <div class="clents-rev-wrap row">
            <div class="cl-img col-sm-1">
                <img src="./images/blog-detail-3.png" alt="" style="width: 80px; height: 80px;">
            </div>
            <div class="clents-rev-text col-sm-11">
                <div class="top-txt d-flex justify-content-between">
                    <div class="lft">
                        <h4>Viola Lucas</h4>
                        <h6>August 13, 2022</h6>
                        <span class="">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                    <div class="btnrev">
                        <a href="#" class="btn">Write a review</a>
                    </div>
                </div>
                <p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
