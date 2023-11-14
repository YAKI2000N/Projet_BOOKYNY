# Projet_BOOKYNY
**Votre Bibliothéque en ligne**

### 1. Théme de l'Application 

L'application "BOOKYNY" permet à une communauté de personnes de partager en ligne des livres de leur collection personnelle. Les membres de la communauté peuvent gérer leur propre inventaire de livres et rendre une partie de cet inventaire publique sous forme de galeries, ce qui les rend accessibles aux autres membres. Les caractéristiques des livres contenus dans l'inventaire peuvent varier en fonction des préférences du membre, et les membres peuvent créer des fiches détaillées pour chaque livre.

### 2. Modéle de données : 

L'application utilise un modéle de données composé des entités suivantes : 
1. **MyBooks (Inventaire)**
   - Description : Représente l'inventaire d'un membre, qui contient des livres.
   - Attributs Actuels :
     - `id` (identifiant unique)
     - `nameINV` (nom de l'inventaire) 
   - Relations :
     - Plusieurs inventaires peuvent appartenir à un membre (relation ManyToOne).
     - Un inventaire peut contenir plusieurs livres (relation OneToMany).

2. **Books (Objet)**
   - Description : Représente les livre dans l'inventaire. Aussi (ces livres peuvent etre publique)
   - Attributs Actuels:
     - `id` (identifiant unique)
     - `title` (titre du livre)
     - `author` (auteur du livre)
     - `note` ( note du livre)
     - `BookDesc` ( description du livre)
     - `dateDeParution` ( Date de parution du livre)
     - `image` ( image de la couverturedu livre)

   - Relations :
     - Plusieurs livres peuvent appartenir à un seul inventaire (relation ManyToOne).
     - Plusierus livres peuvent appartenir à plusieurs galeries (relation ManyToMany).
3. **Member (membre)**
   - Description : Représente un membre de la communauté et gére des inventaires. 
   - Attributs Actuels:
     - `id` (identifiant unique)
     - `Name` (nom du membre)
     - `Description` (description du membre)
   - Relations :
     - Un membre peut géré plusieurs inventaires de livres (relation OneToMany).
     - 
3. **GBooky (Galerie)**
   - Description : Représente la gallerie qui contient les livres. En effet les membres peuvent créer leur 
   propre galerie en choisissant son statut soit : Publiée (tous les visiteurs de sites (authentifiés ou non) 
   peuvent la consulter) ou non publiée (personne ne peut la voir).
   - Attributs Actuels:
     - `id` (identifiant unique)
     - `Name` (nom du membre)
     - `Description` (description du membre)
   - Relations :
     - Un membre peut géré plusieurs inventaires de livres (relation OneToMany).

  ### 3. Nomenclature des Entité :

- **Member (Membre)** : Représente les membres de la communauté, chaque membre peut avoir son propre inventaire de livres.
- **MyBooks (Inventaire)** : Représente l'inventaire d'un membre, qui peut contenir plusieurs livres.
- **Books (Objet)** : Représente les livres individuels qui font partie de l'inventaire.

 →L'application permet donc aux membres de créer, gérer, et partager leurs collections de livres en ligne, en favorisant l'interaction au sein de la communauté. Chaque livre peut être accompagné d'une fiche détaillée, ce qui permet aux membres de partager des informations spécifiques sur chaque livre de leur collection.

### 4. Fonctionnalités actuelles de l'application :
→ L'application marche normalement avec l'affichage des entités MyBooks, Books et membre.
→ MyBooks contient une table qui liste le nom des inventaire et le nombre de livres pour chaque inventaire aussi bien que le rendu de la page de 
modification d'un nombre qui liste aussi les titres des livres contenant dans l'inventaire X. 
→ Books liste les titres, les auteurs de chaque livre disponible (présent dans AppFixture) aussi bien que le nom de l'inventaire auquel appartient
chaque livre.
→ Membre liste le nom des membres de la communautés aussi bien que l'ensemble des inventaires qu'ils gérent. 
→ Possibilité de l'affichage de la liste des inventaire (listAction) et la consultation de chaque inventaire(showAction)(partie FrontOffice). 



//remarque : yakine@localhost == admin 
             et mdp: yakine 
             sabrine@localhost ==user 
             mdp: sabrine


