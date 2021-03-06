<?php

namespace Cama\InflusBundle;

class Constants{
    
        public static $LIST_CLANS = array(
            'Assamite',            
            'Brujah',
            'Caitiff',
            'Gangrel',
            'Giovanni',
            'Malkavien',
            'Nosferatu',
            'Ravnos',
            'Sethite',
            'Toréador',
            'Tremere',
            'Ventrue'
        );
        
        public static $list_historique = array(
		'C'=>'Contacts',
        	'A'=>'Alliés',
        	'RN'=>'Renommée',
        	'RS'=>'Ressources',
        	'T'=>'Troupeau'
	);
        
        public static $list_disci  = array(
	
	"Disciplines Cardinales"=>array(
		'D_AUS'=>'Auspex',
	        'D_ANI'=>'Animalisme',
	        'D_CEL'=>'Célérité',
	        'D_DOM'=>'Domination',
	        'D_DIS'=>'Dissimulation',
	        'D_FDA'=>'Force d\'âme',
	        'D_PRE'=>'Présence',
	        'D_PUI'=>'Puissance'),
       
       "Disciplines Exotiques"=>array(
        	'D_ALI'=>'Aliénation',
        	'D_CHI'=>'Chimérie',
        	'D_MET'=>'Métamorphose',
        	'D_QUI'=>'Quietus',
        	'D_SER'=>'Serpentis'),
	
	"Magies du Sang"=>array(
	 	'D_THA'=>'Thaumaturgie', 
	 	'D_NEC'=>'Nécromancie', 
	 	'D_SOR'=>'Sorcellerie')
	);
	
	public static $list_attr  = array(
		"P"=>"Physique",
		"S"=>"Social",
		"M"=>"Mental"
	);
	
	public static $list_mdt = array(
	'Connaissances du MdT'=>array(
		"Cd_VAM"=>"Vampires",
		"Cd_SAB"=>"Sabbat",
		"Cd_LUP"=>"Lupin",
		"Cd_MAG"=>"Mages",
		"Cd_FAE"=>"Changelins",
		"Cd_AUT"=>"Autre - préciser")
	);
	public static $list_comp = array(
		'Talents'=>array(
			'T_ARC'=>'Archerie',
			'T_AAF'=>'Armes à feu',
			'T_BAG'=>'Bagarre',
			'T_DIS'=>'Discrétion',
			'T_ESQ'=>'Esquive',
			'T_MEL'=>'Mêlée',
			'T_SPO'=>'Sport',
			'T_VIG'=>'Vigilance',
			'T_AUTRE'=>'Autre talent'
		),
		'Compétences'=>array(
			'C_ART'=>'Arts (préciser)',
			'C_COM'=>'Commandement',
			'C_CON'=>'Conduite (préciser)',
			'C_DEM'=>'Démolition',
			'C_DRE'=>'Dressage',
			'C_EMP'=>'Empathie',
			'C_ETI'=>'Etiquette (préciser)',
			'C_EXP'=>'Expression',
			'C_INT'=>'Intuition',
			'C_REP'=>'Réparation',
			'C_SEC'=>'Sécurité',
			'C_SUB'=>'Subterfuge',
			'C_SUR'=>'Survie',
			'C_AUTRE'=>'Autre compétence'
		),
		'Connaissances'=>array(
			'S_DRO'=>'Droit',
			'S_ERU'=>'Erudition',
			'S_FIN'=>'Finance',
			'S_INF'=>'Informatique',
			'S_LIN'=>'Linguistique',
			'S_MED'=>'Médecine (préciser)',
			'S_OCC'=>'Occultisme',
			'S_SCI'=>'Science (Préciser)',
			'S_AUTRE'=>'Autre connaissance'	
		)
	);
        
        public static function list_learn_nomentor() {
             return array_merge(self::$list_comp, self::$list_disci );
        }
        
        public static function list_learn_mentor() {
             return array_merge(self::$list_comp, self::$list_disci, self::$list_mdt );
        }
        
        public static $list_ville = array(
        	 "V_LYO"=>"Lyon",
        	 "V_ANI"=>"Amiens",
        	 "V_ANG"=>"Angers",
        	 "V_BOR"=>"Bordeaux",
        	 "V_CHA"=>"Châteauroux",
        	 "V_GRE"=>"Grenoble",
        	 "V_LIL"=>"Lille",
        	 "V_LIM"=>"Limoges",
        	 "V_MEL"=>"Melun",
        	 "V_MON"=>"Montpellier",
        	 "V_ORL"=>"Orléans",
        	 "V_PAR"=>"Paris",
        	 "V_PER"=>"Périgueux",
        	 "V_STR"=>"Strasbourg",
        	 "V_YS"=>"Ys");
        	 
        public static $LIST_ACTION = array(
            'Mentorat_D' => array(
            	'shorttext'=>'Donner un mentorat',
            	'text'=>'Donner un mentorat de %1% %2% à %3% (Joueur %4% Ville %4)',
            	'parameters'=>array(
                    'Mentorat de'=>'list_learn_mentor',
                    'Niveau'=>'level',
                    'Personnage'=>'string',
                    'Joueur'=>'string',
                    'Ville'=>'list_ville')),
            'Mentorat_R' => array(
            	'shorttext'=>'Recevoir un mentorat',
            	'text'=>'Recevoir un mentorat en %1% %2% à %3% (Joueur %4% Ville %4)',
            	'parameters'=>array(
                    'Mentorat de'=>'list_learn_mentor',
                    'Niveau'=>'level',
                    'Personnage'=>'string',
                    'Joueur'=>'string',
                    'Ville'=>'list_ville')),
            'Apprendre' => array(
            	'shorttext'=>'Apprendre seul',
            	'text'=>'Apprendre %1% %2% seul',
            	'parameters'=>array('Apprendre'=>'list_learn_nomentor','Niveau'=>'level')),
            'Havre_T' => array(
            	'shorttext'=>'Trouver un havre',
            	'text'=>'Trouver un havre de niveau %1%',
            	'parameters'=>array('Niveau'=>'level')),
            'Havre_S' => array(
            	'shorttext'=>'Securiser votre havre',
            	'text'=>'Sécuriser votre havre %1% avec sécurité %2%',
            	'parameters'=>array("Havre"=>'list_refuge','Niveau'=>'level')),
            'Havre_S2' => array(
            	'shorttext'=>'Securiser un autre havre',
            	'text'=>'Sécuriser le havre %1% avec sécurité %2%',
            	'parameters'=>array("Havre"=>'string','Niveau'=>'level')),
            'Serviteur' => array(
            	'shorttext'=>'Trouver un nouveau serviteur',
            	'text'=>'Trouver un nouveau serviteur de niveau %1%',
            	'parameters'=>array('Niveau'=>'level')),
            'Transforme' => array(
            	'shorttext'=>'Transformer votre serviteur en goule',
            	'text'=>'Transformer votre serviteur %1% en goule',
            	'parameters'=>array("Serviteur"=>'list_serv')),
            'Transforme2' => array(
            	'shorttext'=>'Transformer un autre mortel en goule',
            	'text'=>'Transformer votre serviteur %1% en goule',
            	'parameters'=>array("Serviteur"=>'string')),
            'Historique' => array(
            	'shorttext'=>'Augmenter son historique',
            	'text'=>'Augmenter son historique %1% niveau %2%',
            	'parameters'=>array("Historique"=>'list_historique','Niveau'=>'level')),
            'Developper' => array(
            	'shorttext'=>'Se développer sur un secteur',
            	'text'=>'Se développer sur le nouveau secteur d\'influence %1%',
            	'parameters'=>array('Secteur'=>'list_influ')),
            'Espionner' => array(
            	'shorttext'=>'Espionner/Obtenir des renseignements sur un personnage',
            	'text'=>'Espionner/Obtenir des renseignements sur %1%',
            	'parameters'=>array('Personnage'=>'string')),
            'Autre' => array(
            	'shorttext'=>'Autre',
            	'text'=>'Autre',
            	'parameters'=>array())
        );
        
	public static $LIST_ORDRES = array(
            
		'A'=>array('text'=>'Attaque','target'=>true),
		'D'=>array('text'=>'Défense','target'=>false),
		'O'=>array('text'=>'Observer','target'=>false),
                'I'=>array('text'=>'Dissimuler','target'=>false),
		'P'=>array('text'=>'Pister','target'=>true),
		'E'=>array('text'=>'Espionner','target'=>true),		
		'S'=>array('text'=>'Spécifique','target'=>false),
		'C'=>array('text'=>'Croissance','target'=>false),
		'T'=>array('text'=>'Transfert','target'=>true)
	);

	public static $TYPE_SERVANT = array(	
		"goule_influence"=>"Goule d'influence",
	   	"goule_terrain"=>"Goule de terrain",
		"servant_influence"=>"Serviteur d'influence",
		"servant_terrain"=>"Serviteur de terrain");

	public static $TYPE_INFLUENCE = array(	
		"bureaucratie"=>"Bureaucratie",
		"crime"=>"Crime",
		"education"=>"Education",
		"finance"=>"Finance",
		"haute_societe"=>"Haute société",
		"industrie"=>"Industrie",
		"loi"=>"Loi",
		"media"=>"Média",
		"occulte"=>"Occulte",
		"police"=>"Police",
		"politique"=>"Politique",
		"religion"=>"Religion",
		"rue"=>"Rue",
		"sante"=>"Santé",
		"transport"=>"Transport");
}
