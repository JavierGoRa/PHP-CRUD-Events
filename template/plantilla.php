<?php

    class plantilla {

        private $subCabecera;

        CONST TITULO = "SelskApp";
		CONST CABECERA = "SelskApp Business Management"  ;
		CONST PIE = "Francisco Javier González Ramírez";

        public function __construct($subCabecera = null){
            $this->subCabecera = $subCabecera;
        }

        public function getSubcabecera(){
			return $this->subCabecera;
        }
        
		public function setSubcabecera($subCabecera){
			$this->subCabecera = $subCabecera;
			return $this;
        }
        
        public function showHead(){

?>
        <head>
            <title><?= self::TITULO?></title>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
            <link rel='stylesheet' href='template/bootstrap/css/bootstrap.min.css'>
            <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
        </head>
    
<?php
        }

        public function cabecera(){

?>
            
            <header>
                <hgroup>
                    <h1><?= self::CABECERA ?></h1>
                    <h2><?=$this->subCabecera?></h2>
                </hgroup>
            </header>
            
<?php

        }

        public function showNavegacion($session){

?>
            
            <section>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="formNuevo.php">Add event</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Order
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="ordenar.php?criterio=name&id=<?=$session?>">Name</a>
                            <a class="dropdown-item" href="ordenar.php?criterio=category&id=<?=$session?>">Category</a>
                            <a class="dropdown-item" href="ordenar.php?criterio=locations&id=<?=$session?>">Location</a>
                        </div>
                        </li>
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0" method="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="expBusqueda">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" formaction="buscar.php">Buscar</button>
                    </form> -->
                    </div>
                    <a class="nav-link" href="logout.php">Logout</a>

                </nav>
            </section>

<?php

        }

        public function index($events, $session, $countEvents){
            /* $mierda = $usuarios->getArrayCategory();
            foreach ($mierda as $key => $value) {
                var_dump($value[0]);
            } */
            
            //var_dump($events);

?>

            <!DOCTYPE html>
            <html lang="es">
                <?=$this->showHead();?>
            <body>
                <div class="container">
                    <?=$this->cabecera();?>
                    <?=$this->showNavegacion($session);?>
                    <section>
                        <article>

<?php

                            if ($countEvents != 0){

?>

                                <table class="table">
                                    <thead>
                                        <?= $events->headerTableEvents() ?>
                                    </thead>
                                    <tbody>
                                        <?php $events->showEvents() ?>
                                    </tbody>
                                </table>

<?php

                            } else {

?>

                                <br><br>
                                <center>Even you do not have events</center>
                                <br><br>
                                <a href="formNuevo.php">
                                    <button href="formNuevo.php" type="button" class="btn btn-primary btn-lg btn-block">Add your first event</button>
                                </a>

<?php

                            }

?>

                        </article>
                    </section>
                    <?=$this->showFooter();?>
                </div>
                <?=$this->showScripts();?>
            </body>
            </html>
            
<?php
            
        }

        public function search($events){
            /* $mierda = $usuarios->getArrayCategory();
            foreach ($mierda as $key => $value) {
                var_dump($value[0]);
            } */
            
            //var_dump($events);

?>

            <!DOCTYPE html>
            <html lang="es">
                <?=$this->showHead();?>
            <body>
                <div class="container">
                    <?=$this->cabecera();?>
                    <?=$this->showNavegacion();?>
                    <section>
                        <article>
                            <table class="table">
                                <thead>
                                    <?= $events->headerTableEvents() ?>
                                </thead>
                                <tbody>
                                    <?php $events->showEvents() ?>
                                </tbody>
                            </table>
                        </article>
                    </section>
                    <?=$this->showFooter();?>
                </div>
                <?=$this->showScripts();?>
            </body>
            </html>
            
<?php
            
        }

        public function showScripts(){

?>
            
            <script src="template/jquery/jquery-3.2.1.min.js"></script>
            <script src="template/popper/popper.js"></script>
            <script src="template/bootstrap/js/bootstrap.min.js"></script>
            
<?php
            
        }

        public function showFooter(){

?>
            
            <hr>
                <footer>&copy;<?= self::PIE ?></footer>
            
<?php
            
        }

        public function formNewEvent($category){

?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input autofocus type="text" name="name" class="form-control" required="required" title="Name of event">
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="locations"  class="form-control" required="required" title="Address event">
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="datetime" name="date"  class="form-control" title="YYYY-MM-DD">
                </div>
                <div class="form-group">
                    <label for="">Date Start</label>
                    <input pattern="^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$" type="text" name="date_start"  class="form-control" required="required" title="YYYY-MM-DD HH:MM:SS">
                </div>
                <div class="form-group">
                    <label for="">Date End</label>
                    <input pattern="^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$" type="text" name="date_end"  class="form-control" required="required" title="YYYY-MM-DD HH:MM:SS">
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <input type="text" name="details"  class="form-control" required="required" title="Explain your event">
                </div>
                <div class="form-group">
                    <label for="">Email Contact</label>
                    <input type="email" name="email_contact"  class="form-control" required="required" title="Email to client">
                </div>
                <div class="form-group">
					<label for="">Category</label>
					<select class="form-control" name="id_category">
                    <option value="0">-- Select your category --</option>
        				<?php foreach ($category as $tipo => $result): ?>
							<option value="<?=$tipo+1?>"><?=$result[0]?></option>
						<?php endforeach; ?>
					</select>
				</div>
                <div class="form-group">
                    <label for="">Link Info</label>
                    <input type="url" name="link_info"  class="form-control" required="required" title="Link for more info">
                </div>
                <div class="form-group">
                    <label for="">Link Tickets</label>
                    <input type="url" name="link_tickets"  class="form-control" required="required" title="Link to buy tickets">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image_event"  class="form-control" required="required" title="Upload an image to your event">
                </div>

                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary" formaction="nuevo.php">Añadir</button>
                <a href="javascript:history.go(-1)"> Volver </a>

            </form>
            
<?php
            
        }

        public function formRegistrar(){

?>
                        
            <form method="POST">
                <legend>Añadir nuevo usuario</legend>

                <div class="form-group">
                    <label for="">Name Company</label>
                    <input autofocus type="text" name="name" class="form-control" required="required" title="Name">
                </div>
                <div class="form-group">
                    <label for="">Region</label>
                    <input type="text" name="region"  class="form-control" required="required" title="Region">
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location"  class="form-control" title="Location">
                </div>
                <div class="form-group">
                    <label for="">CIF</label>
                    <input pattern="([a-z]|[A-Z]|[0-9])[0-9]{7}([a-z]|[A-Z]|[0-9])" type="text" name="cif"  class="form-control" required="required" title="Number CIF">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email"  class="form-control" required="required" title="Email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password"  class="form-control" required="required" title="Password">
                </div>
                
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary" formaction="registrar.php">Añadir</button>
                <a href="javascript:history.go(-1)"> Volver </a>

            </form>
                        
<?php
                        
        }

        public function formularioActualizar($key, event $event, $category){
            /* var_dump($event);
            var_dump($category); */
?>
            <section>
    
                <form action="actualizar.php?id=<?=$key; ?>" method="POST">
                    <legend>Formulario Usuario</legend>
        
                    <div class="form-group">
                        <label for="">Name</label>
                        <input autofocus type="text" name="name" class="form-control" required="required" title="Name of event" value="<?=$event->getName();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" name="locations"  class="form-control" required="required" title="Address event" value="<?=$event->getLocation();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="datetime" name="date"  class="form-control" title="YYYY-MM-DD" value="<?=$event->getDate();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date Start</label>
                        <input pattern="^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$" type="text" name="date_start"  class="form-control" required="required" title="YYYY-MM-DD HH:MM:SS" value="<?=$event->getDateStart();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date End</label>
                        <input pattern="^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$" type="text" name="date_end"  class="form-control" required="required" title="YYYY-MM-DD HH:MM:SS" value="<?=$event->getDateEnd();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Detail</label>
                        <input type="text" name="details"  class="form-control" required="required" title="Explain your event" value="<?=$event->getDetails();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email Contact</label>
                        <input type="email" name="email_contact"  class="form-control" required="required" title="Help client get info" value="<?=$event->getEmailContact();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="id_category">
                            <option value="0">-- Select your category --</option>

                            <?php foreach ($category as $tipo => $result): ?>    
                                <?php if ($tipo+1 === $event->getCategory()): ?>
                            
                                    <option selected value="<?=$tipo+1?>"><?=$result[0]?></option>
                            
                                <?php else: ?>

                                    <option value="<?=$tipo+1?>"><?=$result[0]?></option>

                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Link Info</label>
                        <input type="url" name="link_info" class="form-control" required="required" title="Link for more info" value="<?=$event->getLinkInfo();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Link Tickets</label>
                        <input type="url" name="link_tickets"  class="form-control" required="required" title="Link to buy tickets" value="<?=$event->getLinkTickets();?>">
                    </div>
        
                    <button type="reset" class="btn btn-secondary">Reestablecer</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="javascript:history.go(-1)"> Volver </a>
        
                </form>
    
            </section>
            
<?php
            
        }

        public function formularioMostrar($key, event $event, $category){

?>
            <section>
    
                <form action="actualizar.php?id=<?=$key; ?>" method="POST">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input disabled type="text" name="name" class="form-control" required="required" title="Name of event" value="<?=$event->getName();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input disabled type="text" name="locations"  class="form-control" required="required" title="Address event" value="<?=$event->getLocation();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input disabled type="datetime" name="date"  class="form-control" title="YYYY-MM-DD" value="<?=$event->getDate();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date Start</label>
                        <input disabled pattern="^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$" type="text" name="date_start"  class="form-control" required="required" title="YYYY-MM-DD HH:MM:SS" value="<?=$event->getDateStart();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Date End</label>
                        <input disabled pattern="^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$" type="text" name="date_end"  class="form-control" required="required" title="YYYY-MM-DD HH:MM:SS" value="<?=$event->getDateEnd();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Detail</label>
                        <input disabled type="text" name="details"  class="form-control" required="required" title="Explain your event" value="<?=$event->getDetails();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email Contact</label>
                        <input disabled type="email" name="email_contact"  class="form-control" required="required" title="Help client get info" value="<?=$event->getEmailContact();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <?php foreach ($category as $tipo => $result): ?>
                            <?php if ($tipo+1 === $event->getCategory()): ?>
                                <input disabled type="text" name="email_contact"  class="form-control" required="required" value="<?=$result[0]?>">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Link Info</label>
                        <input disabled type="url" name="link_info" class="form-control" required="required" title="Link for more info" value="<?=$event->getLinkInfo();?>">
                    </div>
                    <div class="form-group">
                        <label for="">Link Tickets</label>
                        <input disabled type="url" name="link_tickets"  class="form-control" required="required" title="Link to buy tickets" value="<?=$event->getLinkTickets();?>">
                    </div>

                    <button type="reset" class="btn btn-secondary">Reestablecer</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="javascript:history.go(-1)"> Volver </a>

                </form>

            </section>
                        
<?php
                        
        }

        public function mostrarErrores($arrayErrores){

?>
            
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Error</h4>
            
                foreach
            
            </div>
            
<?php

        }

        public function indexError($error){

?>

            <!DOCTYPE html>
                <html lang="es">
                    <?=$this->showHead();?>
                <body>
                    <div class="container">
                    <?=$this->cabecera();?>
                    <section>
                        <article>
                            <table class="table">
                                <thead>
                                    <th>An error has occurred</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>- <?=$error?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </article>
                    </section>
                    <a href="javascript:history.go(-1)"> Volver </a>
                    <?=$this->showFooter();?>
            </div>
            <?=$this->showScripts();?>
        </body>
        </html>
            
<?php
            
        }

        public function formIniciarSesion(){

?>
            
            <section>
    
            <form action="loginCheck.php" method="POST">
                <legend>Login Page</legend>
    
                <div class="form-group">
                    <label for="">Email</label>
                    <input autofocus type="text" name="email" class="form-control" required="required" title="email">
                </div>
                
                <div class="form-group">
                    <label for="">Pass</label>
                    <input type="password" name="password"  class="form-control" required="required" title="Contraseña">
                </div>

                <button type="submit" class="btn btn-primary">LogIn</button>
                <a href="formRegistrar.php">Sign Up</a>
    
            </form>

            </section>
                                    
<?php
                                    
        }

    }

?>