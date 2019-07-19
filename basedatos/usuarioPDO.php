<?php

    class usuarios {

        private $pdo;
        private $usuarios;

        public function __construct(){

            try{
                $host = "localhost";
                $dbname = "db_selskapp";
                $user = "root";
                $password = "";
                $charset = "utf8mb4";
                $collate = "utf8mb4_unicode_ci";
                $dsn = "mysql:host=$host;dbname=$dbname; charset=$charset";
                $option = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
                ];

                $this->pdo = new PDO($dsn, $user, $password, $option);
            } catch (PDOException $e){

                exit($e->getMessage());

            }

        }

        public function getNameCompany($nameCompany){

            try {
                $this->usuarios = $this->pdo->prepare("SELECT name FROM t_company where id = :id");
                $this->usuarios->bindParam(':id',$nameCompany);
                $this->usuarios->execute();
                return $this->usuarios->fetch();
            } catch (PDOException $e){
                exit($e->getMessage());
            }

        }

        public function getEvents($idCompany){

            try {
                $this->usuarios = $this->pdo->prepare(
                    "select e.id, 
                        e.name, 
                        e.locations, 
                        e.date, 
                        e.date_start, 
                        e.date_end, 
                        e.details, 
                        e.email_contact, 
                        e.count_clicks, 
                        c.name category, 
                        e.link_info, 
                        e.link_tickets 
                    from t_events e 
                        inner join t_category c on (e.id_category = c.id)
                    where e.id_company = :id_company ;");
                $this->usuarios->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'event');
                $this->usuarios->bindValue(':id_company',$idCompany);
                $this->usuarios->execute();
            } catch (PDOException $e){
                exit($e->getMessage());
            }

        }

        public function perfiles(){
            //Devuelve array de perfiles cuyo indice es la clave idPerfil
            try{
                $perfiles = $this->pdo->prepare("SELECT idPerfil, tipoPerfil FROM perfiles;");
                $perfiles->setFetchMode(PDO::FETCH_KEY_PAIR);
                return $perfiles->exevute();
            } catch (PDOException $e){
                exit($e->getMessage());
            }
        }

        public function arrayTableEvents(){
            return (array('Name', 'Location', 'Date', 'Email Contact', 'Category', 'Actions' ));
        }

        public function headerTableEvents(){

            $cabecera = $this->arrayTableEvents();

            echo "<legend>All Your Events</legend>";
            echo "<tr>";
            foreach ($cabecera as $columna) {
                echo "<th> $columna </th>";
            }
            echo "</tr>";

        }

        public function getCountEvents($session){
            try {
                $this->usuarios = $this->pdo->prepare(
                    "select count(*)
                    from t_events 
                    where id_company = :id_company;");
                $this->usuarios->bindValue(':id_company',$session);
                $this->usuarios->execute();
                return $this->usuarios->fetch();
            } catch (PDOException $e){
                exit($e->getMessage());
            }
        }

        public function showEvents(){

            while ($event = $this->usuarios->fetch()) {
                $this->showEventDetails($event);
            }

        }

        public function showEventDetails(event $event){
            //var_dump($event);

?>
                        
            <tr>
                <td><?=$event->getName() ?></td>
                <td><?=$event->getLocation() ?></td>
                <td><?=$event->getDate() ?></td>
                <td><?=$event->getEmailContact() ?></td>
                <td><?=$event->getCategory() ?></td>
                <?=$this->acciones($event->getId()); ?>
            </tr>
            
<?php
            
        }

        public function getArrayCategory(){
            try{
                $category = $this->pdo->prepare("SELECT name FROM t_category;");
                $category->execute();
                return $category->fetchAll();
            } catch (PDOException $e){
                exit($e->getMessage());
            }
        }
        
        public function getArrayTipoClub(){
            return (array("Nutrias Pantaneras","Club Atletismo Villamartín","Atletismo Campo de Gibraltar","Asociación Deportiva de Arcos","Club Atletismo Fronter"));
        }

        public function insertar(event $newEvent){
            try {

                $this->event = $this->pdo->prepare("insert into 
                t_events 
                values 
                (null, :name, :locations, :date, :date_start, :date_end, :details, :email_contact, 0, :category, :link_info, :link_tickets,:image, :sesion, null)");

                $this->event->bindValue(':name', $newEvent->getName());
                $this->event->bindValue(':locations', $newEvent->getLocation());
                $this->event->bindValue(':date', $newEvent->getDate());
                $this->event->bindValue(':date_start', $newEvent->getDateStart());
                $this->event->bindValue(':date_end', $newEvent->getDateEnd());
                $this->event->bindValue(':details', $newEvent->getDetails());
                $this->event->bindValue(':email_contact', $newEvent->getEmailContact());
                $this->event->bindValue(':category', $newEvent->getCategory());
                $this->event->bindValue(':link_info', $newEvent->getLinkInfo());
                $this->event->bindValue(':link_tickets', $newEvent->getLinkTickets());
                $this->event->bindValue(':image', $newEvent->getPhoto());
                $this->event->bindValue(':sesion', $newEvent->getIdCompany());
                $this->event->execute();
            } catch (PDOException $e) {
                exit('<script type="text/javascript">alert("That email contact already exists, try another.");window.location.href="javascript:history.go(-1)"</script>');
            }
        }

        public function deleteEvent($id){
            try {
                $this->events = $this->pdo->prepare("delete from t_events where id = :id");
                $this->events->bindValue(':id', $id);
                $this->events->execute();
            } catch (PDOException $e) {
                exit('<script type="text/javascript">alert("Actualmente existe un problema. Pruebe mas tarde");window.location.href="./index.php"</script>');
                //header("location:index.php");
            }
        }

        public function buscar($expSearch, $idCompany){
            var_dump($expSearch);
            try {
                $this->events = $this->pdo->prepare(
                    "select * from t_events
                        where name like '%:expSearch%'
                        or locations like '%:expSearch%'
                        or date like '%:expSearch%'
                        or date_start like '%:expSearch%'
                        or date_end like '%:expSearch%'
                        or details like '%:expSearch%'
                        or email_contact like '%:expSearch%'
                        or link_info like '%:expSearch%'
                        or link_tickets like '%:expSearch%'
                        and id_company = :idCompany"
                );
                $this->events->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'event');
                $this->events->bindValue(':expSearch', $expSearch);
                $this->events->bindValue(':idCompany', $idCompany);
                $this->events->execute();
            } catch (PDOException $e){
                exit($e->getMessage());
            }

        }

        public function getEventKey($id){
            
            try {
                $this->usuarios = $this->pdo->prepare(
                    "select 
                        id,
                        name,
                        locations,
                        date,
                        date_start,
                        date_end,
                        details,
                        email_contact,
                        count_clicks,
                        id_category category,
                        link_info,
                        link_tickets,
                        photo,
                        id_company from t_events where id = :id");
                $this->usuarios->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'event');
                $this->usuarios->bindValue(':id', $id);
                $this->usuarios->execute();
                return $this->usuarios->fetch();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }

        }

        public function getArrayTipoPerfil(){
            return (array("Administrador","Editor","Registrado"));
        }

        public function actualizarDato($id, $event){
            try {
                $this->events = $this->pdo->prepare(
                    "update t_events 
                    set 
                        name = :name,
                        locations = :locations,
                        date = :date,
                        date_start = :date_start,
                        date_end = :date_end,
                        details = :details,
                        email_contact = :email_contact,
                        id_category = :id_category,
                        link_info = :link_info,
                        link_tickets = :link_tickets
                    where id = :id"
                );
               
                $this->events->bindValue(':id', $id);
                $this->events->bindValue(':name', $event->getName());
                $this->events->bindValue(':locations', $event->getLocation());
                $this->events->bindValue(':date', $event->getDate());
                $this->events->bindValue(':date_start', $event->getDateStart());
                $this->events->bindValue(':date_end', $event->getDateEnd());
                $this->events->bindValue(':details', $event->getDetails());
                $this->events->bindValue(':email_contact', $event->getEmailContact());
                $this->events->bindValue(':id_category', $event->getCategory());
                $this->events->bindValue(':link_info', $event->getLinkInfo());
                $this->events->bindValue(':link_tickets', $event->getLinkTickets());
                $this->events->execute();
            } catch (PDOException $e){
                exit('<script type="text/javascript">alert("This email contact already exists");window.location.href="javascript:history.go(-1)"</script>');                
            }
        } 

        public function getIdSession(){
            return $_SESSION['id'];
        }

        /* public function checkCookie(){
            //var_dump($_COOKIE['session']);
            if ($_COOKIE['session'] == null) {
                session_destroy();
                //exit('<script type="text/javascript">alert("Nombre de usuario o Email ya existentes")</script>');
                header("location:index.php");
            }
        } */

        public function getCountClicks($id){
            try {
                $events = $this->pdo->prepare("select count_clicks from t_events where id = :id");
                $events->bindParam(':id', $id);
                $events->execute();
                return $events->fetch();
            } catch (PDOException $e){
                exit($e->getMessage());
            }
        }

        public function logear($email,$passwd){

            try {

                $usuario = $this->pdo->prepare("SELECT * FROM t_company WHERE email=:email and password=password(:passwd)");
                
                $usuario->bindParam(':email',$email);
                $usuario->bindParam(':passwd',$passwd);

                $usuario->execute();

                $logueo = $usuario->fetch();
                
                //exit(var_dump($logueo));
                
                $_SESSION['id'] = $logueo['id'];
                return $_SESSION['id'];
                $_SESSION['nombre'] = $logueo['nombre'];

            } catch (PDOException $e){
                return false;
            }
        }


        public function addNewCompany(company $newCompany){
            try {

                $this->usuarios = $this->pdo->prepare("insert into 
                t_company 
                values 
                (null, :name, :region, :location, :cif, :email, password(:password))");

                $this->usuarios->bindValue(':name', $newCompany->getName());
                $this->usuarios->bindValue(':region', $newCompany->getRegion());
                $this->usuarios->bindValue(':location', $newCompany->getLocation());
                $this->usuarios->bindValue(':cif', $newCompany->getCif());
                $this->usuarios->bindValue(':email', $newCompany->getEmail());
                $this->usuarios->bindValue(':password', $newCompany->getPassword());
                $this->usuarios->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        public function getTiposPerfil($id){
            try {
                $perfiles = $this->pdo->prepare("select tipoPerfil from perfiles where idPerfil = :idPerfil");
                $perfiles->setFetchMode(PDO::FETCH_OBJ);
                $perfiles->bindParam(':idPerfil', $id);
                $perfiles->execute();
                return $perfiles->fetch()->tipoPerfil;
            } catch (PDOException $e){
                exit($e->getMessage());
            }
        }


        public function acciones($key){

?>
                    
            <td>
                <a href="formActualizar.php?id=<?=$key; ?>" title="Actualizar"><i class="material-icons">edit</i></a>
                <a href="formMostrar.php?id=<?=$key; ?>" title="Mostrar"><i class="material-icons">visibility</i></a>
                <a href="eliminar.php?id=<?=$key; ?>" title="Eliminar"><i class="material-icons">clear</i></a>
            </td>
    
<?php

        }

    }

?>