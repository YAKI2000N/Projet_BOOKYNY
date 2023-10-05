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
   - Relations :
     - Un livre peut appartenir à plusieurs inventaires (relation ManyToMany).
     - 
3. **Member (membre)**
   - Description : Représente un membre de la communauté et gére des inventaires. 
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






