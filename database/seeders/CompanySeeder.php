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
			$subdistrictId = $i + 1;

			$company = new Company();
			$company->subdistrict_id = $subdistrictId;
			$company->name = $companiesName[$i];
			$company->image_profile_path = 'companies-photo-profile/' . $imageProfile[$i];
			$company->address = "JL. Pengadegan Timur $i";
			$company->save();
		}
    }
}
