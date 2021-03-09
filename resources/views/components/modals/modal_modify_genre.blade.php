<form action="{{route('genre_modify')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10"> --}}
    <div class="max-w-md mx-auto">
        <div class="text-base leading-4 space-y-4 text-gray-700 sm:text-lg sm:leading-5">
            <div class="flex items-center space-x-4">
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="movie">Choose movie</label>
                    <select name="movie" id="movie" class="input-text" required>
                        <option value="0">Select movie</option>
                            @foreach($movies as $movie)
                                <option value="{{$movie->id}}">{{$movie->movie_name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="main_genre">Main genre</label>
                    <select disabled name="main_genre" id="main_genre" class="input-text" required value="0">
                        <option value="0">Choose movie first</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex flex-col w-1/2">
                    <label class="leading-relaxed" for="sub_genre">Sub genres available</label>
                    <select disabled name="sub_genre" id="sub_genre" class="input-text" required>
                        <option value="0">Choose movie first</option>
                        @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="show" class="flex flex-col w-1/2 invisible">
                    <label class="leading-relaxed" >Selected Sub Genres</label>
                </div>
            </div>
            <div class="pt-4 flex items-center space-x-4">
                <div id="modal-close" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none cursor-pointer">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                </div>
                <button type="submit" class="modal-create">Modify</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    var sub_genres=[
        @foreach($movies as $movie)
            @foreach($movie->sub_genre as $genre)
                ['{{$movie->id}}','{{$genre->id}}'],
            @endforeach
        @endforeach
    ]

    var selected_genres=[]
    var movie_id=0
    var main_genre_id=0
    var sub_genre_id=0
    var final = ""
    $('#movie').change(function(){
        movie_id = $('#movie option:selected').val()
        var str = '{{$movies->find(1)->main_genre->first()->id}}'
        main_genre_id = str.replace("1", movie_id);
        resetSelected(selected_genres)
        console.log(selected_genres)
        selected_genres.forEach(hideSubGenres)
        show(selected_genres)
        toggleMovies(main_genre_id)
    })
    $('#main_genre').change(function(){
        var selected_main_genre = $('#main_genre option:selected').val()
        var str = "{{$genres->find(1)->id}}"
        $('#sub_genre option[value=0]').attr("selected", "selected");
        $("#sub_genre option[value="+main_genre_id+"]").show()
        $("#sub_genre option[value="+sub_genre_id+"]").show()
        $("#main_genre option[value="+main_genre_id+"]").show()
        $('#main_genre option:selected').hide()
        main_genre_id = str.replace("2", selected_main_genre);
        console.log(selected_main_genre==main_genre_id)
        resetSelected(selected_genres)
        $('#sub_genre option[value='+selected_main_genre+']').hide()
        selected_genres[0]=main_genre_id
        selected_genres= removeItemOnce(selected_genres, main_genre_id)
        show(selected_genres)
        selected_genres.forEach(hideSubGenres)
    })

    $('#sub_genre').change(function(){
        sub_genre_id = $('#sub_genre option:selected').val()
        $("#sub_genre option[value="+sub_genre_id+"]").hide()
        selected_genres.push(sub_genre_id)
        console.log(selected_genres)
        addSubGenres(selected_genres)
        show(selected_genres)
        selected_genres.forEach(hideSubGenres)
    })
    function hideSubGenres(item,index) {
        $("#sub_genre option[value=" + item + "]").hide();
    }
    function resetSelected(arr) {
        resetSubGenres(arr)
        while(arr.length) {
            arr.pop();
        }
        final =""
        sub_genres.forEach(element => {
            arr.push(element[movie_id])
        });
        arr.unshift(main_genre_id)
    }
    function addSubGenres(selected_genres) {
        selected_genres.shift();
        final =""
        selected_genres.forEach(element => {
            if( final =="") final = element;
            else final = final + "," + element;
        });
        console.log(final)
        selected_genres.unshift(main_genre_id)
        $('#sub_genre option:selected').val(final)
    }
    function toggleMovies(main_genre_id) {
        if($('#movie option:selected').val()==0){
            $('#sub_genre').attr('disabled', 'disabled');
            $('#sub_genre option[value=0]').text('Select movie first')
            $('#main_genre').attr('disabled', 'disabled');
            $("#main_genre option[value=0]").show();
            $("#main_genre option[value=0]").attr("selected", "selected");
            $("#show").addClass('invisible')
        }
        else{
            $("#main_genre").val(main_genre_id).attr("selected", "selected");
            $('#sub_genre').removeAttr('disabled');
            $('#sub_genre option[value=0]').text('Select sub genres').attr('disabled', 'disabled');
            $('#main_genre').removeAttr('disabled');
            $("#main_genre option[value=0]").hide()
            $("#show").removeClass('invisible')
        }
    }
    function show(selected_genres){
        $("#show li").remove()
        selected_genres.forEach(element=>{
            var genre = $('#main_genre option[value='+element+']').text()
            if(element!=$('#main_genre option:selected').val()){
                var new_item=$("<li></li>").text(genre);
                $("#show").append(new_item)
            }
        })
    }
    function removeItemOnce(arr, value) {
        var index = arr.indexOf(value);
        if (index > -1) {
            arr.splice(index, 1);
        }
        return arr;
    }
    function resetSubGenres(arr) {
        arr.forEach(element => {
            console.log(element)
            $("#sub_genre option[value=" + element + "]").show();
        });
    }
</script>
