@if(Session::has('status'))
    <script>
        alert('{{Session::get("type")." ".$title." ".Session::get("status")}}')
    </script>
@endif
