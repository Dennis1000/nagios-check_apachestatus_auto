# nagios-check_apachestatus_auto

A Nagios plugin that parses the status page of an apache or lighttpd server, the plugin returns the response time, the amount of idle, busy, open (apache only) and total slots. 
The perfdata returns the status of all slots including Requests/sec, Bytes/Request and Bytes/sec. Optionally you can specify how much slots should be available. Use http(s) and basic user authentication with non standard server-status urls. 

This is an enhanced version of an enhanced version of Lieven De Bodt’s check_apachestatus.pl.

Detailed info at http://blog.spreendigital.de/nagios/?#check_apachestatus_auto
