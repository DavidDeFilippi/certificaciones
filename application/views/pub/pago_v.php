<!DOCTYPE HTML>
<html>

<head>
    <title>Pago de Examen</title>
</head>

<div id="content">
    <div class="row content-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 content-center">
            <div class="row">
                <h2 class="text-center" style="margin-bottom:50px;">Pago de examen</h2>
                <div class="col-lg-6 item-medio-pago">
                                       
                <!-- Content -->
                <?php

                if (!isset($request) || !isset($result) || !isset($message) || !isset($next_page)) {

                    $result = "Error al conectar con Webpay";
                    echo '<h3 style="">'.$result.'</h3>';
                    echo '<a href="'.base_url().'Examenes">&laquo; volver a mis examenes</a>';
                    // die;
                }
                /* Respuesta de Salida - Vista WEB */
                ?>
                <ul class="lista-webpay">
                    <li><img src="<?php echo base_url()?>res/img/webpayplus.svg" style="width:150px;"/></li>
                    <li><img src="<?php echo base_url()?>res/img/tc.png" style="width:120px;"/></li>
                    <li><img src="<?php echo base_url()?>res/img/rc.png" style="width:80px;"/></li>
                    <li><b><?php echo $message; ?></b></li>
                    <li>
                    


                    <?php if (strlen($next_page) && $post_array) { ?>
                        <?php echo $listvoucher; ?>

                    <form action="<?php echo site_url($next_page); ?>" method="post">
                        <input type="hidden" name="authorizationCode" id="authorizationCode" value="">
                        <input type="hidden" name="amount" id="amount" value="">
                        <input type="hidden" name="buyOrder" id="buyOrder" value="">
                        <input type="submit"  class="btn btn-success" style="border-radius: 0 !important;" value="<?php echo $button_name; ?>">
                    </form>

                    <script>

                        var authorizationCode = localStorage.getItem('authorizationCode');
                        document.getElementById("authorizationCode").value = authorizationCode;

                        var amount = localStorage.getItem('amount');
                        document.getElementById("amount").value = amount;

                        var buyOrder = localStorage.getItem('buyOrder');
                        document.getElementById("buyOrder").value = buyOrder;

                        localStorage.clear();

                    </script>

                    <?php } elseif (strlen($next_page)) { ?>

                    <form action="<?php echo $next_page; ?>" method="post" id="continue">
                        <input type="hidden" name="token_ws" value="<?php echo ($token); ?>">
                        <input id="btn_continuar" class="btn btn-success" style="border-radius: 0 !important;" type="submit" value="<?php echo $button_name; ?>">
                    </form>
                    <?php } ?>


                    </li>
                </ul>
                <br>
                <br>

                </div>
                
                
                <?php  
                if (!isset($request) || !isset($result) || !isset($message) || !isset($next_page)) {
                    $html= '';
					$html .= '<div class="col-lg-6  item-medio-pago">';
					$html .= '<h3>Depósito bancario</h3>';
					$html .= '<p>Sólo en caso que no pueda pagar a través de Webpay (Debe adjuntar su comprobante de depósito con el n° de referencia al momento de informar el pago).</p>';
					$html .= '<ul class="lista-deposito">';
					$html .= '<li>';
					$html .= '<b>Banco: </b>' .$cuentaTransferencias[0]['banco'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>Tipo de Cuenta: </b>' .$cuentaTransferencias[0]['tipo_cuenta'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>N° de Cuenta: </b>' .$cuentaTransferencias[0]['numero_cuenta'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>Rut: </b>' .$cuentaTransferencias[0]['rut'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>Correo Electrónico: </b>' .$cuentaTransferencias[0]['email'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>N° de Referencia: </b>' .$id_postulacion;
					$html .= '</li>';
					$html .= '</ul>';

					$html .= '<a href="'.base_url().'informar_pago"><button class="btn btn-success">Informar Pago &raquo;</button></a><br><br>';
					$html .= '</div>';
                }
                 echo $html; 
                 ?>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>


    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-88238886-5"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments)
        }
        ;
        gtag('js', new Date());

        gtag('config', 'UA-88238886-5');
    </script>

</html>