<?php

class Test {
    public $val = 10;
    
    public function value(){
        $this->val += 10;
    } 
    public function printQuote(){
        return "This is my quote !";
    }
}
    
$oui = new Test();
$non = new Test();

if ($oui == $non){
    echo '== Vrai // ' ;
} else {
    echo '== Faux // ';
}

if ($oui === $non){
    echo '=== Vrai';
} else {
    echo '=== Faux';
}

// Spaceship Operator

function compare ($a, $b)
{   
    $result = $a <=> $b;
    return $result;
}

echo compare(1 , 2) . "\r\n";
echo compare(2 , 2) . "\r\n";
echo compare(2 , 1) . "\r\n";

echo '<pre>';
echo '<br />';
echo '<pre>';
// print_r(filter_list());
// echo 'Id correspondant au filtre int : ' . filter_id('int');
?>

<table>

<?php
foreach(filter_list() as $id => $filter) {
    echo 
        '<tr>
            <td>' . $filter . '</td> 
            <td>' . filter_id($filter) . '</td>
        </tr>'
    ;
}
?>
</table>

<?php

$txt = '<p class="some-nasty-html"> Une chaine de string </p>';
$myint = 'Numéro de string : Rr123';

$net = filter_var($txt, FILTER_SANITIZE_STRING);
$netint = filter_var($myint, FILTER_SANITIZE_NUMBER_INT);
echo $net . '  ';
echo $netint;

// $ent = 223; $min = 1; $max =200; 
// filter_var($ent, 257, array("option" => array("min_range" => $min, "max_range" => $max)))

$ip = '127.0.0.1';

if(filter_var($ip, FILTER_VALIDATE_IP) === true)
{
    echo $ip . 'est bien une adresse ip';
} 

$now = strtotime('now');
$nowPlusSeven = strtotime('+7 days');
$saturday = strtotime('next saturday');

echo '<br />';
echo $now;
echo '<br />';
echo $nowPlusSeven;

$r = '/r/';

preg_match($r, $myint, $pn);
preg_match_all($r, $myint, $pm);
// preg_filter($r, 'soir', $txt);
// cherche $r dans $txt -> remplace par 'soir'
// preg_grep();
// preg_plit();
// preg_last_error()

echo '<br />';
$antiSlash = "l'eau cou~le le ? < > long des @ à & bonjour ! ";

$icietla = preg_quote($antiSlash);

echo $icietla;

print_r($pn);
print_r($pm);

echo '<br />log<br />';
echo $log = log(12, 2);
echo '<br />length in bytes<br />';
echo $bytes = ($log / 8) +1;
echo '<br />length in bits</br>';
echo $bits = $log + 1;
echo '<br />set all lower bits to 1</br>';
echo $filter = (int) ( 1 << $bits ) - 1;
echo '<br />hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) )<br />';
echo $rnd = hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) );
echo '<br />$rnd & $filter <br />';
echo $rnd = $rnd & $filter;

echo '<br /><br />// - - - - - - - - //<br /><br />';

// echo $_SERVER['SERVER_ADDR'] .'<br>';
echo $_SERVER['PHP_SELF'] . '<br>';
echo $_SERVER['SERVER_NAME'] . '<br>';
echo $_SERVER['REQUEST_TIME'] . '<br>';
echo $_SERVER['REMOTE_ADDR'] . '<br>';
echo $_SERVER['SCRIPT_NAME'] . '<br>';

/*

Les méthodes magiques. 

Ce sont des méthodes qui sont appelées lors d'un événement particulier.

__construct()
À l'instanciation d'un classe.

__destruct()
À la destruction d'un objet, ou à la fin du script.

__set()
Lorsqu'on tente d'assigner une valeur à un attribut auquel on n'a pas accès
(héritage en private), ou qui n'existe pas. Prend deux paramètres : 
le nom de l'attibut auquel on a tenté d'assigner une valeur et la valeur en question.

__get()
Lorsqu'on essaye d'accéder à un attribut auquel on n'a pas accès ou qui n'existe pas.
Prend comme paramètre l'attribut auquel on a tenté d'accéder.

__isset()
Lorsqu'on fait un isset sur un attribut auqel on n'a pas accès, ou qui n'existe pas. 
prends en paramère l'attibut sur lequel on a fait le test.
Renvoie un booléen.

__unset()
Lorsqu'on fait un unset sur un attribut auquel on n'a pas accès et qui n'existe pas.
Prends en paramètre l'aattribut auquel on a fait unset. 
Ne doit rien renvoyer.

__call()
Lorsqu'on appelle une méthode inexistante ou privée.

__callStatic()
Lorsqu'on appelle une méthode inexistante statiquement. 
Prends deux arguments: le nom de la méthode et un tableau avec les arguments qu'on lui a passés.
En outre, cette méthode dois obligatoirement être statique.

__toString()
Lorqu'un objet est appelé à être converti en chaîne de caractères avec un cast ou un echo.

__invoke()
Lorque l'on appelle un objet comme une fonction.

__clone()
Lorsque l'on clone un objet. Cette méthode est appelée sur l'objet colné.


=> Toute méthode connu dans une interface doit être public
=> Les méthodes des interfaces ne doivent reien contenir.  
=> Une interface ne doit pas ne peut pas lister de méthode abstraite ou finale
=> Le nom des interfaces, doit être différent de ceux des classes
*/

$origin = new Test();
$copy = clone $origin; // On copie le contenu de l'objet $origine dans l'objet $copie.

echo '<br />';
echo $origin->printQuote();
echo '<br />';
echo $copy->printQuote();

if ($origin === $copy) {
    echo "<br />";
    echo "Je suis une copie (avec ==)";
} else {
    echo "<br />";
    echo "Pas tout à fait ! (avec ===)";
}