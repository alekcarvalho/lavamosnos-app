<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('asset_url()')){

	function asset_url(){

        return base_url().'public/assets/';

    }

    function status_order($id){

        switch ($id) {

            case 1: return 'Aberto';

            case 2: return 'Aguardando Aprovação';

            case 3: return 'Nova Revisão';

            case 4: return 'Liberado para Lavagem';

            case 5: return 'Liberado para Retirada';

            case 6: return 'Entregue';
            
            default: return 'Indefinido';

        }

    }

    function status_delivery($id){

        switch ($id) {

            case 1: return 'Retirar no cliente';

            case 2: return 'Entregar na lavanderia';

            case 3: return 'Entregue na lavanderia';

            case 4: return 'Retirar na lavanderia';

            case 5: return 'Entregar no cliente';

            case 6: return 'Entregue';
            
            default: return 'Indefinido';

        }

    }

    function dateTimetoDate($date){

        $exp = explode(' ', $date);

        $expDate = explode('-', $exp[0]);

        return implode('/', array_reverse($expDate));

    }

    function actionToOrder($status){

        switch ($status) {

            case 1: return array(
                                    'label'     => 'Salvar',
                                    'action'    => 'save'
                                 );

            case 3: return array(
                                    'label'     => 'Liberar para Lavagem',
                                    'action'    => 'liberaded'
                                 );

            case 4: return array(
                                    'label'     => 'Liberar para Retirada',
                                    'action'    => 'delivery'
                                 );

            default: return array(
                                    'label'     => 'Ver Histórico',
                                    'action'    => 'historic'
                                 );

        }

    }

    function productType($id = null) { 

        $products = array(
                            1 => 'Camiseta',
                            2 => 'Camisa',
                            6 => 'Calsa',
                            4 => 'Vestido'
                         );

        if(!is_null($id))
            return $products[$id];

        return $products;
    }

    function detailType($id = null) { 

        $details = array(
                            1 => 'Mancha',
                            2 => 'Furo',
                            3 => 'Desgaste'
                        );

        if(!is_null($id))
            return $details[$id];

        return $details;
    }

    function urlS3($path, $file){

        return 'http://lavamosnos.s3.amazonaws.com/' . $path . '/' . $file;

    }

}
