<?php

function createDBConnection(): mysqli
{
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function example(string $string): string
{
    $string = 'Hello, World! ' . $string;
    return $string;
}

function stringExists(?string $str): ?bool {
    if ($str) {
        return true;
    }
    return null;
}

function writeln(string $string): void {
    echo $string . '<br>';
}

function checker(mixed $param): mixed {
    switch($param) {
        case is_array($param): return 'array';
        
        case is_string($param): return 'string';
        
        case is_int($param): return 'int';
        
        default: return 'other type';
    }
}

writeln('PHP Functions');

$foo = 'I love Web';
$bar = example($foo);
writeln($bar);

$arr = ['key' => 'value'];
writeln(checker($arr));

$str = 'Web';
writeln(checker($str));

$int = 123;
writeln(checker($int));

$float = 123.45;
writeln(checker($float));

$string = 'I am string'; 
if (stringExists($string)) {
    writeln('I am here');
}
$string = '';
if (stringExists($string)) {
    writeln('I am still here');
}
