<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
		$companiesName = ['Xendit', 'PT. Smartfren Telcom Tbk', 'PT. Visionet Indonesia', 'Fabelio'];
		$imageProfile = ['xendit.png', 'smartfren.png', 'ovo.png', 'fabelio.png'];

		$totalCompany = count($companiesName);
		for ($i = 0; $i < $totalCompany; $i++) {
			$company = new Company();
			$company->name = $companiesName[$i];
			$company->image_profile_path = 'company-photo-profile/' . $imageProfile[$i];
			$company->address = "JL. Pengadegan Timur $i";
			$company->save();
		}
    }
}
