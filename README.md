# Webshop OOP

This is my thesis for the course Junior Full Stack Developer 

## Getting Started

This is a short explanation on everything used for this project



## Built With

* [Wamp64](http://www.wampserver.com/en/download-wampserver-64bits/) - Local server used
* [phpmyadmin](https://www.phpmyadmin.net/docs/) - Used to create database in MyQSL
* [phpstorm](https://www.jetbrains.com/phpstorm/documentation/?gclid=Cj0KCQiAmsrxBRDaARIsANyiD1ozipiuME-EFc-KV6ciHjizNF684DgG-DMv3VuiX7GiQ_3IK-YatZIaAnFMEALw_wcB) - Editor i used for this project





##Local server 

this project is made on wamp so any problems on other servers i apologize in advance
  
to change local server go to admin/includes/init.php an define on line 3
  
##Database

this project is made using SQL database wich is included in the repo
  

  

  
##admin section
  
- created a rolebased login system with different sidebar functionality
- created a passwordrecovery system where the user gets a link trough gmail only if user exists in database so for testign add user with your email
- on the admin page u can add edit delete (users, products , images) depending on ur role
- made a section where u can see the orders made by users
##shop section (u'll notice different things that arent been adjusted yet since i used a templateshop found on github)
  
- simple homepage where u can see the hot products and go to shop
- made a login/register system for users wich automatically assigns role 4 (customer) so they have no access to the admin dashboard
- shop page that list all the products wich u can filter on category (adding price filter in the future) also added pagination class wich only displays number of items per page
- product detail page wich show the productdetails and here u can add ur item to the shoppingcart
- shoppincart functionality add/update/delete items from ur shoppingcart or proceed to checkout
- checkout page i created a system where the user can choose either to checkout using the logged in user (now he can choose shipping to same or different shippingaddress) OR where u can checkout and create account also with same or different shippingaddress OR checkout as guest also with same or different shippingaddress. here u will find the proceed to payment button
- payment page integrated paypal sandbox account to test the functionallity of paying items when payment is complete u are redirected to the thankyou page an order with orderdetails are stored to db using paypal transactionid
  
  
## Authors
 
* **Waelkens Jens** - *Initial work* - [wjdev](https://github.com/waelkensjens)
 
Also big thanks to my tutor Tom Vanhoutte and my co students for helping me realize this project 
 
 
## License
 
Feel free to use any part off the code u want Open source before going live check template license [darklook](http://www.lionode.com/)
 
  
 Note: this is still a work in progress
