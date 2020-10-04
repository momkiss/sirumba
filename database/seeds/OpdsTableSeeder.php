<?php

use Illuminate\Database\Seeder;

class OpdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opd')->delete();
        DB::table('opd')->truncate();
        \App\Opd::create([
                        'nama' => 'Dinas Perumahan dan Permukiman',
                        'alias' => 'DISPERKIM'
                        ]);

        \App\Opd::create([
                        'nama' => 'Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu',
                        'alias' => 'DPMPTSP'
                        ]);

        \App\Opd::create([
                        'nama' => 'Dinas Kependudukan dan Pencatatan Sipil',
                        'alias' => 'DISDUKCAPIL'
                        ]);
    }
}
