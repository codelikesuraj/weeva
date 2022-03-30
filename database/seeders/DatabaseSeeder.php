<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;
use App\Models\Order;
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
            'created_by' => $user,
            'name' => 'sales1',
        ]);
        $contact2 = Contact::factory()->create([
            'created_by' => $user,
            'name' => 'weaver1',
            'type' => 'weaver',
        ]);
        $contact3 = Contact::factory()->create([
            'created_by' => $user,
            'name' => 'weaver2',
            'type' => 'weaver',
        ]);

        $order = Order::factory()->create([
            'owned_by' => $user,
            'issued_by' => $contact1,
        ]);

        $IssuedTo1 = IssuedTo::factory()->create([
            'order_id' => $order,
            'contact_id' => $contact2,
        ]);

        $IssuedTo2 = IssuedTo::factory()->create([
            'order_id' => $order,
            'contact_id' => $contact3,
        ]);
    }
}
