Challenge Symfony
========================

La version du symfony utilisé 3.4.6

Le sujet du challenge :
Un vendeur de lunette veut développer une application pour gérer ces produits.
 - Un produit est constitué de : titre, description, Quantité en Stock, marque, Prix ttc, types (soleil, vue, sport), genre (homme, femme, mixte, enfant), fournisseur
 - Chaque marque a un seul et unique fournisseur.
 - Un client peut s'inscrire sur la plateforme et effectuer plusieurs commandes. Pour cela il doit saisir son Nom, Prénom, Adresse, email et téléphone. Toutes ces informations sont obligatoires.
 
 Partie 1
 ********
 - Faire la conception des modèles de données
 - Développer la gestion :
   - Des produits ainsi que tous ces éléments associés (Ajout, modification, suppression).
   - Des fournisseurs (Ajout, modification, suppression)
   - Du stock de produit (Ajout, retrait)
 
 Partie 2
 *********
Développer :
- Un Formulaire d'inscription des clients, avec la gestion des erreurs.
- Une fiche produit sur laquelle le client peut effectuer une commande
- Une commande peut contenir plusieurs produits et doit afficher le prix total de la commande
- La gestion de la commande par le client : Ajout de produit, suppression de produit, modification de la quantité de produit.  
- Après validation de la commande par le client, la commande est enregistrée et visible sous forme de tableau dans une rubrique Gestion des commandes. Un message "Votre commande est enregistrée" s'affiche après validation si l'enregistrement s'est fait avec succès. Un message d'erreur "Votre commande n'a pas pu être enregistrée." s'affiche si la commande n'est pas enregistrée.
- La rubrique gestion de commande affiche un tableau de toutes les commandes. Il affiche le numéro de la commande, la date de la commande, le nom et prénom du client, son adresse mail, le montant total de la commande. Un lien sur le Numéro de la commande permet de voir le détail de la commande sous forme de tableau. Une ligne par produit avec comme information affichée Nom du produit, Quantité achétée, Prix unitaire, Prix total
 
 Partie 3 :
 *********
 - Création d'un api permettant de mettre à jour ou de créer des nouveaux produits depuis une plateforme externe
 - Création d'un api permettant d'effectuer une commande depuis une plateforme externe à l'application
 - Développer les tests unitaire permettant de valider les fonctionnalités.


    
