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
            $table->id();
            $table->string('genre_name');
            $table->string('genre_discription')->comment('Mô tả');
        });
        $data = [
            ['genre_name' => 'Absurdist', 'genre_discription' => 'Siêu thực'], // or surreal/whimsical
            ['genre_name' => 'Action', 'genre_discription' => 'Hành động'],
            ['genre_name' => 'Adventure', 'genre_discription' => 'Phiêu lưu'],
            ['genre_name' => 'Comedy', 'genre_discription' => 'Hài hước'],
            ['genre_name' => 'Crime', 'genre_discription' => 'Tội ác'],
            ['genre_name' => 'Drama', 'genre_discription' => 'Kịch tính'],
            ['genre_name' => 'Fantasy', 'genre_discription' => 'Kì diệu'],
            ['genre_name' => 'Fiction', 'genre_discription' => 'Viễn tưởng'],
            ['genre_name' => 'History', 'genre_discription' => 'Lịch sử'],
            ['genre_name' => 'Horror', 'genre_discription' => 'Kinh dị hù dọa'],
            ['genre_name' => 'Philosophical', 'genre_discription' => 'Triết học'],
            ['genre_name' => 'Political', 'genre_discription' => 'Chính trị'],
            ['genre_name' => 'Saga', 'genre_discription' => 'Saga'], // là những câu chuyện lịch sử về người Scandinavian và người Đức cổ.
            ['genre_name' => 'Satire', 'genre_discription' => 'Châm biếm'],
            ['genre_name' => 'Social', 'genre_discription' => 'Xã hội'],
            ['genre_name' => 'Science ', 'genre_discription' => 'Khoa học'],
            ['genre_name' => 'Thriller ', 'genre_discription' => 'Kinh dị căng thẳng'],
            ['genre_name' => 'Urban', 'genre_discription' => 'Thành thị'],
            ['genre_name' => 'Western', 'genre_discription' => 'Phương tây'],
            ['genre_name' => 'Animation', 'genre_discription' => 'Hoạt hình'],
            ['genre_name' => 'Live-action', 'genre_discription' => 'Hoạt hình chuyển thể'],
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
        Schema::dropIfExists('movie_genre');
        Schema::dropIfExists('genres');
    }
}
