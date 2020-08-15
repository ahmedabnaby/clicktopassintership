<form action="{{route('posts.store')}}" method="POST">
    @csrf
name <input type="text" name="name" id="">
<br>
body <input type="textarea" name="body" id="">

<button type="submit">Post! </button>
</form>