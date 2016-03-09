<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Email</td>
        <td>Tipo</td>
        <td>Acciones</td>
    </tr>
    @foreach ($users as $user)
    <tr data-id="{{ $user->id }}">
        <td>{{ $user->id }}</td>
        <td>{{ $user->fullname }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->type }}</td>
        <td>
            <a href="{{ route('admin.users.edit', $user) }}">Editar</a>
            <a href="" class="btn-delete">Eliminar</a>
        </td>
    </tr>
    @endforeach
</table>