@extends('layouts.master');

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des étudiants</h3>

        <div class="d-flex justify-content-end mb-4">
            <a href=" {{ route('etudiant.create') }} " class="btn btn-primary">Ajouter un nouvel étudiant</a>
        </div>

        {{-- alert success --}}
        @if (Session::has('alertEtudiant'))
            <div class="alert alert-success">
                {{ Session::get('alertEtudiant') }}
                @php
                    Session::forget('alertEtudiant');
                @endphp
            </div>
        @endif
        {{-- alert sucess --}}
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($etudiants as $etudiant)
                    <tr>
                        <th scope="row"> {{ $etudiant->id }}</th>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->classe->libelle }}</td>
                        <td>
                            <div class="">
                                <a href=" {{ route('etudiant.edit', [$etudiant->id] ) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('etudiant.destroy', [$etudiant->id]) }}" method="POST" class="d-inline mx-3">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Supprimer </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center fw-bold">Pas d'etudiants</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
</div @endsection
