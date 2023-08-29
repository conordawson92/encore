<!DOCTYPE html>
<html>
<head>
    <title>Checkout Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <style type="text/css">
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .panel-title {
            font-weight: bold;
        }
        .credit-card-box {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
        .error {
            color: red;
        }
        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>
   
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details</h3>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="/adminUser/dashboard" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <div id="error-message" class="error-message"></div>
   
                    <form
                            role="form"
                            action="{{ route('stripe.post') }}"
                            method="post"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf

                        <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                        @foreach($cartItems as $cartItem)
                            <input type="hidden" name="cart_items[]" value="{{ $cartItem->id }}">
                        @endforeach
   
                        <div class="form-group required">
                            <label class="control-label">Name on Card</label>
                            <input class="form-control" size="4" type="text" name="card_name">
                        </div>
   
                        <div class="form-group card required">
                            <label class="control-label">Card Number</label>
                            <input value="4242424242424242" autocomplete="off" class="form-control card-number" size="20" type="text" name="card_number" pattern="[0-9]{16}">
                        </div>
   
                        <div class="form-row row">
                            <div class="col-md-4 form-group cvc required">
                                <label class="control-label">CVC</label>
                                <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 123" size="4" type="text" name="card_cvc" pattern="[0-9]{3}">
                            </div>
                            <div class="col-md-4 form-group expiration required">
                                <label class="control-label">Expiration Month</label>
                                <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text" name="card_expiry_month" pattern="[0-9]{2}">
                            </div>
                            <div class="col-md-4 form-group expiration required">
                                <label class="control-label">Expiration Year</label>
                                <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text" name="card_expiry_year" pattern="[0-9]{4}">
                            </div>
                        </div>
   
                        <div class="center-content">
                            <div class="form-row row">
                                <div class="col-xs-12">
                                    <button id="pay-button" class="btn btn-primary btn-lg" type="button">Pay Now (€{{ number_format($totalAmount, 2) }})</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
</body>
   
<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
    
    $('#pay-button').click(function(e) {
        var $errorMessage = $('#error-message');
        $errorMessage.empty();

        var cardName = $('[name="card_name"]').val();
        var cardNumber = $('[name="card_number"]').val();
        var cardCvc = $('[name="card_cvc"]').val();
        var cardExpiryMonth = $('[name="card_expiry_month"]').val();
        var cardExpiryYear = $('[name="card_expiry_year"]').val();
        var totalAmount = {{ $totalAmount }}; // Get total amount from PHP

        var cardNamePattern = /^[A-Za-z ]+$/;
        var cardNumberPattern = /^[0-9]{16}$/;
        var cardCvcPattern = /^[0-9]{3}$/;
        var cardExpiryMonthPattern = /^[0-9]{2}$/;
        var cardExpiryYearPattern = /^[0-9]{4}$/;

        var valid = true;

        if (!cardName.match(cardNamePattern)) {
            valid = false;
            $errorMessage.append("<p>Name on Card should contain only letters</p>");
        }

        if (!cardNumber.match(cardNumberPattern)) {
            valid = false;
            $errorMessage.append("<p>Card Number should contain exactly 16 digits</p>");
        }

        if (!cardCvc.match(cardCvcPattern)) {
            valid = false;
            $errorMessage.append("<p>CVC should contain exactly 3 digits</p>");
        }

        if (!cardExpiryMonth.match(cardExpiryMonthPattern)) {
            valid = false;
            $errorMessage.append("<p>Expiry Month should contain exactly 2 digits</p>");
        } else if (cardExpiryMonth <= new Date().getMonth() + 1) {
            valid = false;
            $errorMessage.append("<p>Expiry Month should be in the future</p>");
        }

        if (!cardExpiryYear.match(cardExpiryYearPattern)) {
            valid = false;
            $errorMessage.append("<p>Expiry Year should contain exactly 4 digits</p>");
        } else if (cardExpiryYear < new Date().getFullYear()) {
            valid = false;
            $errorMessage.append("<p>Expiry Year should be in the future</p>");
        }

        if (totalAmount <= 0) {
            valid = false;
            $errorMessage.append("<p>Payment amount must be greater than 0 euros</p>");
        }

        if (valid) {
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: cardNumber,
                cvc: cardCvc,
                exp_month: cardExpiryMonth,
                exp_year: cardExpiryYear
            }, stripeResponseHandler);
        } else {
            $errorMessage.addClass('error-message');
        }
    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $errorMessage.append("<p>" + response.error.message + "</p>");
        } else {
            var token = response.id;
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
</html>