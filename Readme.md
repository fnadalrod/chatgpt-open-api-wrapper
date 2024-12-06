# ChatGPT PHP Wrapper

This project is a **small PHP wrapper** designed to interact with the ChatGPT API in a **simple, maintainable, and extensible** way. It is currently in a **basic initial version**, but already provides a functional starting point for integrating the API into PHP projects.

## Features

- **Easy to use:** Minimal configuration required to start sending prompts and receiving responses.
- **Customizable:** Ability to define the HTTP client (e.g., Guzzle) and configure key API options.
- **Extensible:** Designed structure to easily add future improvements and new features.

## Installation

```bash
composer require fnadalrod/open-api-wrapper
```

## Basic Usage
Here’s an example of how to use the wrapper to make a request to the ChatGPT model:

``` php
$config = [
    "http_client" => "guzzle",
    "api_key" => "****",
    "engine" => "gpt-3.5-turbo"
];

$openApiClient = new OpenApiClient($config);
$openApiResponse = $openApiClient->prompt('Is it working?');

echo $openApiResponse->getLastResponse();
```

### Notes
 - API Keys: You will need a valid OpenAI API key to use this library.
 - Project Status: This wrapper is in its initial stage. New features and improvements are planned for future versions.
 - More documentation is expected in the future

### Contributing
If you would like to contribute to the development, feel free to open an issue to report problems or discuss potential improvements in pull requests.

### License
This project is available under the MIT License, you can use this code however you wish.