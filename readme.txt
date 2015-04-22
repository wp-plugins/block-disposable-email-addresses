=== Block Disposable Email ===
Contributors: gsetz 
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZVJSLJALXCKYQ 
Tags: comments, posts, spam, disposable email, temporary email, validation, anti-spam, spam, mailinator, authentication, disposable, email, guerrillamail,mailinator, register, registration, fraud 
Requires at least: 3.3.1
Tested up to: 4.2
Stable tag: trunk

This plugin detects one-time email addresses (disposable email, trashmail, mailinator, 10minutemail) and helps to keep your userbase and comments clean. Free registration at www.block-disposable-email.com needed.

== Description ==

This plugin prevents people from registering with disposable email addresses (dea) like the ones provided by mailinator (also known as throw-away email, one-time email). It protects your most important asset, your registered user base, by preventing contamination by fake accounts. This plugin working principle is similar to spam blacklists.

It hooks in the wordpress function is_email() so it will extend the known email validation of wordpress to detect dea domains. 

The plugin itself does not contain a list of domains to block. Instead of local maintenance the plugin uses the service of http://www.block-disposable-email.com. This is a very accurate free service for up to 200 queries a month. For huge sites several commercial plans are available.

Please see the FAQ section for some more information.

== Installation ==

1. Unpack the *.zip file and extract the /block-disposable-email-addresses/ folder and the files.
2. Using an FTP program, upload the full /block-disposable-email-addresses/ folder to your WordPress plugins directory (Example: /wp-content/plugins).
3. Register at www.block-disposable-email.com and pick your api key. Please note that you have to register your server with its ip address to get a key. Simply follow the guideline of the service.
4. Go to Plugins, click Settings and insert your api key.
5. Go to Plugins and activate the plugin.

== Frequently Asked Questions ==

= What about privacy? =

This plugin does NOT submit email addresses. I do not run this service to collect your subscribers data. 

Before the data is sent to http://www.block-disposable-email.com the domain part is separated. So only the domain part is sent. For further information see the mentioned website.  

= What happens if the service is down? =

First of all I try to have minimum downtime. That's why there are currently 3 servers at different locations (UK, US, AT) waiting for your requests. For further information see http://www.block-disposable-email.com/faq.php

And yes, even if the service is down your users are able to leave comments.

= What happens if my credits are used up? =

If your credits are running low you will be informed by email. If the credits are used up you get an additional email. In case you do not have any credits left the service will always respond with an OK (like the used domain is valid to subscribe). 

In other words: even if you do not have any credits left your subscribers are allowed to subscribe (or leave comments or whatever). But users subscribing with trashmail / disposable email addresses are also allowed ...

Please see http://www.block-disposable-email.com/pricing.php if you need more than the 200 free credits a month. 

= Why should I use this service? I use CAPTCHA so it is hard for robots to register automatically. Captcha normally does a great job. For robots it is hard to register indeed. =

What Captcha cannot block are human subscribers using one-time email-addresses. It is bad to have such addresses in your userbase for several reasons. And yes, it is easy to block *.ru addresses, known domains as trashmail.net, and some others - but they are changing continuously. This service currently detects about 3.000 domains. So maybe it is a good alternative for your manually maintained blocklist.

= I got a "BLOCK" response for a domain which is running no dea (disposable email address) services. How can I prevent or correct these false positives? =

This should be happen very rarely. In this case I kindly ask you to report this mistake. 

= Is there a documentation for the api in case I need to use the service without Wordpress? =

Sure. Have a look at http://www.block-disposable-email.com/usage.php. There are several documents for the json, txt and php-serialized api.

== Changelog ==

= 0.5 =
* Added support for Wordpress 4.1.2
* Changed used api to easyapi (see http://www.block-disposable-email.com/cms/help-and-usage/easy-api/)

= 0.5 =
* Added a huge warning message in case no api key has been inserted after activation. Should make clear that the plugin does not work without the free registration.

= 0.4 =
* Changed host for status messages from www. to status.block-disposable-email.com
* In the admin section of the plugin the server ip will be listed to make it easier to register an api key.
* Added some more information to readme.txt regarding privacy and other issues. 
* Added a FAQ section.

= 0.3 =
* Added status request for the admin part of the plugin. Shows now if a entered api key is valid or not. Additionally the number of free credits are shown. 

= 0.2 =
* First version released.

== Upgrade Notice ==

Simply reinstall.
