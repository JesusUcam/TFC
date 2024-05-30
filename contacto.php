<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.A Barber Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/contact.css">
    <script src="JS/dropdown_menu.js" defer></script>
</head>
<body>  
<header>
        <?php
            require_once("vista/header.php");
            console_log("llamada desde contacto.php");
        ?>

    </header>
    <main class="mainContacto">

        <div id="contact-form">
            <div>
                <h1>Contáctanos</h1> 
                <h4>Puedes resolver tus dudas rellenando este formulario</h4> 
            </div>
                <p id="failure">Ha habido un fallo al envíar tu mensaje.</p>  
                <p id="success">Mensaje recibido. Muchas gracias</p>
        
                   <form method="post" action="/">
                    <div>
                      <label for="name">
                          <span class="required">Nombre: *</span> 
                          <input type="text" id="name" name="name" value="" placeholder="Su nombre" required="required" tabindex="1" autofocus="autofocus" />
                      </label> 
                    </div>
                    <div>
                      <label for="email">
                          <span class="required">Email: *</span>
                          <input type="email" id="email" name="email" value="" placeholder="Su Email" tabindex="2" required="required" />
                      </label>  
                    </div>
                    <div>		          
                      <label for="subject">
                      <span>Consulta: </span>
                          <select id="subject" name="subject" tabindex="4">   
                             <option value="hello">Corte de pelo</option>
                             <option value="quote">Venta de productos</option>  
                             <option value="general">Quiero hablar con mi peluquero</option>
                          </select>
                      </label>
                    </div>
                    <div>		          
                      <label for="message">
                          <span class="required">Mensaje: *</span> 
                          <textarea id="message" name="message" placeholder="Por favor escribe tu mensaje aquí." tabindex="5" required="required"></textarea> 
                      </label>  
                    </div>
                    <div>		           
                      <button name="submit" type="submit" id="submit" >Enviar</button> 
                    </div>
                   </form>
        
            </div>


            </main>
   

 <footer>
    <?php require_once("vista/footer.php");?>


    </footer>
    
    

</body>
</html>