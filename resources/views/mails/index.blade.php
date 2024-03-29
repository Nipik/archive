<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des courriers</title>
    <link rel="stylesheet" href="{{ asset('css/mails/index.css') }}">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <a href="{{ route('logout') }}" class="se-deconnecter">Se déconnecter</a>
    @if(session('success'))
        <div class="bg-green-200 border-green-600 border-l-4 p-4 mt-4 mb-4">
            <p class="text-green-800">{{ session('success') }}</p>
        </div>
    @endif
    <h1 class="head-recherche">Rechercher ici:</h1>
    <div class="search-container">
        <select id="filterType" onchange="toggleFilterFields()">
            <option value="">Sélectionnez un type de filtrage</option>
            <option value="category">Filtrer par catégorie</option>
            <option value="organism">Filtrer par organisme</option>
            <option value="dispatchDate">Filtrer par date d'envoi</option>
            <option value="receptionDate">Filtrer par date de réception</option>
        </select>
        <div id="categoryFilter" class="filter-field hidden">
            <input type="text" id="categoryFilterInput" class="filter-input" placeholder="Filtrer par catégorie" oninput="filterTableByCategory()">
        </div>
        <div id="organismFilter" class="filter-field hidden">
            <input type="text" id="organismFilterInput" class="filter-input" placeholder="Filtrer par organisme" oninput="filterTableByOrganism()">
        </div>
        <div id="dispatchDateFilter" class="filter-field hidden">
            <input type="date" id="dispatchDateFilterInput" class="filter-input" placeholder="Filtrer par date d'envoi" oninput="filterTableByDispatchDate()">
        </div>
        <div id="receptionDateFilter" class="filter-field hidden">
            <input type="date" id="receptionDateFilterInput" class="filter-input" placeholder="Filtrer par date de réception" oninput="filterTableByReceptionDate()">
        </div>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="table min-w-full">
            <thead>
                <tr class="table-header">
                    <th class="th-Subject">Sujet</th>
                    <th class="th-Subject">Statut</th>
                    <th class="th-Subject">Date de réception</th>
                    <th class="th-Subject">Date d'envoi</th>
                    <th class="th-Subject">Source</th>
                    <th class="th-Subject">Catégorie</th>
                    <th class="th-Subject">Organisme</th>
                    <th class="th-action">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mails as $mail)
                    <tr class="table-row">
                        <td>{{ $mail->subject }}</td>
                        <td>{{ $mail->status }}</td>
                        <td>{{ $mail->reception_date }}</td>
                        <td>{{ $mail->dispatch_date }}</td>
                        <td>{{ $mail->source }}</td>
                        <td>
                            @if (isset($mail->category) && count($mail->category) > 0)
                                @foreach ($mail->category as $category)
                                    {{ $category->name }}<br>
                                @endforeach
                            @else
                                Aucune catégorie associée
                            @endif
                        </td>
                        <td>
                            @if ($mail->organism)
                                {{ $mail->organism->name }}
                            @else
                                Aucun organisme associé
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('mail.show', $mail->id) }}" class="view-link">Voir</a>
                            <a href="{{ route('mail.edit', $mail->id) }}" class="edit-link">Modifier</a>
                            <button onclick="openModal('{{ $mail->id }}')" class="delete-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline btn-delete">Supprimer</button>
                            <div id="modal{{ $mail->id }}" class="modal hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center">
                                <div class="modal-content bg-white w-1/2 p-4 rounded-lg">
                                    <div class="text-center mb-4">
                                        <h2 class="text-lg font-bold">Confirmation de suppression</h2>
                                        <p class="text-gray-700">Êtes-vous sûr de vouloir supprimer ce courrier ?</p>
                                    </div>
                                    <div class="flex justify-center">
                                        <button onclick="confirmDelete('{{ $mail->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">Oui, supprimer</button>
                                        <button onclick="closeModal('{{ $mail->id }}')" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Annuler</button>
                                    </div>
                                </div>
                            </div>
                            <form id="deleteForm{{ $mail->id }}" action="{{ route('mail.destroy', $mail->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('mail.create') }}" class="add-mail-link">Ajouter un courrier</a>
    </div>
    <script src="{{ asset('js/filter.js') }}"></script>
</body>
</html>

