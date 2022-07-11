@extends('layouts.master')

@section('content')
    <div class="col-6 mx-auto my-3 mt-4 p-2 bg-body rounded shadow-sm">

        <div class="d-flex justify-content-center mb-4">
            <h2 class="text-center fw-bold">Modifier une classe</h2>
        </div>

        <div class="mx-auto my-4">
            <form action="{{ route('classe.update', [$classes->id]) }}" method="POST" id='addClasseForm'>
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label class="form-label" for="libelle">libelle:</label>
                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle"
                        id="libelle" value="{{ old('libelle', $classes->libelle) }}" required>
                    @error('libelle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mx-auto d-flex justify-content-center gx-5">
                    <button type="submit" class="btn btn-primary mx-3">Enregistrer</button>
                    <a href=" {{ route('classe.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
