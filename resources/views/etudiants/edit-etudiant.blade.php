@extends('layouts.master')

@section('content')
    <div class="col-6 mx-auto my-3 mt-4 p-2 bg-body rounded shadow-sm">

        <div class="d-flex justify-content-center mb-4">
            <h2 class="text-center fw-bold">Modifier un etudiant</h2>
        </div>

        <div class="mx-auto my-4">
            <form action="{{ route('etudiant.update', [$etudiants->id]) }}" method="POST" id='addEtudiantForm'>
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label class="form-label" for="nom">Nom:</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                        id="nom" value="{{ old('nom', $etudiants->nom) }}" required>
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="prenom">prenom:</label>
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                        id="prenom" value="{{ old('prenom', $etudiants->prenom) }}" required>
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="classe_id">classe:</label>
                    <select name="classe_id" id="classe_id" class="form-select">
                        <option value=""> ---- select ---- </option>
                        @forelse ($classes as $classe)
                            <option value="{{ old('classe_id', $classe->id) }}" {{ $classe->id == $etudiants->id ? 'selected' : '' }}>
                                {{ $classe->libelle }}
                            </option>
                        @empty
                        @endforelse
                    </select>
                    @error('classe_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mx-auto d-flex justify-content-center gx-5">
                    <button type="submit" class="btn btn-primary mx-3">Enregistrer</button>
                    <a href=" {{ route('etudiant.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
