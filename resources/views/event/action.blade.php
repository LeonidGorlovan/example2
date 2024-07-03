<a href="{{ route('event.edit', ['event' => $id]) }}" class="btn btn-outline-success btn-sm">Edit</a>
<form action="{{ route('event.destroy', ['event' => $id]) }}" method="POST"
      style="display: inline" onsubmit="if(!confirm('Are you sure you want to delete ?')){return false}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
</form>
