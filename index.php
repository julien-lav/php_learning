<?php
/**
 *
 * Eventos y Disparadores
 * @author  Nicolás Giacaman <nicolas.egp@gmail.com>
 * @url     http://nicolasg.cf
 * @fork    https://gist.github.com/im4aLL/548c11c56dbc7267a2fe96bda6ed348b
 *
 */
class Event {
    protected static $_X = [];

    public static function Create($ID = '', $Func = '') {
        try {
            if(empty($ID) OR empty($Func))
                throw new Exception("ID o Func Vacios!! <br />");
            if(isset(self::$_X[$ID]))
                throw new Exception("{$ID} :: Ya existe. <br />");
            self::$_X[$ID] = $Func;
        }
        catch (Exception $_E) {
            echo '<b>[Event::Create]</b> '.$_E->getMessage();
        }
    }
    public static function Trigger($ID = '') {
        try {
            if(empty($ID))
                throw new Exception("ID Vacio!!");
            
            @$Func = self::$_X[$ID];
            if(isset($Func)) {
                if(is_callable($Func)) {
                    $Args = func_get_args();
                    array_shift($Args);
                    if(call_user_func_array($Func, $Args) === FALSE)
                        throw new Exception("{$ID} :: Error Callback.");
                }
            }      
        }
        catch (Exception $_E) {
            echo '<b>[Event::Trigger]</b> '.$_E->getMessage();
        }
    }

    public static function test_get_arg($cool, $lol, $comment) {
       
        $numargs = func_num_args();
        $echo = func_get_args();

        echo '<pre>';
        echo $numargs;
        echo '</pre>';


        for ($i = 0; $i < $numargs; $i++) {

            $j = $i + 1;

            echo "<br />  L'argument $j est : " . $echo[$i] . "\n";
        }
    }
}
// -- DEMO --
Event::Create('demo1', function($X, $Y) {
    echo $X + $Y .'<br />';
});
Event::Create('demo2', function($X, $Y) {
    echo $X * $Y .'<br />';
});

Event::Create('demo1', function($test){
    echo 'Je suis un text test !!';
});

Event::Create('', function($test){
    echo '!kjqsgdmkgqs';
});

// -----
Event::Trigger('demo2', 2, 2);
Event::Trigger('demo3', 2, 6);
Event::Trigger('demo2', 2, 5);
Event::Trigger('', 2, 5);

Event::test_get_arg('hello', 'world', '!!!');


?>