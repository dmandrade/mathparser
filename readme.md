Expression Evaluator
====

A expression evaluator package with support to logical and comparison operators, also custom function and variables.

Example Usage
---
> $math = new MathParser\Engine;

> echo $math->evalute('5 + 3 * 2');

> // outputs 11


Example evaluations
---

`5 + 3 * 2`

11

`(1 > 2 AND 3 < 2) OR 1+2 == 3`

 0
  
 
 `(3 > 2) AND (3 < 5)`
 
 1


 `(1 > 2) OR (3 < 5)`
 
 1


 `(1 > 2) OR (6 > 5)`
 
 1


 `(1 > 2) OR (6 < 5)`
 
 0


 `1 + 2 == 3`
 
 1


 `2 < 1 + 2`
 
 2


 `(2 < 1) + 2`
 
 2

 `((2 < 1) + 2) == 2`
 
 1

 `-8/-2`
 
 4

 `-8/2`
 
 -4

 `-8/-2 + 15 * 1`
 
 19


Inspired by & developed upon https://gist.github.com/ircmaxell/1232629
