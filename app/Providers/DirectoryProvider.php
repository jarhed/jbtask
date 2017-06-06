<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use App\Company;

class DirectoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $directoryFile = file_get_contents(storage_path('app/company-data.json'));
        $companies = json_decode($directoryFile);

        Company::truncate();

        foreach ($companies as $company) {
          
          $insertCompany = new Company;

          $insertCompany->title = $company->Title;
          $insertCompany->category = $company->{'Business Category'};
          $insertCompany->subcategory = $company->{'Business Sub Category'};
          $insertCompany->body = $company->Body;
          $insertCompany->location = $company->Location;
          $insertCompany->url = $company->{'Web Address'};
          $insertCompany->email = $company->{'Email Address'};
          $insertCompany->telephone = $company->Telephone;
          $insertCompany->facebook = $company->Facebook;
          $insertCompany->twitter = $company->Twitter;
          $insertCompany->instagram = $company->Instagram;

          $insertCompany->save();

        }
        // Cache::put('companies', json_decode($directoryFile), 999999);
        // Cache::put('users', 'asdad'.json_decode($directoryFile));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
