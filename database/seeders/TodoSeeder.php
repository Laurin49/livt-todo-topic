<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $film_topic = Topic::where('name', 'Filme')->first()->id;
        $buch_topic = Topic::where('name', 'Bücher')->first()->id;
        $anschaffungen_topic = Topic::where('name', 'Anschaffungen')->first()->id;
        $inertia_topic = Topic::where('name', 'Inertia')->first()->id;

        Todo::create(['name' => 'Nosferatur - Der Untote', 'topic_id' => $film_topic]);
        Todo::create(['name' => 'Wilde Unschuld', 'topic_id' => $film_topic]);
        Todo::create(['name' => 'Gloria', 'topic_id' => $film_topic]);
        Todo::create(['name' => 'Master Gardener', 'topic_id' => $film_topic]);
        Todo::create(['name' => 'Wicked', 'topic_id' => $film_topic]);

        Todo::create(['name' => 'Die Komplizin - Steve Cavanagh', 'topic_id' => $buch_topic]);
        Todo::create(['name' => 'Wie die Ruhe vor dem Sturm (Chances-Reihe 1) - B. Cherry', 'topic_id' => $buch_topic]);
        Todo::create(['name' => 'Enuris - Bedrohung aus dem All - Markus Seebass', 'topic_id' => $buch_topic]);
        Todo::create(['name' => 'Orign - Die Entdeckung - Andreas Brandhorst', 'topic_id' => $buch_topic]);

        Todo::create(['name' => 'Physionics Hantelablage', 'topic_id' => $anschaffungen_topic]);
        Todo::create(['name' => 'Kisten durchsichtig - für den Dachboden', 'topic_id' => $anschaffungen_topic]);
        Todo::create(['name' => 'Fitness Matten Boden - für den Dachboden', 'topic_id' => $anschaffungen_topic]);
        Todo::create(['name' => 'Box für die Gartenmöbel Auflagen', 'topic_id' => $anschaffungen_topic]);
        Todo::create(['name' => 'Box für Mülltonnen', 'topic_id' => $anschaffungen_topic]);

        Todo::create(['name' => 'YT - Learn with Jon - Laravel 11 - Inertia JS Course', 'topic_id' => $inertia_topic]);
        Todo::create(['name' => 'Partial Reloads', 'topic_id' => $inertia_topic]);
        Todo::create(['name' => 'Deferred Props', 'topic_id' => $inertia_topic]);
        Todo::create(['name' => 'Polling', 'topic_id' => $inertia_topic]);
        Todo::create(['name' => 'Prefetching', 'topic_id' => $inertia_topic]);
        Todo::create(['name' => 'Load when visible', 'topic_id' => $inertia_topic]);
        Todo::create(['name' => 'Merging Probs', 'topic_id' => $inertia_topic]);
        Todo::create(['name' => 'Remembering state', 'topic_id' => $inertia_topic]);
    }
}
