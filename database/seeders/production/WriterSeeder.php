<?php

namespace Database\Seeders\production;

use App\Models\Writer;
use App\Models\WriterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WriterSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writer::create(['code' => 'bank-file:Sber',         'name' => 'Банковский файл: Сбербанк',      'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:UralSib',      'name' => 'Банковский файл: УралСиб',       'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:RosSelhoz',    'name' => 'Банковский файл: РосСельхоз',    'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:Pochta',       'name' => 'Банковский файл: Почта',         'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:VTB',          'name' => 'Банковский файл: ВТБ',           'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:KBB',          'name' => 'Банковский файл: КББ',           'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:Levobereg',    'name' => 'Банковский файл: Левобережный',  'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:Alfa',         'name' => 'Банковский файл: Альфа',         'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:Sovkom',       'name' => 'Банковский файл: Совком',        'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:ATB',          'name' => 'Банковский файл: АТБ',           'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
        Writer::create(['code' => 'bank-file:other',        'name' => 'Банковский файл: Другие',        'class' => '', 'type_id' => WriterType::byCode('bank-file')->id]);
    }
}
