    <?php

    //Tiempo de conexion del socket, (0)= El socket no se cierra por efectos de termino de tiempo
    set_time_limit(0);
     
    // creamos el array que contiene la informacion que queremos buscar
    $contenido = array('Lupita' => 4921210332, 'Grecia'=> 4921210331, 'Felipe'   => 4921210333, 
                       'Roberto'=> 4921210330, 'Oyuki' => 4921210329, 'Juan'     => 4921210328,
                       'Brisia' => 4921210318, 'Mayra' => 4921210326, 'Sustaita' => 4921210329, 
                       'Tovar'  => 4921210324, 'Segio' => 4921210322, 'Mars'     => 4921210321, 
                       'Juanis' => 4921210320, 'Tavo'  => 4921210319, 'Luis'     => 4921210318);

    //IP Adresss
    $ip = '127.0.0.1';
    //Puerto
    $puerto = '10001';
     
    /* Creación del socket
    AF_INET Especifca el protocolo de la conexion (AF_INET - AF_INET6 - AF_UNIX)
    SOCK_STREAM indica que los bites de la conexion seran eviados por medio de _STREAM
    */
    $socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));

    //Vinculacion de puerto con IP
    socket_bind($socket, $ip, $puerto) or die ('No se puede vincular el puerto a la IP');

    //Mensaje para identificar posible error
    echo socket_strerror(socket_last_error());

    //Iniciamos la espera de peticiones
    socket_listen($socket);
     $i=0;
 
       while(1){
        //Aceptamos conexiones entrantes
        $cliente[++$i] = socket_accept($socket);

        //Leemos la peticion enviada
        $input = socket_read($cliente[$i], 1024);

        //Ejecutamos la peticion quitando espacios en blando y agregando la informacion requerida
        $peticion = preg_replace("[ \t\r\n]", "", $input);
        $inf = $contenido[$peticion];
        echo "\t\r\n";
        echo "Peticion recibida de parte del cliente: $peticion";
        echo "\t\r\n";
        echo "Respuesta enviada al cliente: $inf";
        echo "\t\r\n";
        
        if(array_key_exists($peticion, $contenido)){
            //Se busca la informacion requerida en nuestro almacen de datos tipo Diccinario de datos
            $info = $contenido[$peticion];
        }else{
            //Mensaje de advertencia sobre información inexsistente
            $info = "<Error: ¡Error el usuario no existe!>";
        }
        //Escribimos el rultado que sera retribuido al cliente
        socket_write($cliente[$i], $info . "\n\r", 1024);
        //Se cierra la conexion
        socket_close($cliente[$i]);
    }
    //Se cietta el proceso goblan de tipo socket
    socket_close($socket);
    ?>