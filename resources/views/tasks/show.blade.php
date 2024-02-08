@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen py-6">
    <div class="w-full max-w-2xl px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg text-center">
        <!-- Titre de la tâche -->
        <div class="mb-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Titre de la tâche</h2>
            <p class="text-xl text-gray-800">{{ $task->name }}</p>
        </div>

        <!-- Description de la tâche -->
        <div class="mb-6">
            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Description</h3>
            <p class="text-md text-gray-700">{{ $task->description }}</p>
        </div>

        <!-- Statut de la tâche -->
        <div class="mb-6">
            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Statut</h3>
            <p class="text-lg {{ $task->status == 'Terminé' ? 'text-green-500' : 'text-yellow-500' }}">
                {{ $task->status }}
            </p>
        </div>

        <!-- Bouton de retour, maintenant centré avec le reste du contenu -->
        <div class="mt-6">
            <a href="{{ route('tasks.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Retour à la liste des tâches
            </a>
        </div>
    </div>
</div>
@endsection
