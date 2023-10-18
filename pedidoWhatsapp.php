<?php
if (isset($_POST['whatsapp'])) {
    if (!empty($_SESSION['lista'])) {
        $total = 0;
        $message = "Olá, esse é meu pedido.\n\nItens:\n\n";
        foreach($_SESSION['lista'] as $item) {
            $message .= "{$item->nome} - R$ {$item->preco}\n";
            $total += $item->preco;
        }  
        $message .= "\n\n💳 Cartão (Mastercard)\n\n🏠 Rua Padre Mansueto Bernardi, Nº 173 - , Dytz, Santo Ângelo\n(Estimativa: entre 25~60 minutos)\n\nTotal: R$ $total\n\nObrigado pela preferência, se precisar de algo é só chamar! 😉";

        $messageCodificada = urlencode($message);
        $url = "https://web.whatsapp.com/send?phone=555591880238&text=$messageCodificada";
    
        echo "<script>window.location.href = ' $url'</script>";
    }
}