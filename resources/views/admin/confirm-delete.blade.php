<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de Suppression</title>
    <link rel="stylesheet" href="{{ asset('css/admin/delete.css') }}">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container confirmation-container">
        <h1 class="text-center mb-4">Confirmation de la suppression</h1>
        <p class="text-center mb-4">En tant qu'administrateur, vous avez le droit de supprimer ce profil, mais veuillez noter que cette action est irréversible !</p>
        @if($user->isAdmin() && App\Models\User::where('role', 'admin')->count() === 1)
            <div class="alert alert-danger" role="alert">
                Vous êtes le seul administrateur et ne pouvez pas être supprimé.
            </div>
        @else
            <form method="POST" action="{{ route('admin.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg btn-danger">Confirmer</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('admin.index') }}" class="btn btn-lg btn-cancel">Annuler</a>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
