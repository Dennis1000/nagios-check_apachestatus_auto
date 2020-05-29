# nagios-check_apachestatus_auto

A Nagios plugin that parses the status page of an apache or lighttpd server, the plugin returns the response time, the amount of idle, busy, open (apache only) and total slots. 
The perfdata returns the status of all slots including Requests/sec, Bytes/Request and Bytes/sec. Optionally you can specify how much slots should be available. Use http(s) and basic user authentication with non standard server-status urls. 

This is an enhanced version of an enhanced version of Lieven De Bodt’s check_apachestatus.pl.

Detailed info at https://blog.spreendigital.de/nagios/?#check_apachestatus_auto


v1.3	2020-05-29	Fixed non numeric uptime (Andre Hotzler)
v1.2	2009-07-04	Updated perf data to be PNP compliant, added proxy option (Gerhard Lausser)
v1.1	2009-03-06	Works with lighttpd server-status as well, added accesses perfdata
v1.0	2009-03-01	Inital Release

