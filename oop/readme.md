#Procedural vs OOP
###Test environtment
digitalocean.com vps with 512MB RAM with CentOS and PHP 5.5
###How to test
#####Memory usage
I added the following line in the end of the file. It will show the memory usage  during execution.
`echo "\n<br>Memory usage: ".memory_get_usage()." bytes.\n\n";`
<br>Upload the scripts, and run them with browser.
#####Execution time
I run apache bench inside vps command line. Send 1000 requests with 10 concurrent users. 
`ab -n 1000 -c 10 http://128.199.217.149/benchmark/benchmark/oop/hello-oop.php`
<br>and
`ab -n 1000 -c 10 http://128.199.217.149/benchmark/benchmark/oop/hello-procedural.php`
###Result
#####Memory usage
- Procedural: 230,888 bytes
- OOP: 233,880 bytes
#####Execution time
- Procedural: 
	- Requests per second: 3810.57 
	- Time per request: 2.624
- OOP: 233,880 bytes
	- Requests per second: 1276.58 
	- Time per request: 7.833ms
###Conclusion
It is obviously that the procedural will be faster. It run 2-3 times faster. But surprisingly the OOP consume slightly higher than procedural.

