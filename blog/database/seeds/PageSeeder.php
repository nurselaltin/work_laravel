<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['Hakkımızda','Kariyerimiz','Vizyonumuz','Misyonumuz'];
        $count = 0;
        foreach ($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'   => $page,
                'slug'    =>  Str::slug($page),
                'image'   =>  'https://www.cogitaproject.eu/wp-content/uploads/2020/06/https___blogs-images.forbes.com_alejandrocremades_files_2018_07_desk-3139127_1920-1200x773-1.jpg',
                'content' =>'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. 
                Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir 
                yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler 
                olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda 
                pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren 
                Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi
                 Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.',
                'order'  =>$count

            ]);
        }
    }
}
