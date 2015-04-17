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
        
        public static $list_disci  = array(
	
	"Disciplines Cardinales"=>array(
		'AUS'=>'Auspex',
	        'ANI'=>'Animalisme',
	        'CEL'=>'Célérité',
	        'DOM'=>'Domination',
	        'DIS'=>	'Dissimulation',
	        'FDA'=>	'Force d\'âme',
	        'PRE'=>	'Présence',
	        'PUI'=>	'Puissance'),
       
       "Disciplines Exotiques"=>array(
        	'ALI'=>'Aliénation',
        	'CHI'=>'Chimérie'
        	'MET'=>'Métamorphose',
        	'QUI'=>'Quietus',
        	'SER'=>'Serpentis'),
	
	"Magies du Sang"=>array(
	 	'THA'=>'Thaumaturgie', 
	 	'NEC'=>'Nécromancie', 
	 	'SOR'=>'Sorcellerie')
	);
	
	public static $list_attr  = array(
		"P"=>"Physique",
		"S"=>"Social",
		"M"=>"Mental"
	);
	
	public static $list_mdt = array(
	'Connaissances du MdT'=>array(
		"VAM"=>"Vampires",
		"SAB"=>"Sabbat",
		"LUP"=>"Lupin",
		"MAG"=>"Mages",
		"FAE"=>"Changelins")
	);
	public static $list_comp = array(
		'Talents'=>array(),
		'Compétences'=>array(),
		'Connaissances'=>array()
	);

        public static $list_learn_mentor = array_merge($list_comp, $list_disci, $list_mdt );
        public static $list_learn_nomentor = array_merge($list_comp, $list_disci );
        public static $list_influ = Constants::$TYPE_INFLUENCE;
        $level = array(1,2,3,4,5);
        public static $list_ville = array(
        	 "LYO"=>"Lyon",
        	 "ANI"=>"Amiens",
        	 "ANG"=>"Angers",
        	 "BOR"=>"Bordeaux"
        	 "CHA"=>"Châteauroux",
        	 "GRE"=>"Grenoble",
        	 "LIL"=>"Lille",
        	 "LIM"=>"Limoges",
        	 "MEL"=>"Melun",
        	 "MON"=>"Montpellier",
        	 "ORL"=>"Orléans",
        	 "PAR"=>"Paris",
        	 "PER"=>"Périgueux",
        	 "STR"=>"Strasbourg",
        	 "YS"=>"Ys");
        	 
        public static $LIST_ACTION = array(
            'Mentorat_D' => array(
            	'shorttext'=>'Donner un mentorat',
            	'text'=>'Donner un mentorat de %1% %2% à %3% (Joueur %4% Ville %4)',
            	'parameters'=>array('list_learn_mentor','level','string','string','list_ville')),
            'Mentorat_R' => array(
            	'shorttext'=>'Recevoir un mentorat',
            	'text'=>'Recevoir un mentorat en %1% %2% à %3% (Joueur %4% Ville %4)',
            	'parameters'=>array('list_learn_mentor','level','string','string','list_ville'));
            'Apprendre' => array(
            	'shorttext'=>'Apprendre seul',
            	'text'=>'Apprendre %1% %2% seul',
            	'parameters'=>array('list_learn_nomentor','level')),
            'Havre_T' => array(
            	'shorttext'=>'Trouver un havre',
            	'text'=>'Trouver un havre de niveau %1%',
            	'parameters'=>array('level')),
            'Havre_S' => array(
            	'shorttext'=>'Securiser votre havre',
            	'text'=>'Sécuriser votre havre %1% avec sécurité %2%',
            	'parameters'=>array('list_refuge','level')),
            'Havre_S2' => array(
            	'shorttext'=>'Securiser un autre havre',
            	'text'=>'Sécuriser le havre %1% avec sécurité %2%',
            	'parameters'=>array('string','level')),
            'Serviteur' => array(
            	'shorttext'=>'Trouver un nouveau serviteur',
            	'text'=>'Trouver un nouveau serviteur de niveau %1%',
            	'parameters'=>array('level')),
            'Transforme' => array(
            	'shorttext'=>'Transformer votre serviteur en goule',
            	'text'=>'Transformer votre serviteur %1% en goule',
            	'parameters'=>array('list_serv')),
            'Transforme2' => array(
            	'shorttext'=>'Transformer un autre mortel en goule',
            	'text'=>'Transformer votre serviteur %1% en goule',
            	'parameters'=>array('string')),
            'Historique' => array(
            	'shorttext'=>'Augmenter son historique',
            	'text'=>'Augmenter son historique %1% niveau %2%',
            	'parameters'=>array('list_historique','level')),
            'Developper' => array(
            	'shorttext'=>'Se développer sur un secteur',
            	'text'=>'Se développer sur le nouveau secteur d\'influence %1%','
            	parameters'=>array('list_influ')),
            'Espionner' => array(
            	'shorttext'=>'Obtenir des renseignements sur un personnage',
            	'text'=>'Obtenir des renseignements sur %1%',
            	'parameters'=>array('string')),
            'Autre' => array(
            	'shorttext'=>'Autre',
            	'text'=>'Autre',
            	'parameters'=>array())
        );
        
	public static $LIST_ORDRES = array(
		'A'=>array('text'=>'Attaque','target'=>true),
		'D'=>array('text'=>'Défense','target'=>false),
		'I'=>array('text'=>'Dissimuler','target'=>false),
		'P'=>array('text'=>'Pister','target'=>true),
		'E'=>array('text'=>'Espionner','target'=>true),
		'O'=>array('text'=>'Observer','target'=>false),
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
