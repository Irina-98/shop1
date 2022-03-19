<?php

use App\Events\CategoriesExportFinishEvent;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use my\Helpers\Utils;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
Artisan::command('event', function () {
    event(new CategoriesExportFinishEvent('test'));

});


Artisan::command('queryBuilder', function () {

    

    $data = DB::table('categories as c')
        ->select(
            'c.id',
            'c.name',
            'c.description'
        )
        ->where('name', 'Процессоры')
        ->first();

    $data = DB::table('categories as c')
        ->select(
            'c.name',
            DB::raw('count(p.id) as product_quantity'),
            DB::raw('sum(p.price) as priceAmount')
        )
        ->leftJoin('products as p', function ($join) {
            $join->on('c.id', 'p.category_id');
        })
        ->groupBy('c.id')
        ->get();

    DB::table('categories')
        ->orderBy('id')
        ->chunk(4, function ($categories) {
            dump($categories->count());
        });
});



Artisan::command('updateCategory', function () {
    
    Auth::loginUsingId(1);// авторизация админа
    $procs = Category::where('name', 'Видеокарты')->first();// name', 'Процессоры

    $procs->name = 'НАБОРЫ КОФЕ';
    $procs->description = "КОФЕ ИЗ РАЗНЫХ СТРАН";
    $procs->picture = 'nabor.jpg';

    
    $procs->save();// обновление записи + саtegoryobserver = artisan

});
/* $procs = Category::where('name', 'Процессоры')->first();// name', 'Процессоры

    $procs->name = 'Кофемашины';
    $procs->description = "GARLYN L70, DE'LONGHI EC 850 M, GAGGIA GRAN DE LUXE";
    $procs->picture = 'mash.jpeg';
    $procs->save();// обновление записи + саtegoryobserver = artisan


*/


Artisan::command('deleteCategory', function () {

    Auth::loginUsingId(1);// авторизация админа
    Category::find(9)->delete();// удаление созданной записи + саtegoryobserver = artisan

});


Artisan::command('createCategory', function () {
    Auth::loginUsingId(1);// авторизация админа

    $procs = new Category();
    $procs->name = 'АКСЕССУАРЫ';
    $procs->description = 'Для бариста';
    $procs->picture = 'nocategory.jpg';
    $procs->save();// создание новой категории + саtegoryobserver= artisan
});


Artisan::command('createRolesUsers', function () {
    //collect(['Admin', 'Manager', 'Controler'])->each(function ($role, $idx) {
    //  $role = new Role([
    //   'name' => $role
    //    ]);
    //  $role->save();
    //});

    $user = User::find(1);

    //collect(['Admin', 'Manager', 'Controler'])->each(function ($name, $idx) use ($user) {
    //    $role = Role::where('name', $name)->first();
    //$user->roles()->attach($role);// detach открепить роли
//});
    
    //$user->roles->each(function ($role) {
    //dump($role->pivot->created_at->toDateTimeString());
//}); проверить даты создания ролей в терминале


});

Artisan::command('parseEkatalog', function () {
    $products = [];

    $url = 'https://www.e-katalog.ru/ek-list.php?katalog_=189&search_=3090';
    $data = file_get_contents($url);

    $dom = new DomDocument();
    @$dom->loadHTML('<?xml encoding="UTF-8">' . $data);
    $xpath = new DOMXpath($dom);

    $h1 = $xpath->query("//h1[@class='ib']");
    if ($h1->length == 1) {
        $title = explode(' ', $h1[0]->nodeValue);
        $productsCount = $title[count($title) - 2];
    }

    $tables = $xpath->query("//table[@class='model-short-block']");
    $pages = ceil($productsCount / $tables->length);

    for ($i = 0; $i < $pages; $i++) {
        $page = "$url&page_=$i";
        $data = file_get_contents($page);
        $dom = new DomDocument();
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $data);
        $xpath = new DOMXpath($dom);
        $tables = $xpath->query("//table[@class='model-short-block']");
        foreach ($tables as $table) {
            $range = null;
            $name = null;
            $price = null;
            $as = $xpath->query("descendant::a[@class='model-short-title no-u']", $table);
            if ($as->length == 1) {
                $name = $as[0]->nodeValue;
            }

            $divs = $xpath->query("descendant::div[@class='model-price-range']", $table);
            if ($divs->length == 1) {
                foreach ($divs[0]->childNodes as $child) {
                    if ($child->nodeName == 'a') {
                        $price = $child->nodeValue;
                        $range = true;
                    }
                }
            }

            $divs = $xpath->query("descendant::div[@class='pr31 ib']", $table);
            if ($divs->length == 1) {
                $price = $divs[0]->nodeValue;
                $range = false;
            }

            $products[] = [
                'name' => $name,
                'price' => $price,
                'range' => $range,
            ];
        }
    }

    dd($products);
});


Artisan::command('exportCategories', function () {
    $categories = Category::get()->toArray();
    $file = fopen('exportCategories3.csv', 'w');
    $data = [];
    
    $columns = [
        'id',
        'name',
        'description',
        'picture',
        'created_at',
        'updated_at'
    ];
    fputcsv($file, $columns, ';');
    foreach ($categories as $category) {
        $category['name'] = iconv('utf-8', 'windows-1251//IGNORE', $category['name']);
        $category['description'] = iconv('utf-8', 'windows-1251//IGNORE', $category['description']);
        $category['picture'] = iconv('utf-8', 'windows-1251//IGNORE', $category['picture']);
        fputcsv($file, $category, ';');
    }
    fclose($file);//создать таблицу и внести в БД посредством команды
});



    /*Artisan::command('importCategories', function () {
        $fileName = 'categories.csv';
        $file = fopen($fileName, 'r');

        $carbon = new Carbon();
        $now = $carbon->now()->toDateTimeString();

        $i = 0;
        $insert = [];
       while ($data = fgetcsv($file, 1000, ';')) {
            if ($i++ ==0) continue;
           $insert[] = [
               'name' => $data[0],
               'description' => $data[1],
               'picture' => $data[2],
               'created_at' => $now,
               'updated_at' => $now
           ];
       }
      Category::insert($insert); перенесено в job
    });*/



Artisan::command('test', function () {
      
    $numbers = collect([1, 2, 3]);

    $hasTwo = $numbers->contains(function ($number) {
        return $number == 2;// проверка на наличие пользователя, если не будет 45 значит фолс
    });

    $users = User::get();// проверка на пользов.

    $users->transform(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    });

    $users = User::get();// проверка массивом тех данных которые нужны

    $mappedUsers = $users->map(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    });

    $ids = $users->pluck('id');// проверка только по id у пользов. для удаления, обновления

    dd($ids);


    // dd(Hash::make('123'));

    // User::factory('5')->create();

    // $str = 'En_en';

    // $new_str = str_replace('_', '-', $str);
    // dd($new_str);

});


Artisan::command('inspire', function () {
    $procs = new Category();
    $procs->name = 'Процессоры';
    $procs->description = 'Описание процессоров';
    $procs->picture = '2.jpg';
    //$procs->save(); для ввода и сохранения в таблице БД
    
    
    $procs = Category::find(1);

    $categories = Category::get();
    $videocards = Category::where('name', 'like', 'Видео%')->first();

    /*Category::create([
        'name' => 'Жесткие диски',
        'description' => 'SSD, HDD',
        'picture' => '3.jpg'
     ]);- уже сделали*/ 

    $drives = Category::firstOrNew([
        'name' => 'Процессоры3',
        'description' => 'Описание процессоров',
        'picture' => '1.jpg'
    ]);// dd($drives);

    Category::where('id', '>', 4)->delete();// удаление, если нет то ничего не сделает, если есть удалит

    Category::where('id', '<', 4)->update([
        'picture' => '4.jpg'
    ]);  //обновит, если нет то ничего не сделает, если есть обновит 


    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
