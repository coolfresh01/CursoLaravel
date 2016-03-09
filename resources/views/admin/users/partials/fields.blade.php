    <div class="form-group">
    {!! Form::label('email', 'Correo electrónico') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca su email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('first_name', 'Nombre completo') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca su nombre completo']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_name', 'Apellidos') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca sus apellidos']) !!}
    </div>              
    <div class="form-group">
        {!! Form::label('type', 'Tipo de usuario') !!}
        {!! Form::select('type', ['' => 'Seleccione Tipo', 'user' => 'Usuario', 'admin' => 'Administrador'], null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca sus apellidos']) !!}
    </div> 
    