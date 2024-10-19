# cms
 

composer require novay/cms

php artisan vendor:publish --provider=Laravel\\Pulse\\PulseServiceProvider &&
php artisan vendor:publish --provider=QCod\\Settings\\SettingsServiceProvider &&
php artisan vendor:publish --provider=Venturecraft\\Revisionable\\RevisionableServiceProvider &&
php artisan vendor:publish --provider=Cviebrock\\EloquentSluggable\\ServiceProvider &&
php artisan vendor:publish --provider=Spatie\\Activitylog\\ActivitylogServiceProvider &&
php artisan vendor:publish --provider=Spatie\\Permission\\PermissionServiceProvider &&
php artisan vendor:publish --provider=Spatie\\Backup\\BackupServiceProvider &&
php artisan vendor:publish --provider=Novay\\CMS\\Providers\\CMSServiceProvider --force &&
php artisan migrate