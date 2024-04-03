<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            $profileImage = $this->getRandomImageUrl();
            // Example of generating fake university names
$universities = ['University of Example', 'Example State University', 'Example College'];


            DB::table('fake_users')->insert([
                'uid' => Str::random(28),
                'about' => $faker->text,
                'age' => $faker->numberBetween(18, 80),
                'alcohol' => $faker->randomElement(['Never', 'Socially', 'Regularly']),
                'balance' => $faker->randomFloat(2, 0, 1000),
                'bodyType' => $faker->randomElement(['Slim', 'Average', 'Athletic', 'Heavyset']),
                'children' => $faker->randomElement(['No', 'Yes, living together', 'Yes, not living together']),
                'city' => $faker->city,
                'chatList' => $faker->text,
                'company' => $faker->company,
                'country' => $faker->country,
                'dob' => $faker->date,
                'figureType' => $faker->randomElement(['Ectomorph', 'Mesomorph', 'Endomorph']),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'genotype' => $faker->randomElement(['AA', 'AS', 'SS']),
                'height' => $faker->numberBetween(140, 220),
                'hideAccount' => $faker->boolean,
                'hobbies' => $faker->text,
                'languages' => $faker->text,
                'lastOnline' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'),
                'latitude' => $faker->latitude,
                'likes' => $faker->text,
                'longitude' => $faker->longitude,
                'name' => $faker->name,
                'notification' => $faker->boolean,
                'online' => $faker->boolean,
                'paid' => $faker->boolean,
                'partnerType' => $faker->randomElement(['Friendship', 'Relationship', 'Marriage']),
                'phoneNumber' => $faker->phoneNumber,
                'position' => $faker->jobTitle,
                'preference' => $faker->randomElement(['Male', 'Female', 'Both']),
                'profileImage' => $profileImage,
                  'profileViews' => $faker->text,
                'smoking' => $faker->randomElement(['No', 'Occasionally', 'Regularly']),
                'specialty' => $faker->text,
                'state' => $faker->state,
                'status' => $faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
                'university' => $faker->randomElement($universities),
                'verified' => $faker->boolean,
                'weight' => $faker->numberBetween(40, 120),
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Get a random image URL using Lorem Picsum.
     *
     * @return string
     */
    private function getRandomImageUrl()
    {
        $width = 200; // Adjust the image width as needed
        $height = 200; // Adjust the image height as needed
        $randomImageId = rand(1, 1000); // Get a random image ID

        return "https://picsum.photos/{$width}/{$height}?random={$randomImageId}";
    }
}
