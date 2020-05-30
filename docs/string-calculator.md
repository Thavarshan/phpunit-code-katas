# String Calculator Kata

## Definition

A string calculator breaks down a given string in to characters, evaluates them to determine if they are numbers and performs calculations on them, finally returning the result as the output.

## Process

1. Create a simple string calculator with a method signature: `add(string $number)`
    - The method can take up to two numbers, seperated by commas, and will return their sum.
    - For example "" or "1" or "1, 2" as inputs. (For an empty string it will return 0)  
2. Allow the add method to handle an unknown amount of numbers
3. Allow the add method to handle new lines between numbers (instead of commas).
    - The following input is ok: "1\n2, 3" (will equal 6)
    - The following input is NOT ok: "1, \n" (no need to prove it - just clarifying)
4. Support different delimeters
    - To change delimeters, the beginning os the string will contain a seperate line that looks like the first line is optional. All existing scenarios should still be supported.
5. Calling add with a negative number will throw an exception "negative not allowed" - and the negative that was passed.
6. If there are multiple negatives, show all of them in the exception message.
7. Using TDD, Add a method  to `StringCalculator` called `public int GetCalledCount()` that returns how many times `add()` was invoked. Remember-Start with a failing (or even non compiling) test.


