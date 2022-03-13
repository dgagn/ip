## Consignes

Vous devez créer un système qui permet de répertorier les adresses IP (IPv4) de serveurs frauduleux. Le système doit être conçu avec Laravel 9 et il doit fonctionner avec Laravel Sail sur Docker.

Vous devez utiliser TailwindCSS et il faut créer votre propre visuel pour vos pages. 

Le site doit être responsive.

## Menu

Sur toutes les pages de votre site, vous devez avoir un menu qui vous permet de rapidement retourner à la page d’accueil et qui vous présente des sections selon votre état de connexion.

Lorsque vous n’êtes pas connecté, le menu proposera un lien vers la page d’accueil (recherche), la page d’ajout d’une adresse IP, la page de création d’un compte et la page de connexion.

Si vous êtes connecté, vous aurez accès à une page qui présente la liste des adresses IP que vous avez signalées en plus de la page d’accueil, de la page d’ajout et d’un lien de déconnexion.

Les détails de chaque page sont décrits ci-dessous.

## Authentification

Vous devez utiliser les fichiers générés par Laravel Breeze pour gérer vos usagers. On doit donc avoir accès aux pages d’enregistrement, d’authentification, de récupération de mot de passe, etc.

Il est également important de bien gérer les accès pour qu’une page ne soit pas accessible si l’usager n’y a pas droit.

## Page d’accueil

Sur la page d’accueil, vous devez présenter un champ de recherche au centre de la page. Ce champ validera la saisie pour s’assurer qu’on a entré une adresse IP valide.

Une fois l’adresse validée, une recherche sera effectuée dans la base de données pour aller récupérer l’information sur l’adresse saisie.

## Résultats de recherche

Si l’adresse IP existe en base de données, vous devez faire afficher la page de détails directement (voir la section sur la page de détails plus bas).

Si l’adresse n’existe pas telle quelle en base de données, on retournera alors la liste des adresses qui ressemblent le plus à celle saisie. Ce sera à vous de proposer un algorithme pertinent. Vous pouvez limiter le nombre de résultats à 3.

__Exemple__
Recherché : 172.64.80.1
Retourné : 172.64.80.**4**, 172.64.80.**45**, 172.6**3**.80.1

Vous devez afficher les éléments suivants dans le résultat de recherche :

- Adresse IP
- Description
- Nombre de commentaires
- Nombre d’approbations
- Date d’ajout
- Usager qui l’a ajouté (ou Anonyme)

Finalement, dans le cas où l’adresse n’existe pas telle quelle, on proposera également la possibilité de l’ajouter. L’ajout peut se faire pour un usager connecté ou non.

## Page d’ajout

Dans la page d’ajout, on préremplira l’adresse IP si on arrive du lien d’ajout de la page de recherche. On devra également saisir obligatoirement une description.

Avant la sauvegarde, on doit vérifier que l’adresse est valide et qu’elle n’existe pas déjà en base de données.

Si la création est faite par un usager connecté, on ajoutera une approbation automatiquement pour l’adresse. Sinon, le nombre d’approbations sera à 0.

Après la sauvegarde, on redirigera sur la page de détails associée à notre nouvelle adresse ajoutée.

## Page de détails

Sur la page de détails, on affichera toutes les informations liées à l’adresse IP.

Dans le cas où nous sommes connectés, on aura la possibilité d’approuver ou de désapprouver le signalement d’une adresse IP. Le système d’approbation sera simplement un chiffre. Une approbation = +1. Une désapprobation = -1. Un usager ne peut pas approuver/désapprouver une adresse plus d’une fois et ne peut changer son choix. Il faut donc conserver l’information en base de données.

Dans le bas de la page, on permettra également l’ajout et l’affichage de commentaires.

Les commentaires sont affichés que l’usager soit connecté ou non.

Toutefois, il faut être connecté pour ajouter un commentaire. Si l’usager n’est pas connecté, on affichera un message (et les liens) pour lui indiquer qu’il doit se créer un compte ou se connecter pour ajouter un commentaire.

La liste des commentaires doit être triée en ordre décroissant de date d’ajout. Si aucun commentaire n’est associé, on doit afficher un message en conséquence.

## Page de nos adresses

Si l’usager est connecté, il aura accès à une page qui montre la liste des adresses qu’il a lui-même ajoutées dans la base de données. Il aura alors la possibilité de supprimer une adresse du registre seulement si le nombre d’approbations est inférieur à 10. Un lien sur l’adresse lui permettra également de consulter la page de détails.

## Base de données

La base de données doit se configurer par les migrations et les seeds.


Vous devez vous assurer qu’un usager « gabriel », avec le courriel « gabriel@email.com » et le mot de passe « password », soit ajouté par les seeds. Vous devez également utiliser les seeds et le concept de Faker pour ajouter de fausses données pour démontrer le fonctionnement des différentes pages.

## Traductions

Vous devez vous assurer que le site en entier soit en français. Incluant les pages de connexion, d’inscription, etc.

## Remise

**Vous devez envoyer votre projet nettoyé dans un fichier zip.**

**La remise doit se faire avant le 3 avril 2022 à 21:59.**
