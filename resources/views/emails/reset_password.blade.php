<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Réinitialisation du mot de passe</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <table width="100%" style="max-width: 600px; margin: 0 auto; background-color: #f9f9f9; padding: 20px; border-collapse: collapse;">
        <tr>
            <td style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                <h2 style="font-size: 24px; margin: 0 0 20px; color: #333;">Bonjour,</h2>
                <p style="margin: 10px 0; font-size: 16px; color: #555;">Vous recevez cet e-mail car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.</p>
                <p style="margin: 10px 0; font-size: 16px; color: #555;">Pour réinitialiser le mot de passe, veuillez cliquer sur le lien ci-dessous :</p>
                <p style="text-align: center; margin: 20px 0;">
                    <a href="{{ $resetLink }}" style="display: inline-block; padding: 12px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px; font-size: 16px;">
                        Réinitialiser le mot de passe
                    </a>
                </p>
                <p style="margin: 10px 0; font-size: 16px; color: #555;">Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.</p>
                <p style="margin: 10px 0; font-size: 16px; color: #555;">Si vous n'avez pas demandé de réinitialisation du mot de passe, aucune autre action n'est requise.</p>
                <p style="margin: 20px 0 10px; font-size: 16px; color: #555;">Salutations,</p>
                <p style="font-size: 18px; color: #333; font-weight: bold; text-decoration: underline;">
                    DocTrack
                </p>
                <p style="font-size: 14px; color: #555; margin: 20px 0;">Si vous rencontrez des difficultés pour cliquer sur le bouton « Réinitialiser le mot de passe », copiez et collez l'URL ci-dessous dans votre navigateur Web :</p>
                <p style="font-size: 14px;">
                    <a href="{{ $resetLink }}" style="color: #007BFF;">{{ $resetLink }}</a>
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 14px; color: #888; padding: 20px 0;">
                © {{ date('Y') }} DocTrack. Tous droits réservés.
            </td>
        </tr>
    </table>
</body>
</html>
