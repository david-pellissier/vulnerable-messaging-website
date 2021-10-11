# STI : Projet 1 - Manuel utilisateur

Auteurs : Nicolas Ogi, David Pellissier

Date : 11.10.21



## Installation

1. Commencez par cloner ce repository GitHub à l'endroit de votre choix avec la commande :

   `git clone git@github.com:david-pellissier/STI-Projet-Ogi-Pellissier.git`

   Vous devriez obtenir l'arborescence suivante :
   
   ```
   │   README.md
   |
   └───site
       ├───databases
       │       database.sqlite
       │
       └───html
           │   index.php
           │   phpliteadmin.php
           │
           ├───controller
           │       controller.php
           │       details.php
           │       login.php
           │       mailbox.php
           │       message.php
           │       users.php
           │
           ├───css
           │       global.css
           │       login.css
           │       mailbox.css
           │       message.css
           │       users.css
           │
           ├───model
           │       db.php
           │       details.php
           │       login.php
           │       mailbox.php
           │       message.php
           │       users.php
           │
           └───view
               │   details.php
               │   login.php
               │   mailbox.php
               │   message.php
               │   usermodify.php
               │   users.php
               │
               └───components
                       info_to_user.php
                       password_repeat_check.html
                       sidebar.php
   ```
   
   Comme ce projet a été construit avec un pattern MVC, vous retrouverez les contrôleurs dans le dossier *controller*, les modèles dans le dossier *model* et les vues dans le dossier *view*. La base de données est fournie avec le projet et est représentée par le fichier *database.sqlite* dans le dossier *databases*. Il est possible d'y accéder via le fichier *phpliteadmin.php* une fois le conteneur Docker et les services démarrés.



## Lancement

2. Pour créer le conteneur Docker, utiliser la commande :

```bash
   docker run -ti -v ${PWD}/site:/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018
```
Elle permet de télécharger l'image de base *arubinst/sti:project2018* contenant les services nginx et php, de mapper le dossier *site* en local sur le dossier */usr/share/nginx/* dans le conteneur, de mapper le port 8080 local sur le port 80 du conteneur, de nommer le conteneur *sti_project* ainsi que de nommer la machine *sti*.

   Si le conteneur Docker existe déjà, vous n'avez qu'à le lancer avec la commande : `docker start sti_project`


3. Lancez les deux services depuis votre host :

```bash
docker exec -u root sti_project service nginx start # NGINX
docker exec -u root sti_project service php5-fpm start # pour PHP
```


**ATTENTION** : Avant de lancer les commandes Docker ci-dessus, assurez-vous d'avoir bien installé et lancé le Docker Engine sur votre machine.



4. Accédez à la page de login en tapant `localhost:8080` dans votre navigateur.



## Utilisation

### Page de login

![image-20211010174302294](figures/image-20211010174302294.png)

Voici la page de login, vous demandant d'entrer un nom d'utilisateur et un mot de passe. Deux comptes sont déjà créés, un compte d'administrateur et un compte de collaborateur dont vous trouverez les informations de connexion ci-dessous :

| Nom d'utilisateur | Mot de passe | Rôle           | Validité |
| ----------------- | ------------ | -------------- | -------- |
| admin             | admin        | Administrateur | actif    |
| alice             | alice        | Collaborateur  | actif    |



### Boîte mail

Une fois connecté, vous arriverez sur cette page représentant une boîte mail :

![image-20211010175349820](figures/image-20211010175349820.png)

Le panneau de gauche possède différents boutons permettant d'écrire un nouveau message, de changer son mot de passe, d'accéder à la liste des utilisateurs (bouton affiché seulement pour les comptes ayant le rôle d'Administrateur) et de se déconnecter.

Le panneau de droite affiche le nom de l'utilisateur actuellement connecté ainsi que les mails reçus. Il est possible d'y répondre directement, de l'ouvrir afin d'afficher le corps du message et de le supprimer.



### Écrire un nouveau mail

Après avoir appuyé sur le bouton *NEW MESSAGE*, la page ci-dessous s'affiche à l'écran : 

![image-20211010180412875](figures/image-20211010180412875.png)

Pour envoyer un nouveau mail, il suffit de renseigner un nom d'utilisateur existant dans la base de données, de renseigner un sujet ainsi qu'un corps.



### Changer son mot de passe

En cliquant sur le bouton *Change password*, il est possible d'accéder aux informations de compte de l'utilisateur connecté afin de modifier son mot de passe : 

![image-20211010183852483](figures/image-20211010183852483.png)

Un collaborateur ne pourra que modifier son mot de passe à l'aide de la page ci-dessus.



### Liste des utilisateurs

Un administrateur peut accéder à la liste des utilisateurs en cliquant sur le bouton *Users list* :

![image-20211011204905938](figures/image-20211011204905938.png)

Depuis là, il peut modifier, ajouter voire supprimer un utilisateur. Pour revenir dans la boîte mail, il suffit de cliquer sur *Mailbox* en haut à gauche. Un administrateur peut également passer par cette page pour accéder aux informations de son compte et de modifier son mot de passe par exemple.



### Créer un nouvel utilisateur

Lorsqu'un administrateur clique sur le bouton *Add user* en-dessous de la liste des utilisateurs existants, il arrive sur la page ci-dessous :

![image-20211011214817920](figures/image-20211011214817920.png)

Elle lui permet de renseigner un nom d'utilisateur, de paramétrer le rôle de celui-ci, de lui définir un mot de passe ainsi que d'activer ou non le compte avec la checkbox.



### Modifier un utilisateur existant

Lorsqu'un administrateur clique sur le bouton *Edit* à côté d'utilisateur dans liste des utilisateurs existants, il arrive sur la page ci-dessous :

![image-20211011215029258](figures/image-20211011215029258.png)

Elle lui permet de modifier le rôle de l'utilisateur, son mot de passe ainsi que d'activer ou désactiver le compte.




### Répondre à un mail

En cliquant sur le bouton *Reply* présent à côté d'un mail reçu, il est possible d'y répondre directement et d'avoir une partie des champs pré-remplie :

![image-20211010182809550](figures/image-20211010182809550.png)



Ici, il suffit d'écrire sa réponse en-dessus de la ligne horizontale qui sépare le corps du mail reçu de la réponse.



### Ouvrir un mail

En cliquant sur le bouton *Open* situé à côté d'un mail reçu, il est possible de l'ouvrir afin d'en afficher les détails avec cette page :

![image-20211010183221677](figures/image-20211010183221677.png)

Comme dans la boîte mail, il est aussi possible de répondre au message et de le supprimer avec les deux boutons placés en-dessous du corps du message.



**TODO** :

- [x] Afficher message d'erreur si login incorrect
- [x] Trier mail par date AVEC heure car mails du même jour pas dans le bon ordre et tronquer affichage dans mailbox
- [x] Lors de l'envoi d'un nouveau mail, si l'utilisateur n'existe pas afficher message d'erreur en haut à gauche
- [x] Rendre le nom d'utilisateur non-modifiable
- [x] Si l'on quitte la page de création d'utilisateur sans valider sa création, l'utilisateur est créé quand même
- [x] Afficher rôle, validité en plus dans la liste des utilisateurs
- [x] Modifier le nom du bouton pour créer/modifier un utilisateur -> "submit"
- [x] Régler problème lors de réponse de mail `SQLSTATE[HY000]: General error: 1 near "ai": syntax error` à cause d'un apostrophe qui est interprété dans la requête
- [x] Seule la page de login doit être accessible sans être authentifié (sidebar est accessible, à corriger ?)
- [x] Le destinataire doit être unique
- [x] Problème d'affichage lors du changement de mot de passe
- [x] Affiche this user does not exist quand on quitte la page de modification de user
- [x] page exemple.php à supprimer
- [x] Empêcher la modification du nom d'utilisateur sauf à la création
