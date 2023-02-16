<?php

namespace App\Models\TeamContact;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function up()
    {
    Schema::create('team_contacts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('team_id')->index()->nullable();
        $table->string('handle');
        $table->string('website');
        $table->date('contacted')->nullable();
        $table->boolean('engagement')->nullable();
        $table->timestamps();
    });

    // Hardcode an example team
    DB::table('teams')->insert([
        'id' => 1,
        'user_id' => 1,
        'personal_team' => true,
        'type' => 'Free',
        'name' => 'Sheffield Hallam',
        'website' => 'https://www.shu.ac.uk/myhallam',
        'description' => 'This is an example team.',
        'logo' => null,
        'country_id' => 1,
        'sector_id' => 1,
        'industry_id' => 1,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // Associate team with the example contact
    DB::table('team_contacts')->insert([
        'team_id' => 1,
        'handle' => 'examplehandle',
        'website' => 'https://www.shu.ac.uk/myhallam',
        'contacted' => null,
        'engagement' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
