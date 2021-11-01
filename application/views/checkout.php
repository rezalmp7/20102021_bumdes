

    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Checkout</h2>
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li>
                                <span>Checkout</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/page-title1.jpg" alt="About">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape16.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape17.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape18.png" alt="Shape">
        </div>
    </div>


    <div class="checkout-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Billing Details</h2>
            </div>
            <form>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-billing">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name:">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email:">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone No:">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Street*">
                            </div>
                            <div class="form-group">
                                <select>
                                    <option>Town*</option>
                                    <option>Some Option</option>
                                    <option>Another Option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select>
                                    <option>State*</option>
                                    <option>Some Option</option>
                                    <option>Another Option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select>
                                    <option>Country*</option>
                                    <option>Some Option</option>
                                    <option>Another Option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea id="your-notes" rows="4" class="form-control"
                                    placeholder="Other Notes (Optional)"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Ship To A Different Address
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn common-btn">
                                    Place Order
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-order">
                            <h3>Your Order:</h3>
                            <ul class="align-items-center">
                                <li>
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/checkout/checkout1.png" alt="Checkout">
                                </li>
                                <li>
                                    <h4>White Comfy Stool</h4>
                                </li>
                                <li>
                                    <span>$200.00</span>
                                </li>
                            </ul>
                            <ul class="align-items-center">
                                <li>
                                    <img src="<?php echo base_url(); ?>assets/client/assets/images/checkout/checkout2.png" alt="Checkout">
                                </li>
                                <li>
                                    <h4>Yellow Armchair</h4>
                                </li>
                                <li>
                                    <span>$180.00</span>
                                </li>
                            </ul>
                            <div class="inner">
                                <h3>Shipping: <span>$15.00</span></h3>
                                <h4>Total: <span>$395.00</span></h4>
                            </div>
                        </div>
                        <div class="checkout-method">
                            <h3>Payment Method:</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Direct Bank Transfer
                                </label>
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order will not be shipped until the funds have cleared in
                                    your account.</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                    value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Cash On Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                                    value="option3">
                                <label class="form-check-label" for="exampleRadios3">
                                    Paypal
                                </label>
                            </div>
                            <div class="form-check two">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">
                                    I've read and accept <a href="terms-conditions.html">terms & conditions*</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>