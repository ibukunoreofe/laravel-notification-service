<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationType;

class NotificationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get predefined notification types from the model
        $types = NotificationType::getTypes();

        // Prepare data for upsert
        $data = array_map(function ($type) {
            return ['type' => $type, 'created_at' => now(), 'updated_at' => now()];
        }, $types);

        // Use upsert to insert or update the notification types in one call
        NotificationType::upsert($data, ['type']);
    }
}
