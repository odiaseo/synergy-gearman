SynergyGearman
===================
Version 0.1 Created Pele Odiase Originally by Mike Willbanks

 
Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2)
* [PECL Gearman](http://pecl.php.net/package/gearman)

Installation
------------

*Composer*
Your composer.json should include the following. 

	{
	"repositories": [
            "type": "vcs",
            "url": "git@github.com:odiaseo/synergy-gearman.git"
	    ],
		"require": {
		        "synergy/gearman": "master"
		    }
    }
 
Usage
-----

*Submitting a Job to Gearman*

```

    <?php
    $gearman = $serviceMananger->get('german\client\pecl');
    $gearman->connect();
    
    $workload = 'some-string';
    
    $task = new SynergyGearman\Task\Task();
    $task->setBackground(true)
         ->setFunction('myJob')
         ->setWorkload($workload)
         ->setUnique(crc32($workload));
    
    $handle = $gearman->doTask($task);
    ```
    
    *Retrieving a Job from Gearman*

```

    <?php
    $gearman = $serviceMananger->get('gearman\worker\pecl');
    $gearman->register('myJob', 'handleJob');
    $gearman->connect();
    while($gearman->work());
    
    function handleJob($job) {
        $workload = $job->workload();
        echo $workload;
    }

```