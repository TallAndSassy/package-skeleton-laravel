'Hello' => 'Hi', // Access this in a blade via {{ __('languageprefix::domainx.Hello') }} or {{trans('...)}}
    // Note: language prefix does NOT need to match your blade prefix.  This is set in the ServiceProvider
    // You can make additional domains - just make a new file called 'blah.php' and access it via  __('languageprefix::blah.OtherKey')
    // Override this in your app by making resources/lang/vendor/languageprefix/en/domainx.php #Note: it is 'vendor' not 'spatie' and 'languageprefix', not 'bladeprefix' or 'skeleton'
    // view sample_blade.blade.php for examples on how to utilize these.
    'welcome' => 'Welcome, :name', //  access via: __('languageprefix::domainx.welcome', ['name' => 'dayle']);
    /* https://laravel.com/docs/8.x/localization
    If your placeholder contains all capital letters, or only has its first letter capitalized, the translated value will be capitalized accordingly:
    'welcome' => 'Welcome, :NAME', // Welcome, DAYLE
    'goodbye' => 'Goodbye, :Name', // Goodbye, Dayle
    */
