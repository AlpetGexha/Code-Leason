<form action="{{ route(' article.create', ['article' => 1]) }}" method="post">
    @method('PUT')
    $csrf
    <input type="text" name="title" value="test">
    <input type="submit" value="Update" >
</form>


<form action="{{ route(' article.destroy', ['article' => 1]) }}" method="post">
    @method('Delete')
    $csrf
    <input type="submit" value="Delete" >
</form>
