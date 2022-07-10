@extends('layouts.master');

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Liste des étudiants</h3>

        <div class="d-flex justify-content-end mb-4">
            <a href=" {{ route('etudiant.create') }} " class="btn btn-primary">Ajouter un nouvel étudiant</a>
        </div>
        
        {{-- alert success --}}
        @if (Session::has('successAddEtudiant'))
            <div class="alert alert-success">
                {{ Session::get('successAddEtudiant') }}
                @php
                    Session::forget('successAddEtudiant');
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
                        <td>{{ $etudiant->nom}}</td>
                        <td>{{ $etudiant->prenom}}</td>
                        <td>{{ $etudiant->classe_id}}</td>
                        <td>
                            <a href="#" class="btn btn-info">Editer</a>
                            <a href="#" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center my-4 text-bold">Pas d'etudiant</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
</div @endsection
