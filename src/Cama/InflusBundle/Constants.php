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
        
        public static $LIST_ACTION = array(
            'Mentorat_D' => array(
            	'shorttext'=>'Donner un mentorat',
            	'text'=>'Donner un mentorat de %1% à %2% (Joueur %3% Ville %4)',
            	'parameters'=>array('list_learn','string','string','string')),
            'Mentorat_R' => array(
            	'shorttext'=>'Recevoir un mentorat',
            	'text'=>'Recevoir un mentorat en %1% de %2% (Joueur %3% Ville %4)',
            	'parameters'=>array('list_learn','string','string','string'));
            'Apprendre_C' => array(
            	'shorttext'=>'Apprendre une compétence seul',
            	'text'=>'Apprendre la compétence %1% seul',
            	'parameters'=>array('list_comp')),
            'Apprendre_D' => array(
            	'shorttext'=>'Apprendre une discipline seul',
            	'text'=>'Apprendre la discipline %1% seul',
            	'parameters'=>array('list_discipline')),
            'Havre_T' => array(
            	'shorttext'=>'Trouver un havre',
            	'text'=>'Trouver un havre de niveau %1%',
            	'parameters'=>array('integer')),
            'Havre_S' => array(
            	'shorttext'=>'Securiser votre havre',
            	'text'=>'Sécuriser votre havre %1% avec sécurité niveau %2%',
            	'parameters'=>array('list_refuge','integer')),
            'Havre_S2' => array(
            	'shorttext'=>'Securiser un autre havre',
            	'text'=>'Sécuriser le havre %1% avec sécurité niveau %2%',
            	'parameters'=>array('string','integer')),
            'Serviteur' => array(
            	'shorttext'=>'Trouver un nouveau serviteur',
            	'text'=>'Trouver un nouveau serviteur de niveau %1%',
            	'parameters'=>array('integer')),
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
            	'text'=>'Augmenter son historique %1%',
            	'parameters'=>array('list_historique')),
            'Developper' => array(
            	'shorttext'=>'Se développer sur un secteur',
            	'text'=>'Se développer sur le nouveau secteur d\'influence %1%','
            	parameters'=>array('list_secteurs')),
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
		'A'=>array(text=>'Attaque',target=>true),
		'D'=>array(text=>'Défense',target=>false),
		'I'=>array(text=>'Dissimuler',target=>false),
		'P'=>array(text=>'Pister',target=>true),
		'E'=>array(text=>'Espionner',target=>true),
		'O'=>array(text=>'Observer',target=>false),
		'S'=>array(text=>'Spécifique',target=>false),
		'C'=>array(text=>'Croissance',target=>false),
		'T'=>array(text=>'Transfert',target=>true)
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
