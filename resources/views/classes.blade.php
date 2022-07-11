@extends('layouts.master');

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des classes</h3>

        <div class="d-flex justify-content-end mb-4">
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClasse">
                Ajouter un nouveau classe
            </button>
        </div>

        @if (Session::has('alertClasse'))
            <div class="alert alert-success">
                {{ Session::get('alertClasse') }}
                @php
                    Session::forget('alertClasse');
                @endphp
            </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($classes as $classe)
                    <tr>
                        <th scope="row"> {{ $classe->id }}</th>
                        <td style="3rem">{{ $classe->libelle }}</td>
                        <td>
                            <div class="">
                                <a href=" {{ route('classe.edit', [$classe->id] ) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('classe.destroy', [$classe->id]) }}" method="POST" class="d-inline mx-3">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Supprimer </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center my-4 text-bold">Pas de classes</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    {{-- MODAL --}}
    <!-- Modal -->
    <div class="modal fade" id="addClasse" tabindex="-1" aria-labelledby="addClasseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- form --}}
                <form action=" {{ route('classe.store') }}" method="POST" id='addClasseForm'>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addClasseLabel">Ajouter une classe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="libelle">Libelle:</label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle"
                                id="libelle" value="{{ old('libelle') }}" required>
                            @error('libelle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajouter une classe</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
                {{-- form --}}
            </div>
        </div>
    </div>
    {{-- / MODAL --}}
@endsection
