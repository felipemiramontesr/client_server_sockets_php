    <?php
    while(1){

        //Se despliega mensaje de bienvenida
        echo "\t\r\n";
        echo "<Estado de Conexion: Establecida>";
        echo "\t\r\n";
        echo "<Estado del Servidor: En espera de una peticion>";
        echo "\t\r\n";
        echo "Ingrese un nombre de usuario o escriba el comando 'Quit' para salir: ";

        //Obtenemos la peticion del usuario
        $user = trim(fgets(STDIN)); 

        //Se valida el conmando "Quit" de salida
        if ($user == 'Quit')
        {
            exit;
        } 

        // Mensaje que despliega el nombre de usuario consultado en caso de que exista.
        echo "\t\r\n";
        echo "Peticion enviada, $user ";
        echo "\t\r\n";

        //Creacion de socket con caracteristicas TCP
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
       
        //Se verifica que el socket se creo con exito.
        if($socket === FALSE)
        {
            echo '<ERROR: error en la conexion de sockets!>';
        }
        else
        {
            //Conexion con el socket servidor (OBJETO, IP_ADRESS, PUERTO)
            $resultado = socket_connect($socket, '127.0.0.1', '10001');

            if($resultado === FALSE)
            {
                echo '<ERROR: error en la conexion de sockets!>';
            }
            else
            {
               //Se envia la peticion de información
               socket_write($socket, $user, strlen($user));
               // Se recibe la información
               $info = socket_read($socket, 1024);
               // Se imprime la información recibida
               echo "Respuesta recibida, $info";
            }
        }
    }
?>