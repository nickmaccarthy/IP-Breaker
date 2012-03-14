IP Breaker
====================

The IP Breaker will break a network, or rannge, into a list of each individual host (/32) in the network or range respectively.  


Features:
-------------------

Works on CIDR notation networks in both shorthand, or full -- example:  192.168.0.0/16 or 192.168/16 will both work

Will break a network range as well.  Example 192.168.1.1-192.168.1.3 will return ( 192.168.1.1, 192.168.1.2, 192.168.1.3)

If given a /32 or individual host, it will return that host back as given.

Usage:
-------------------
Put your IPs in the text box comma or space seperated (ex. 192.168.0/24, 10.10.20.1-10.10.20-30, 192.168.40.1, 172.16.32.0/27) and submit.  You will be take to a page containing each /32.

IPs must be in the following format and comma or space seperated before submission:
-------------------------------
* 192.168.1.10 - Single Host
* 192.168.1.0/24  - Full CIDR
* 192.168/16 - Shorthand CIDR
* 10.10.10.1-10.10.10.30 - Range

Note -- that if the results of your submission return more than what is defined in the defult threshold in config.php (defualt 3000), you will receive a text file back instead of a the resutls in your browser.

Known issues:
--------------
Has trouble right now with very large networks like a /8.  You can get around it by upping the memory in config.php, but you will need a large ammount, 2-4GB.

License:
-------------
IP Breaker is released under the GPLv3 and MIT license

Requirements:
-------------
* PHP 5+
* 512 MB RAM
* IPTools ( http://www.github.com/nickmaccarthy/IPTools/ )


Created by <a href="mailto:nickmaccarthy@gmail.com">Nick MacCarthy</a> of <a href="http://www.nickmaccarthy.com">nickmaccarthy.com</a>
