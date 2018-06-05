# latexcompiler

This project aims to create an intuitive way for laravel users to create PDF documents through LaTeX with minimal pain.

I leverage the `blade` template to write the actual LaTeX code and compile with `pdflatex`. This allows for the use of `{{ }}` to drop in variables and use all of the normal `blade` commands.

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=config
```

This publishes the default configuration file to `config/fvlatex.php` where you can modify your default preferences.

**NB:** logging automatically merges from the vendor file `fvlatexlogchannel.php` to the default `config/logging.php` file on `boot`.

## Usage

To use, initiate a new class in your controller. You pass:
- `$data` : **required** passed to the template to fill
- `$view` : **required** name of the template you wish to use
-`$fileName` : **required** the name of the file you want to use without any extensions
- `$runs` : **optional** number of times you want `pdflatex` to run, defaults to config which is initially set at 2

There are only a few public methods available:
- `compile()` : fills in the template, sends it to the shell, destroys the temp directory, and moves the pdf
- `storagePath($storagePath)` : overrides the default storage path in config...useful for multi user systems
- `delete()` : ***beta*** deletes the pdf from the storage path

## Try out

There is an example controller, tex template view, and form view included for you to try this out in your setup without having to waste time writing the form and tex files. Just copy the controller to your `app/Http/Controllers`, set up at `GET` route for the form and `POST` to the controller to get started.

## IMPORTANT!!

Make sure you have tex installed on your system and that you provide the fully qualified path to where `pdflatex` is located.

LaTeX can be pretty finicky, so I highly recommend that you test your templates extensively on a local system before deploying. Also, there is currently no escaping of user inputs, so if your users input a reserved character in Tex, it will not be escaped automatically and could break the compilation sequence.

## TODO

- [ ] Add to <pakagist.org>
- [ ] Add ability to escape user inputs
- [ ] Add ability to compile assets
- [ ] Find a better way to implement logging
- [ ] Give user more control over logging
- [ ] Add options to upload to cloud

## Collaboration

I would love to hear your thoughts and ideas about how to make this package better! Feel free to contact me, fork, or submit a pull request!
