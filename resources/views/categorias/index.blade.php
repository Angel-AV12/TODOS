@extends('app')
@section('content')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('categoria.store') }}" method="POST">
                @csrf
                @if (@session('success'))
                    <h6 class="alert alert-success">
                        @session('success')
                        </h6>
                    @endsession
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                <div class="mb-3">
                    <label for="name" class="form-label">Titulo de la categoria</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color de la categoria</label>
                    <input type="color" name="color" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
            </form>

            @foreach ($categorias as $sys)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a class="d-flex align-items-center gap-2"
                            href="{{ route('categoria.show', ['categorias' => $sys->id]) }}"></a>
                        <span class="color-container"
                            style="background-color: {{ $sys->color }}">{{ $sys->name }}</span>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="#modal{{ $sys->id }}">Eliminar</button>
                    </div>

                </div>

                <div class="modal" id="{{ $sys->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
