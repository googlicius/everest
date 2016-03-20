<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");

		// Presets URL
		$preset_url = get_template_directory_uri().'/inc/admin/presets/';

	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');
		$of_pages['0'] = 'Select a page:';
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->post_name] = $of_page->post_title; }
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		//$google_fonts = array('Open Sans' => 'Open Sans','Sacramento' => 'Sacramento','Droid Sans' =>'Droid Sans','Oswald' => 'Oswald','Droid Serif' => 'Droid Serif','Lato' => 'Lato','Francois One' => 'Francois One','Raleway' => 'Raleway','Arvo' => 'Arvo','Roboto Slab' => 'Roboto Slab','Noto Serif' => 'Noto Serif','Noto Sans' =>'Noto Sans','Abril Fatface'=>'Abril Fatface','Clicker Script' => 'Clicker Script');
		$google_fonts = array(
						'customFont' => 'Custom Font',
						'arial'=>'Arial',
						'verdana'=>'Verdana, Geneva',
						'trebuchet'=>'Trebuchet',
						'trebuchet ms'=>'Trebuchet MS',
						'georgia' =>'Georgia',
						'times'=>'Times New Roman',
						'tahoma'=>'Tahoma, Geneva',
						'helvetica'=>'Helvetica',
						'Abel' => 'Abel',
						'Abril Fatface' => 'Abril Fatface',
						'Aclonica' => 'Aclonica',
						'Acme' => 'Acme',
						'Actor' => 'Actor',
						'Adamina' => 'Adamina',
						'Advent Pro' => 'Advent Pro',
						'Aguafina Script' => 'Aguafina Script',
						'Aladin' => 'Aladin',
						'Aldrich' => 'Aldrich',
						'Alegreya' => 'Alegreya',
						'Alegreya SC' => 'Alegreya SC',
						'Alex Brush' => 'Alex Brush',
						'Alfa Slab One' => 'Alfa Slab One',
						'Alice' => 'Alice',
						'Alike' => 'Alike',
						'Alike Angular' => 'Alike Angular',
						'Allan' => 'Allan',
						'Allerta' => 'Allerta',
						'Allerta Stencil' => 'Allerta Stencil',
						'Allura' => 'Allura',
						'Almendra' => 'Almendra',
						'Almendra SC' => 'Almendra SC',
						'Amaranth' => 'Amaranth',
						'Amatic SC' => 'Amatic SC',
						'Amethysta' => 'Amethysta',
						'Andada' => 'Andada',
						'Andika' => 'Andika',
						'Angkor' => 'Angkor',
						'Annie Use Your Telescope' => 'Annie Use Your Telescope',
						'Anonymous Pro' => 'Anonymous Pro',
						'Antic' => 'Antic',
						'Antic Didone' => 'Antic Didone',
						'Antic Slab' => 'Antic Slab',
						'Anton' => 'Anton',
						'Arapey' => 'Arapey',
						'Arbutus' => 'Arbutus',
						'Architects Daughter' => 'Architects Daughter',
						'Arimo' => 'Arimo',
						'Arizonia' => 'Arizonia',
						'Armata' => 'Armata',
						'Artifika' => 'Artifika',
						'Arvo' => 'Arvo',
						'Asap' => 'Asap',
						'Asset' => 'Asset',
						'Astloch' => 'Astloch',
						'Asul' => 'Asul',
						'Atomic Age' => 'Atomic Age',
						'Aubrey' => 'Aubrey',
						'Audiowide' => 'Audiowide',
						'Average' => 'Average',
						'Averia Gruesa Libre' => 'Averia Gruesa Libre',
						'Averia Libre' => 'Averia Libre',
						'Averia Sans Libre' => 'Averia Sans Libre',
						'Averia Serif Libre' => 'Averia Serif Libre',
						'Bad Script' => 'Bad Script',
						'Balthazar' => 'Balthazar',
						'Bangers' => 'Bangers',
						'Basic' => 'Basic',
						'Battambang' => 'Battambang',
						'Baumans' => 'Baumans',
						'Bayon' => 'Bayon',
						'Belgrano' => 'Belgrano',
						'Belleza' => 'Belleza',
						'Bentham' => 'Bentham',
						'Berkshire Swash' => 'Berkshire Swash',
						'Bevan' => 'Bevan',
						'Bigshot One' => 'Bigshot One',
						'Bilbo' => 'Bilbo',
						'Bilbo Swash Caps' => 'Bilbo Swash Caps',
						'Bitter' => 'Bitter',
						'Black Ops One' => 'Black Ops One',
						'Bokor' => 'Bokor',
						'Bonbon' => 'Bonbon',
						'Boogaloo' => 'Boogaloo',
						'Bowlby One' => 'Bowlby One',
						'Bowlby One SC' => 'Bowlby One SC',
						'Brawler' => 'Brawler',
						'Bree Serif' => 'Bree Serif',
						'Bubblegum Sans' => 'Bubblegum Sans',
						'Buda' => 'Buda',
						'Buenard' => 'Buenard',
						'Butcherman' => 'Butcherman',
						'Butterfly Kids' => 'Butterfly Kids',
						'Cabin' => 'Cabin',
						'Cabin Condensed' => 'Cabin Condensed',
						'Cabin Sketch' => 'Cabin Sketch',
						'Caesar Dressing' => 'Caesar Dressing',
						'Cagliostro' => 'Cagliostro',
						'Calligraffitti' => 'Calligraffitti',
						'Cambo' => 'Cambo',
						'Candal' => 'Candal',
						'Cantarell' => 'Cantarell',
						'Cantata One' => 'Cantata One',
						'Cardo' => 'Cardo',
						'Carme' => 'Carme',
						'Carter One' => 'Carter One',
						'Caudex' => 'Caudex',
						'Cedarville Cursive' => 'Cedarville Cursive',
						'Ceviche One' => 'Ceviche One',
						'Changa One' => 'Changa One',
						'Chango' => 'Chango',
						'Chau Philomene One' => 'Chau Philomene One',
						'Chelsea Market' => 'Chelsea Market',
						'Chenla' => 'Chenla',
						'Cherry Cream Soda' => 'Cherry Cream Soda',
						'Chewy' => 'Chewy',
						'Chicle' => 'Chicle',
						'Chivo' => 'Chivo',
						'Coda' => 'Coda',
						'Coda Caption' => 'Coda Caption',
						'Codystar' => 'Codystar',
						'Comfortaa' => 'Comfortaa',
						'Coming Soon' => 'Coming Soon',
						'Concert One' => 'Concert One',
						'Condiment' => 'Condiment',
						'Content' => 'Content',
						'Contrail One' => 'Contrail One',
						'Convergence' => 'Convergence',
						'Cookie' => 'Cookie',
						'Copse' => 'Copse',
						'Corben' => 'Corben',
						'Cousine' => 'Cousine',
						'Coustard' => 'Coustard',
						'Covered By Your Grace' => 'Covered By Your Grace',
						'Crafty Girls' => 'Crafty Girls',
						'Creepster' => 'Creepster',
						'Crete Round' => 'Crete Round',
						'Crimson Text' => 'Crimson Text',
						'Crushed' => 'Crushed',
						'Cuprum' => 'Cuprum',
						'Cutive' => 'Cutive',
						'Damion' => 'Damion',
						'Dancing Script' => 'Dancing Script',
						'Dangrek' => 'Dangrek',
						'Dawning of a New Day' => 'Dawning of a New Day',
						'Days One' => 'Days One',
						'Delius' => 'Delius',
						'Delius Swash Caps' => 'Delius Swash Caps',
						'Delius Unicase' => 'Delius Unicase',
						'Della Respira' => 'Della Respira',
						'Devonshire' => 'Devonshire',
						'Didact Gothic' => 'Didact Gothic',
						'Diplomata' => 'Diplomata',
						'Diplomata SC' => 'Diplomata SC',
						'Doppio One' => 'Doppio One',
						'Dorsa' => 'Dorsa',
						'Dosis' => 'Dosis',
						'Dr Sugiyama' => 'Dr Sugiyama',
						'Droid Sans' => 'Droid Sans',
						'Droid Sans Mono' => 'Droid Sans Mono',
						'Droid Serif' => 'Droid Serif',
						'Duru Sans' => 'Duru Sans',
						'Dynalight' => 'Dynalight',
						'EB Garamond' => 'EB Garamond',
						'Eater' => 'Eater',
						'Economica' => 'Economica',
						'Electrolize' => 'Electrolize',
						'Emblema One' => 'Emblema One',
						'Emilys Candy' => 'Emilys Candy',
						'Engagement' => 'Engagement',
						'Enriqueta' => 'Enriqueta',
						'Erica One' => 'Erica One',
						'Esteban' => 'Esteban',
						'Euphoria Script' => 'Euphoria Script',
						'Ewert' => 'Ewert',
						'Exo' => 'Exo',
						'Exo 2' => 'Exo 2',
						'Expletus Sans' => 'Expletus Sans',
						'Fanwood Text' => 'Fanwood Text',
						'Fascinate' => 'Fascinate',
						'Fascinate Inline' => 'Fascinate Inline',
						'Federant' => 'Federant',
						'Federo' => 'Federo',
						'Felipa' => 'Felipa',
						'Fjord One' => 'Fjord One',
						'Flamenco' => 'Flamenco',
						'Flavors' => 'Flavors',
						'Fira Mono' => 'Fira Mono',
						'Fondamento' => 'Fondamento',
						'Fontdiner Swanky' => 'Fontdiner Swanky',
						'Forum' => 'Forum',
						'Fjalla One' => 'Fjalla One',
						'Francois One' => 'Francois One',
						'Fredericka the Great' => 'Fredericka the Great',
						'Fredoka One' => 'Fredoka One',
						'Freehand' => 'Freehand',
						'Fresca' => 'Fresca',
						'Frijole' => 'Frijole',
						'Fugaz One' => 'Fugaz One',
						'GFS Didot' => 'GFS Didot',
						'GFS Neohellenic' => 'GFS Neohellenic',
						'Galdeano' => 'Galdeano',
						'Gentium Basic' => 'Gentium Basic',
						'Gentium Book Basic' => 'Gentium Book Basic',
						'Geo' => 'Geo',
						'Geostar' => 'Geostar',
						'Geostar Fill' => 'Geostar Fill',
						'Germania One' => 'Germania One',
						'Gilda Display' => 'Gilda Display',
						'Give You Glory' => 'Give You Glory',
						'Glass Antiqua' => 'Glass Antiqua',
						'Glegoo' => 'Glegoo',
						'Gloria Hallelujah' => 'Gloria Hallelujah',
						'Goblin One' => 'Goblin One',
						'Gochi Hand' => 'Gochi Hand',
						'Gorditas' => 'Gorditas',
						'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
						'Graduate' => 'Graduate',
						'Gravitas One' => 'Gravitas One',
						'Great Vibes' => 'Great Vibes',
						'Gruppo' => 'Gruppo',
						'Gudea' => 'Gudea',
						'Habibi' => 'Habibi',
						'Hammersmith One' => 'Hammersmith One',
						'Handlee' => 'Handlee',
						'Hanuman' => 'Hanuman',
						'Happy Monkey' => 'Happy Monkey',
						'Henny Penny' => 'Henny Penny',
						'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
						'Holtwood One SC' => 'Holtwood One SC',
						'Homemade Apple' => 'Homemade Apple',
						'Homenaje' => 'Homenaje',
						'IM Fell DW Pica' => 'IM Fell DW Pica',
						'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
						'IM Fell Double Pica' => 'IM Fell Double Pica',
						'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
						'IM Fell English' => 'IM Fell English',
						'IM Fell English SC' => 'IM Fell English SC',
						'IM Fell French Canon' => 'IM Fell French Canon',
						'IM Fell French Canon SC' => 'IM Fell French Canon SC',
						'IM Fell Great Primer' => 'IM Fell Great Primer',
						'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
						'Iceberg' => 'Iceberg',
						'Iceland' => 'Iceland',
						'Imprima' => 'Imprima',
						'Inconsolata' => 'Inconsolata',
						'Inder' => 'Inder',
						'Indie Flower' => 'Indie Flower',
						'Inika' => 'Inika',
						'Irish Grover' => 'Irish Grover',
						'Istok Web' => 'Istok Web',
						'Italiana' => 'Italiana',
						'Italianno' => 'Italianno',
						'Jim Nightshade' => 'Jim Nightshade',
						'Jockey One' => 'Jockey One',
						'Jolly Lodger' => 'Jolly Lodger',
						'Josefin Sans' => 'Josefin Sans',
						'Josefin Slab' => 'Josefin Slab',
						'Judson' => 'Judson',
						'Julee' => 'Julee',
						'Junge' => 'Junge',
						'Jura' => 'Jura',
						'Just Another Hand' => 'Just Another Hand',
						'Just Me Again Down Here' => 'Just Me Again Down Here',
						'Kameron' => 'Kameron',
						'Karla' => 'Karla',
						'Kaushan Script' => 'Kaushan Script',
						'Kelly Slab' => 'Kelly Slab',
						'Kenia' => 'Kenia',
						'Khmer' => 'Khmer',
						'Knewave' => 'Knewave',
						'Kotta One' => 'Kotta One',
						'Koulen' => 'Koulen',
						'Kranky' => 'Kranky',
						'Kreon' => 'Kreon',
						'Kristi' => 'Kristi',
						'Krona One' => 'Krona One',
						'La Belle Aurore' => 'La Belle Aurore',
						'Lancelot' => 'Lancelot',
						'Lato' => 'Lato',
						'League Script' => 'League Script',
						'Leckerli One' => 'Leckerli One',
						'Ledger' => 'Ledger',
						'Lekton' => 'Lekton',
						'Lemon' => 'Lemon',
						'Libre Baskerville' => 'Libre Baskerville',
						'Lilita One' => 'Lilita One',
						'Limelight' => 'Limelight',
						'Linden Hill' => 'Linden Hill',
						'Lobster' => 'Lobster',
						'Lobster Two' => 'Lobster Two',
						'Londrina Outline' => 'Londrina Outline',
						'Londrina Shadow' => 'Londrina Shadow',
						'Londrina Sketch' => 'Londrina Sketch',
						'Londrina Solid' => 'Londrina Solid',
						'Lora' => 'Lora',
						'Love Ya Like A Sister' => 'Love Ya Like A Sister',
						'Loved by the King' => 'Loved by the King',
						'Lovers Quarrel' => 'Lovers Quarrel',
						'Luckiest Guy' => 'Luckiest Guy',
						'Lusitana' => 'Lusitana',
						'Lustria' => 'Lustria',
						'Macondo' => 'Macondo',
						'Macondo Swash Caps' => 'Macondo Swash Caps',
						'Magra' => 'Magra',
						'Maiden Orange' => 'Maiden Orange',
						'Mako' => 'Mako',
						'Marcellus' => 'Marcellus',
						'Marcellus SC' => 'Marcellus SC',
						'Marck Script' => 'Marck Script',
						'Marko One' => 'Marko One',
						'Marmelad' => 'Marmelad',
						'Marvel' => 'Marvel',
						'Mate' => 'Mate',
						'Mate SC' => 'Mate SC',
						'Maven Pro' => 'Maven Pro',
						'Meddon' => 'Meddon',
						'MedievalSharp' => 'MedievalSharp',
						'Medula One' => 'Medula One',
						'Megrim' => 'Megrim',
						'Merienda One' => 'Merienda One',
						'Merriweather' => 'Merriweather',
						'Metal' => 'Metal',
						'Metamorphous' => 'Metamorphous',
						'Metrophobic' => 'Metrophobic',
						'Michroma' => 'Michroma',
						'Miltonian' => 'Miltonian',
						'Miltonian Tattoo' => 'Miltonian Tattoo',
						'Miniver' => 'Miniver',
						'Miss Fajardose' => 'Miss Fajardose',
						'Modern Antiqua' => 'Modern Antiqua',
						'Molengo' => 'Molengo',
						'Monofett' => 'Monofett',
						'Monoton' => 'Monoton',
						'Monsieur La Doulaise' => 'Monsieur La Doulaise',
						'Montaga' => 'Montaga',
						'Montez' => 'Montez',
						'Montserrat' => 'Montserrat',
						'Montserrat Alternates' => 'Montserrat Alternates',
						'Montserrat Subrayada' => 'Montserrat Subrayada',
						'Moul' => 'Moul',
						'Moulpali' => 'Moulpali',
						'Mountains of Christmas' => 'Mountains of Christmas',
						'Mr Bedfort' => 'Mr Bedfort',
						'Mr Dafoe' => 'Mr Dafoe',
						'Mr De Haviland' => 'Mr De Haviland',
						'Mrs Saint Delafield' => 'Mrs Saint Delafield',
						'Mrs Sheppards' => 'Mrs Sheppards',
						'Muli' => 'Muli',
						'Mystery Quest' => 'Mystery Quest',
						'Neucha' => 'Neucha',
						'Neuton' => 'Neuton',
						'News Cycle' => 'News Cycle',
						'Niconne' => 'Niconne',
						'Nixie One' => 'Nixie One',
						'Nobile' => 'Nobile',
						'Nokora' => 'Nokora',
						'Norican' => 'Norican',
						'Nosifer' => 'Nosifer',
						'Nothing You Could Do' => 'Nothing You Could Do',
						'Noticia Text' => 'Noticia Text',
						'Noto Sans' => 'Noto Sans',
						'Nova Cut' => 'Nova Cut',
						'Nova Flat' => 'Nova Flat',
						'Nova Mono' => 'Nova Mono',
						'Nova Oval' => 'Nova Oval',
						'Nova Round' => 'Nova Round',
						'Nova Script' => 'Nova Script',
						'Nova Slim' => 'Nova Slim',
						'Nova Square' => 'Nova Square',
						'Numans' => 'Numans',
						'Nunito' => 'Nunito',
						'Odor Mean Chey' => 'Odor Mean Chey',
						'Old Standard TT' => 'Old Standard TT',
						'Oldenburg' => 'Oldenburg',
						'Oleo Script' => 'Oleo Script',
						'Open Sans' => 'Open Sans',
						'Open Sans Condensed' => 'Open Sans Condensed',
						'Orbitron' => 'Orbitron',
						'Original Surfer' => 'Original Surfer',
						'Oswald' => 'Oswald',
						'Over the Rainbow' => 'Over the Rainbow',
						'Overlock' => 'Overlock',
						'Overlock SC' => 'Overlock SC',
						'Ovo' => 'Ovo',
						'Oxygen' => 'Oxygen',
						'PT Mono' => 'PT Mono',
						'PT Sans' => 'PT Sans',
						'PT Sans Caption' => 'PT Sans Caption',
						'PT Sans Narrow' => 'PT Sans Narrow',
						'PT Serif' => 'PT Serif',
						'PT Serif Caption' => 'PT Serif Caption',
						'Pacifico' => 'Pacifico',
						'Parisienne' => 'Parisienne',
						'Passero One' => 'Passero One',
						'Passion One' => 'Passion One',
						'Patrick Hand' => 'Patrick Hand',
						'Patua One' => 'Patua One',
						'Paytone One' => 'Paytone One',
						'Permanent Marker' => 'Permanent Marker',
						'Petrona' => 'Petrona',
						'Philosopher' => 'Philosopher',
						'Piedra' => 'Piedra',
						'Pinyon Script' => 'Pinyon Script',
						'Plaster' => 'Plaster',
						'Play' => 'Play',
						'Playball' => 'Playball',
						'Playfair Display' => 'Playfair Display',
						'Podkova' => 'Podkova',
						'Poiret One' => 'Poiret One',
						'Poller One' => 'Poller One',
						'Poly' => 'Poly',
						'Pompiere' => 'Pompiere',
						'Pontano Sans' => 'Pontano Sans',
						'Port Lligat Sans' => 'Port Lligat Sans',
						'Port Lligat Slab' => 'Port Lligat Slab',
						'Prata' => 'Prata',
						'Preahvihear' => 'Preahvihear',
						'Press Start 2P' => 'Press Start 2P',
						'Princess Sofia' => 'Princess Sofia',
						'Prociono' => 'Prociono',
						'Prosto One' => 'Prosto One',
						'Puritan' => 'Puritan',
						'Quantico' => 'Quantico',
						'Quattrocento' => 'Quattrocento',
						'Quattrocento Sans' => 'Quattrocento Sans',
						'Questrial' => 'Questrial',
						'Quicksand' => 'Quicksand',
						'Qwigley' => 'Qwigley',
						'Radley' => 'Radley',
						'Raleway' => 'Raleway',
						'Rammetto One' => 'Rammetto One',
						'Rancho' => 'Rancho',
						'Rationale' => 'Rationale',
						'Redressed' => 'Redressed',
						'Reenie Beanie' => 'Reenie Beanie',
						'Revalia' => 'Revalia',
						'Ribeye' => 'Ribeye',
						'Ribeye Marrow' => 'Ribeye Marrow',
						'Righteous' => 'Righteous',
						'Roboto' => 'Roboto',
						'Roboto Condensed' => 'Roboto Condensed',
						'Roboto Sans' => 'Roboto Sans',
						'Roboto Slab' => 'Roboto Slab',
						'Rochester' => 'Rochester',
						'Rock Salt' => 'Rock Salt',
						'Rokkitt' => 'Rokkitt',
						'Ropa Sans' => 'Ropa Sans',
						'Rosario' => 'Rosario',
						'Rosarivo' => 'Rosarivo',
						'Rouge Script' => 'Rouge Script',
						'Ruda' => 'Ruda',
						'Ruge Boogie' => 'Ruge Boogie',
						'Ruluko' => 'Ruluko',
						'Rum Raisin' => 'Rum Raisin',
						'Ruslan Display' => 'Ruslan Display',
						'Russo One' => 'Russo One',
						'Ruthie' => 'Ruthie',
						'Sacramento' => 'Sacramento',
						'Sail' => 'Sail',
						'Salsa' => 'Salsa',
						'Sancreek' => 'Sancreek',
						'Sansita One' => 'Sansita One',
						'Sarina' => 'Sarina',
						'Satisfy' => 'Satisfy',
						'Schoolbell' => 'Schoolbell',
						'Segoe UI' => 'Segoe UI',
						'Seaweed Script' => 'Seaweed Script',
						'Sevillana' => 'Sevillana',
						'Seymour One' => 'Seymour One',
						'Shadows Into Light' => 'Shadows Into Light',
						'Shadows Into Light Two' => 'Shadows Into Light Two',
						'Shanti' => 'Shanti',
						'Share' => 'Share',
						'Shojumaru' => 'Shojumaru',
						'Short Stack' => 'Short Stack',
						'Siemreap' => 'Siemreap',
						'Sigmar One' => 'Sigmar One',
						'Signika' => 'Signika',
						'Signika Negative' => 'Signika Negative',
						'Simonetta' => 'Simonetta',
						'Sirin Stencil' => 'Sirin Stencil',
						'Six Caps' => 'Six Caps',
						'Slackey' => 'Slackey',
						'Smokum' => 'Smokum',
						'Smythe' => 'Smythe',
						'Sniglet' => 'Sniglet',
						'Snippet' => 'Snippet',
						'Sofia' => 'Sofia',
						'Sonsie One' => 'Sonsie One',
						'Sorts Mill Goudy' => 'Sorts Mill Goudy',
						'Special Elite' => 'Special Elite',
						'Spicy Rice' => 'Spicy Rice',
						'Spinnaker' => 'Spinnaker',
						'Spirax' => 'Spirax',
						'Squada One' => 'Squada One',
						'Stardos Stencil' => 'Stardos Stencil',
						'Stint Ultra Condensed' => 'Stint Ultra Condensed',
						'Stint Ultra Expanded' => 'Stint Ultra Expanded',
						'Stoke' => 'Stoke',
						'Sue Ellen Francisco' => 'Sue Ellen Francisco',
						'Sunshiney' => 'Sunshiney',
						'Supermercado One' => 'Supermercado One',
						'Suwannaphum' => 'Suwannaphum',
						'Swanky and Moo Moo' => 'Swanky and Moo Moo',
						'Syncopate' => 'Syncopate',
						'Tangerine' => 'Tangerine',
						'Taprom' => 'Taprom',
						'Telex' => 'Telex',
						'Tenor Sans' => 'Tenor Sans',
						'The Girl Next Door' => 'The Girl Next Door',
						'Tienne' => 'Tienne',
						'Tinos' => 'Tinos',
						'Titan One' => 'Titan One',
						'Titillium Web' => 'Titillium Web',
						'Trade Winds' => 'Trade Winds',
						'Trocchi' => 'Trocchi',
						'Trochut' => 'Trochut',
						'Trykker' => 'Trykker',
						'Tulpen One' => 'Tulpen One',
						'Ubuntu' => 'Ubuntu',
						'Ubuntu Condensed' => 'Ubuntu Condensed',
						'Ubuntu Mono' => 'Ubuntu Mono',
						'Ultra' => 'Ultra',
						'Uncial Antiqua' => 'Uncial Antiqua',
						'UnifrakturCook' => 'UnifrakturCook',
						'UnifrakturMaguntia' => 'UnifrakturMaguntia',
						'Unkempt' => 'Unkempt',
						'Unlock' => 'Unlock',
						'Unna' => 'Unna',
						'VT323' => 'VT323',
						'Varela' => 'Varela',
						'Varela Round' => 'Varela Round',
						'Vast Shadow' => 'Vast Shadow',
						'Vibur' => 'Vibur',
						'Vidaloka' => 'Vidaloka',
						'Viga' => 'Viga',
						'Voces' => 'Voces',
						'Volkhov' => 'Volkhov',
						'Vollkorn' => 'Vollkorn',
						'Voltaire' => 'Voltaire',
						'Waiting for the Sunrise' => 'Waiting for the Sunrise',
						'Wallpoet' => 'Wallpoet',
						'Walter Turncoat' => 'Walter Turncoat',
						'Wellfleet' => 'Wellfleet',
						'Wire One' => 'Wire One',
						'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
						'Yellowtail' => 'Yellowtail',
						'Yeseva One' => 'Yeseva One',
						'Yesteryear' => 'Yesteryear',
						'Zeyada' => 'Zeyada'
		);



/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$url =  ADMIN_DIR . 'assets/images/';


$of_options[] = array( 	"name" 		=> "Global settings",
						"type" 		=> "heading",
);


$of_options[] = array( 	"name" 		=> __('Enable minified CSS and JS', 'flatsome'),
						"id" 		=> "minified_flatsome",
						"desc"      => __('Speed up your site by enable the minified CSS and Javscript of flatsome. <strong>NB!</strong> style.css will not be loaded. Custom styles needs to be placed in Theme Option > HTML Blocks > Custom CSS.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Flatsome Builder Beta', 'flatsome'),
						"id" 		=> "flatsome_builder",
						"desc"      => __('Enable Flatsome Builder Beta.', 'flatsome'),
						"std" 		=> 1,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> __('Maintenance Mode', 'flatsome'),
						"id" 		=> "maintenance_mode",
						"desc"      => __('Enable Maintenance Mode for all users except admins.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Maintenance Mode Text', 'flatsome'),
						"desc" 		=> __('The text that will be visible to your customers when accessing maintenance screen.', 'flatsome'),
						"id" 		=> "maintenance_mode_text",
						"std"       => __('Please check back soon..', 'flatsome'),
						"type" 		=> "text"
);




$of_options[] = array( 	"name" 		=> __('Header Scripts', 'flatsome'),
						"desc" 		=> __('Add custom scripts inside HEAD tag. You need to have SCRIPT tag around the scripts.', 'flatsome'),
						"id" 		=> "html_scripts_header",
						"std" 		=> "",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> __('Footer Scripts', 'flatsome'),
						"desc" 		=> __('Here is the place to paste your Google Analytics code or any other JS code you might want to add to be loaded in the footer of your website.', 'flatsome'),
						"id" 		=> "html_scripts_footer",
						"std" 		=> "",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> "Custom CSS",
						"type" 		=> "heading"
);


$of_options[] = array( 	"name" 		=> __('Custom CSS ', 'flatsome'),
						"desc" 		=> __('Add custom CSS here', 'flatsome'),
						"id" 		=> "html_custom_css",
						"std" 		=> "div {}",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> __('Custom CSS (Mobile only)', 'flatsome'),
						"desc" 		=> __('Add custom CSS here for mobile view', 'flatsome'),
						"id" 		=> "html_custom_css_mobile",
						"std" 		=> "",
						"type" 		=> "textarea"
);





// GENERAL //

$of_options[] = array( 	"name" 		=> "Logo and icons",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> __('Upload logo here.', 'flatsome'),
						"id" 		=> "site_logo",
						"std" 		=> "",
						"type" 		=> "media"
);


if(!function_exists('wp_site_icon')){
	$of_options[] = array( 	"name" 		=> "Favicon",
							"desc" 		=> __('Add your custom Favicon image. 16x16px .ico or .png file required.', 'flatsome'),
							"id" 		=> "site_favicon",
							"std" 		=> "",
							"type" 		=> "media"
	);

	$of_options[] = array( 	"name" 		=> "Favicon retina",
							"desc" 		=> __('The Retina/iOS version of your Favicon. 144x144px .png file required.', 'flatsome'),
							"id" 		=> "site_favicon_large",
							"std" 		=> "",
							"type" 		=> "media"
	);
} else{

	$of_options[] = array( 	
		"name" 		=> "Favicon",
		"id" 		=> "",
		"std" 		=> __('Favicon upload has moved to', 'flatsome') . ": <br/> <a href='".admin_url('customize.php?&autofocus%5Bpanel%5Dof-option-logoandicons')."'>Appearance > Customize > Site Identity</a>",
		"type" 		=> "info"
	);

}

$of_options[] = array( 	"name" 		=> __('Custom Cart Icon', 'flatsome'),
						"desc" 		=> "Upload a custom cart icon image here if you want to repliace the default cart icon. You need to add something to cart to see results.",
						"id" 		=> "custom_cart_icon",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name" 		=> __('Dark Logo', 'flatsome'),
						"desc" 		=> "Upload dark logo version here. Used for Transparent header template",
						"id" 		=> "site_logo_dark",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name" 		=> __('Sticky Logo', 'flatsome'),
						"desc" 		=> __('Upload custom sticky header logo', 'flatsome'),
						"id" 		=> "site_logo_sticky",
						"std" 		=> "",
						"type" 		=> "media"
);




// HEADER SETTINGS //
$of_options[] = array( 	"name" 		=> __('Layout', 'flatsome'),
						"type" 		=> "heading"
);

$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> __('Layout mode', 'flatsome'),
						"desc" 		=> __('Select Full width, boxed or framed layout', 'flatsome'),
						"id" 		=> "body_layout",
						"std" 		=> "full-width",
						"type" 		=> "images",
						"options" 	=> array(
									'full-width' 	=> $url . 'full-width.gif',
									'boxed' 	=> $url . 'boxed.gif',
									'framed-layout' 	=> $url . 'framed.gif',
						)
);

$of_options[] = array( 	"name" 		=> __('Layout Box Shadow', 'flatsome'),
						"desc" 		=> __('Add a subtle shadow around content', 'flatsome'),
						"id" 		=> "box_shadow",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);




$of_options[] = array( 	"name" 		=> __('Body Background Color', 'flatsome'),
						"desc" 		=> __('Pick a color for the background. Only shows on boxed layout (default:#eee).', 'flatsome'),
						"id" 		=> "body_bg",
						"std" 		=> "",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> __('Body Background Image', 'flatsome'),
						"desc" 		=> __('Pick a pattern for background. Check <a href=\'http://subtlepatterns.com target=\'_blank\'>here</a>  for awesome textures', 'flatsome'),
						"id" 		=> "body_bg_image",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name" 		=> __('Body Background Repeat', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "body_bg_type",
						"std" 		=> "",
						"type" 		=> "select",
						"options"   => array("bg-full-size" => "Full Size", "bg-tiled" => "Tiled" )
);

$of_options[] = array( 	"name" 		=> __('Content text color', 'flatsome'),
						"desc" 		=> __('Light or Dark content text color', 'flatsome'),
						"id" 		=> "content_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);

$of_options[] = array( 	"name" 		=> __('Content background color', 'flatsome'),
						"desc" 		=> __('Change background color for content', 'flatsome'),
						"id" 		=> "content_bg",
						"std" 		=> "#FFF",
						"type" 		=> "color"
);





// HEADER // // HEADER // // HEADER // // HEADER //
$of_options[] = array( 	"name" 		=> "Header",
						"type" 		=> "heading"
);



$of_options[] = array( 	"name" 		=> __('Header preset', 'flatsome'),
						"id" 		=> "header_preset",
						"type" 		=> "presets",
						"options" 	=> array(
							$preset_url.'/headers/header1.jpg' => "header_1",
							$preset_url.'/headers/header1_2.jpg' => "header_1_2",
							$preset_url.'/headers/header1_3.jpg' => "header_1_3",
							$preset_url.'/headers/header1_4.jpg' => "header_1_4",
							$preset_url.'/headers/header1_5.jpg' => "header_1_5",
							$preset_url.'/headers/header6.jpg' => "header_6",
							$preset_url.'/headers/header2.jpg' => "header_2",
							$preset_url.'/headers/header3.jpg' => "header_3",
							$preset_url.'/headers/header3_1.jpg' => "header_3_1",
							$preset_url.'/headers/header3_2.jpg' => "header_3_2",
							$preset_url.'/headers/header5.jpg' => "header_5",
							$preset_url.'/headers/header5_2.jpg' => "header_5_2",
						)
);  



$of_options[] = array( 	"name" 		=> __('Header height', 'flatsome'),
						"desc" 		=> __('Set height of header in px.', 'flatsome'),
						"id" 		=> "header_height",
						"std" 		=> "120",
						"min" 		=> "50",
						"step"		=> "1",
						"max" 		=> "450",
						"type" 		=> "sliderui" 
);


$of_options[] = array( 	"name" 		=> __('Logo container width', 'flatsome'),
						"desc" 		=> __('Set width of logo container. Height is same as header height', 'flatsome'),
						"id" 		=> "logo_width",
						"std" 		=> "210",
						"min" 		=> "90",
						"step"		=> "1",
						"max" 		=> "700",
						"type" 		=> "sliderui" 
);

$of_options[] = array( 	"name" 		=> __('Logo position', 'flatsome'),
						"desc" 		=> __('Select logo position', 'flatsome'),
						"id" 		=> "logo_position",
						"std" 		=> "left",
						"type" 		=> "select",

						"options" 	=> array(
										"left" => "left",
										"center" => "center"
						)
);

$of_options[] = array( 	"name" 		=> __('Search position', 'flatsome'),
						"desc" 		=> __('Change position of search in main navigation', 'flatsome'),
						"id" 		=> "search_pos",
						"std" 		=> "left",
						"type" 		=> "select",
						"options" 	=> array(
										"left" => __('Left (default)', 'flatsome'),
										"right" => __('Right', 'flatsome'),
										"hide" => __('Hide', 'flatsome')

						)
);

$of_options[] = array( 	"name" 		=> __('Main Navigation position', 'flatsome'),
						"desc" 		=> __('Change position of main navigation', 'flatsome'),
						"id" 		=> "nav_position",
						"std" 		=> "top",
						"type" 		=> "select",

						"options" 	=> array(
										"top" => __('Top Left (beside logo)', 'flatsome'),
										"top_right" => __('Top Right', 'flatsome'),
										"bottom" => __('Full width - Left', 'flatsome'),
										"bottom_center" => __('Full width - Centered', 'flatsome')
						)
);


$of_options[] = array( 	"name" 		=> __('Main Navigation Size', 'flatsome'),
						"desc" 		=> __('Change size of main navigation', 'flatsome'),
						"id" 		=> "nav_size",
						"std" 		=> "80%",
						"type" 		=> "select",
						"options" 	=> array(
										"70%" => __('Small', 'flatsome'),
										"80%" => __('Normal', 'flatsome'),
										"90%" => __('Medium', 'flatsome'),
										"100%" => __('Large', 'flatsome')

						)
);



$of_options[] = array( 	"name" 		=> __('Show My Account dropdown', 'flatsome'),
						"desc" 		=> __('Show my account / login link in header', 'flatsome'),
						"id" 		=> "myaccount_dropdown",
						"type"		=> "select",
						"std" 		=> 1,
						"options" 	=> array(
							0 => __('Hide', 'flatsome'),
							1 => __('Header Main - Right', 'flatsome'),
							'top_bar' => __('Top bar - Right', 'flatsome'),
						)
);




$of_options[] = array( 	"name" 		=> __('Show Mini Cart', 'flatsome'),
						"desc" 		=> __('Show cart in header (Requires WooCommerce)', 'flatsome'),
						"id" 		=> "show_cart",
						"type"		=> "select",
						"std" 		=> 1,
						"options" 	=> array(
							0 => __('Hide', 'flatsome'),
							1 => __('Header Main - Right', 'flatsome'),
							'top_bar' => __('Top bar - Right', 'flatsome'),
						)
);



$of_options[] = array( 	"name" 		=> __('Show Right Content', 'flatsome'),
						"desc" 		=> __('Add HTML or shortcodes here that will show beside Cart and My Account links or replace them.', 'flatsome') . "<br> <br>You could use these: <br><strong>[follow facebook='#' twitter='#' instagram='#']<br> [header_button text='Shop now' tooltip='' link='http://#' border='2px']<br> [phone number='+00 000 000' border='2px' tooltip='Contact us today']<br>[search] <br> [share] </strong>",
						"id" 		=> "top_right_text",
						"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> __('Sticky Header on scroll', 'flatsome'),
						"desc" 		=> __('Make header stick to top on scroll', 'flatsome'),
						"id" 		=> "header_sticky",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Sticky Header height', 'flatsome'),
						"desc" 		=> __('Set height of sticky header in px.', 'flatsome'),
						"id" 		=> "header_height_sticky",
						"std" 		=> "70",
						"min" 		=> "50",
						"step"		=> "1",
						"max" 		=> "220",
						"type" 		=> "sliderui" 
);



$of_options[] = array( 	"name" 		=> __('Header text color', 'flatsome'),
						"desc" 		=> __('Light or Dark header text color', 'flatsome'),
						"id" 		=> "header_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);

$of_options[] = array( 	"name" 		=> __('Header BG color', 'flatsome'),
						"desc" 		=> __('Pick header background color', 'flatsome'),
						"id" 		=> "header_bg",
						"std" 		=> "#fff",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> __('Header BG image', 'flatsome'),
						"desc" 		=> __('Upload background image to header', 'flatsome'),
						"id" 		=> "header_bg_img",
						"std" 		=> "",
						"type" 		=> "media"
);


$of_options[] = array( 	"name" 		=> __('Header BG image position', 'flatsome'),
						"desc" 		=> __('Change header bg position', 'flatsome'),
						"id" 		=> "header_bg_img_pos",
						"std" 		=> "repeat-x",
						"type" 		=> "select",

						"options" 	=> array(
										"repeat-x" => "repeat-x",//please, always use this key: "none"
										"no-repeat" => "no-repeat"

						)
);


$of_options[] = array( 	"name" 		=> __('Show Top Bar', 'flatsome'),
						"id" 		=> "topbar_show",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> __('Top Bar BG color', 'flatsome'),
						"desc" 		=> __('Pick a background color for top bar background (default: #58728a).', 'flatsome'),
						"id" 		=> "topbar_bg",
						"std" 		=> "",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 	=> __('Top bar left', 'flatsome'),
				"desc" 		=> __('Insert text or shortcodes here', 'flatsome'),
				"id" 		=> "topbar_left",
				"std" 		=> "Add anything here here or just remove it..",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 	=> "Top bar right",
				"desc" 		=> __('Insert text or shortcodes here', 'flatsome'),
				"id" 		=> "topbar_right",
				"std" 		=> "",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> __('Main Navigation background (For full width nav)', 'flatsome'),
						"desc" 		=> __('Change position of main navigation', 'flatsome'),
						"id" 		=> "nav_position_bg",
						"std" 		=> "#eee",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> __('Main Navigation link color (For full width nav)', 'flatsome'),
						"desc" 		=> __('Change position of main navigation', 'flatsome'),
						"id" 		=> "nav_position_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light-header' => $url . 'text-light.gif',
											'dark-header' 	=> $url . 'text-dark.gif',
						)
);


$of_options[] = array( 	"name" 		=> __('Full width Nav - Right menu content', 'flatsome'),
				"desc" 		=> __('Insert content to right of the main menu. Shortcodes are allowed', 'flatsome'),
				"id" 		=> "nav_position_text",
				"std" 		=> "Add shortcode or text here",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> __('Full width Nav - Top content', 'flatsome'),
				"desc" 		=> __('Insert content for header beside logo or search. Shortcodes are allowed', 'flatsome'),
				"id" 		=> "nav_position_text_top",
				"std" 		=> __('Add shortcode or text here', 'flatsome'),
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> __('After header HTML', 'flatsome'),
						"desc" 		=> __('Enter HTML that should be placed after header here. Shortcodes are allowed.', 'flatsome'),
						"id" 		=> "html_after_header",
						"std" 		=> "",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> __('Homepage Intro HTML', 'flatsome'),
						"desc" 		=> __('Enter HTML that would be placed before header on homepage. Use for Intro images, slides etc.', 'flatsome'),
						"id" 		=> "html_intro",
						"std" 		=> "",
						"type" 		=> "textarea"
);





$of_options[] = array( 	"name" 		=> "Footer",
						"type" 		=> "heading"
);


$of_options[] = array( 	"name" 		=> __('Footer bottom left content (copyright text)', 'flatsome'),
				"desc" 		=> __('Insert text/html for left footer content', 'flatsome'),
				"id" 		=> "footer_left_text",
				"std" 		=> "Copyright [ux_current_year] &copy; <strong>UX Themes</strong>. Powered by <strong>WooCommerce</strong>",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> __('Footer bottom right content', 'flatsome'),
				"desc" 		=> __('Add image of creditcards etc. here', 'flatsome'),
				"id" 		=> "footer_right_text",
				"std" 		=> "",
				"type" 		=> "textarea"
);





$of_options[] = array( 	"name" 		=> __('Footer 1 text color', 'flatsome'),
						"desc" 		=> __('Light or Dark text color', 'flatsome'),
						"id" 		=> "footer_1_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);



$of_options[] = array( 	"name" 		=> __('Footer 1 BG color', 'flatsome'),
						"id" 		=> "footer_1_bg_color",
						"std" 		=> "#fff",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> __('Footer 1 BG image', 'flatsome'),
						"id" 		=> "footer_1_bg_image",
						"std" 		=> "",
						"type" 		=> "media"
);



$of_options[] = array( 	"name" 		=> __('Footer 1 columns', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "footer_1_columns",
						"std" 		=> "large-3",
						"type" 		=> "select",
						"options" 	=> array(
										"large-2" => "6",
										"large-3" => "4",
										"large-4" => "3",
										"large-6" => "2",
										"large-12" => "1"
						)
);




$of_options[] = array( 	"name" 		=> __('Footer 2 text color', 'flatsome'),
						"desc" 		=> __('Light or Dark text color', 'flatsome'),
						"id" 		=> "footer_2_color",
						"std" 		=> "dark",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);



$of_options[] = array( 	"name" 		=> __('Footer 2 BG color', 'flatsome'),
						"id" 		=> "footer_2_bg_color",
						"std" 		=> "#777",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> __('Footer 2 BG image', 'flatsome'),
						"id" 		=> "footer_2_bg_image",
						"std" 		=> "",
						"type" 		=> "media"
);


$of_options[] = array( 	"name" 		=> __('Footer 2 columns', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "footer_2_columns",
						"std" 		=> "large-3",
						"type" 		=> "select",
						"options" 	=> array(
										"large-2" => "6",
										"large-3" => "4",
										"large-4" => "3",
										"large-6" => "2",
										"large-12" => "1"
						)
);



$of_options[] = array( 	"name" 		=> __('Footer bottom bar text color', 'flatsome'),
						"desc" 		=> __('Light or Dark text color', 'flatsome'),
						"id" 		=> "footer_bottom_style",
						"std" 		=> "dark",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);


$of_options[] = array( 	"name" 		=> __('Footer bottom bar BG color', 'flatsome'),
						"id" 		=> "footer_bottom_color",
						"std" 		=> "#333",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> __('HTML before footer', 'flatsome'),
						"desc" 		=> __('Enter HTML for footer here. Shortcodes are allowed. F.ex [block id=\'payments\']', 'flatsome'),
						"id" 		=> "html_before_footer",
						"std" 		=> "",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> __('HTML after footer', 'flatsome'),
						"desc" 		=> __('Enter HTML for footer here. Shortcodes are allowed. F.ex [block id=\'payments\']', 'flatsome'),
						"id" 		=> "html_after_footer",
						"std" 		=> "",
						"type" 		=> "textarea"
);



// TYPE 
$of_options[] = array( 	"name" 		=> "Fonts",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> __('Disable Google fonts', 'flatsome'),
						"desc" 		=> __('Disable google fonts. No fonts will be loaded from Google.', 'flatsome'),
						"id" 		=> "disable_fonts",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);




$of_options[] = array( 	"name" 		=> __('Heading fonts (h1,h2 etc)', 'flatsome'),
						"desc" 		=> __('Select heading fonts.<br> Need inspiration? <br>Check popuplar', 'flatsome') . " <a href='http://www.google.com/fonts/#Analytics:total' target='_blank'>google fonts here</a>",
						"id" 		=> "type_headings",
						"std" 		=> "Lato",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "<strong>Flatsome is Awesome!</strong> <br><span style='font-size:60%!important'>THIS TEXT IS IN UPPERCASE</span>", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);


$of_options[] = array( 	"name" 		=> __('Text fonts (paragraphs, buttons, sub-navigations)', 'flatsome'),
						"desc" 		=> __('Select heading fonts', 'flatsome'),
						"id" 		=> "type_texts",
						"std" 		=> "Lato",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "Nostrud qui disrupt, vinyl occupy ennui beard. Assumenda mollit 90's sunt occupy. Marfa helvetica brooklyn, narwhal odd future leggings sint ethnic. Eu officia fixie, veniam gluten-free pop-up church-key truffaut nihil dreamcatcher sed aliquip odio wes anderson.", //this is the text from preview box
										"size" => "14px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);

$of_options[] = array( 	"name" 		=> __('Main navigation', 'flatsome'),
						"desc" 		=> __('Select heading fonts', 'flatsome'),
						"id" 		=> "type_nav",
						"std" 		=> "Lato",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "<span style='font-size:45%'>HOME WOMEN MEN APPERAL</span>", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);


$of_options[] = array( 	"name" 		=> __('Alterntative font (.alt-font)', 'flatsome'),
						"desc" 		=> __('Select alternative font', 'flatsome'),
						"id" 		=> "type_alt",
						"std" 		=> "Dancing Script",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This font will be used on banners etc.", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);


$of_options[] = array( 	"name" 		=> __('Character Sub-sets', 'flatsome'),
						"desc" 		=> __('Choose the character sets you want.', 'flatsome'),
						"id" 		=> "type_subset",
						"std" 		=> array("latin"),
						"type" 		=> "multicheck",
						"options" 	=> array("latin" => "Latin","cyrillic-ext" => "Cyrillic Extended","greek-ext" => "Greek Extended","greek" => "Greek","vietnamese" => "Vietnamese","latin-ext" => "Latin Extended","cyrillic" => "Cyrillic")
);


// Custom font
$of_options[] = array( 	
		"name" 		=> __('Upload Custom Font', 'flatsome'),
		"desc" 		=> __('Upload Custom Font file here. (.ttf, .otf). You can select this font by selecting \'Custom font\' in the settings above, or by CSS: h1 {font-family: customFont}', 'flatsome'),
		"id" 		=> "custom_font",
		"std" 		=> "",
	    "mod"       => "font",
		"type" 		=> "media"
);


// COLORS


$of_options[] = array( 	"name" 		=> "Style and Colors",
						"type" 		=> "heading",
);

$of_options[] = array( 	"name" 		=> __('Primary Color', 'flatsome'),
						"desc" 		=> __('Change primary color. Used for primary buttons, shopping cart icon, Top bar background, etc.', 'flatsome'),
						"id" 		=> "color_primary",
						"std" 		=> "#627f9a",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> __('Secondary Color', 'flatsome'),
						"desc" 		=> __('Change secondary color. Used for Add to cart, checkout buttons, review stars and sale bubble.', 'flatsome'),
						"id" 		=> "color_secondary",
						"std" 		=> "#d26e4b",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> __('Success Color', 'flatsome'),
						"desc" 		=> __('Change the success color. Used for global success messages.', 'flatsome'),
						"id" 		=> "color_success",
						"std" 		=> "#7a9c59",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> __('Default link color', 'flatsome'),
						"desc" 		=> __('Change default link color. Used for product links, and links at pages and blog entries.', 'flatsome'),
						"id" 		=> "color_links",
						"std" 		=> "",
						"type" 		=> "color"
);


if(ux_is_woocommerce_active()) {

$of_options[] = array( 	"name" 		=> __('Add to cart / Checkout buttons', 'flatsome'),
						"desc" 		=> __('Change color for checkout buttons. Default is Secondary color', 'flatsome'),
						"id" 		=> "color_checkout",
						"std" 		=> "",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> __('Sale bubble', 'flatsome'),
						"desc" 		=> __('Change color of sale bubble. Default is Secondary color', 'flatsome'),
						"id" 		=> "color_sale",
						"std" 		=> "",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> __('New bubble', 'flatsome'),
						"desc" 		=> __('Change color of the \'New\' bubble.', 'flatsome'),
						"id" 		=> "color_new_bubble",
						"std" 		=> "#7a9c59",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> __('Review Stars', 'flatsome'),
						"desc" 		=> __('Change color of review stars', 'flatsome'),
						"id" 		=> "color_review",
						"std" 		=> "",
						"type" 		=> "color"
);

} // End  WooCommerce


$of_options[] = array( 	"name" 		=> __('Button border radius', 'flatsome'),
						"desc" 		=> __('change radius on buttons', 'flatsome'),
						"id" 		=> "button_radius",
						"std" 		=> "0px",
						"type" 		=> "select",

						"options" 	=> array(
										"0px" => "0px",
										"3px" => "3px",
										"5px" => "5px",
										"10px" => "10px",
										"15px" => "15px",
										"30px" => "30px",
										"99px" => "99px",

						)
);


$of_options[] = array( 	"name" 		=> __('Dropdown border color', 'flatsome'),
						"desc" 		=> __('Change color of dropdown border', 'flatsome'),
						"id" 		=> "dropdown_border",
						"std" 		=> "",
						"type" 		=> "color"
);



$of_options[] = array( 	"name" 		=> __('Dropdown Background Color', 'flatsome'),
						"desc" 		=> __('Change color of dropdown background', 'flatsome'),
						"id" 		=> "dropdown_bg",
						"std" 		=> "",
						"type" 		=> "color"
);



$of_options[] = array( 	"name" 		=> __('Dropdown Text Color', 'flatsome'),
						"desc" 		=> __('Light or Dark dropdown color', 'flatsome'),
						"id" 		=> "dropdown_text",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);


if(ux_is_woocommerce_active()) {
	// ONLY FOR WOOCOMMERCE

$of_options[] = array( 	"name" 		=> "Product Page",
						"type" 		=> "heading",
);

$of_options[] = array( 	"name" 		=> __('Product Page layout', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "product_sidebar",
						"std" 		=> "no_sidebar",
						"type" 		=> "select",
						"options" 	=> array(
										"no_sidebar" => __('No Sidebar', 'flatsome'),
										"full_width" => __('Full Width', 'flatsome'),
										"left_sidebar" => __('Left Sidebar', 'flatsome'),
										"right_sidebar" => __('Right Sidebar', 'flatsome'),
										"right_sidebar_fullheight" =>__('Right Sidebar - Full height', 'flatsome')
						)
);


$of_options[] = array( 	"name" 		=> __('Product Info style', 'flatsome'),
						"desc" 		=> __('Select how you want to display product info...', 'flatsome'),
						"id" 		=> "product_display",
						"std" 		=> "tabs",
						"type" 		=> "select",

						"options" 	=> array(
										"tabs" => __('Tabs', 'flatsome'),
										"tabs_center" => __('Tabs Center', 'flatsome'),
										"tabs_pills" => __('Tabs (Pills style. NEW!)', 'flatsome'),
										"sections" => __('Sections', 'flatsome'),
										"accordian" => __('Accordion', 'flatsome'),
										"tabs_vertical" => "__('Vertical tab', 'flatsome')"

						)
);



$of_options[] = array( 	"name" 		=> __('Show Cart dropdown when product is added to cart', 'flatsome'),
						"id" 		=> "cart_dropdown_show",
						"desc"      => __('Show Mini-cart dropdown after product is added to cart.', 'flatsome'),
						"std" 		=> 1,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Up-sell title', 'flatsome'),
				"id" 		=> "shop_aside_title",
				"std" 		=> "complete the look",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> __('Product Image Zoom (NEW)', 'flatsome'),
						"id" 		=> "product_zoom",
						"desc"      => __('Enable zoom on product images when you hover your mouse.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);




$of_options[] = array( 	"name" 		=> __('Related Products', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "related_products",
						"std" 		=> "slider",
						"type" 		=> "select",
						"options" 	=> array(
										"slider" => __('Slider', 'flatsome'),
										"grid" => __('Grid', 'flatsome'),
										"hidden" => "__('Remov', 'flatsome')"
						)
);


$of_options[] = array( 	"name" 		=> __('Related Products pr row', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "related_products_pr_row",
						"std" 		=> "4",
						"type" 		=> "select",
						"options" 	=> array(
										"2" => "2",
										"3" => "3",
										"4" => "4",
										"5" => "5",
										"6" => "6"
						)
);

$of_options[] = array( 	"name" 		=> __('Max number of related products', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "max_related_products",
						"std" 		=> "12",
						"type" 		=> "text",
);





$of_options[] = array( 	"name"  => __('Additional Global tab/section title', 'flatsome'),
				"id" 		=> "tab_title",
				"std" 		=> "",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> __('Additional Global tab/section content', 'flatsome'),
				"id" 		=> "tab_content",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => __('Add additional tab content here... Like Size Charts etc', 'flatsome')
);


$of_options[] = array( 	"name" 		=> __('Disable product gallery scrollbar', 'flatsome'),
						"id" 		=> "disable_product_scrollbar",
						"desc"      => __('Remove the scrollbar thats on top of product gallery slider.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> __('HTML before Add To Cart button (Global)', 'flatsome'),
						"desc" 		=> __('Enter HTML and shortcodes that will show before Add to cart selections.', 'flatsome'),
						"id" 		=> "html_before_add_to_cart",
						"std" 		=> " ",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> __('HTML after Add To Cart button (Global)', 'flatsome'),
						"desc" 		=> __('Enter HTML and shortcodes that will show after Add to cart button.', 'flatsome'),
						"id" 		=> "html_after_add_to_cart",
						"std" 		=> "",
						"type" 		=> "textarea"
);



$of_options[] = array( 	"name" 		=> "Category Page",
						"type" 		=> "heading"
);


$of_options[] = array( 	"name" 		=> __('Shop header', 'flatsome'),
						"desc" 		=> __('Enter HTML that should be placed on top of main shop page. Shortcode are allowed.', 'flatsome'),
						"id" 		=> "html_shop_page",
						"std" 		=> "",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> __('Shop sidebar', 'flatsome'),
						"desc" 		=> __('Select if you want a sidebar on product categories.', 'flatsome'),
						"id" 		=> "category_sidebar",
						"std" 		=> "left-sidebar",
						"type" 		=> "images",
						"options" 	=> array(
								'none' 	=> $url . 'shop-no-sidebar.gif',
								'left-sidebar' 	=> $url . 'shop-left-sidebar.gif',
								'right-sidebar' 	=> $url . 'shop-right-sidebar.gif',
								'off-canvas' 	=> $url . 'shop-off-canvas.gif',	
						)
);


$of_options[] = array( 	"name" 		=> __('Product Grid style', 'flatsome'),
						"desc" 		=> __('Select product grid style', 'flatsome'),
						"id" 		=> "grid_style",
						"std" 		=> "grid1",
						"type" 		=> "images",
						"options" 	=> array(
								'grid1' 	=> $url . 'grid1.gif',
								'grid2' 	=> $url . 'grid2.gif',
								'grid3' 	=> $url . 'grid3.gif',
									
						)
);



$of_options[] = array( 	"name" 		=> __('Product Grid Frame Style', 'flatsome'),
						"desc" 		=> __('Select product grid frame style', 'flatsome'),
						"id" 		=> "grid_frame",
						"std" 		=> "normal",
						"type" 		=> "images",
						"options" 	=> array(
											'normal' 	=> $url . 'grid-normal.gif',
											'frame' 	=> $url . 'grid-frame.gif',
											'boxed' 	=> $url . 'grid-box.gif',

						)
);



$of_options[] = array( 	"name" 		=> __('Masonry Grid (NEW)', 'flatsome'),
						"id" 		=> "masonry_grid",
						"desc"      => __('Display products as a Masonry Grid (Pinterest style)', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);



$of_options[] = array( 	"name" 		=> __('Add to cart button in grid', 'flatsome'), 
						"desc" 		=> __('Add cart icon in grid. Choose between a Icon or a button', 'flatsome'),
						"id" 		=> "add_to_cart_icon",
						"std" 		=> "disable",
						"type" 		=> "images",
						"options" 	=> array(
											'disable' 	=> $url . 'disabled.gif',
											'show' 	=> $url . 'add-cart-icon.gif',
											'button'  => $url . 'grid4.gif',
						)
);


$of_options[] = array( 	"name" 		=> __('Product short description', 'flatsome'),
						"id" 		=> "short_description_in_grid",
						"desc"      => __('Show product short description in grid', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);






$of_options[] = array( 	"name" 		=> __('Category Box style', 'flatsome'),
						"desc" 		=> __('Change default category box style', 'flatsome'),
						"id" 		=> "cat_style",
						"std" 		=> "text-badge",
						"type" 		=> "select",
						"options" 	=> array(
										"text-badge" => __('Text badge (default)', 'flatsome'),
										"text-overlay" => __('Text Overlay', 'flatsome'),
										"text-bounce" => __('Text Bounce', 'flatsome'),
										"text-normal" => __('Text Normal', 'flatsome'),

						)
);






$of_options[] = array( 	"name" 		=> __('Breadcrumb size', 'flatsome'),
						"desc" 		=> __('Change size of breadcrumb on product categories. Useful if you have long breadcrumbs.', 'flatsome'),
						"id" 		=> "breadcrumb_size",
						"std" 		=> "breadcrumb-normal",
						"type" 		=> "select",

						"options" 	=> array(
										"breadcrumb-normal" => __('Normal', 'flatsome'),//please, always use this key: "none"
										"breadcrumb-medium" => __('Medium', 'flatsome'),
										"breadcrumb-small" => __('Small', 'flatsome'),

						)
);

$of_options[] = array( 	"name" 		=> __('Show \'Home\' in breadcrumb', 'flatsome'),
						"id" 		=> "breadcrumb_home",
						"desc"      => __('Show \'Home\' in breadcrumb', 'flatsome'),
						"std" 		=> 1,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> __('Products per row - Desktop', 'flatsome'),
						"desc" 		=> __('Change product per row for category pages.', 'flatsome'),
						"id" 		=> "category_row_count",
						"std" 		=> "3",
						"type" 		=> "select",

						"options" 	=> array(
										"1" => "1",
										"2" => "2",
										"3" => "3",
										"4" => "4",
										"5" => "5",
										"6" => "6",

						)
);


$of_options[] = array( 	"name" 		=> __('Products per row - Mobile', 'flatsome'),
						"desc" 		=> __('Change product per row for category pages.', 'flatsome'),
						"id" 		=> "category_row_count_mobile",
						"std" 		=> "2",
						"type" 		=> "select",

						"options" 	=> array(
										"1" => "1",
										"2" => "2",
						)
);




$of_options[] = array( 
				"name"  => __('Products per page', 'flatsome'),
				"id" 		=> "products_pr_page",
				"desc" => __('Change products per page.', 'flatsome'),
				"std" 		=> "12",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> __('Enable Blog and Pages in Search result', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "search_result",
						"desc"      => __('Enable blog and pages in search result page.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);





$of_options[] = array( 	"name" 		=> __('Product image hover style', 'flatsome'),
						"desc" 		=> __('Change product image hover style', 'flatsome'),
						"id" 		=> "product_hover",
						"std" 		=> "fade_in_back",
						"type" 		=> "select",

						"options" 	=> array(
										"fade_in_back" => __('Fade in back', 'flatsome'),
										"zoom_in" => __('Zoom in', 'flatsome'),
										"none" => __('Disabled', 'flatsome')
						)
);


$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> __('Sale bubble style', 'flatsome'),
						"desc" 		=> __('change sale bubble style', 'flatsome'),
						"id" 		=> "bubble_style",
						"std" 		=> "style1",
						"type" 		=> "images",
						"options" 	=> array(
											'style1' 	=> $url . 'sale-bubble-style1.gif',
											'style2' 	=> $url . 'sale-bubble-style2.gif',
											'style3' 	=> $url . 'sale-bubble-style3.gif',
						)
);


$of_options[] = array( 	"name" 		=> __('Display % instead of \'Sale!\' in Sale bubble', 'flatsome'),
						"id" 		=> "sale_bubble_percentage",
						"desc"      => __('Show % instead of the sale text. This will override the bubble text.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Disable quick view', 'flatsome'),
						"id" 		=> "disable_quick_view",
						"desc"      => __('Disable quick view in product grid', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Wishlist Icon', 'flatsome'),
						"desc" 		=> __('Change Wishlist Icon', 'flatsome'),
						"id" 		=> "wishlist_icon",
						"std" 		=> "heart",
						"type" 		=> "select",
						"options" 	=> array(
								"heart" => __('Heart (Default)', 'flatsome'),
								"plus" => __('Plus', 'flatsome'),
								"star" => __('Star', 'flatsome'),
								"list" => __('List', 'flatsome'),
								"pen" => __('Pen', 'flatsome'),
						)
);



$of_options[] = array( 	"name" 		=> "Cart and Checkout",
						"type" 		=> "heading",
);


$of_options[] = array( 	"name" 		=> __('Coupon on Checkout page', 'flatsome'),
						"id" 		=> "coupon_checkout",
						"desc"      => __('Enable coupon at checkout page.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Continue Shopping button', 'flatsome'),
						"id" 		=> "continue_shopping",
						"desc"      => __('Enable \'Continue Shopping\' button on Cart and Thank you page', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> __('After cart content', 'flatsome'),
						"desc" 		=> __('Enter HTML that will show after cart here.', 'flatsome'),
						"id" 		=> "html_cart_footer",
						"std" 		=> "",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> __('Thank You page scripts', 'flatsome'),
						"desc" 		=> __('Enter scripts for the thank you page here', 'flatsome'),
						"id" 		=> "html_thank_you",
						"std" 		=> "",
						"type" 		=> "textarea"
);



$of_options[] = array( 	"name" 		=> "Catalog Mode",
						"type" 		=> "heading",
);



$of_options[] = array( 	"name" 		=> __('Enable catalog mode', 'flatsome'),
						"id" 		=> "catalog_mode",
						"desc"      => __('Enable catalog mode. This will disable Add To Cart buttons / Checkout and Shopping cart.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);



$of_options[] = array( 	"name" 		=> __('Disable prices', 'flatsome'),
						"id" 		=> "catalog_mode_prices",
						"desc"      => __('Select to disable prices on category pages and product page.', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" => __('Cart / Account replacement (header)', 'flatsome'),
				"id" 		=> "catalog_mode_header",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => "Enter content you want to display instad of Account / Cart. Shortcodes are allowed. For search box enter <b>[search]</b>. For social icons enter: <b>[follow twitter='http://' facebook='http://' email='post@email.com' pinterest='http://']</b>"
);

$of_options[] = array( 	"name" => __('Add to cart replacement - Product page', 'flatsome'),
				"id" 		=> "catalog_mode_product",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => __('Enter contact information or enquery form shortcode here.', 'flatsome')
);

$of_options[] = array( 	"name" => __('Add to cart replacement - Product Quick View', 'flatsome'),
				"id" 		=> "catalog_mode_lightbox",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => __('Enter text that will show in product quick view', 'flatsome')
);


} // End if WooCommerce

$of_options[] = array( 	"name" 		=> "Blog",
						"type" 		=> "heading"
);


$of_options[] = array( 	"name" 		=> __('Blog list layout', 'flatsome'),
						"desc" 		=> __('Change blog layout', 'flatsome'),
						"id" 		=> "blog_layout",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options"   => array("left-sidebar" => __('Left sidebar', 'flatsome'), "right-sidebar" => __('Right sidebar', 'flatsome'), "no-sidebar" => __('No sidebar (Centered)', 'flatsome') )
);


$of_options[] = array( 	"name" 		=> __('Blog list style', 'flatsome'),
						"desc" 		=> __('Change blog style', 'flatsome'),
						"id" 		=> "blog_style",
						"std" 		=> "blog-normal",
						"type" 		=> "select",
						"options"   => array("blog-normal" => __('Normal', 'flatsome'), "blog-list" => __('List style', 'flatsome'), "blog-pinterest" => __('Pinterest style', 'flatsome') )
);



$of_options[] = array( 	"name" 		=> __('Blog homepage header', 'flatsome'),
						"desc" 		=> "Enter HTML for blog header here. Will be placed above content and sidebar. Shortcodes are allowed. F.ex [block id=\'blog-header\']",
						"id" 		=> "blog_header",
						"std" 		=> " ",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> __('HTML after blog posts', 'flatsome'),
						"desc" 		=> __('Enter HTML or shortcodes that will be visible after blog posts. (Before comment box). Shortcodes are allowed', 'flatsome'),
						"id" 		=> "blog_after_post",
						"std" 		=> " ",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> __('Blog single post layout', 'flatsome'),
						"desc" 		=> __('Change blog post layout', 'flatsome'),
						"id" 		=> "blog_post_layout",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options"   => array("left-sidebar" => __('Left sidebar', 'flatsome'), "right-sidebar" => __('Right sidebar', 'flatsome'), "no-sidebar" => __('No sidebar (Centered)', 'flatsome') )
);

$of_options[] = array( 	"name" 		=> __('Blog single post header style', 'flatsome'),
						"desc" 		=> __('Change blog post style', 'flatsome'),
						"id" 		=> "blog_post_style",
						"std" 		=> "default",
						"type" 		=> "select",
						"options"   => array("default" => __('Default', 'flatsome'), "big-featured-image" => __('Big featured image', 'flatsome'))
);



$of_options[] = array( 	"name" 		=> __('Show author box', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "blog_author_box",
						"desc"      => __('Show author box on blog posts', 'flatsome'),
						"std" 		=> 1,
						"type" 		=> "checkbox"
);



$of_options[] = array( 	"name" 		=> __('Enable Share Icons', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "blog_share",
						"desc"      => __('Enable Share icons on blog', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> __('Parallax effect', 'flatsome'),
						"desc" 		=> "",
						"id" 		=> "blog_parallax",
						"desc"      => __('Enable parallax effect on featured images', 'flatsome'),
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "Featured Items",
						"type" 		=> "heading"
);


$of_options[] = array( 
				"name"  => __('Featured Items Page', 'flatsome'),
				"id" => "featured_items_page",
				"desc" =>  __('Set a custom page as parent for the Featured Items. <strong>NB: You might have to save Theme Options two times for the Featured Items permalinks to work properly.</strong>', 'flatsome'),
				"std" 		=> 0,
				"type" 		=> "select",
				"options" => $of_pages
);



$of_options[] = array( 
				"name"  => __('Items per page (Archive and Template pages)', 'flatsome'),
				"id" 		=> "featured_items_pr_page",
				"desc" => __('Change items per page.', 'flatsome'),
				"std" 		=> "12",
				"type" 		=> "text"
);



$of_options[] = array( 	"name" 		=> __('Related items', 'flatsome'),
						"desc" 		=> __('Change  style of related featured items', 'flatsome'),
						"id" 		=> "featured_items_related",
						"std" 		=> "2",
						"type" 		=> "select",
						"options"   => array("default" => __('Default', 'flatsome'), "text_overlay" => "Text Overlay", "disabled" => "Disabled" ),
);

$of_options[] = array( 
				"name"  => "Featured items height",
				"id" 		=> "featured_items_related_height",
				"desc" => "Change image height on featured items.",
				"std" 		=> "250px",
				"type" 		=> "text"
);




$of_options[] = array( 	"name" 		=> "Social and Sharing",
						"type" 		=> "heading",
);


$of_options[] = array( 	"name" 		=> "Enable Facebook Login / Register on Login page",
						"id" 		=> "facebook_login",
						"desc"      => "This will create a Registrer/login button for Facebook on all My Account pages. Requires the plugin 'Nextend Facebook Connect'",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> "Facebook login - background image",
						"desc" 		=> "Upload background for facebook login header.",
						"id" 		=> "facebook_login_bg",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name"  => "Facebook login - description text",
				"id" 		=> "facebook_login_text",
				"std" 		=> "",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> "Enable Facebook Login / Register on Checkout",
						"id" 		=> "facebook_login_checkout",
						"desc"      => "Enable facebook login button on Checkout page",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "Share icons",
						"desc" 		=> "Select icons to be shown on share icons on product page, blog and [share] shortcode",
						"id" 		=> "social_icons",
						"std" 		=> array("facebook","twitter","email","pinterest","googleplus","whatsapp","tumblr"),
						"type" 		=> "multicheck",
						"options" 	=> array("facebook" => "Facebook","twitter" => "Twitter","email" => "Email","pinterest" => "Pinterest","googleplus" => "Google Plus","vk" => "VKontakte","tumblr" => "Tumblr", "whatsapp" => "WhatsApp (Only for Mobile)")
);


$of_options[] = array( 	"name" 		=> "Custom share icons",
						"desc" 		=> "Replace share icons with custom share script or HTML. Leave empty to use default share icons.",
						"id" 		=> "custom_share_icons",
						"std" 		=> "",
						"type" 		=> "textarea"
);



				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup and Import",
						"type" 		=> "heading",
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
);


				
}//End function: of_options()
}//End chack if function exists: of_options()
?>
