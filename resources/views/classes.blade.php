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

        @if (Session::has('successAddClasse'))
            <div class="alert alert-success">
                {{ Session::get('successAddClasse') }}
                @php
                    Session::forget('successAddClasse');
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
                            <a href="#" class="btn btn-info">Editer</a>
                            <a href="#" class="btn btn-danger">Supprimer</a>
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
