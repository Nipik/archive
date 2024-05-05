<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courriers supprimés</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Courriers supprimés</h1>
        <div class="overflow-x-auto">
            <table class="table w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr style="background-color: #80a5ee; color:azure;" class="text-left">
                        <th class="p-2">Sujet</th>
                        <th class="p-2">Statut</th>
                        <th class="p-2">Date de réception</th>
                        <th class="p-2">Date d'envoi</th>
                        <th class="p-2">Source</th>
                        <th class="p-2">Catégorie</th>
                        <th class="p-2">Organisme</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deletedMails as $mail)
                        <tr>
                            <td class="p-2">{{ $mail->subject }}</td>
                            <td class="p-2">{{ $mail->status }}</td>
                            <td class="p-2">{{ $mail->reception_date }}</td>
                            <td class="p-2">{{ $mail->dispatch_date }}</td>
                            <td class="p-2">{{ $mail->source }}</td>
                            <td class="p-2">
                                @foreach ($mail->category as $category)
                                    {{ $category->name }}<br>
                                @endforeach
                            </td>
                            <td class="p-2">{{ $mail->organism->name }}</td>
                            <td class="p-2">
                                <a href="{{ route('mail.deleted.show', $mail->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded focus:outline-none" style="background-color: #80a5ee;">
                                    <i class="fas fa-eye"></i> Voir
                                </a>
                                <a href="#" onclick="confirmDelete({{ $mail->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded focus:outline-none">
                                    <i class="fas fa-trash"></i> Supprimer
                                </a>
                                <form id="deleteForm{{ $mail->id }}" action="{{ route('mail.delete-permanently', $mail->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/admin/alert.js') }}"></script>
</body>

</html>
