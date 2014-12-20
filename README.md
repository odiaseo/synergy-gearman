SynergyGearman
===================
Version 0.1.0 Created by Mike Willbanks

Introduction
------------

SynergyGearman is a module that handles interfacing with the Gearman extension.
This module presently can handle client and worker communication and abstracts
portions of task handling.  The overall goal is once Zend\Console has been
completed to integrate workers into the Console to make building out gearman
worker models far more simplistic.

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (beta4+)
* [PECL Gearman](http://pecl.php.net/package/gearman)

Installation
------------

*Composer*
Your composer.json should include the following. 

	{
	"repositories": [
	        {
	            "type": "package",
	            "package": {
	                "version": "master",
	                "name": "SynergyGearman",
	                "source": {
	                    "type": "git",
	                    "url": "https://github.com/mwillbanks/SynergyGearman",
	                    "reference": "master"
	                } 
	            }

	        }
	    ],
		"require": {
		        "SynergyGearman": "master"
		    }
    }

*Git Submodule*

* git submodule add [repo-url] ./vendor/SynergyGearman
* add 'SynergyGearman' to your application.config.php file

Usage
-----

*DI Configuration for Connection Handling*

```
 
    <?php
      return array(
        'di' => array(
        'instance' => array(
            'SynergyGearman\Client\Pecl' => array(
                'parameters' => array(
                    'servers' => array(
                        array('localhost'),
                    ),
                ),
            ),
            'SynergyGearman\Worker\Pecl' => array(
                'parameters' => array(
                    'servers' => array(
                        array('localhost'),
                    ),
                ),
            ),
        ),
       ),
   );
```

*Submitting a Job to Gearman*

```

    <?php
    $gearman = $serviceMananger->get('SynergyGearman\Client\Pecl');
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
    $gearman = $serviceMananger->get('SynergyGearman\Worker\Pecl');
    $gearman->register('myJob', 'handleJob');
    $gearman->connect();
    while($gearman->work());
    
    function handleJob($job) {
        $workload = $job->workload();
        echo $workload;
    }

```
Roadmap
-------
* Integrate Net\_Gearman from PEAR
* Integrate Zend\Console for a BaseWorker
