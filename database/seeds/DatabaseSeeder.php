<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Province;
use App\City;
use App\Tag;
use App\Setting;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		Model::unguard();

		$this->call('UserTableSeeder');

		$this->call('ProvinceTableSeeder');

		$this->call('CityTableSeeder');

		$this->call('TagTableSeeder');

		$this->call('SettingTableSeeder');

	}

}


class UserTableSeeder extends Seeder {

  public function run()
  {

    DB::table('users')->delete();

    User::create([
			'name' => 'Example EO',
			'email' => 'example@gmail.com',
			'password' => bcrypt('example'),
			'info' => 'This user is a example eo to test for this website',
			'level' => '1'
		]);

		User::create([
			'name' => 'Pujangga',
			'email' => 'pujangga@gmail.com',
			'password' => bcrypt('pujangga'),
			'info' => 'This user is a example eo to test for this website',
			'level' => '1'
		]);

		User::create([
			'name' => 'Administrator',
			'email' => 'admin@gmail.com',
			'password' => bcrypt('admin'),
			'info' => 'This user is a example admin to test for this website',
			'level' => '2'
		]);

  }

}

class ProvinceTableSeeder extends Seeder {

	public function run()
	{

		DB::table('provinces')->delete();

		//SUMATERA
		Province::create(['id' => '1', 'province_name' => 'Nanggro Aceh Darussalam']);
		Province::create(['id' => '2', 'province_name' => 'Sumatera Utara']);
		Province::create(['id' => '3', 'province_name' => 'Sumatera Barat']);
		Province::create(['id' => '4', 'province_name' => 'Riau']);
		Province::create(['id' => '5', 'province_name' => 'Kepulauan Riau']);
		Province::create(['id' => '6', 'province_name' => 'Jambi']);
		Province::create(['id' => '7', 'province_name' => 'Sumatera Selatan']);
		Province::create(['id' => '8', 'province_name' => 'Bangka Belitung']);
		Province::create(['id' => '9', 'province_name' => 'Bengkulu']);
		Province::create(['id' => '10', 'province_name' => 'Lampung']);

		//JAWA
		Province::create(['id' => '11', 'province_name' => 'DKI Jakarta']);
		Province::create(['id' => '12', 'province_name' => 'Jawa Barat']);
		Province::create(['id' => '13', 'province_name' => 'Banten']);
		Province::create(['id' => '14', 'province_name' => 'Jawa Tengah']);
		Province::create(['id' => '15', 'province_name' => 'Daerah Istimewa Yogyakarta']);
		Province::create(['id' => '16', 'province_name' => 'Jawa Timur']);

		//NUSA TENGGARA & BALI
		Province::create(['id' => '17', 'province_name' => 'Bali']);
		Province::create(['id' => '18', 'province_name' => 'Nusa Tenggara Barat']);
		Province::create(['id' => '19', 'province_name' => 'Nusa Tenggara Timur']);

		//KALIMANTAN
		Province::create(['id' => '20', 'province_name' => 'Kalimantan Barat']);

		Province::create(['id' => '21', 'province_name' => 'Kalimantan Tengah']);
		Province::create(['id' => '22', 'province_name' => 'Kalimantan Selatan']);
		Province::create(['id' => '23', 'province_name' => 'Kalimantan Timur']);

		//SULAWESI
		Province::create(['id' => '24', 'province_name' => 'Sulawesi Utara']);
		Province::create(['id' => '25', 'province_name' => 'Sulawesi Barat']);
		Province::create(['id' => '26', 'province_name' => 'Sulawesi Tengah']);
		Province::create(['id' => '27', 'province_name' => 'Sulawesi Tenggara']);
		Province::create(['id' => '28', 'province_name' => 'Sulawesi Selatan']);
		Province::create(['id' => '29', 'province_name' => 'Gorontalo']);

		//MALUKU & PAPUA
		Province::create(['id' => '30', 'province_name' => 'Maluku']);

		Province::create(['id' => '31', 'province_name' => 'Maluku Utara']);
		Province::create(['id' => '32', 'province_name' => 'Papua Barat']);
		Province::create(['id' => '33', 'province_name' => 'Papua']);

	}

}

class CityTableSeeder extends Seeder {

	public function run()
	{

		DB::table('cities')->delete();

		City::create(['id' => '1', 'province_id' => '12', 'city_name' => 'Bandung']);
		City::create(['id' => '2', 'province_id' => '12', 'city_name' => 'Bogor']);
		City::create(['id' => '3', 'province_id' => '12', 'city_name' => 'Depok']);
		City::create(['id' => '4', 'province_id' => '12', 'city_name' => 'Cirebon']);
		City::create(['id' => '5', 'province_id' => '12', 'city_name' => 'Kuningan']);

	}

}

class TagTableSeeder extends Seeder {

	public function run()
	{

		DB::table('tags')->delete();

		Tag::create(['name' => 'Hiburan']);
		Tag::create(['name' => 'Olahraga']);
		Tag::create(['name' => 'Music']);

	}

}

class SettingTableSeeder extends Seeder {

	public function run()
	{

		DB::table('settings')->delete();

		Setting::create([
			'address' => 'Jln. Kuningan No.32 45571',
			'contact' => '+62896-6016-5611',
			'email' => 'pegiyo@gmail.com',
			'info' => 'Website ini merupakan website untuk menyediakan layanan informasi wvwnt yang berada di indonesia. Seluruh ivent Organize di wilayah indonesia hadir pada website ini untuk menyediakan informasi tentang event-event yang akan mereka hadirkan. Dengan adanya website ini diharapkan dapat memudahkan para pencari event dalam mendapatkan informasi tentang event-event yang cocok dengan meraka.',
			'chat' => '54FC2AA',
			'paging' => '10',
			'slide_front' => '5',
			'slide_inside' => '5',
			'facebook' => 'facebook.com/Pegiyo',
			'twitter' => 'twitter.com/pegiyo',
			'google' => 'plus.google.com/pegiyo',
			'rss' => 'pegiyo'
		]);

	}

}
