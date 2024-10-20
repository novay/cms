# cms
 

laravel new laravel-cms
- Would you like to install a starter kit? : No starter kit
- Which testing framework do you prefer? : Pest 
- Would you like to initialize a Git repository? : No
- []
- Which database will your application use? : SQLite
- Would you like to run the default database migrations? : Yes

cd laravel-cms

composer require novay/cms && composer require laravel/sanctum

php artisan boilerplate:install

php artisan vendor:publish --provider="Novay\Boilerplate\BoilerplateServiceProvider" --tag="config" &&
php artisan vendor:publish --provider=QCod\\Settings\\SettingsServiceProvider &&
php artisan vendor:publish --provider=Venturecraft\\Revisionable\\RevisionableServiceProvider &&
php artisan vendor:publish --provider=Cviebrock\\EloquentSluggable\\ServiceProvider &&
php artisan vendor:publish --provider=Spatie\\Activitylog\\ActivitylogServiceProvider &&
php artisan vendor:publish --provider=Spatie\\Permission\\PermissionServiceProvider &&
php artisan vendor:publish --provider=Spatie\\Backup\\BackupServiceProvider &&
php artisan vendor:publish --provider=Novay\\CMS\\Providers\\CMSServiceProvider --force &&
php artisan migrate

npm install 
npm run dev



.env 

SCOUT_DRIVER=database
RESEND_API_KEY=