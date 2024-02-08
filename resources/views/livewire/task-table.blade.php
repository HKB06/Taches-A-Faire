@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen py-6">
    <div class="text-center mb-8">
        <a href="{{ route('taches.creer') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            Ajouter une nouvelle tâche
        </a>
    </div>

    
    <div class="w-full max-w-6xl px-4 py-2">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th scope="col" class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col" class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Task
                        </th>
                        <th scope="col" class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-5 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tasks as $task)
                    <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-gray-50' : 'white' }} hover:bg-gray-100">
                        <td class="px-5 py-4 whitespace-nowrap text-sm">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap text-sm">
                            {{ $task->name }}
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap text-sm">
                            <span class="inline-flex text-xs leading-5 font-semibold rounded-full {{ $task->status == 'Terminé' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap text-sm font-medium flex justify-start gap-2">
                            <a href="{{ route('taches.afficher', $task->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('taches.modifier', $task->id) }}" class="text-green-500 hover:text-green-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('taches.supprimer', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
