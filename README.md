#PHPetroleum
------------
Because at least one good thing comes from petroleum industry

[![Build Status](https://travis-ci.org/PedroTroller/PHPetroleum.svg)](https://travis-ci.org/PedroTroller/PHPetroleum)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/PedroTroller/PHPetroleum/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PedroTroller/PHPetroleum/?branch=master)

##Installation

```bash
composer require pedrotroller/phpetroleum ~1.0.0
```

##Usage
###Create a simple pipe
```php
$pipe = new PHPetroleum\Pipe('/tmp/pipe');
```

Then you, are able to write some content on this Pipe
```php
$pipe->write('some content');
```

Or you can wait for content
```php
$content = $pipe->read();
```

###Use stream
####One-way stream
```php
$pipe   = new PHPetroleum\Pipe('/tmp/input');
$stream = new PHPetroleum\Stream\ReaderStream($pipe);
$content = $stream->read();
```
```php
$pipe   = new PHPetroleum\Pipe('/tmp/output');
$stream = new PHPetroleum\Stream\WriterStream($pipe);
$stream->write($content);
```

####Two-way stream
This stream is using tow pipes, one to read content, the other one to answer.
```php
$input   = new PHPetroleum\Pipe('/tmp/input');
$output  = new PHPetroleum\Pipe('/tmp/output');
$stream  = new PHPetroleum\Stream\TwoWayStream($input, $output);
$content = $stream->read();
$stream->write('Other content');
```

##How did it works
The Pipe object will push two elements into the pipe file, the message size and the message itself.
By default, the message size is stored into 8 bytes but you can change the size.
For exemle, if you write ```test```, the entire message will be ```00000004test``` (```00000004``` is the size for the message, ```test``` the message itself)
If you set the message size length to 6 (```php $pipe = new PHPetroleum\Pipe('/tmp/file', 6); ```) ```test``` will be stored ```000004test```
