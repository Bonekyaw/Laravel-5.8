<?php

use Illuminate\Foundation\Inspiring;
use App\Company;
use App\Customer;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
Artisan::command('clean:company', function(){
    $this->info('Removing Process of unrelated companies');
    Company::whereDoesntHave('customers')
    ->get()
    ->each(function ($company){
        $company->delete();
        $this->info('Removed '.$company->name);
    });
    $this->info('Removing Process Done');
})->describe('Removing Process of unrelated companies');
