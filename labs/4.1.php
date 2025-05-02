<?php
    echo "10zadanie"."<br>";
    $array_ten = [ "http://site.ru", "http://site.ru/", "https://site.ru", "https://site.ru/"];
    foreach ($array_ten as $key => $value) {
        $value = trim($value);
        if (preg_match("/^https?:\/\/.*\.ru/",$value)) echo $value."<br>";
    }

    echo "17zadanie"."<br>";
    $seveteen = 'aeeea aeea aea axa axxa axxxa';
    $seveteen = explode(' ',$seveteen);
    foreach( $seveteen as $key => $value ){
        if  (preg_match('/^a[x]*a$/',$value) or preg_match('/^a[e]{2}a$/',$value)) echo $value.'<br>';
    }

    echo '24'.'<br>';
    $twenty_four = 'aaa * bbb ** eee *** kkk ****';
    $twenty_four = preg_replace('/(?<!\*)\*\*(?!\*)/','!',$twenty_four);
    echo $twenty_four.'<br>';

    echo '31'.'<br>';

    $thirty_one = date('d-m-Y');
    $thirty_one = preg_replace('/-/','.',$thirty_one);
    echo $thirty_one.'<br>';

    echo '38'.'<br>';

    $thirty_eight = 'aa aba abba abbba abbbba abbbbba';
    preg_match_all('/a[b]{4,}a/',$thirty_eight, $matches);
    var_dump( $matches );

    echo '<br>'.'45'.'<br>';

    $forty_fifth = 'a1a a22a a333a a4444a a55555a aba aca';

    preg_match_all('/a\d+a/',$forty_fifth, $matches);

    var_dump( $matches );

    echo '<br>'.'52'.'<br>';

    $thirty_sixth = 'aba aca aea abba adca abea';

    preg_match_all('/ab.a/',$thirty_sixth, $matches);

    var_dump( $matches );

    echo '<br>'.'59'.'<br>';

    $thirty_ninth = 'aAXa aeffa aGha aza ax23a a3sSa';

    preg_match_all('/a[a-z]+a/',$thirty_ninth, $matches);

    var_dump( $matches );

    echo '<br>'.'66'.'<br>';

    $sixty_six = 'aba aea aca aza axa a.a a+a a*a';

    preg_match_all('/a[b,\.,\+,\*]a/',$sixty_six, $matches);

    var_dump( $matches );
?>
