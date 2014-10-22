<?php 
error_reporting(E_ALL ^ E_NOTICE);  
    include("conectar_bd.php");
    session_start();
    $id_user = $_SESSION['uid'];
?>
<!--<script>
function enviar_parametro(valor){ 
location = location.pathname + '?id=solicitante&param=' + valor; 
// suponiendo que 'param' es el nombre como se reflejara en PHP; 
// location.pathname hace referencia a la ruta actual, de ser necesario puedes cambiarlo a la direccion que procesara los datos en PHP; 
}  
</script>-->


<div class="contenedor">
            <div class="header">
                 <h1 class="h1_header">
                    <?php echo utf8_encode($_SESSION['username']);?> 
                </h1>
            
            </div>
                <div class="content">
                    <form action="pages/upload.php" method="post" enctype="multipart/form-data"> 
                    <table>
                        <tr>
                            <td>
                                Carga Masiva: <input type="file" name="uploadfile">
                                <input type="submit"value="Subir archivo">                  
                            </td>
                        </tr>                        
                    </table>
                    </form>                        
               </div>
        </div>
