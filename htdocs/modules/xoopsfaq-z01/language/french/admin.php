<?php
/**
 * Name: admin.php
 * Description: Xoops FAQ module admin language defines
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package : XOOPS
 * @Module : Xoops FAQ
 * @subpackage : Module Language
 * @since 2.5.7
 * @author John Neill
 * @version $Id: admin.php 0000 10/04/2009 09:05:06 John Neill $
 * Traduction: LionHell 
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Accès restreint' );
include_once "common.php";
/**
 * Icons
 */
define( '_AM_FAQ_EDIT', 'Editer item' );
define( '_AM_FAQ_DELETE', 'Supprimer item' );
define( '_AM_FAQ_CREATENEW', 'Créer nouvel item' );
define( '_AM_FAQ_MODIFYITEM', 'Modifier item: %s' );
//define( '_AM_FAQ_CREATENEW', 'Créer nouveau' );
define( '_AM_FAQ_NOLISTING', 'Aucun item trouvé' );

/**
 * Content
 */
define( '_AM_FAQ_CONTENTS_HEADER', 'Gestion du contenu des Faq' );
define( '_AM_FAQ_CONTENTS_SUBHEADER', '' );
define( '_AM_FAQ_CONTENTS_LIST_DSC', '' );
define( '_AM_FAQ_CONTENTS_ID', '#' );
define( '_AM_FAQ_CONTENTS_TITLE', 'Titre du contenu' );
define( '_AM_FAQ_CONTENTS_WEIGHT', 'Poids' );
define( '_AM_FAQ_CONTENTS_PUBLISH', 'Publié' );
define( '_AM_FAQ_CONTENTS_PUBLISH_DSC', 'Choisir la date de publication' );
define( '_AM_FAQ_CONTENTS_ACTIVATE', 'Activer' );
define( '_AM_FAQ_ACTIONS', 'Actions' );
define( '_AM_FAQ_CONTENTS_CATEGORY', 'Catégorie du contenu:' );
define( '_AM_FAQ_CONTENTS_CATEGORY_DSC', 'Choisir une catégorie pour placer cet article' );
define( '_AM_FAQ_CONTENTS_TITLE_DSC', 'Saisir un titre pour cet item.' );
define( '_AM_FAQ_CONTENTS_CONTENT', 'Contenu:' );
define( '_AM_FAQ_CONTENTS_CONTENT_DSC', '' );
define( '_AM_FAQ_CONTENTS_HOUR', 'Heure:' );
define( '_AM_FAQ_CONTENTS_WEIGHT_DSC', 'Saisir une valeur pour l\'ordre de tri. ' );
define( '_AM_FAQ_CONTENTS_ACTIVE', 'Contenu actif:' );
define( '_AM_FAQ_CONTENTS_AVTIVE_DSC', 'Définir si cet item sera caché ou pas' );
define( '_AM_FAQ_DOHTML', 'Afficher en Html' );
define( '_AM_FAQ_BREAKS', 'Convertir les retours à la ligne en Xoopskreaks' );
define( '_AM_FAQ_DOIMAGE', 'Afficher les images Xoops' );
define( '_AM_FAQ_DOXCODE', 'Afficher les codes Xoops' );
define( '_AM_FAQ_DOSMILEY', 'Afficher les smileys Xoops' );

/**
 * Category
 */
define( '_AM_FAQ_ADDCAT', 'Ajouter une catégorie' );
define( '_AM_FAQ_CATEGORY_HEADER', 'Gestion des catégories de la Faq' );
define( '_AM_FAQ_CATEGORY_SUBHEADER', '' );
define( '_MA_FAQ_CATEGORY_DELETE_DSC', 'Confirmation de suppression ! Vous allez détruire cet item. Vous pouvez annuler cette action en cliquant sur le bouton annuler ou choisir de poursuivre.<br /><br />Cette action est irréversible.' );
define( '_MA_FAQ_CATEGORY_EDIT_DSC', 'Mode édition: Vous pouvez modifier les propriétés de cet item ici. Cliquez sur le bouton envoyer pour confirmer le changement ou sur annuler pour retourner où vous étiez.' );
define( '_AM_FAQ_CATEGORY_LIST_DSC', '' );
define( '_AM_FAQ_ID', '#' );
define( '_AM_FAQ_TITLE', 'Titre' );
define( '_AM_FAQ_CATEGORY_WEIGHT', 'Poids' );

//define( '_AM_FAQ_TITLE', 'Titre de la catégorie:' );
define( '_AM_FAQ_TITLE_DSC', '' );
define( '_AM_FAQ_CATEGORY_WEIGHT_DSC', '' );

/**
 * Database and error
 */
define( '_MA_FAQ_FAQ_SUBERROR', 'Une erreur est survenue<br />' );
define( '_AM_FAQ_RUSURECAT', 'Etes-vous sûr de vouloir supprimer cette catégorie et toutes ses questions ?' );
define( '_AM_FAQ_DBSUCCESS', 'Base de données mise à jour avec succès !' );
define( '_AM_FAQ_ERRORNOCATEGORY', 'Erreur: Pas de nom de catégorie, revenez en arrière et saisissez un nom de catégorie' );
define( '_AM_FAQ_ERRORCOULDNOTADDCAT', 'Erreur: Impossible d\'ajouter une catégorie à la base de données.' );
define( '_AM_FAQ_ERRORCOULDNOTDELCAT', 'Erreur: Impossible de supprimer la catégorie désirée.' );
define( '_AM_FAQ_ERRORCOULDNOTEDITCAT', 'Erreur: Impossible de modifier l\'item voulu.' );
define( '_AM_FAQ_ERRORCOULDNOTDELCONTENTS', 'Erreur: Impossible de supprimer le contenu des FAQ. ' );
define( '_AM_FAQ_ERRORCOULDNOTUPCONTENTS', 'Erreur: Impossible de mettre à jour le contenu des FAQ.' );
define( '_AM_FAQ_ERRORCOULDNOTADDCONTENTS', 'Erreur: Impossible d\'ajouter au contenu des FAQ.' );
define( '_AM_FAQ_NOTHTINGTOSHOW', 'Aucun item à afficher' );
define( '_AM_FAQ_ERRORNOCAT', 'Erreur: Il n\'y a encore aucune catégorie créée. Avant de créer une nouvelle FAQ vous devez créer une catégorie.' );


//--------------------------------------------------------------------
define( '_AM_FAQ_CONTENTS_URL', 'URL' );

define( '_AM_FAQ_CONTENTS_SEEALSO', 'Voir aussi' );
define( '_AM_FAQ_CONTENTS_SEEALSO_DSC', "Sélectionnez une URL prédéfinie ou bien saissicez le libellé et le lien.<br>URL de référence. \"http://\" sera ajouté automatiquement si nécéssaire.</ br>Le libellé remplacera l'url pour l'affichage" );

define( '_AM_FAQ_CONTENTS_LIBSEEALSO', 'Libellé' );
define( '_AM_FAQ_CONTENTS_LIBSEEALSO_DSC', "Libellé optionel de l'URL" );

define( '_AM_FAQ_CONTENTS_ANSWER', 'Réponse courte' );
define( '_AM_FAQ_CONTENTS_ANSWER_DSC', 'Réponse courte affichée dans les listes.' );

define( '_AM_FAQ_CONTENTS_QUESTIONS', 'Questions' );
define( '_AM_FAQ_CONTENTS_QUESTIONS_DSC', 'Questions.' );
define( '_AM_FAQ_COLOR_SET', 'Jeu de couleurs' );
define( '_AM_FAQ_CATEGORY', 'Catégories' );

define( '_AM_FAQ_PERMISSIONS', 'Permissions' );
define( '_AM_FAQ_CONSULT', 'Consultation' );
define( '_AM_FAQ_ADMIN', 'Administration du module' );
define( '_AM_FAQ_MANAGE_QUESTIONS', 'Gestion des questions' );
define( '_AM_FAQ_MANAGE_CATEGORYS', 'Gestion des catégories');
define( '_AM_FAQ_MANAGE', 'Gestion du module');

define( '_AM_FAQ_CATS_CONSULT', 'Consultation par catégorie de la FAQ');

define('_AM_FAQ_PERMS_ADM_MODULE','Administration du module');
define('_AM_FAQ_PERMS_ADM_CATEGORYS','Gestion des catégories');
define('_AM_FAQ_PERMS_ADM_FAQ','Gestion des questions');
define('_AM_FAQ_PERMS_ADM_PERMS','Gestion des permissions');
define('_AM_FAQ_PERMS_ADM_LINKS','Gestion des liens');
define('_AM_FAQ_SHOW_HIDETEXT','Bouton "Fermer"');
define('_AM_FAQ_SHOW_HIDETEXT_DSC','Affiche ou non le Bouton "Fermer" du contenu des question (Lire la suite)');
define('_AM_FAQ_HIDETEXT_ALIGN','Position de "Lire la suite" à droite');
//define('_AM_FAQ_HIDETEXT_ALIGN_DSC','0 = Aligne le texte PositionAffiche ou non le Bouton "Fermer" du contenu des question (Lire la suite)');

define('_AM_FAQ_LINKS_HEADER', 'Gestion des liens récurrents dans les réponses' );
define('_AM_FAQ_LINKS_LIST_DSC', '' );
define( '_AM_FAQ_CONFIRM_DEL_LINK', 'Etes-vous sûr de vouloir supprimer ce lien ?' );
define( '_AM_FAQ_URL', 'URL' );
define( '_AM_FAQ_NEWTAB', 'target=blank' );
define( '_AM_FAQ_NEWTAB_DSC', "Ouvre l'url dans un nouvel onglet");
define( '_MA_FAQ_LINK_EDIT_DSC', "Editions des liens réccurents dans les réponses. Exemple : \"Contactez l'administrateur du site\"");
define( '_AM_FAQ_URLS', "Liens \"voir aussi\"");
define( '_AM_FAQ_URLS_DSC', "Pour chaque lien vous pouvez sélectioner un lien prédéfini ou bien saisir le libellé et l'url.<br>Si vous sélectionnez un lien prédéfini le libellé et l'url seront remplacés par le défitinition de ce lien prédéfini au moment de l'enregistrement de la réponse.");
?>