<form method="post" action="{{ route('article.store') }}">
    @csrf //blade sintaks
    <input type="text" name="title">
    <input type="submit" value="Send" >
</form>
