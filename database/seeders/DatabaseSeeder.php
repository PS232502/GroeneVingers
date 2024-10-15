<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Absence;
use App\Models\Adress;
use App\Models\Person;
use App\Models\PersonalSchedule;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create absence record
        $absence = Absence::create([
            'absence'=> 'sick',
            'startdate' => '2024-03-06',
            'enddate' => '2024-03-07'
        ]);

        $absence1 = Absence::create([
            'absence'=> 'present',
            'startdate' => '2024-03-07',
            'enddate' => '2024-03-08'
        ]);

        $absence2 = Absence::create([
            'absence'=> 'present',
            'startdate' => '2024-03-08',
            'enddate' => '2024-03-09'
        ]);

        $absence3 = Absence::create([
            'absence'=> 'present',
            'startdate' => '2024-03-10',
            'enddate' => '2024-03-11'
        ]);

        $absence4 = Absence::create([
            'absence'=> 'present',
            'startdate' => '2024-03-12',
            'enddate' => '2024-03-13'
        ]);

        // Create address record
        $address = Adress::create([
            'city' => 'eindhoven',
            'postalcode' => '5531 km',
            'street' => 'lupine',
            'housenumber' => '28',
        ]);

        $address1 = Adress::create([
            'city' => 'veldhoven',
            'postalcode' => '5574 lw',
            'street' => 'kerkstraat',
            'housenumber' => '55',
        ]);

        $address2 = Adress::create([
            'city' => 'eindhoven',
            'postalcode' => '5582 rv',
            'street' => 'dorpstraat',
            'housenumber' => '74',
        ]);

        $address3 = Adress::create([
            'city' => 'geldrop',
            'postalcode' => '5678 wv',
            'street' => 'schoolstraat',
            'housenumber' => '69',
        ]);

        $address4 = Adress::create([
            'city' => 'helmond',
            'postalcode' => '5674 pl',
            'street' => 'markt',
            'housenumber' => '48',
        ]);

        // Create schedule record
        $schedule = Schedule::create([
            'dayname' => 'monday',
            'starttime' => '10:00:00',
            'endtime' => '19:00:00',
        ]);

        $schedule1 = Schedule::create([
            'dayname' => 'tuesday',
            'starttime' => '10:00:00',
            'endtime' => '19:00:00',
        ]);
        
        $schedule2 = Schedule::create([
            'dayname' => 'wednesday',
            'starttime' => '10:00:00',
            'endtime' => '19:00:00',
        ]);

        $schedule3 = Schedule::create([
            'dayname' => 'thursday',
            'starttime' => '10:00:00',
            'endtime' => '19:00:00',
        ]);

        $schedule4 = Schedule::create([
            'dayname' => 'friday',
            'starttime' => '10:00:00',
            'endtime' => '19:00:00',
        ]);

        $person = Person::create([
            'adress_id' => $address->id,
            'password' => 'admin',
            'firstname' => 'kees',
            'lastname' => 'de vries',
            'dateofbirth' => '1995-04-21',
            'phonenumber' => '0684953514',
            'email' => 'keesdevries@hotmail.com',
            'function' => 'admin',
        ]);

        $person1 = Person::create([
            'adress_id' => $address1->id,
            'password' => 'lkasdjf',
            'firstname' => 'kira',
            'lastname' => 'janssen',
            'dateofbirth' => '1998-04-18',
            'phonenumber' => '0684953513',
            'email' => 'kirajanssen@hotmail.com',
            'function' => 'employee',
        ]);

        $person2 = Person::create([
            'adress_id' => $address2->id,
            'password' => 'oopop',
            'firstname' => 'tom',
            'lastname' => 'hoeks',
            'dateofbirth' => '1988-11-08',
            'phonenumber' => '0684953522',
            'email' => 'tomhoeks@hotmail.com',
            'function' => 'employee',
        ]);

        $person3 = Person::create([
            'adress_id' => $address3->id,
            'password' => 'dsklfa',
            'firstname' => 'teun',
            'lastname' => 'jansen',
            'dateofbirth' => '1995-05-14',
            'phonenumber' => '0684953588',
            'email' => 'teunjansen@hotmail.com',
            'function' => 'employee',
        ]);

        $person4 = Person::create([
            'adress_id' => $address4->id,
            'password' => 'eoie',
            'firstname' => 'lara',
            'lastname' => 'meulendijks',
            'dateofbirth' => '1999-10-10',
            'phonenumber' => '0684953574',
            'email' => 'larameulendijks@hotmail.com',
            'function' => 'employee',
        ]);

        // Attach personal schedule to the person

        $personalSchedule = $person->personalSchedules()->create([
            'schedule_id' =>$schedule->id,
            'absence_id' => $absence->id,
        ]);

        $personalSchedule1 = $person1->personalSchedules()->create([
            'schedule_id' =>$schedule1->id,
            'absence_id' => $absence1->id,
        ]);

        $personalSchedule2 = $person2->personalSchedules()->create([
            'schedule_id' =>$schedule2->id,
            'absence_id' => $absence2->id,
        ]);

        $personalSchedule3 = $person3->personalSchedules()->create([
            'schedule_id' =>$schedule3->id,
            'absence_id' => $absence3->id,
        ]);

        $personalSchedule4 = $person4->personalSchedules()->create([
            'schedule_id' =>$schedule4->id,
            'absence_id' => $absence4->id,
        ]);
        // $person->personalSchedules()->save($personalSchedule);
        // $personalSchedule->update(['person_id' => $person->id]);  // Update the previously null person_id
    
        // $this->call([
        //     AbsenceSeeder::class,
        //     ScheduleSeeder::class,
        //     AdressSeeder::class,
        //     PersonSeeder::class,
        //     PersonalScheduleSeeder::class,
            
        // ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
