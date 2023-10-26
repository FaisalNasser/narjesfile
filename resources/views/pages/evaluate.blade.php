<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FormWizard_v8</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- <link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css"> -->


    <meta name="robots" content="noindex, follow">
    <style>
        @font-face {
            font-family: lato-regular;
            src: url(../fonts/lato/Lato-Regular.ttf)
        }

        @font-face {
            font-family: lato-black;
            src: url(../fonts/lato/Lato-Black.ttf)
        }

        @font-face {
            font-family: lato-bold;
            src: url(../fonts/lato/Lato-Bold.ttf)
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        :focus {
            outline: none
        }

        textarea {
            resize: none
        }

        input,
        textarea,
        select,
        button {
            font-family: lato-regular;
            font-size: 14px
        }

        select {
            -moz-appearance: none;
            -webkit-appearance: none;
            cursor: pointer
        }

        select option[value=""][disabled] {
            display: none
        }

        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        ul {
            margin: 0
        }

        ul {
            padding: 0;
            margin: 0;
            list-style: none
        }

        a {
            text-decoration: none
        }

        textarea {
            resize: none
        }

        img {
            max-width: 100%;
            vertical-align: middle
        }

        .wrapper {
            width: 826px;
            height: 620px;
            padding: 63px 90px 0;
            background: #fff
        }

        .wizard {
            position: relative
        }

        .steps .current-info,
        .steps .number {
            display: none
        }

        .steps ul {
            display: flex;
            justify-content: center;
            margin-bottom: 35px
        }

        .steps ul li {
            margin-right: 10.8%;
            position: relative
        }

        .steps ul li:last-child {
            margin-right: 0
        }

        .steps ul li .step-arrow {
            position: absolute;
            top: 33%;
            left: 113%;
            max-width: 57%
        }

        .steps ul li .step-order {
            display: block;
            text-align: center;
            text-transform: uppercase;
            font-size: 12px;
            color: #666;
            margin-top: 14px
        }

        h3 {
            font-family: lato-black;
            font-size: 20px;
            color: #333;
            text-transform: uppercase;
            text-align: center;
            font-weight: 900;
            letter-spacing: 2px;
            margin-bottom: 29px;
            font-weight: 900
        }

        .form-row {
            display: flex;
            margin-bottom: 20px
        }

        .form-row .form-holder {
            width: 50%;
            margin-right: 20px
        }

        .form-row .form-holder:last-child {
            margin-right: 0
        }

        .form-row .form-holder.w-100 {
            width: 100%;
            margin-right: 0
        }

        .form-row .form-group {
            width: 50%;
            display: flex
        }

        .form-row .form-group .form-holder {
            margin-right: 21px
        }

        .form-row .form-group .form-holder:last-child {
            margin-right: 0
        }

        .form-holder {
            position: relative
        }

        .form-holder i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 20px;
            font-size: 16px
        }

        .form-holder i.zmdi-eye {
            cursor: pointer
        }

        .form-control {
            height: 42px;
            border: 1px solid #e6e6e6;
            width: 100%;
            background: 0 0;
            padding: 0 35px 0 19px;
            color: #999
        }

        .form-control:focus {
            border-color: #8eb852
        }

        .form-control::-webkit-input-placeholder {
            color: #999
        }

        .form-control::-moz-placeholder {
            color: #999
        }

        .form-control:-ms-input-placeholder {
            color: #999
        }

        .form-control:-moz-placeholder {
            color: #999
        }

        .actions {
            margin-top: 30px
        }

        .actions ul {
            display: flex;
            justify-content: space-between
        }

        .actions ul.step-4 {
            justify-content: center
        }

        .actions ul.step-4 li:first-child {
            display: none
        }

        .actions li a {
            border: none;
            display: inline-flex;
            height: 42px;
            width: 132px;
            align-items: center;
            color: #fff;
            cursor: pointer;
            background: #8eb852;
            text-transform: uppercase;
            justify-content: center;
            letter-spacing: 1px;
            font-size: 15px;
            border-radius: 3px
        }

        .actions li a:hover {
            background: #a1d15e
        }

        .actions li:first-child a {
            width: 97px
        }

        .actions li:last-child a {
            width: 234px
        }

        table.cart {
            width: 100%;
            font-size: 15px;
            margin-bottom: 17px
        }

        table.cart th {
            font-family: lato-bold;
            color: #666;
            padding: 9px 0;
            border-bottom: 1px solid #e6e6e6
        }

        table.cart td {
            padding: 13px 0;
            border-bottom: 1px solid #e6e6e6
        }

        table.cart tr:last-child td {
            border: none
        }

        table.cart tr:last-child td {
            padding-bottom: 0
        }

        table.cart .item-thumb {
            display: inline-block;
            border: 1px solid #e6e6e6
        }

        table.cart .product-thumb {
            width: 17.49%
        }

        table.cart .product-detail {
            width: 22.45%
        }

        table.cart .product-detail a {
            font-family: lato-bold;
            color: #666;
            display: block;
            margin-bottom: 6px
        }

        table.cart .product-detail span {
            color: #999
        }

        table.cart .product-quantity {
            width: 16.25%
        }

        table.cart .product-quantity .quantity {
            display: inline-block;
            width: 105px;
            height: 36px;
            background: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center
        }

        table.cart .product-quantity span {
            cursor: pointer;
            display: inline-block;
            flex-grow: 1;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center
        }

        table.cart .product-quantity input {
            border: none;
            padding: 0;
            width: 17px;
            font-size: 15px;
            color: #666;
            background: 0 0;
            text-align: center
        }

        table.cart .product-quantity input::-webkit-outer-spin-button,
        table.cart .product-quantity input::-webkit-inner-spin-button {
            -webkit-appearance: none
        }

        table.cart .total-price {
            width: 39.78%;
            text-align: center
        }

        table.cart .total-price span {
            font-family: lato-bold;
            color: #92c752;
            font-weight: 700
        }

        table.cart .product-remove {
            width: 4.03%;
            text-align: right
        }

        table.cart .product-remove a {
            color: #666
        }

        .cart_totals {
            font-size: 15px;
            color: #666;
            width: 66.56%;
            margin: auto;
            margin-bottom: 31px
        }

        .cart_totals table {
            width: 100%
        }

        .cart_totals th,
        .cart_totals td {
            padding: 11px 0;
            vertical-align: top;
            text-align: left
        }

        .cart_totals th {
            font-family: lato-bold;
            color: #333;
            text-align: left;
            width: 65.81%
        }

        .cart_totals th span {
            color: #999;
            font-size: 14px
        }

        .cart_totals .order-total th,
        .cart_totals .order-total td {
            padding: 12px 0;
            color: #333;
            font-family: lato-bold
        }

        .checkbox label {
            padding-left: 21px;
            cursor: pointer;
            display: block;
            position: relative;
            margin-bottom: 13px
        }

        .checkbox label span {
            font-family: lato-bold
        }

        .checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer
        }

        .checkbox input:checked~.checkmark:after {
            display: block
        }

        .checkbox .checkmark {
            position: absolute;
            top: 3px;
            left: 0;
            height: 13px;
            width: 13px;
            border-radius: 50%;
            border: 1px solid #999
        }

        .checkbox .checkmark:after {
            content: "";
            top: 2px;
            left: 2px;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #999;
            position: absolute;
            display: none
        }

        @media(max-width:991px) {
            .steps ul li .step-arrow {
                top: 45%;
                left: 102%
            }

            .cart_totals {
                width: 74%
            }
        }

        @media(max-width:767px) {
            body {
                background: 0 0;
                height: auto;
                display: block
            }

            .steps ul li .step-arrow {
                top: 35%
            }

            .wrapper {
                width: auto;
                padding: 0;
                height: auto
            }

            .wizard {
                height: auto;
                padding: 40px 20px 20px
            }

            .form-row {
                display: block
            }

            .form-row .form-holder {
                width: 100%;
                margin-right: 0;
                margin-bottom: 25px
            }

            .form-row .form-group {
                width: 100%;
                display: block
            }

            .actions ul {
                flex-direction: column;
                align-items: flex-end
            }

            .actions ul li {
                margin-bottom: 20px
            }

            .cart_totals {
                width: 100%
            }

            .cart_totals .shipping th,
            .cart_totals .shipping td {
                display: block;
                text-align: left
            }

            .cart_totals td {
                text-align: right
            }

            .cart_totals th {
                width: 80%
            }

            table.cart th {
                display: none
            }

            table.cart td {
                display: flex;
                align-items: center;
                justify-content: space-between;
                border: none
            }

            table.cart td:before {
                content: attr(data-title);
                font-weight: 700;
                color: #333
            }

            table.cart .product-thumb,
            table.cart .product-detail,
            table.cart .product-quantity,
            table.cart .total-price,
            table.cart .product-remove {
                width: 100%
            }

            table.cart .product-thumb,
            table.cart .product-remove {
                justify-content: center
            }

            table.cart tr:first-child td:last-child {
                padding-bottom: 30px
            }

            table.cart tr:last-child td {
                padding-bottom: 13px
            }

            table.cart tr:last-child td:first-child {
                padding-top: 30px;
                border-top: 1px solid #e6e6e6
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="" id="wizard">

            <h4></h4>
            <section>
                <h3>Basic details</h3>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-account"></i>
                        <input type="text" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-holder">
                        <i class="zmdi zmdi-account"></i>
                        <input type="text" class="form-control" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-email"></i>
                        <input type="text" class="form-control" placeholder="Email ID">
                    </div>
                    <div class="form-holder">
                        <i class="zmdi zmdi-account-box-o"></i>
                        <input type="text" class="form-control" placeholder="Your User ID">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-map"></i>
                        <input type="text" class="form-control" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <div class="form-holder">
                            <i class="zmdi zmdi-pin"></i>
                            <input type="text" class="form-control" placeholder="State">
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-pin-drop"></i>
                            <input type="text" class="form-control" placeholder="City">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-smartphone-android"></i>
                        <input type="text" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-holder password">
                        <i class="zmdi zmdi-eye"></i>
                        <input type="password" class="form-control" placeholder="Reference Coder">
                    </div>
                </div>
            </section>

            <h4></h4>
            <section>
                <h3>Password change</h3>
                <div class="form-row">
                    <div class="form-holder w-100">
                        <input type="password" class="form-control" placeholder="Current Password">
                        <i class="zmdi zmdi-lock-open"></i>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder w-100">
                        <input type="password" class="form-control" placeholder="Enter the Current Password">
                        <i class="zmdi zmdi-lock-open"></i>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder w-100">
                        <input type="password" class="form-control" placeholder="New Password">
                        <i class="zmdi zmdi-lock-open"></i>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder w-100">
                        <input type="password" class="form-control" placeholder="Confirm New Password">
                        <i class="zmdi zmdi-lock-open"></i>
                    </div>
                </div>
            </section>

            <h4></h4>
            <section>
                <h3 style="margin-bottom: 16px;">My Cart</h3>
                <table cellspacing="0" class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table">
                    <thead>
                        <th>&nbsp;</th>
                        <th style="text-align: left;">Product Detail</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product-thumb">
                                <a href="#" class="item-thumb">
                                    <img src="images/item-1.jpg" alt="">
                                </a>
                            </td>
                            <td class="product-detail" data-title="Product Detail">
                                <div>
                                    <a href="#">Cherry</a>
                                    <span>$</span>
                                    <span>35</span>
                                </div>
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <span class="plus">+</span>
                                    <input type="number" id="quantity_5b4f198d958e1" class="input-text qty text" step="1" min="0" max="" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                    <span class="minus">-</span>
                                </div>
                            </td>
                            <td class="total-price" data-title="Total Price">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                    70
                                </span>
                            </td>
                            <td class="product-remove">
                                <a href="#">
                                    <i class="zmdi zmdi-close-circle-o"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product-thumb">
                                <a href="#" class="item-thumb">
                                    <img src="images/item-2.jpg" alt="">
                                </a>
                            </td>
                            <td class="product-detail" data-title="Product Detail">
                                <div>
                                    <a href="#">Mango</a>
                                    <span>$</span>
                                    <span>2035</span>
                                </div>
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <span class="plus">+</span>
                                    <input type="number" id="quantity_5b4f198d958e1" class="input-text qty text" step="1" min="0" max="" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                    <span class="minus">-</span>
                                </div>
                            </td>
                            <td class="total-price" data-title="Total Price">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                    20
                                </span>
                            </td>
                            <td class="product-remove">
                                <a href="#">
                                    <i class="zmdi zmdi-close-circle-o"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <h4></h4>
            <section>
                <h3>Cart Totals</h3>
                <div class="cart_totals">
                    <table cellspacing="0" class="shop_table shop_table_responsive">
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td data-title="Subtotal">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>110.00
                                </span>
                            </td>
                        </tr>
                        <tr class="cart-subtotal shipping">
                            <th>Shipping:</th>
                            <td data-title="Subtotal">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="shipping" checked> Free Shipping
                                        <span class="checkmark"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="shipping"> Local pickup: <span>$</span><span>0.00</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <span>Calculate shipping</span>
                            </td>
                        </tr>
                        <tr class="cart-subtotal">
                            <th>Service <span>(estimated for Vietnam)</span></th>
                            <td data-title="Subtotal">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>5.60
                                </span>
                            </td>
                        </tr>
                        <tr class="order-total border-0">
                            <th>Total</th>
                            <td data-title="Total">
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>64.69
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </form>
    </div>
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->

    <!-- <script src="js/jquery.steps.js"></script>
    <script src="js/main.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>



    <script>
        /*!
         * jQuery Steps v1.1.0 - 09/04/2014
         * Copyright (c) 2014 Rafael Staib (http://www.jquery-steps.com)
         * Licensed under MIT http://www.opensource.org/licenses/MIT
         */
        ;
        (function($, undefined) {
            $.fn.extend({
                _aria: function(name, value) {
                    return this.attr("aria-" + name, value);
                },
                _removeAria: function(name) {
                    return this.removeAttr("aria-" + name);
                },
                _enableAria: function(enable) {
                    return (enable == null || enable) ? this.removeClass("disabled")._aria("disabled", "false") : this.addClass("disabled")._aria("disabled", "true");
                },
                _showAria: function(show) {
                    return (show == null || show) ? this.show()._aria("hidden", "false") : this.hide()._aria("hidden", "true");
                },
                _selectAria: function(select) {
                    return (select == null || select) ? this.addClass("current")._aria("selected", "true") : this.removeClass("current")._aria("selected", "false");
                },
                _id: function(id) {
                    return (id) ? this.attr("id", id) : this.attr("id");
                }
            });
            if (!String.prototype.format) {
                String.prototype.format = function() {
                    var args = (arguments.length === 1 && $.isArray(arguments[0])) ? arguments[0] : arguments;
                    var formattedString = this;
                    for (var i = 0; i < args.length; i++) {
                        var pattern = new RegExp("\\{" + i + "\\}", "gm");
                        formattedString = formattedString.replace(pattern, args[i]);
                    }
                    return formattedString;
                };
            }
            var _uniqueId = 0;
            var _cookiePrefix = "jQu3ry_5teps_St@te_";
            var _tabSuffix = "-t-";
            var _tabpanelSuffix = "-p-";
            var _titleSuffix = "-h-";
            var _indexOutOfRangeErrorMessage = "Index out of range.";
            var _missingCorrespondingElementErrorMessage = "One or more corresponding step {0} are missing.";

            function addStepToCache(wizard, step) {
                getSteps(wizard).push(step);
            }

            function analyzeData(wizard, options, state) {
                var stepTitles = wizard.children(options.headerTag),
                    stepContents = wizard.children(options.bodyTag);
                if (stepTitles.length > stepContents.length) {
                    throwError(_missingCorrespondingElementErrorMessage, "contents");
                } else if (stepTitles.length < stepContents.length) {
                    throwError(_missingCorrespondingElementErrorMessage, "titles");
                }
                var startIndex = options.startIndex;
                state.stepCount = stepTitles.length;
                if (options.saveState && $.cookie) {
                    var savedState = $.cookie(_cookiePrefix + getUniqueId(wizard));
                    var savedIndex = parseInt(savedState, 0);
                    if (!isNaN(savedIndex) && savedIndex < state.stepCount) {
                        startIndex = savedIndex;
                    }
                }
                state.currentIndex = startIndex;
                stepTitles.each(function(index) {
                    var item = $(this),
                        content = stepContents.eq(index),
                        modeData = content.data("mode"),
                        mode = (modeData == null) ? contentMode.html : getValidEnumValue(contentMode, (/^\s*$/.test(modeData) || isNaN(modeData)) ? modeData : parseInt(modeData, 0)),
                        contentUrl = (mode === contentMode.html || content.data("url") === undefined) ? "" : content.data("url"),
                        contentLoaded = (mode !== contentMode.html && content.data("loaded") === "1"),
                        step = $.extend({}, stepModel, {
                            title: item.html(),
                            content: (mode === contentMode.html) ? content.html() : "",
                            contentUrl: contentUrl,
                            contentMode: mode,
                            contentLoaded: contentLoaded
                        });
                    addStepToCache(wizard, step);
                });
            }

            function cancel(wizard) {
                wizard.triggerHandler("canceled");
            }

            function decreaseCurrentIndexBy(state, decreaseBy) {
                return state.currentIndex - decreaseBy;
            }

            function destroy(wizard, options) {
                var eventNamespace = getEventNamespace(wizard);
                wizard.unbind(eventNamespace).removeData("uid").removeData("options").removeData("state").removeData("steps").removeData("eventNamespace").find(".actions a").unbind(eventNamespace);
                wizard.removeClass(options.clearFixCssClass + " vertical");
                var contents = wizard.find(".content > *");
                contents.removeData("loaded").removeData("mode").removeData("url");
                contents.removeAttr("id").removeAttr("role").removeAttr("tabindex").removeAttr("class").removeAttr("style")._removeAria("labelledby")._removeAria("hidden");
                wizard.find(".content > [data-mode='async'],.content > [data-mode='iframe']").empty();
                var wizardSubstitute = $("<{0} class=\"{1}\"></{0}>".format(wizard.get(0).tagName, wizard.attr("class")));
                var wizardId = wizard._id();
                if (wizardId != null && wizardId !== "") {
                    wizardSubstitute._id(wizardId);
                }
                wizardSubstitute.html(wizard.find(".content").html());
                wizard.after(wizardSubstitute);
                wizard.remove();
                return wizardSubstitute;
            }

            function finishStep(wizard, state) {
                var currentStep = wizard.find(".steps li").eq(state.currentIndex);
                if (wizard.triggerHandler("finishing", [state.currentIndex])) {
                    currentStep.addClass("done").removeClass("error");
                    wizard.triggerHandler("finished", [state.currentIndex]);
                } else {
                    currentStep.addClass("error");
                }
            }

            function getEventNamespace(wizard) {
                var eventNamespace = wizard.data("eventNamespace");
                if (eventNamespace == null) {
                    eventNamespace = "." + getUniqueId(wizard);
                    wizard.data("eventNamespace", eventNamespace);
                }
                return eventNamespace;
            }

            function getStepAnchor(wizard, index) {
                var uniqueId = getUniqueId(wizard);
                return wizard.find("#" + uniqueId + _tabSuffix + index);
            }

            function getStepPanel(wizard, index) {
                var uniqueId = getUniqueId(wizard);
                return wizard.find("#" + uniqueId + _tabpanelSuffix + index);
            }

            function getStepTitle(wizard, index) {
                var uniqueId = getUniqueId(wizard);
                return wizard.find("#" + uniqueId + _titleSuffix + index);
            }

            function getOptions(wizard) {
                return wizard.data("options");
            }

            function getState(wizard) {
                return wizard.data("state");
            }

            function getSteps(wizard) {
                return wizard.data("steps");
            }

            function getStep(wizard, index) {
                var steps = getSteps(wizard);
                if (index < 0 || index >= steps.length) {
                    throwError(_indexOutOfRangeErrorMessage);
                }
                return steps[index];
            }

            function getUniqueId(wizard) {
                var uniqueId = wizard.data("uid");
                if (uniqueId == null) {
                    uniqueId = wizard._id();
                    if (uniqueId == null) {
                        uniqueId = "steps-uid-".concat(_uniqueId);
                        wizard._id(uniqueId);
                    }
                    _uniqueId++;
                    wizard.data("uid", uniqueId);
                }
                return uniqueId;
            }

            function getValidEnumValue(enumType, keyOrValue) {
                validateArgument("enumType", enumType);
                validateArgument("keyOrValue", keyOrValue);
                if (typeof keyOrValue === "string") {
                    var value = enumType[keyOrValue];
                    if (value === undefined) {
                        throwError("The enum key '{0}' does not exist.", keyOrValue);
                    }
                    return value;
                } else if (typeof keyOrValue === "number") {
                    for (var key in enumType) {
                        if (enumType[key] === keyOrValue) {
                            return keyOrValue;
                        }
                    }
                    throwError("Invalid enum value '{0}'.", keyOrValue);
                } else {
                    throwError("Invalid key or value type.");
                }
            }

            function goToNextStep(wizard, options, state) {
                return paginationClick(wizard, options, state, increaseCurrentIndexBy(state, 1));
            }

            function goToPreviousStep(wizard, options, state) {
                return paginationClick(wizard, options, state, decreaseCurrentIndexBy(state, 1));
            }

            function goToStep(wizard, options, state, index) {
                if (index < 0 || index >= state.stepCount) {
                    throwError(_indexOutOfRangeErrorMessage);
                }
                if (options.forceMoveForward && index < state.currentIndex) {
                    return;
                }
                var oldIndex = state.currentIndex;
                if (wizard.triggerHandler("stepChanging", [state.currentIndex, index])) {
                    state.currentIndex = index;
                    saveCurrentStateToCookie(wizard, options, state);
                    refreshStepNavigation(wizard, options, state, oldIndex);
                    refreshPagination(wizard, options, state);
                    loadAsyncContent(wizard, options, state);
                    startTransitionEffect(wizard, options, state, index, oldIndex, function() {
                        wizard.triggerHandler("stepChanged", [index, oldIndex]);
                    });
                } else {
                    wizard.find(".steps li").eq(oldIndex).addClass("error");
                }
                return true;
            }

            function increaseCurrentIndexBy(state, increaseBy) {
                return state.currentIndex + increaseBy;
            }

            function initialize(options) {
                var opts = $.extend(true, {}, defaults, options);
                return this.each(function() {
                    var wizard = $(this);
                    var state = {
                        currentIndex: opts.startIndex,
                        currentStep: null,
                        stepCount: 0,
                        transitionElement: null
                    };
                    wizard.data("options", opts);
                    wizard.data("state", state);
                    wizard.data("steps", []);
                    analyzeData(wizard, opts, state);
                    render(wizard, opts, state);
                    registerEvents(wizard, opts);
                    if (opts.autoFocus && _uniqueId === 0) {
                        getStepAnchor(wizard, opts.startIndex).focus();
                    }
                    wizard.triggerHandler("init", [opts.startIndex]);
                });
            }

            function insertStep(wizard, options, state, index, step) {
                if (index < 0 || index > state.stepCount) {
                    throwError(_indexOutOfRangeErrorMessage);
                }
                step = $.extend({}, stepModel, step);
                insertStepToCache(wizard, index, step);
                if (state.currentIndex !== state.stepCount && state.currentIndex >= index) {
                    state.currentIndex++;
                    saveCurrentStateToCookie(wizard, options, state);
                }
                state.stepCount++;
                var contentContainer = wizard.find(".content"),
                    header = $("<{0}>{1}</{0}>".format(options.headerTag, step.title)),
                    body = $("<{0}></{0}>".format(options.bodyTag));
                if (step.contentMode == null || step.contentMode === contentMode.html) {
                    body.html(step.content);
                }
                if (index === 0) {
                    contentContainer.prepend(body).prepend(header);
                } else {
                    getStepPanel(wizard, (index - 1)).after(body).after(header);
                }
                renderBody(wizard, state, body, index);
                renderTitle(wizard, options, state, header, index);
                refreshSteps(wizard, options, state, index);
                if (index === state.currentIndex) {
                    refreshStepNavigation(wizard, options, state);
                }
                refreshPagination(wizard, options, state);
                return wizard;
            }

            function insertStepToCache(wizard, index, step) {
                getSteps(wizard).splice(index, 0, step);
            }

            function keyUpHandler(event) {
                var wizard = $(this),
                    options = getOptions(wizard),
                    state = getState(wizard);
                if (options.suppressPaginationOnFocus && wizard.find(":focus").is(":input")) {
                    event.preventDefault();
                    return false;
                }
                var keyCodes = {
                    left: 37,
                    right: 39
                };
                if (event.keyCode === keyCodes.left) {
                    event.preventDefault();
                    goToPreviousStep(wizard, options, state);
                } else if (event.keyCode === keyCodes.right) {
                    event.preventDefault();
                    goToNextStep(wizard, options, state);
                }
            }

            function loadAsyncContent(wizard, options, state) {
                if (state.stepCount > 0) {
                    var currentIndex = state.currentIndex,
                        currentStep = getStep(wizard, currentIndex);
                    if (!options.enableContentCache || !currentStep.contentLoaded) {
                        switch (getValidEnumValue(contentMode, currentStep.contentMode)) {
                            case contentMode.iframe:
                                wizard.find(".content > .body").eq(state.currentIndex).empty().html("<iframe src=\"" + currentStep.contentUrl + "\" frameborder=\"0\" scrolling=\"no\" />").data("loaded", "1");
                                break;
                            case contentMode.async:
                                var currentStepContent = getStepPanel(wizard, currentIndex)._aria("busy", "true").empty().append(renderTemplate(options.loadingTemplate, {
                                    text: options.labels.loading
                                }));
                                $.ajax({
                                    url: currentStep.contentUrl,
                                    cache: false
                                }).done(function(data) {
                                    currentStepContent.empty().html(data)._aria("busy", "false").data("loaded", "1");
                                    wizard.triggerHandler("contentLoaded", [currentIndex]);
                                });
                                break;
                        }
                    }
                }
            }

            function paginationClick(wizard, options, state, index) {
                var oldIndex = state.currentIndex;
                if (index >= 0 && index < state.stepCount && !(options.forceMoveForward && index < state.currentIndex)) {
                    var anchor = getStepAnchor(wizard, index),
                        parent = anchor.parent(),
                        isDisabled = parent.hasClass("disabled");
                    parent._enableAria();
                    anchor.click();
                    if (oldIndex === state.currentIndex && isDisabled) {
                        parent._enableAria(false);
                        return false;
                    }
                    return true;
                }
                return false;
            }

            function paginationClickHandler(event) {
                event.preventDefault();
                var anchor = $(this),
                    wizard = anchor.parent().parent().parent().parent(),
                    options = getOptions(wizard),
                    state = getState(wizard),
                    href = anchor.attr("href");
                switch (href.substring(href.lastIndexOf("#") + 1)) {
                    case "cancel":
                        cancel(wizard);
                        break;
                    case "finish":
                        finishStep(wizard, state);
                        break;
                    case "next":
                        goToNextStep(wizard, options, state);
                        break;
                    case "previous":
                        goToPreviousStep(wizard, options, state);
                        break;
                }
            }

            function refreshPagination(wizard, options, state) {
                if (options.enablePagination) {
                    var finish = wizard.find(".actions a[href$='#finish']").parent(),
                        next = wizard.find(".actions a[href$='#next']").parent();
                    if (!options.forceMoveForward) {
                        var previous = wizard.find(".actions a[href$='#previous']").parent();
                        previous._enableAria(state.currentIndex > 0);
                    }
                    if (options.enableFinishButton && options.showFinishButtonAlways) {
                        finish._enableAria(state.stepCount > 0);
                        next._enableAria(state.stepCount > 1 && state.stepCount > (state.currentIndex + 1));
                    } else {
                        finish._showAria(options.enableFinishButton && state.stepCount === (state.currentIndex + 1));
                        next._showAria(state.stepCount === 0 || state.stepCount > (state.currentIndex + 1))._enableAria(state.stepCount > (state.currentIndex + 1) || !options.enableFinishButton);
                    }
                }
            }

            function refreshStepNavigation(wizard, options, state, oldIndex) {
                var currentOrNewStepAnchor = getStepAnchor(wizard, state.currentIndex),
                    currentInfo = $("<span class=\"current-info audible\">" + options.labels.current + " </span>"),
                    stepTitles = wizard.find(".content > .title");
                if (oldIndex != null) {
                    var oldStepAnchor = getStepAnchor(wizard, oldIndex);
                    oldStepAnchor.parent().addClass("done").removeClass("error")._selectAria(false);
                    stepTitles.eq(oldIndex).removeClass("current").next(".body").removeClass("current");
                    currentInfo = oldStepAnchor.find(".current-info");
                    currentOrNewStepAnchor.focus();
                }
                currentOrNewStepAnchor.prepend(currentInfo).parent()._selectAria().removeClass("done")._enableAria();
                stepTitles.eq(state.currentIndex).addClass("current").next(".body").addClass("current");
            }

            function refreshSteps(wizard, options, state, index) {
                var uniqueId = getUniqueId(wizard);
                for (var i = index; i < state.stepCount; i++) {
                    var uniqueStepId = uniqueId + _tabSuffix + i,
                        uniqueBodyId = uniqueId + _tabpanelSuffix + i,
                        uniqueHeaderId = uniqueId + _titleSuffix + i,
                        title = wizard.find(".title").eq(i)._id(uniqueHeaderId);
                    wizard.find(".steps a").eq(i)._id(uniqueStepId)._aria("controls", uniqueBodyId).attr("href", "#" + uniqueHeaderId).html(renderTemplate(options.titleTemplate, {
                        index: i + 1,
                        title: title.html()
                    }));
                    wizard.find(".body").eq(i)._id(uniqueBodyId)._aria("labelledby", uniqueHeaderId);
                }
            }

            function registerEvents(wizard, options) {
                var eventNamespace = getEventNamespace(wizard);
                wizard.bind("canceled" + eventNamespace, options.onCanceled);
                wizard.bind("contentLoaded" + eventNamespace, options.onContentLoaded);
                wizard.bind("finishing" + eventNamespace, options.onFinishing);
                wizard.bind("finished" + eventNamespace, options.onFinished);
                wizard.bind("init" + eventNamespace, options.onInit);
                wizard.bind("stepChanging" + eventNamespace, options.onStepChanging);
                wizard.bind("stepChanged" + eventNamespace, options.onStepChanged);
                if (options.enableKeyNavigation) {
                    wizard.bind("keyup" + eventNamespace, keyUpHandler);
                }
                wizard.find(".actions a").bind("click" + eventNamespace, paginationClickHandler);
            }

            function removeStep(wizard, options, state, index) {
                if (index < 0 || index >= state.stepCount || state.currentIndex === index) {
                    return false;
                }
                removeStepFromCache(wizard, index);
                if (state.currentIndex > index) {
                    state.currentIndex--;
                    saveCurrentStateToCookie(wizard, options, state);
                }
                state.stepCount--;
                getStepTitle(wizard, index).remove();
                getStepPanel(wizard, index).remove();
                getStepAnchor(wizard, index).parent().remove();
                if (index === 0) {
                    wizard.find(".steps li").first().addClass("first");
                }
                if (index === state.stepCount) {
                    wizard.find(".steps li").eq(index).addClass("last");
                }
                refreshSteps(wizard, options, state, index);
                refreshPagination(wizard, options, state);
                return true;
            }

            function removeStepFromCache(wizard, index) {
                getSteps(wizard).splice(index, 1);
            }

            function render(wizard, options, state) {
                var wrapperTemplate = "<{0} class=\"{1}\">{2}</{0}>",
                    orientation = getValidEnumValue(stepsOrientation, options.stepsOrientation),
                    verticalCssClass = (orientation === stepsOrientation.vertical) ? " vertical" : "",
                    contentWrapper = $(wrapperTemplate.format(options.contentContainerTag, "content " + options.clearFixCssClass, wizard.html())),
                    stepsWrapper = $(wrapperTemplate.format(options.stepsContainerTag, "steps " + options.clearFixCssClass, "<ul role=\"tablist\"></ul>")),
                    stepTitles = contentWrapper.children(options.headerTag),
                    stepContents = contentWrapper.children(options.bodyTag);
                wizard.attr("role", "application").empty().append(stepsWrapper).append(contentWrapper).addClass(options.cssClass + " " + options.clearFixCssClass + verticalCssClass);
                stepContents.each(function(index) {
                    renderBody(wizard, state, $(this), index);
                });
                stepTitles.each(function(index) {
                    renderTitle(wizard, options, state, $(this), index);
                });
                refreshStepNavigation(wizard, options, state);
                renderPagination(wizard, options, state);
            }

            function renderBody(wizard, state, body, index) {
                var uniqueId = getUniqueId(wizard),
                    uniqueBodyId = uniqueId + _tabpanelSuffix + index,
                    uniqueHeaderId = uniqueId + _titleSuffix + index;
                body._id(uniqueBodyId).attr("role", "tabpanel")._aria("labelledby", uniqueHeaderId).addClass("body")._showAria(state.currentIndex === index);
            }

            function renderPagination(wizard, options, state) {
                if (options.enablePagination) {
                    var pagination = "<{0} class=\"actions {1}\"><ul role=\"menu\" aria-label=\"{2}\">{3}</ul></{0}>",
                        buttonTemplate = "<li><a href=\"#{0}\" role=\"menuitem\">{1}</a></li>",
                        buttons = "";
                    if (!options.forceMoveForward) {
                        buttons += buttonTemplate.format("previous", options.labels.previous);
                    }
                    buttons += buttonTemplate.format("next", options.labels.next);
                    if (options.enableFinishButton) {
                        buttons += buttonTemplate.format("finish", options.labels.finish);
                    }
                    if (options.enableCancelButton) {
                        buttons += buttonTemplate.format("cancel", options.labels.cancel);
                    }
                    wizard.append(pagination.format(options.actionContainerTag, options.clearFixCssClass, options.labels.pagination, buttons));
                    refreshPagination(wizard, options, state);
                    loadAsyncContent(wizard, options, state);
                }
            }

            function renderTemplate(template, substitutes) {
                var matches = template.match(/#([a-z]*)#/gi);
                for (var i = 0; i < matches.length; i++) {
                    var match = matches[i],
                        key = match.substring(1, match.length - 1);
                    if (substitutes[key] === undefined) {
                        throwError("The key '{0}' does not exist in the substitute collection!", key);
                    }
                    template = template.replace(match, substitutes[key]);
                }
                return template;
            }

            function renderTitle(wizard, options, state, header, index) {
                var uniqueId = getUniqueId(wizard),
                    uniqueStepId = uniqueId + _tabSuffix + index,
                    uniqueBodyId = uniqueId + _tabpanelSuffix + index,
                    uniqueHeaderId = uniqueId + _titleSuffix + index,
                    stepCollection = wizard.find(".steps > ul"),
                    title = renderTemplate(options.titleTemplate, {
                        index: index + 1,
                        title: header.html()
                    }),
                    stepItem = $("<li role=\"tab\"><a id=\"" + uniqueStepId + "\" href=\"#" + uniqueHeaderId +
                        "\" aria-controls=\"" + uniqueBodyId + "\">" + title + "</a></li>");
                stepItem._enableAria(options.enableAllSteps || state.currentIndex > index);
                if (state.currentIndex > index) {
                    stepItem.addClass("done");
                }
                header._id(uniqueHeaderId).attr("tabindex", "-1").addClass("title");
                if (index === 0) {
                    stepCollection.prepend(stepItem);
                } else {
                    stepCollection.find("li").eq(index - 1).after(stepItem);
                }
                if (index === 0) {
                    stepCollection.find("li").removeClass("first").eq(index).addClass("first");
                }
                if (index === (state.stepCount - 1)) {
                    stepCollection.find("li").removeClass("last").eq(index).addClass("last");
                }
                stepItem.children("a").bind("click" + getEventNamespace(wizard), stepClickHandler);
            }

            function saveCurrentStateToCookie(wizard, options, state) {
                if (options.saveState && $.cookie) {
                    $.cookie(_cookiePrefix + getUniqueId(wizard), state.currentIndex);
                }
            }

            function startTransitionEffect(wizard, options, state, index, oldIndex, doneCallback) {
                var stepContents = wizard.find(".content > .body"),
                    effect = getValidEnumValue(transitionEffect, options.transitionEffect),
                    effectSpeed = options.transitionEffectSpeed,
                    newStep = stepContents.eq(index),
                    currentStep = stepContents.eq(oldIndex);
                switch (effect) {
                    case transitionEffect.fade:
                    case transitionEffect.slide:
                        var hide = (effect === transitionEffect.fade) ? "fadeOut" : "slideUp",
                            show = (effect === transitionEffect.fade) ? "fadeIn" : "slideDown";
                        state.transitionElement = newStep;
                        currentStep[hide](effectSpeed, function() {
                            var wizard = $(this)._showAria(false).parent().parent(),
                                state = getState(wizard);
                            if (state.transitionElement) {
                                state.transitionElement[show](effectSpeed, function() {
                                    $(this)._showAria();
                                }).promise().done(doneCallback);
                                state.transitionElement = null;
                            }
                        });
                        break;
                    case transitionEffect.slideLeft:
                        var outerWidth = currentStep.outerWidth(true),
                            posFadeOut = (index > oldIndex) ? -(outerWidth) : outerWidth,
                            posFadeIn = (index > oldIndex) ? outerWidth : -(outerWidth);
                        $.when(currentStep.animate({
                            left: posFadeOut
                        }, effectSpeed, function() {
                            $(this)._showAria(false);
                        }), newStep.css("left", posFadeIn + "px")._showAria().animate({
                            left: 0
                        }, effectSpeed)).done(doneCallback);
                        break;
                    default:
                        $.when(currentStep._showAria(false), newStep._showAria()).done(doneCallback);
                        break;
                }
            }

            function stepClickHandler(event) {
                event.preventDefault();
                var anchor = $(this),
                    wizard = anchor.parent().parent().parent().parent(),
                    options = getOptions(wizard),
                    state = getState(wizard),
                    oldIndex = state.currentIndex;
                if (anchor.parent().is(":not(.disabled):not(.current)")) {
                    var href = anchor.attr("href"),
                        position = parseInt(href.substring(href.lastIndexOf("-") + 1), 0);
                    goToStep(wizard, options, state, position);
                }
                if (oldIndex === state.currentIndex) {
                    getStepAnchor(wizard, oldIndex).focus();
                    return false;
                }
            }

            function throwError(message) {
                if (arguments.length > 1) {
                    message = message.format(Array.prototype.slice.call(arguments, 1));
                }
                throw new Error(message);
            }

            function validateArgument(argumentName, argumentValue) {
                if (argumentValue == null) {
                    throwError("The argument '{0}' is null or undefined.", argumentName);
                }
            }
            $.fn.steps = function(method) {
                if ($.fn.steps[method]) {
                    return $.fn.steps[method].apply(this, Array.prototype.slice.call(arguments, 1));
                } else if (typeof method === "object" || !method) {
                    return initialize.apply(this, arguments);
                } else {
                    $.error("Method " + method + " does not exist on jQuery.steps");
                }
            };
            $.fn.steps.add = function(step) {
                var state = getState(this);
                return insertStep(this, getOptions(this), state, state.stepCount, step);
            };
            $.fn.steps.destroy = function() {
                return destroy(this, getOptions(this));
            };
            $.fn.steps.finish = function() {
                finishStep(this, getState(this));
            };
            $.fn.steps.getCurrentIndex = function() {
                return getState(this).currentIndex;
            };
            $.fn.steps.getCurrentStep = function() {
                return getStep(this, getState(this).currentIndex);
            };
            $.fn.steps.getStep = function(index) {
                return getStep(this, index);
            };
            $.fn.steps.insert = function(index, step) {
                return insertStep(this, getOptions(this), getState(this), index, step);
            };
            $.fn.steps.next = function() {
                return goToNextStep(this, getOptions(this), getState(this));
            };
            $.fn.steps.previous = function() {
                return goToPreviousStep(this, getOptions(this), getState(this));
            };
            $.fn.steps.remove = function(index) {
                return removeStep(this, getOptions(this), getState(this), index);
            };
            $.fn.steps.setStep = function(index, step) {
                throw new Error("Not yet implemented!");
            };
            $.fn.steps.skip = function(count) {
                throw new Error("Not yet implemented!");
            };
            var contentMode = $.fn.steps.contentMode = {
                html: 0,
                iframe: 1,
                async: 2
            };
            var stepsOrientation = $.fn.steps.stepsOrientation = {
                horizontal: 0,
                vertical: 1
            };
            var transitionEffect = $.fn.steps.transitionEffect = {
                none: 0,
                fade: 1,
                slide: 2,
                slideLeft: 3
            };
            var stepModel = $.fn.steps.stepModel = {
                title: "",
                content: "",
                contentUrl: "",
                contentMode: contentMode.html,
                contentLoaded: false
            };
            var defaults = $.fn.steps.defaults = {
                headerTag: "h1",
                bodyTag: "div",
                contentContainerTag: "div",
                actionContainerTag: "div",
                stepsContainerTag: "div",
                cssClass: "wizard",
                clearFixCssClass: "clearfix",
                stepsOrientation: stepsOrientation.horizontal,
                titleTemplate: "<span class=\"number\">#index#.</span> #title#",
                loadingTemplate: "<span class=\"spinner\"></span> #text#",
                autoFocus: false,
                enableAllSteps: false,
                enableKeyNavigation: true,
                enablePagination: true,
                suppressPaginationOnFocus: true,
                enableContentCache: true,
                enableCancelButton: false,
                enableFinishButton: true,
                preloadContent: false,
                showFinishButtonAlways: false,
                forceMoveForward: false,
                saveState: false,
                startIndex: 0,
                transitionEffect: transitionEffect.none,
                transitionEffectSpeed: 200,
                onStepChanging: function(event, currentIndex, newIndex) {
                    return true;
                },
                onStepChanged: function(event, currentIndex, priorIndex) {},
                onCanceled: function(event) {},
                onFinishing: function(event, currentIndex) {
                    return true;
                },
                onFinished: function(event, currentIndex) {},
                onContentLoaded: function(event, currentIndex) {},
                onInit: function(event, currentIndex) {},
                labels: {
                    cancel: "Cancel",
                    current: "current step:",
                    pagination: "Pagination",
                    finish: "Finish",
                    next: "Next",
                    previous: "Previous",
                    loading: "Loading ..."
                }
            };
        })(jQuery);
    </script>
    <script>
        $(function() {
            $("#wizard").steps({
                headerTag: "h4",
                bodyTag: "section",
                transitionEffect: "fade",
                enableAllSteps: true,
                transitionEffectSpeed: 300,
                labels: {
                    next: "Continue",
                    previous: "Back",
                    finish: 'Proceed to checkout'
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    if (newIndex >= 1) {
                        $('.steps ul li:first-child a img').attr('src', 'uploads/images/step-1.png');
                    } else {
                        $('.steps ul li:first-child a img').attr('src', 'uploads/images/step-1-active.png');
                    }
                    if (newIndex === 1) {
                        $('.steps ul li:nth-child(2) a img').attr('src', 'uploads/images/step-2-active.png');
                    } else {
                        $('.steps ul li:nth-child(2) a img').attr('src', 'uploads/images/step-2.png');
                    }
                    if (newIndex === 2) {
                        $('.steps ul li:nth-child(3) a img').attr('src', 'uploads/images/step-3-active.png');
                    } else {
                        $('.steps ul li:nth-child(3) a img').attr('src', 'uploads/images/step-3.png');
                    }
                    if (newIndex === 3) {
                        $('.steps ul li:nth-child(4) a img').attr('src', 'uploads/images/step-4-active.png');
                        $('.actions ul').addClass('step-4');
                    } else {
                        $('.steps ul li:nth-child(4) a img').attr('src', 'uploads/images/step-4.png');
                        $('.actions ul').removeClass('step-4');
                    }
                    return true;
                }
            });
            $('.forward').click(function() {
                $("#wizard").steps('next');
            })
            $('.backward').click(function() {
                $("#wizard").steps('previous');
            })
            $('.password i').click(function() {
                if ($('.password input').attr('type') === 'password') {
                    $(this).next().attr('type', 'text');
                } else {
                    $('.password input').attr('type', 'password');
                }
            })
            $('.steps ul li:first-child').append('<img src="uploads/images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="uploads/images/step-1-active.png" alt=""> ').append('<span class="step-order">Step 01</span>');
            $('.steps ul li:nth-child(2').append('<img src="uploads/images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="uploads/images/step-2.png" alt="">').append('<span class="step-order">Step 02</span>');
            $('.steps ul li:nth-child(3)').append('<img src="uploads/images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="uploads/images/step-3.png" alt="">').append('<span class="step-order">Step 03</span>');
            $('.steps ul li:last-child a').append('<img src="uploads/images/step-4.png" alt="">').append('<span class="step-order">Step 04</span>');
            $(".quantity span").on("click", function() {
                var $button = $(this);
                var oldValue = $button.parent().find("input").val();
                if ($button.hasClass('plus')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find("input").val(newVal);
            });
        })
    </script>





















    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"75d931028fd692cb","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.10.3","si":100}' crossorigin="anonymous"></script>






</body>

</html>


<div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 mb-xxs-25 mb-xs-25 mb-sm-25">
                                <h5 class="text-center"
                                    style="    font-size: 27px;
    border-radius: 10px;
    border: 3px solid;
    font-family: 'El Messiri';
    color: #ffffff;
    font-weight: 400;
    margin-bottom: -24px;
    border-color: #d99933;
    padding: 5px;">
                                    الرجاء ملء الاستبيان</h5>

                                <form id="signUpForm" action="#!"
                                    style=" box-shadow: 0px 24px 70px rgb(217 153 51);  -webkit-filter: drop-shadow(0px -6px 18px rgba(19,1222,100,173.8));">
                                    <!-- start step indicators -->
                                    <div class="form-header d-flex mb-4">
                                        <span class="stepIndicator">1</span>
                                        <span class="stepIndicator">2</span>
                                        <span class="stepIndicator">3</span>
                                        <span class="stepIndicator">4</span>
                                        <span class="stepIndicator">5</span>

                                    </div>
                                    <!-- end step indicators -->

                                    <!-- step one -->

                                    <div class="step" style=" text-align: right;">
                                        <!-- Q1--->
                                        <div class="">

                                            <div class="py-2 h4"
                                                style="margin-bottom: 20px; font-family: 'El Messiri';text-align: right;  white-space: nowrap;">
                                                <b> ما هو نوع شعرك؟</b>
                                                <div
                                                    style="    content: '';
    left: 50%;
    bottom: 18px;
    width: 100%;
    height: 2px;
    background-color: #3a9943;">
                                                </div>
                                            </div>
                                            <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                                <label class="containerCustom">طبيعي
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>

                                                <label class="containerCustom">مصبوغ
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>
                                                <label class="containerCustom">مميش
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>
                                                <label class="containerCustom"> مسحوب لونه
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>
                                            </div>
                                        </div>


                                    </div>


                                    <!-- step two -->
                                    <div class="step" style="    text-align: right;">
                                        <!-- Q2--->
                                        <div class="">
                                            <div class="py-2 h4"
                                                style="margin-bottom: 20px; font-family: 'El Messiri';text-align: right;  white-space: nowrap;">
                                                <b
                                                >
                                                هل استخدمتي الحناء لشعرك؟


                                                </b>
                                                <div
                                                    style="    content: '';
    left: 50%;
    bottom: 18px;
    width: 100%;
    height: 2px;
    background-color: #3a9943;">
                                                </div>
                                            </div>
                                            <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                                <label class="containerCustom">
                                                    لم استخدمه ابدا
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>
                                                <label class="containerCustom">
                                                    اقل من 6 اشهر
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>
                                                <label class="containerCustom">
                                                    اكثر من 6 اشهر
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- step three -->
                                    <div class="step" style="text-align: right;">
                                        <!-- Q3--->
                                        <div class="">
                                            <div class="py-2 h4"
                                                style=" font-family: 'El Messiri';text-align: right; white-space: nowrap;">
                                                <b>
                                                    متى اخر مرة قمتي بعمل الميش
                                                </b></div>
                                            <div class="py-2 h4"
                                                style="margin-bottom: 20px; font-family: 'El Messiri';text-align: right; white-space: nowrap;">
                                                <b>
                                                    او سحب اللون لشعرك ؟

                                                </b>
                                                <div
                                                    style="    content: '';
    left: 50%;
    bottom: 18px;
    width: 100%;
    height: 2px;
    background-color: #3a9943;">
                                                </div>
                                            </div>
                                            <div class="row"
                                                style="display: flex;
    flex-direction: row;
    flex-wrap: nowrap;">
                                                <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3 col-6" id="options">
                                                    <label class="containerCustom">
                                                        قبل شهر
                                                        <input type="radio" name="radio">
                                                        <span class="checkmarkCustom"></span>
                                                    </label>
                                                    <label class="containerCustom">
                                                        قبل 6 اشهر
                                                        <input type="radio" name="radio">
                                                        <span class="checkmarkCustom"></span>
                                                    </label>
                                                    <label class="containerCustom">
                                                        قبل سنة
                                                        <input type="radio" name="radio">
                                                        <span class="checkmarkCustom"></span>
                                                    </label>
                                                </div>
                                                <div class="ml-md-1 ml-sm-3  pt-sm-0 pt-3 col-6" id="options">
                                                    <label class="containerCustom">
                                                        قبل سنتين
                                                        <input type="radio" name="radio">
                                                        <span class="checkmarkCustom"></span>
                                                    </label>
                                                    <label class="containerCustom">
                                                        قبل 3 سنوات
                                                        <input type="radio" name="radio">
                                                        <span class="checkmarkCustom"></span>
                                                    </label>
                                                    <label class="containerCustom">
                                                        اكثر من 3 سنوات
                                                        <input type="radio" name="radio">
                                                        <span class="checkmarkCustom"></span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3 col-12" id="options">

                                                    <label class="containerCustom">
                                                         لم اقم بعمل ميش أو سحب لون
                                                        <input type="radio" name="radio">
                                                        <span class="checkmarkCustom"></span>
                                                    </label>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                    <!-- step 4 -->
                                    <div class="step" style="    text-align: right;">
                                        <!-- Q4--->
                                        <div class="">
                                            <div class="py-2 h4"
                                                style="margin-bottom: 20px; font-family: 'El Messiri';text-align: right; white-space: nowrap;">
                                                <b>
                                                    هل شعرك تالف جدا (شعر مطاطي)؟
                                                </b>
                                                <div
                                                    style="    content: '';
    left: 50%;
    bottom: 18px;
    width: 100%;
    height: 2px;
    background-color: #3a9943;">
                                                </div>
                                            </div>
                                            <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                                <label class="containerCustom">
                                                    نعم
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>
                                                <label class="containerCustom">
                                                    لا
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- step 5 -->
                                    <div class="step" style="    text-align: right;">
                                        <!-- Q5--->
                                        <div class="">
                                            <div class="py-2 h4"
                                                style="margin-bottom: 20px; font-family: 'El Messiri';text-align: right;  white-space: nowrap;">
                                                <b>
                                                    ماهو طول شعرك؟ 

                                                </b>
                                                <div
                                                    style="    content: '';
    left: 50%;
    bottom: 18px;
    width: 100%;
    height: 2px;
    background-color: #3a9943;">
                                                </div>
                                            </div>
                                            <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                                <label class="containerCustom">نعم
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>
                                                <label class="containerCustom">لا
                                                    <input type="radio" name="radio">
                                                    <span class="checkmarkCustom"></span>
                                                </label>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- start previous / next buttons -->
                                    <div class="form-footer d-flex">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">السابق</button>
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)">التالي</button>
                                    </div>
                                    <!-- end previous / next buttons -->
                                </form>

                            </div>

                        </div>
                    </div>
