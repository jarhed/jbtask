<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function search ($searchTerm = null) {

    	$companies = Company::where('title', 'LIKE', '%'.$searchTerm.'%')
    										->orWhere('location', 'LIKE', '%'. $searchTerm .'%')->get();

    	if (!$searchTerm) $companies = Company::all()->take(66);

			return $companies->toArray();
		}

		public function categorize ($category, $subcategory = null) {

			$companies = Company::where('category',$category);

			if ($subcategory)
				$companies->where('subcategory',$subcategory);

			return $companies->get()->toArray();
		}
}
