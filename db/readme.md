#mysqli vs pdo vs idiorm vs doctrine-dbal
##Test environment
digitalocean.com vps with 512MB RAM with CentOS and PHP 5.5
##How to test
####Generate database sample data
Use `sampledb` script to generate sample database. It will insert 1000 sample data for `person` table. Be aware that it use composer. So you need to run `composer install` before running the script. Also don't forget to configure the database.
Then run with browser `http://128.199.217.149/benchmark/benchmark/db/sampledb/generate.php`.
####Memory usage
I added the following line in the end of the file. It will show the memory usage  during execution.
`echo "\n<p>Memory usage: ".memory_get_usage()." bytes.</p>\n\n";`
<br>Upload the scripts, and run them with browser.
####Execution time
I run apache bench inside vps command line. Send 1000 requests with 10 concurrent users. 
<br>mysqli:<br>
`ab -n 1000 -c 10 http://128.199.217.149/benchmark/benchmark/db/mysqli/`
<br>pdo:<br>
`ab -n 1000 -c 10 http://128.199.217.149/benchmark/benchmark/db/pdo/`
<br>idiorm:<br>
`ab -n 1000 -c 10 http://128.199.217.149/benchmark/benchmark/db/idiorm/`
<br>doctrine-dbal:<br>
`ab -n 1000 -c 10 http://128.199.217.149/benchmark/benchmark/db/doctrine/`

##Result
####Memory usage
* Mysqli: 251,760 bytes
* PDO: 313,400 bytes
* Idiorm: 416,056 bytes
* Doctrine-dbal: 565,928 bytes 

####Execution time
* Mysqli: 
	* Requests per second: 627.00
	* Time per request: 15.949ms
	
* PDO: 
	* Requests per second: 587.56
	* Time per request: 17.020ms

* Idiorm: 
	* Requests per second: 481.36
	* Time per request: 20.774ms

* Doctrine-dbal: 
	* Requests per second: 351.67
	* Time per request: 28.436ms

##Conclusion
Doctrine-dbal consume almost twice as much as mysqli. Not only that, it also almost twice slower than mysql as well. For me it is an issue because doctrine-dbal is the foundation of doctrine-orm. So I will never consider to use doctrine-orm as my orm. If I'd like to choose an orm, I will use a lightweight orm like idiorm.

If I'd like to max out the performance on shared hosting, I'll use mysqli. If I need the application to be able to run to multiple dbms, I will consider between pdo and idiorm.

