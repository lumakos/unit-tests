```
 vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```


```
composer dump-autoload
```

## Course

https://www.udemy.com/course/php-unit-testing/learn/lecture/50748547#overview


## createStub() vs createMock() in Unit Tests

### createStub() – “Give me data, I don’t care how it’s called”
What it is

A stub:

Returns predefined / static data

❌ Does not verify if or how it was called

❌ Does not fail if it was never called

❌ Does not fail if it was called multiple times

When to use

Use a stub when:

- You only care about the returned value

- The interaction itself is not part of the test

- You want to keep tests simple and resilient to refactoring


### createMock() – “I want to verify that something happened”
What it is

A mock:

Can return data

✅ Verifies that a method was called

✅ Verifies how many times it was called

✅ Verifies with which arguments

❌ Fails the test if expectations are not met

When to use

Use a mock when:

- The interaction itself matters

- You want to assert behavior, not just results

- The call represents a contract or side effect


### Using Mockery to Mock a Dependency that doesn't exist yet