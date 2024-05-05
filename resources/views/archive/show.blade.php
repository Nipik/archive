@extends('layouts.app')

@section('title', 'Archives')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $category->name }}</h1>

    <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-200 ease-in-out">
        @if ($category->mails->isEmpty())
            <p class="text-gray-600">Aucun courrier disponible pour cette catégorie!</p>
        @else
            <ul class="space-y-4">
                @foreach ($category->mails as $mail)
                    <li class="mail-item bg-gray-100 p-4 rounded-lg shadow-sm hover:bg-gray-200 transition-colors duration-200 ease-in-out">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-envelope mr-2 text-indigo-600"></i>
                            <strong>Sujet :</strong> {{ $mail->subject }}
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-calendar-alt mr-2 text-blue-600"></i>
                            <strong>Date de réception :</strong> {{ $mail->reception_date }}
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-calendar-day mr-2 text-green-600"></i>
                            <strong>Date d'envoi :</strong> {{ $mail->dispatch_date }}
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-info-circle mr-2 text-orange-600"></i>
                            <strong>Source :</strong> {{ $mail->source }}
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-clipboard-check mr-2 text-red-600"></i>
                            <strong>Statut :</strong> {{ $mail->status }}
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-building mr-2 text-purple-600"></i>
                            <strong>Organisme :</strong>
                            @if ($mail->organism)
                                {{ $mail->organism->name }}
                            @else
                                Aucun organisme associé
                            @endif
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-file-alt mr-2 text-teal-600"></i>
                            <strong>Fichier :</strong>
                            @if($mail->file_path)
                                <a href="{{ asset('storage/' . $mail->file_path) }}" target="_blank" class="text-purple-500 hover:underline">
                                    Voir
                                </a>
                            @else
                                Aucun fichier associé
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
