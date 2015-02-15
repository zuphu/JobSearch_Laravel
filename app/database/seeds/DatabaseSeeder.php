// app/database/seeds/DatabaseSeeder.php
<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// call our class and run our seeds
		$this->call('UserJobSeeder');
	}

}

// our own seeder class
// usually this would be its own file
class UserJobSeeder extends Seeder {
	
	public function run() {

		// clear our database ------------------------------------------
		DB::table('users')->delete();
		DB::table('jobs')->delete();
		DB::table('applications')->delete();
    
		// seed our bears table -----------------------
		// we'll create three different bears

		User::create(array(
                        'email' => 'a@a.com', 
                        'password' => '$2y$10$qELnSY5m7hLDM70FTuD8uOq3.ux0R0M9xtCWwstkpCAlejD.NjaWW',
                        'firstname' => 'Alfredo',
                        'lastname' => 'Gustavo',
                        'category' => 'Employer',
                        'phonenumber' => '61359912345',
                        'remember_token' => 'default'
                       ));
    
    User::create(array(
                        'email' => 'b@b.com', 
                        'password' => '$2y$10$ZymylTastggS7NTGoelnJOjyZWo6c0sMgkSE3tiaRLHAK4aU1C9Yq',
                        'firstname' => 'b',
                        'lastname' => 'b',
                        'category' => 'Employer',
                        'phonenumber' => 'b',
                        'remember_token' => 'default'
                       ));

    User::create(array(
                        'email' => 'c@c.com', 
                        'password' => '$2y$10$OyN75iUMeTyl.hUgD6kfqu/vb74jaa7RxSG81MRI31hpdiAKZcraW',
                        'firstname' => 'Hungry',
                        'lastname' => 'Job Seeker',
                        'category' => 'Job Seeker',
                        'phonenumber' => 'c',
                        'remember_token' => 'default'
                       ));
    User::create(array(
                    'email' => 'd@d.com', 
                    'password' => '$2y$10$JcyXG8t3Co1QOo0PRRP5X.RskeaKFnC15F5dD3CSoLGeepQbJlANS',
                    'firstname' => 'd',
                    'lastname' => 'd',
                    'category' => 'Job Seeker',
                    'phonenumber' => 'd',
                    'remember_token' => 'default'
                   ));

    Job::create(array(
                      'title' => 'Code Monkey Job', 
                      'description' => 'Write lots of code, drink lots of coffee.',
                      'location' => 'Brisbane',
                      'salary' => '46000',
                      'startingdate' => '2014-01-16',
                      'endingdate' => '2014-06-18',
                      'user_id' => '1'
                    ));

   Job::create(array(
                      'title' => 'Elite Hacker', 
                      'description' => 'Hack the gibson!',
                      'location' => 'Melbourne',
                      'salary' => '1337000',
                      'startingdate' => '2014-12-16',
                      'endingdate' => '2015-06-15',
                      'user_id' => '1'
                    ));

    Job::create(array(
                      'title' => 'Board Cave', 
                      'description' => 'PHP Developer.',
                      'location' => 'Southern Gold Coast',
                      'salary' => '55,000',
                      'startingdate' => '2014-10-10',
                      'endingdate' => '2014-11-11',
                      'user_id' => '1'
                    ));
    Job::create(array(
                  'title' => 'Basket Weaver', 
                  'description' => 'Create precious baskets.',
                  'location' => 'Sydney',
                  'salary' => '22000',
                  'startingdate' => '2014-2-16',
                  'endingdate' => '2014-9-18',
                  'user_id' => '2'
                ));
    Job::create(array(
                  'title' => 'Water quality analyst', 
                  'description' => 'Save the planet from waste.',
                  'location' => 'Sydney',
                  'salary' => '22000',
                  'startingdate' => '2014-2-16',
                  'endingdate' => '2014-8-18',
                  'user_id' => '2'
                ));
    Job::create(array(
                  'title' => 'Goblin Catcher', 
                  'description' => 'Capture all of them damn filthy goblins',
                  'location' => 'Alberta',
                  'salary' => '2',
                  'startingdate' => '2015-01-16',
                  'endingdate' => '2014-7-18',
                  'user_id' => '2'
                ));
	}

}