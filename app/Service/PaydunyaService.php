<?php


namespace App\Service;
use App\Entity\Booking;
use App\Models\Client;
use App\Models\Parution;
use Paydunya\Checkout\CheckoutInvoice;
use Paydunya\Checkout\Store;
use Paydunya\Setup;
use Symfony\Component\DependencyInjection\ContainerInterface;


class PaydunyaService
{

    private static $isSetup = false;
    private $masterKey, $publicKey, $privateKey, $token;

    /**
     * PaydunyaService constructor.

     */
    public function __construct()
    {
        $this->masterKey = config("PAYDUNUYA_MASTER_KEY");
        $this->publicKey = env('PAYDUNYA_MODE') == "live" ? env('PAYDUNUYA_LIVE_PUBLIC_KEY') : env('PAYDUNUYA_TEST_PUBLIC_KEY') ;
        $this->privateKey = env('PAYDUNYA_MODE') == "live" ? env('PAYDUNUYA_LIVE_PRIVATE_KEY') : env('PAYDUNUYA_TEST_PRIVATE_KEY') ;
        $this->token = env('PAYDUNYA_MODE') == "live" ? env('PAYDUNUYA_LIVE_TOKEN') : env('PAYDUNUYA_TEST_TOKEN') ;

        $this->setUp();
    }

    public function setUp(){
        // avoid setting up the service every time it is called
        if (! self::$isSetup) {
            Setup::setMasterKey($this->masterKey);
            Setup::setPublicKey($this->publicKey);
            Setup::setPrivateKey($this->privateKey);
            Setup::setToken($this->token);
            Setup::setMode(env('PAYDUNYA_MODE') );// Optionnel. Utilisez cette option pour les paiements tests.

            //Configuration des informations de votre service/entreprise
            Store::setName("Senapel");// Seul le nom est requis
            Store::setTagline("Plateforme des appels d'offres au senegal");
            Store::setPhoneNumber("77 127 35 35");
            Store::setPostalAddress("Yoff");
            Store::setWebsiteUrl("https://senapel.golobone.net/");
            Store::setCallbackUrl("https://senapel.golobone.net/senapel/public/api/mobile/ipn");
            Store::setReturnUrl("https://senapel.golobone.net/");
            self::$isSetup = true;
        }
    }
    public function generateInvoiceUrl(Client $client, $prix, Parution $parution): ?CheckoutInvoice
    {
        $invoice = new CheckoutInvoice;
        $invoice->addCustomData('client', $client->nom_complet );
        $invoice->addCustomData('client_phone', $client->telephone);
        $invoice->addCustomData('client_id', $client->id);
        $invoice->addCustomData('parution_id', $parution->id);
        $invoice->addCustomData('email', $client->email);
        $invoice->setTotalAmount($prix);
        $invoice->setReturnUrl('https://transport.golobone.net/');
        $invoice->setCancelUrl('https://transport.golobone.net/');
        $invoice->setCallbackUrl("https://golobone.net/go_travel_v4/public/api/mobile/payment");
        $invoice->addItem("Achat d'appels d'offres", 1, $prix, $prix);
        $invoice->create();

        return $invoice;
    }

    /**
     * @param array $dataSentByPaydunya the data sent by paydunya when payment is made successfully
     * @return bool
     */
    public function isRequestFromPaydunya(array $dataSentByPaydunya) : bool
    {
        return isset($dataSentByPaydunya['hash']) && $dataSentByPaydunya['hash'] == hash('sha512', $this->masterKey);
    }
    /**
     * @param array $dataSentByPaydunya checks if the data sent has all the mandatory fields
     * @return bool
     */
    public function isValidData(array $dataSentByPaydunya)
    {
       /* $dataModel =
            [
                'data' =>
                    [
                        'response_code' => '00',
                        'response_text' => 'Transaction Found',
                        'hash' => '8c6666a27fe5daeb76dae6abc7308a557dca5be1bda85dfe5d81fa330cdc0bc3c4b37765fe5d2cc36aa2ba0f9284226a80f5488d14740fa70769d6079a179406',
                        'invoice' =>
                            [
                                'token' => 'test_jkEdPY8SuG',
                                'items' =>
                                    [
                                        'item_0' =>
                                            [
                                                'name' => 'Chaussures Croco',
                                                'quantity' => '3',
                                                'unit_price' => '10000',
                                                'total_price' => '30000',
                                                'description' => 'Chaussures faites en peau de crocrodile authentique qui chasse la pauvreté',
                                            ],

                                    ],
                                'taxes' =>[],
                                'total_amount' => '42300',
                                'description' => 'Paiement de 42300 FCFA pour article(s) achetés sur Magasin le Choco',
                            ],
                        'custom_data' =>
                            [
                                'categorie' => 'Jeu concours',
                                'periode' => 'Noël 2015',
                                'numero_gagnant' => '5',
                                'prix' => 'Bon de réduction de 50%',
                            ],
                        'actions' =>
                            [
                                'cancel_url' => 'http://magasin-le-choco.com/cancel_url.aspx',
                                'callback_url' => 'http://magasin-le-choco.com/callback_url.aspx',
                                'return_url' => 'http://magasin-le-choco.com/return_url.aspx',
                            ],
                        'mode' => 'test',
                        'status' => 'completed',
                        'customer' =>
                            [
                                'name' => 'Alioune Faye',
                                'phone' => '774563209',
                                'email' => 'aliounefaye@gmail.com',
                            ],
                        'receipt_url' => 'https://paydunya.com/sandbox-checkout/receipt/pdf/test_jkEdPY8SuG.pdf'
                    ]
            ];*/

        return
            isset($dataSentByPaydunya['hash']) &&
            isset($dataSentByPaydunya['invoice']['token']) &&
            isset($dataSentByPaydunya['status']) &&
            $dataSentByPaydunya['status'] == 'completed' &&
            isset($dataSentByPaydunya['custom_data']);

    }

}
