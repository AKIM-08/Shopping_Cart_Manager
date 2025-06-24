<?php
declare(strict_types=1);

$elements = [];


while(true){
    $produit = (string) readline('Entrez le nom du produit :');
    $prix = (int) readline('Entrez le prix unitaire :');
    $quantite = (int) readline('Entrez la quantité :');

    while ($prix > 1000 || $quantite > 20){
        echo "Prix unitaire ou quantite invalide (assurez vous que le prix ne dépasse pas la somme de 1000 et que la quantié ne soit pas supérieur à 20)\n";
            if ($prix > 1000){
                $prix = (int) readline('Entrez le prix unitaire :');
            } elseif ($quantite > 20){
            $quantite = (int) readline('Entrez la quantité :');
            }
    }

    $elements[] = ['Nom' => "$produit", 'Prix' => $prix, 'Quantité' => $quantite];

    $action = (string) readline('Voulez-vous ajouter un autre article ?(o/n) :');
    while ($action !== 'n' && $action !== 'o') {
        echo "Veuillez répondre par (o/n)\n";
        $action = (string) readline("Voulez-vous ajouter un autre article ?(o/n) :");
    }

    if ($action === 'n'){
        break; 
    }

}

$total = 0;

echo "\n🛒 contenu du panier :\n";
echo "--------------------------------------\n";

foreach($elements as $key => $valeur){
    $sous_total = $valeur['Prix'] * $valeur['Quantité'];
    $total += $sous_total;
    
    echo ($key + 1). ". " .$valeur['Nom']. " - " .$valeur['Prix']. "F * " .$valeur['Quantité']. " = " .$sous_total. "\n";
}

echo "--------------------------------------\n";
echo '💰 LE PRIX TOTAL À PAYER EST : ' .$total. "F CFA \n" ;
