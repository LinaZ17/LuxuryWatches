<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Часы Tommy Hilfiger',
            'price' => rand(75, 500),
            'in_stock' => 1,
            'description' => 'Стильный дизайн модели Tommy Hilfiger 1781979 воплощает в себе все, что только может пожелать женщина.
             Эти привлекательные женские кварцевые часы представлены в круглом сером корпусе из стали и синем ремешке из мягчайшей кожи с тиснением.',
            'catalog_id' => 1
        ]);

        DB::table('products')->insert([
            'title' => 'Часы Versace VR2C ',
            'price' => rand(75, 500),
            'in_stock' => 1,
            'description' => 'Мужские дизайнерские часы Versace VR2C DVONE Chrono Механический хронограф, калибр Dubois Depraz 2040. Стальной корпус. Браслет из каучук Сапфировое стекло
             Водозащита 50 Ширина 43 мм,  толщина 14 мм',
            'catalog_id' => 2
        ]);
        DB::table('products')->insert([
            'title' => 'Часы Orient',
            'price' => rand(250, 700),
            'in_stock' => 1,
            'description' => 'Простой, но не теряющий чувства стиля Orient 4596 станет отличным подарком для любого мужчины. Стальной корпус с гранеными краями имеет диаметр 40 мм. Простой синий циферблат с длинными метками и стрелками, практичен и хорошо читаем. Черный ремень выполнен из натуральной кожи создает элегантный внешний вид. Ширина ремня 22 мм, длина 220 мм.,
           застежка пряжка. Водозащита минимальна, купаться в часах запрещено.',
            'catalog_id' => 2
        ]);

        DB::table('products')->insert([
            'title' => 'Часы Calvin Klein Posh',
            'price' => rand(250, 700),
            'in_stock' => 1,
            'description' => 'Простой, но не теряющий чувства стиля Calvin Klein Posh K8Q311CN станет отличным подарком для любоq женщины. Стальной корпус с гранеными краями имеет диаметр 40 мм.
             Черный ремень выполнен из натуральной кожи создает элегантный внешний вид. Ширина ремня 22 мм, длина 220 мм.,
             застежка пряжка.',
            'catalog_id' => 1
        ]);

        DB::table('products')->insert([
            'title' => 'Часы BALMAIN B37',
            'price' => rand(250, 700),
            'in_stock' => 1,
            'description' => 'Марка:Balmain. Коллекция: Taffetas. Производство: Швейцария Пол: Женские часы. Часовые механизмы: Кварцевый Материалы корпуса часов: Нержавеющая сталь. Стекло: Сапфировое стекло
                              Тип браслета: Кожаный ремешок. Безель украшен 72 бриллиантами, 0.28 carat',
            'catalog_id' => 1
        ]);

        DB::table('products')->insert([
            'title' => 'Часы Calvin Klein',
            'price' => rand(250, 700),
            'in_stock' => 1,
            'description' => 'Простой, но не теряющий чувства стиля Calvin Klein R11CN станет отличным подарком для любого мужчины. Стальной корпус с гранеными краями имеет диаметр 40 мм.
            Простой синий циферблат с длинными метками и стрелками, практичен и хорошо читаем.',
            'catalog_id' => 2
        ]);

        DB::table('products')->insert([
            'title' => 'Часы Orient',
            'price' => rand(250, 700),
            'in_stock' => 1,
            'description' => 'Простой, но не теряющий чувства стиля Orient станет отличным подарком для любого мужчины. Стальной корпус с гранеными краями имеет диаметр 40 мм.
            Простой синий циферблат с длинными метками и стрелками. Водозащита минимальна, купаться в часах запрещено.',
         'catalog_id' => 2
        ]);

        DB::table('products')->insert([
            'title' => 'Часы Orient',
            'price' => rand(250, 700),
            'in_stock' => 1,
            'description' => 'Простой, но не теряющий чувства стиля Orient 96 станет отличным подарком для любого мужчины. Стальной корпус с гранеными краями имеет диаметр 40 мм.
            Простой синий циферблат с длинными метками и стрелками. Ширина ремня 22 мм, длина 220 мм. Водозащита минимальна, купаться в часах запрещено.',
         'catalog_id' => 2
        ]);
    }
}
