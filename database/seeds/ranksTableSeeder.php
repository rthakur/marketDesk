<?php

use Illuminate\Database\Seeder;
use App\Rank;

class ranksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $ranks = [
          [ 'name'=>'rank1'],
          [ 'name'=>'rank2'],
          [ 'name'=>'rank3']
      ];


      foreach ($ranks as $rank){
         $newrank =Rank::firstOrNew(['name', $rank['name']]);
         $newrank->name = $rank['name'];
         $newrank->save();
      }
  }
}
