<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
</head>
<body style="color: #edf2f7">
    <table style="width: 100%; max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; background-color: #f4f4f4;">
        <tr>
            <td style="padding: 20px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: center;">
                            <img src="https://ci3.googleusercontent.com/meips/ADKq_NaNYSs0xVcf3AXCpX2hBjaP3fEHUGgmZllmnytu9OXDRvD0sdhPLhPW8kISOZivoCj8DPtFCHnFTFzPiSABcGnU4SA=s0-d-e1-ft#https://laravel.com/img/notification-logo.png" alt="Logo" style="max-width: 150px; height: auto;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; background-color: #fff;">
                            <p style="margin-bottom: 15px;">Bonjour,</p>
                            <p style="margin-bottom: 15px;">Vous recevez cet e-mail car nous avons reçu une demande de réinitialisation du mot de passe pour votre compte.</p>
                            <p style="margin-bottom: 15px;">Pour réinitialiser le mot de passe, veuillez cliquer sur le lien ci-dessous :</p>
                            <p style="margin-bottom: 15px;">
                                <a href="{{ $resetLink }}" style="color: #ffffff; text-decoration: none; background-color: #08213c; padding: 10px 20px; display: inline-block; border-radius: 5px;">Réinitialiser le mot de passe</a>
                            </p>
                            <p style="margin-bottom: 15px;">Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.</p>
                            <p style="margin-bottom: 15px;">Si vous n'avez pas demandé de réinitialisation du mot de passe, aucune autre action n'est requise.</p>
                            <p style="margin-bottom: 15px;">Salutations,</p>
                            <p style="margin-bottom: 15px;">DocTrack</p>
                            <p style="margin-bottom: 15px;">Si vous rencontrez des difficultés pour cliquer sur le bouton « Réinitialiser le mot de passe », copiez et collez l'URL ci-dessous dans votre navigateur Web :</p>
                            <p style="margin-bottom: 15px;"><a href="{{ $resetLink }}" style="color: #0f69b3; text-decoration: none;">{{ $resetLink }}</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; background-color: #fff; padding: 10px; font-size: 12px; color: #666;">
                            <p>© {{ date('Y') }} DocTrack. Tous droits réservés.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
