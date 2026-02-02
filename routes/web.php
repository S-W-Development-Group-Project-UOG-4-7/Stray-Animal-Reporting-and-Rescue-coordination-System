<?php

/*
|--------------------------------------------------------------------------
| SafePaws Unified Web Routes
|--------------------------------------------------------------------------
|
| All routes are organized into separate files by module:
| - auth.php    -> Login, Register, Logout
| - public.php  -> Public pages (home, adoption browsing, reporting, donations)
| - rescue.php  -> Rescue team dashboard & operations
| - admin.php   -> Admin panel (users, products, vets, reports)
| - vet.php     -> Veterinarian portal
|
*/

require __DIR__.'/auth.php';
require __DIR__.'/public.php';
require __DIR__.'/rescue.php';
require __DIR__.'/admin.php';
require __DIR__.'/vet.php';
