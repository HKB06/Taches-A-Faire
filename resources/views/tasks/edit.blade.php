@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen py-6">
    <div class="w-full max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form action="{{ route('taches.mettre_a_jour', $task->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom de la tâche</label>
                <input type="text" name="name" id="name" value="{{ $task->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $task->description }}</textarea>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select name="status" id="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="En cours" {{ $task->status == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Terminé" {{ $task->status == 'Terminé' ? 'selected' : '' }}>Terminé</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Retour
                </a>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
