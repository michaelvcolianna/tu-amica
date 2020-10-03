# Environmental Variables
This is designed to deliver environmental variables to the build process. 
In this iteration of our build process, we are incorporating these environmental variables into the WebPack (JS, CSS) build process &mdash; making them available to the JS files!

## Schema
```
ID: `String` Environment identification token; unique to each environment, this value exists to help distinguish the `.env` files (for the DevOps developer's sanity) and isn't intended to be used in the build process.
EXAMPLE_VARIABLE: `String` An example value.
EXAMPLE_API_KEY="123456789"
```

## Example Environmental Variable Sets

1. `master`
    - ```
    ID="master"
    EXAMPLE_VARIABLE="foo"
    EXAMPLE_API_KEY="111111111"
    ```
2. `develop` (serves as default)
    - ```
    ID="default/development"
    EXAMPLE_VARIABLE="bar"
    EXAMPLE_API_KEY="222222222"
    ```
3. `qa1`
    - ```
    ID="qa1"
    EXAMPLE_VARIABLE="baz"
    EXAMPLE_API_KEY="333333333"
    ```
