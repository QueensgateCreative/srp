<?php
require_once('../config/config.php');
require_once('../private/functions.php');
require_login();

require_once('../templates/header.php');
?>

<h1>Subscribe</h1>

<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID&currency=USD"></script>
<script>
paypal.Buttons({
    createSubscription: function(data, actions) {
      return actions.subscription.create({
        'plan_id': 'YOUR_PLAN_ID' // You create this inside your PayPal Dashboard
      });
    },
    onApprove: function(data, actions) {
      window.location.href = "payment_success.php?subscriptionID=" + data.subscriptionID;
    }
}).render('#paypal-button-container');
</script>

<?php require_once('../templates/footer.php'); ?>
