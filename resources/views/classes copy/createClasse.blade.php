{{-- @extends('layouts.master')

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des classes</h3>

        <div class="d-flex justify-content-end mb-4">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClasse">
                Ajouter un nouveau classe
            </button>
        </div>
        <div class="mx-auto my-4">
            <form action=" {{ route('classe.store') }}" method="POST" id='addClasseForm'>
                <div class="modal-header">
                    <h5 class="modal-title" id="addClasseLabel">Ajouter une classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
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
        </div>
    </div>

@endsection --}}
