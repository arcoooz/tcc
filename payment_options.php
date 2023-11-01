<div class="box"><!-- box Starts -->

<?php

$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];


?>

<?php

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);

?>

<h1 class="text-center" style="color:#999;">Pagamento</h1>

<p class="lead text-center">

<!--<a href="order.php?c_id=<?php echo $customer_id; ?>">Pague Offline</a> -->

</p>

<!-- center Starts -->
<?php

$get_products = "select * from cart";
$run_products = mysqli_query($con,$get_products);

?>

<div class="payment-main-wrapper">
    
            <div class="user-card-info-wrapper">
                
                <h2>Dados do titular do cartão</h2>
                <form class="credit-card-info" action="thanks.php">
                    <label for="card-number">Número do cartão</label>
                    <div class="credit-card-number">
                        <input type="number" name="card-number" id="card-number" required>
                        <span class="material-icons" id="cc">
                        <i class="fa fa-credit-card"></i>
                        </span>
                    </div>

           
                
                    <div class="validity-and-sc">
                        <div class="validity">
                            <label for="card-validity">Validade</label>
                            <input type="date" name="card-validity" id="card-validity">
                        </div>
                        
                     
                        <div class="security-code">
                            <label for="card-security-code">Código de segurança</label>
                            <div class="card-security-code-input-and-icon">
                                <input type="number" name="card-security-code" id="card-security-code" placeholder="CVV">
                                <span class="material-icons" id="help">
                                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                   
                        
                    </div>
                    <label for="name">Nome completo</label>
                    <input type="text" name="name" id="name" required>

                    <label for="cpf">CPF</label>
                    <input type="number" name="cpf" id="cpf" placeholder="___-___-___-__" required>


                   <div class="phone-and-birthday">

                        <div class="phone">
                            <label for="card-validity">Telefone</label>
                            <input type="number" name="phone" id="phone" placeholder="(__) _____ - ____" required>
                        </div>

                        <div class="birthday">
                            <label for="card-validity">Data de nascimento</label>
                            <input type="date" name="phone" id="phone" required>
                        </div>
                   </div>

                   <label for="parcela">Parcelas</label>
                   <select id="parcela">
                   <?php
                    $total=0;
                    while($row_cart = mysqli_fetch_array($run_cart)){
                        $pro_id = $row_cart['p_id'];
                        echo $pro_id;
                        $pro_size = $row_cart['size'];
                        $pro_qty = $row_cart['qty'];
                        $only_price = $row_cart['p_price'];
                        $get_products = "select * from products where product_id='$pro_id'";
                        $run_products = mysqli_query($con,$get_products);  
                    while($row_products = mysqli_fetch_array($run_products)){

                    $product_title = $row_products['product_title'];
                    $sub_total = $only_price*$pro_qty;
                    $total += $sub_total;
                    ?>
                        <option id="selectedValue"  value="1">1x de R$ <?php echo number_format($total,2,',','.');?> sem juros</option>
                        <option id="selectedValue"  value="2">2x de R$ <?php echo number_format($total/2,2,',','.');?> sem juros</option>
                        <option id="selectedValue"  value="3">3x de R$ <?php echo number_format($total/3,2,',','.');?> sem juros</option>
                        <option id="selectedValue"  value="4">4x de R$ <?php echo number_format($total/4,2,',','.');?> sem juros</option>
                        <option id="selectedValue"  value="5">5x de R$ <?php echo number_format($total/5,2,',','.');?> sem juros</option>
                        <option id="selectedValue"  value="6">6x de R$ <?php echo number_format($total/6,2,',','.');?> sem juros</option>
                    <?php } }?>         
                   </select>


                </form>
                    
            </div>


            <div class="user-shop-cart-info-wrapper">


                <div class="request-card">
                    <h2>Resumo do pedido</h2>
                                
                    <h3>Itens do pedido</h3>
                  
                    <p id="request-itens"><?php echo $product_title; ?><sapn>Qtde: <?php echo $pro_qty;?>X</sapn></p>
                 
                    <h3>Forma de Pagamento</h3>
                    <p id="credit-card-icon"> <span class="material-icons" id="cc-option">
                    <i class="fa fa-credit-card"></i>
                    </span> Cartão de crédito</p>
                    <h3>Tempo de processamento</h3>
                    <p id="payment-process-time">1 dia útil</p>
                    <h3>Total a pagar</h3>
                    <p id="request-price">R$ <?php echo number_format($total,2,',','.');?><sapn id="payment-portion">1x sem juros</sapn> </p>
                    <input type="button" onclick="window.location='thankyou.php'" value="Finalizar Compra" id="finish-payment">
                </div>
                   
            </div>
                           
        </div>
 
<?php

$i = 0;


$ip_add = getRealUserIp();

$get_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$pro_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_title = $row_products['product_title'];

$i++;

?>


<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>" >

<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>" >

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>" >

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>" >


<?php } ?>




</form><!-- form Ends -->

<!-- center Ends -->

</div><!-- box Ends -->
<script>
// Armazene o valor total original
var valorTotalOriginal = <?php echo $total; ?>;

// Armazene o valor total original
var valorTotalOriginal = <?php echo $total; ?>;

document.getElementById('parcela').addEventListener('change', function() {
    var parcelaSelecionada = this.value;

    // Use o valor total original para cálculos
    var valorTotal = valorTotalOriginal;

    var novoValor = valorTotal;

    var numParcelasTexto = "1x sem juros";

    if (parcelaSelecionada !== '0') {
        novoValor = valorTotal / parseInt(parcelaSelecionada);
        numParcelasTexto = parcelaSelecionada + 'x de R$ ' + novoValor.toFixed(2).replace('.', ',') + ' sem juros';
    }

    document.getElementById('payment-portion').textContent = numParcelasTexto;
    
    if (parcelaSelecionada === '1') {
        // Restaure o valor total original
        document.getElementById('payment-portion').textContent = "1x sem juros";
    }
});


</script>