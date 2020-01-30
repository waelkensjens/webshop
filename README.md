#Webshop OOP

Only for educational purpose everything used is only used in open source





##Local server
this project is made on wamp so any problems on other servers i apologize in advance

to change local server go to admin/includes/init.php an define on line 3

##Database 
this project is made using SQL database wich is included in the repo



##features



##features


##admin section

- created a rolebased login system with different sidebar functionality
- created a passwordrecovery system where the user gets a link trough gmail only if user exists in database so for testign add user with your email
- on the admin page u can add edit delete (users, products , images) depending on ur role
- made a section where u can see the orders made by users 

##shop section
(u'll notice different things that arent been adjusted yet since i used a templateshop found on github)
- simple homepage where u can see the hot products and go to shop 
- made a login/register system for users wich automatically assigns role 4 (customer) so they have no access to the admin dashboard
- shop page that list all the products wich u can filter on category (adding price filter in the future) also added pagination class wich only displays number of items per page
- product detail page wich show the productdetails and here u can add ur item to the shoppingcart
- shoppincart functionality add/update/delete items from ur shoppingcart or proceed to checkout
- checkout page i created a system where the user can choose either to checkout using the logged in user (now he can choose shipping to same or different shippingaddress) OR where u can checkout and create account also with same or different shippingaddress OR checkout as guest also with same or different shippingaddress. here u will find the proceed to payment button
- payment page integrated paypal sandbox account to test the functionallity of paying items when payment is complete u are redirected to the thankyou page an order with orderdetails are stored to db using paypal transactionid

Note: this is still a work in progress 

