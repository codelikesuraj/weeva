<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;
use App\Models\Work;
use App\Models\IssuedTo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        $contact1 = Contact::factory()->create([
            'added_by' => $user,
            'name' => 'sales1',
            'type' => 'sales',
        ]);
        $contact2 = Contact::factory()->create([
            'added_by' => $user,
            'name' => 'weaver1',
            'type' => 'weaver',
        ]);
        $contact3 = Contact::factory()->create([
            'added_by' => $user,
            'name' => 'weaver2',
            'type' => 'weaver',
        ]);

        $work = Work::factory()->create([
            'owned_by' => $user,
            'issued_by' => $contact1,
        ]);

        $IssuedTo1 = IssuedTo::factory()->create([
            'work_id' => $work,
            'contact_id' => $contact2,
        ]);

        $IssuedTo2 = IssuedTo::factory()->create([
            'work_id' => $work,
            'contact_id' => $contact3,
        ]);
    }
}
