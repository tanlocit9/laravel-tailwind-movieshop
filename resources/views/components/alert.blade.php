@if(Session::has('status'))
    <script>
        alert('{{Session::get("type")." ".$title." ".Session::get("status")}}')
    </script>
@endif
@if(Session::has('auth_msg'))
<script>
    alert('{{Session::get("auth_msg")}}')
</script>
@endif
