
<table>
    @foreach ($categories as $category)

        <tr>
            <td>{{$category->name}}</td>
            <td>
                <a href="{{route('categories.edit', ['category'=>$category->id])}}" class="btn btn-info">Editar</a>

                @if (is_null($category->deleted_at))
                    <form action="{{route('categories.destroy', ['category'=>$category->id])}}" method="POST" style="display:inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                @else
                    <a href="{{route('categories.restore', ['category'=>$category->id])}}" class="btn btn-success">Recuperar</a>
                @endif
            </td>
        </tr>

    @endforeach

</table>

