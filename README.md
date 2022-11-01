# MASO-NUMERIQUE



## DESCRIPTION

Nous avons créée un site s'adressant aux jeunes développeurs mais pas que.

Pendant notre formation, nous avons fait le constat que peu de sites expliquauent le code avec des mots simples.
Ils y a une infinité de sites expliquant les bases du code mais beaucoup sont soit difficile d'accès et parlent aux developpeurs confirmés, soit le code est 'sale'.
Pour un débutant les docs sont difficiles à comprendre.

C'est pour cela que nous nous sommes posés la problèmatique suivant :

Le code peut-il être expliqué avec simplicité afin que tout le monde puisse développer une application ?

En collaboration avec des youtubeurs, et en s'appuyant sur la documentation officielle, nous avons mis en place des cours, des astuces, un lexique ainsi que des articles.
Vidéos Tutos, schématisation et résolutions de problèmes que nous avons rencontré au cours de notre apprentissage rempliront les différentes rubriques de ce site.

## DESCRIPTION DES DIFFERENTES PAGES

La page d'accueil : 
- La page d'acceuil présentera les fonctionnalités en navigation
- Les 3 derniers articles publics, cours publics et astuces publiques y seront visibles
- Une fonction renvoye vers la page d'inscription.
- un footer avec les informations obligatoires

## Les articles : 
Un article est défini par :
-catégorie
-un titre
-un contenu
-un auteur
-du date de création ou de modification.

Le titre pas plus de 50 caractère.
Le contenu entre 100 et 200000 caractères.
Les dates sont automatiquement générées et format français.
Les articles sont notés par les utilisateurs

## Les cours et les astuces:
Un cours est définie par:
-un titre
-un contenu
-un auteur
-une date de création ou de modification.

Le titre pas plus de 50 caractères
Le contenu entre 20 et 1500 caractères
Les dates devront être automatiquement générées.

Une page d'accueil astuce offre 3 choix front, Back et autres.
le btn front renverra à la page coursFront
le btn back renverra à la page coursBack
et la page autre renverra à des astuce ni front ni Back par exemple commande clavier ou vscode.
Les cours et les articles sont notés par les utilisateurs.

## Le lexique:
Un lexique sera défini par :
-un mot
-un définition
-un auteur
-du date de création ou de modification.

Le mot pas plus de 50 caractère.
Lla définition entre 5 et 200000 caractères.
Les dates devront être automatiquement générées et format français.
Les mots sont classés par ordre aphalbétique

## FONCTIONNALITES

## Sécurité et compte utilisateur

Un compte utilisateur est défini par :
-un nom
-un prénom
-1 pseudo
- une adresse mail
- un mot de passe
-1 date de création
- une date de modification si modification il y a

Nom et prénom obligatoire. Ils ont entre 2 et 30 caractères.
Le pseudo est facultatif. S'il est renseigné il doit faire entre 5 et 30 caractères.
L'adresse mail est unique et sert d'identifiant lors de la connection.
Le mot de passe est encodé en bdd pour des questions de sécurité.
La date de création est générée aussi automatiquement lors de la modification du profil.

## Gestion des pages
Le but ici est d'interdire l'accès à certaines pages en fonction de certains critères.
=> page d'accueil : Accessible à tout le monde
=> Page de connexion : utilisateurs
=> Page d'inscription : Tout le monde
=> Les articles : uniquement les utilisateurs connectés

=> Création d'un article : Rédacteur
=> Editer un article : auteur de l'article, modérateur, admin
=> Supprimer un article : auteur de l'article, modérateur, admin

=> Création d'une astuce : Rédacteur
=> Editer u astuce : auteur de l'astuce, modérateur, admin
=> Supprimer une astuce : auteur de l'astuce, modérateur, admin

Faire des redirection si un utilisateur se rend sur une page interdite

## Partage d'un article, d'une astuces ou d'un cours
Un utilisateur rédacteur aura à disposition un champs, pour chaque article,  astuce ou cours, lui permettant de choisir si celui en question est disponible pour l'ensemble de la communauté.
Si l'article,  astuce ou cours, est rendu public, alors les utilisateurs pourront le consulter.
Sinon il ne pourra être consulté que par le rédacteur de l'article, le modérateur et l'admin

## Noter l'article, l'astuce ou le cours
Cette fonctionnalité va permettre aux différents utilisateurs de noter les articles,  astuces ou cours mis en public sur l'application. Une fois l'article, astuce ou cours mis en mode public, il est éligible aux votes des utilisateurs
Un utilisateur connecté pourra donner une note entre 1 et 5. L'ensemble des notes feront une moyenne, et les utilisateurs pourront voir cette moyenne sur la page article, astuce ou cours.
Un utilisateur ne pourra pas noter son propre article, astuce ou cours.
Un utilisateur ne pourra pas noter deux fois le même article, astuce ou cours.

## Formulaire de contact
Cette fonctionnalité consiste en l'implémentation d'un formulaire de contact classique.
Ce formulaire contient :
- un nom
- un prénom
- une adresse mail
- un sujet
- un message

Le nom et le prénom sont optionnels. Ils contiennent entre 2 et 50 caractères.
l'adresse mail est obligatoire, comme le message. 
Le sujet est lui optionnel, et contient maximum 150 caractères.

Si l'utilisateur est connecté, alors son nom, prénom et mail seront automatiquement remplis.

Le formulaire contient également un système de reCaptcha.





