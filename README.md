# Support Ticket

Customers service and support tickets for Thelia.

This module is compatible with Thelia version 2.1 or greater. 

For now, the module is quiet simple and limited. It allows the customer to post a question.  
It can be a general question or a question related to an order or a product.   

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is SupportTicket.
* Activate it in your Thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require thelia/support-ticket-module:~1.0
```

## Usage

Customers can post question and view responses from their account page.

In back-office, the configuration page allows you to manage the tickets.

An email is sent to the administrator when a new question is posted and the customer will receive an email when a response is done. 

In the front office, an integration is provided for the default template. It uses hooks, so it's activated by default.

You can override these smarty templates in the current template. You have to put your templates files in this directory
 (with default template) : `template/frontOffice/default/modules/SupportTicket/`
 
The main page displaying the questions and answers could be override in defining a new file in your template 
(you can copy the default one defined in the module and modify it): `template/frontOffice/default/support-ticket.html`    

## Loop

The module provides a new loop : **support-ticket**

### Input arguments

|Argument |Description |
|---      |--- |
|**id**                 | the support ticket id                                                              |
|**status**             | the status (0 = new, 1 = replied, 2 = closed )                                     |
|**customer_id**        | the customer id                                                                    |
|**admin_id**           | the admin id.                                                                      |
|**order_id**           | the order id                                                                       |
|**order_product_id**   | the order product id                                                               |
|**order**              | the sort order : **id**, status, customer_id, admin_id, order_id, order_product_id |
                                        

### Output arguments

|Variable   |Description |
|---        |--- |
|$ID               | the ticket id                                                                    |
|$STATUS           | the status code                                                                  |
|$STATUS_TEXT      | the status text                                                                  |
|$CUSTOMER_ID      | the customer id                                                                  |
|$ADMIN_ID         | the id of the administrator who has answered                                     |
|$ORDER_ID         | the order id                                                                     |
|$ORDER_PRODUCT_ID | the order product id                                                             |
|$SUBJECT          | the subject of the ticket                                                        |
|$MESSAGE          | the message                                                                      |
|$RESPONSE         | the answer                                                                       |
|$REPLIED_AT       | the date of the first reply                                                      |
|$COMMENT          | the comment associated to the ticket (it should not be displayed to the customer |
                                                                             
