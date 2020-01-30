<?php include_once("./includes/header.php");

include ('./includes/content-top.php');
?>

<?php
//$user = User::find_by_id($_SESSION['user_id']);
//$shipping = Shipping_address::find_by_user_id($user->id);


?>
    <div class="container mt_30">


        <div class="col-sm-8 col-lg-12 mtb_20 text-center">
            <div class="col-lg-6" id="buttons">

            </div>
            <div class="col-lg-6">
                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>


    <script
            src="https://www.paypal.com/sdk/js?client-id=AVY-VmaGwsIATstpB1tewlTqEgKOcte-xwqIr9143pMCmJH4A4APsQfhr9begDzjbHFlmH0U7Oaq32TK"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.

    </script>
    <script
            src="https://www.paypal.com/sdk/js?client-id=CLIENT_ID&commit=false">
    </script>

    <script>

        paypal.Buttons({
            env: 'sandbox',
            client: {
                sandbox: 'AGqP1qb1HvIcanIzJY968ZeYtAF-ACV0NwHndBrp07vSV-djayGSTj61',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'nl_BE',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $_SESSION['total_price']?>,
                            currency: 'EUR'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    //alert('Transaction completed by ' + details.payer.name.given_name + data.orderID);
                    window.location.href = "thankyou.php?idT="+data.orderID;


                    return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })

                    });

                });
            }
        }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.
    </script>

<?php include_once ('includes/footer.php'); ?>