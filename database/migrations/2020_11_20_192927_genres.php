<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Genre;

class Genres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id()->comment("Mã thể loại");
            $table->string('genre_name')->comment('Tên thể loại');
            $table->string('genre_description')->comment('Mô tả');
        });
        $data = [
            ['genre_name' => 'Absurdist', 'genre_description' => 'Siêu thực'], // or surreal/whimsical
            ['genre_name' => 'Action', 'genre_description' => 'Hành động'],
            ['genre_name' => 'Adventure', 'genre_description' => 'Phiêu lưu'],
            ['genre_name' => 'Comedy', 'genre_description' => 'Hài hước'],
            ['genre_name' => 'Crime', 'genre_description' => 'Tội ác'],
            ['genre_name' => 'Drama', 'genre_description' => 'Kịch tính'],
            ['genre_name' => 'Fantasy', 'genre_description' => 'Kì diệu'],
            ['genre_name' => 'Fiction', 'genre_description' => 'Viễn tưởng'],
            ['genre_name' => 'History', 'genre_description' => 'Lịch sử'],
            ['genre_name' => 'Horror', 'genre_description' => 'Kinh dị hù dọa'],
            ['genre_name' => 'Philosophical', 'genre_description' => 'Triết học'],
            ['genre_name' => 'Political', 'genre_description' => 'Chính trị'],
            ['genre_name' => 'Saga', 'genre_description' => 'Saga'], // là những câu chuyện lịch sử về người Scandinavian và người Đức cổ.
            ['genre_name' => 'Satire', 'genre_description' => 'Châm biếm'],
            ['genre_name' => 'Social', 'genre_description' => 'Xã hội'],
            ['genre_name' => 'Science ', 'genre_description' => 'Khoa học'],
            ['genre_name' => 'Thriller ', 'genre_description' => 'Kinh dị căng thẳng'],
            ['genre_name' => 'Urban', 'genre_description' => 'Thành thị'],
            ['genre_name' => 'Western', 'genre_description' => 'Phương Tây'],
            ['genre_name' => 'Animation', 'genre_description' => 'Hoạt hình'],
            ['genre_name' => 'Live-action', 'genre_description' => 'Hoạt hình chuyển thể'],
            //...
        ];
        Genre::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_movie');
        Schema::dropIfExists('genres');
    }
}
