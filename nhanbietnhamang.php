<?PHP
error_reporting(E_ALL);

$number = '0773166707';
$carrier = detect_number($number);
echo $carrier ;// Mobifone

$number = '0987654321';
$carrier = detect_number($number);
echo $carrier ;// Viettel

$wrong_number = '9876543210';
$carrier = detect_number($wrong_number);
echo $carrier; // false

 
/**
 * Detect carrier name by phone number
 *
 * @param string $number The input phone number
 * @return bool Name of the carrier, false if not found
 */
function detect_number ($number) {
    
$carriers_number = [
    '086' => 'Viettel',

    '096' => 'Viettel',
    '097' => 'Viettel',
    '098' => 'Viettel',
    
    '032' => 'Viettel',
    '033' => 'Viettel',
    '034' => 'Viettel',
    '035' => 'Viettel',
    '036' => 'Viettel',
    '037' => 'Viettel',
    '038' => 'Viettel',
    '039' => 'Viettel',

    
    '090' => 'Mobifone',
    '093' => 'Mobifone',
    '070' => 'Mobifone',
    '072' => 'Mobifone',
    '076' => 'Mobifone',
    '077' => 'Mobifone',
    '078' => 'Mobifone',
    '079' => 'Mobifone',
    
    '091' => 'Vinaphone',
    '094' => 'Vinaphone',
    '081' => 'Vinaphone',
    '082' => 'Vinaphone',
    '083' => 'Vinaphone',
    '084' => 'Vinaphone',
    '085' => 'Vinaphone',
    '088' => 'Vinaphone',
   
    
    '099' => 'Gmobile',
    '059' => 'Gmobile',
    
    '056' => 'Vietnamobile',
    '058' => 'Vietnamobile',
    '092' => 'Vietnamobile',
    
    '095'  => 'SFone'
    ];



    $number = str_replace(array('-', '.', ' '), '', $number);

    // $number is not a phone number
    if (!preg_match('/^0[0-9]{9}$/', $number)) return "wrong_number";

    $dauso = substr($number, 0, 3);
   
    // lấy danh sách dau so theo array
    if($carriers_number[$dauso] ){
        return $carriers_number[$dauso];
    }else{
        return "unknow";
    }

}


?>
