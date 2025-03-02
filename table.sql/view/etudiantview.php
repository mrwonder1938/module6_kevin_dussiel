<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Liste des étudiants</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Date de naissance</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?php echo $etudiant['id']; ?></td>
                    <td><?php echo $etudiant['prenom']; ?></td>
                    <td><?php echo $etudiant['nom']; ?></td>
                    <td><?php echo $etudiant['email']; ?></td>
                    <td><?php echo $etudiant['dt_naissance']; ?></td>
                    <td><?php echo $etudiant['isAdmin'] ? 'Oui' : 'Non'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
