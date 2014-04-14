<?php 

/**
 * BR Waves
 * Get Waves informations from cptec.inpe.br
 * 
 * @package BR_Waves
 * @author Luiz Alberto <madeinnordeste at gmail dot com>
 *
 *
 * How to discover city code:
 * http://servicos.cptec.inpe.br/XML/listaCidades?city=sao paulo
 *
 * Reponse XML structure:
 *
 *    <?xml version='1.0' encoding='ISO-8859-1'?>
 *    <cidade>
 *       <nome>Maceió</nome>
 *      <uf>AL</uf>
 *     <atualizacao>11-04-2014</atualizacao>
 *    <manha>
 *       <dia>11-04-2014 12h Z</dia>
 *      <agitacao>Fraco</agitacao>
 *     <altura>1.0</altura>
 *     <direcao>S</direcao>
 *   <vento>2.0</vento>
 *           <vento_dir>ENE</vento_dir>
 *       </manha>
 *       <tarde>
 *           <dia>11-04-2014 18h Z</dia>
 *           <agitacao>Fraco</agitacao>
 *           <altura>0.9</altura>
 *           <direcao>SSE</direcao>
 *           <vento>5.6</vento>
 *           <vento_dir>ESE</vento_dir>
 *       </tarde>
 *       <noite>
 *           <dia>11-04-2014 21h Z</dia>
*            <agitacao>Fraco</agitacao>
*            <altura>0.9</altura>
*            <direcao>SSE</direcao>
*            <vento>3.9</vento>
*            <vento_dir>ESE</vento_dir>
*        </noite>
*    </cidade>
 *
 *
 * TODO: http://servicos.cptec.inpe.br/XML/cidade/241/todos/tempos/ondas.xml
 *
 **/
class BR_Waves{

    private $_city_id = 233; //Maceió-AL
    private $_day_request_URL = 'http://servicos.cptec.inpe.br/XML/cidade/%d/dia/%d/ondas.xml';
    
    public function __construct($city_id=FALSE){
        $city_id = (int)$city_id;
        $this->_city_id = ($city_id) ? $city_id : $this->_city_id;
    }

    private function day_request($day=0){
        $day = (int)$day;
        $URL = sprintf($this->_day_request_URL, $this->_city_id , $day);
        $xml  = simplexml_load_file($URL);
        return json_decode(json_encode($xml));
    }

    public function for_days($qtd=3){
        $qtd = (int)$qtd;
        $qtd = ($qtd > 5) ? 5 : $qtd;
        $qtd--;
        $days = array();
        for($i=0;$i<=$qtd;$i++){
            $days[] = $this->day_request($i);
        }
        return $days;
    }

    public function day($day=0){
        return $this->day_request($day);
    }

    public function today(){
        return $this->day_request(0);
    }

    public function tomorrow(){
        return $this->day_request(1);
    }

    public function week(){
       return $this->for_days(5);
    }
    
}


 ?>