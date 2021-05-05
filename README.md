Code snippets nhận diện đầu số nhà mạng, truyền vào số di động, trả vè tên mạng Viettel, Mobile, vinaphone....
### Nguồn gốc:
Code này được chỉnh sửa từ code của  [datnq](https://github.com/datnq "datnq") / [Vietnamese-mobile-carrier](https://github.com/datnq/Vietnamese-mobile-carrier "Vietnamese-mobile-carrier")
Mình đã nhận thấy có thể rút gọn hơn code của [datnq](https://github.com/datnq "datnq") 

### Nhận diện số di động
Từ 15/11/2018, số di động chỉ có 10 số và bắt đầu bằng 03, 05, 07, 08, 09.

Regex để nhận diện số điện thoại dạng này là: /^0[0-9]{9}$/

Thông thường số điện thoại thường được nhập với ký tự -, ., [Space] vì vậy cần loại bỏ những ký tự này trước khi nhận diện. Ví dụ (PHP):
```php
<?php
$number = str_replace(array('-', '.', ' '), '', $number);
?>
```
Và sau đó nhận dạng regex:
```php
<?php
// return false if number is not mobile number
if (!preg_match('/^0[0-9]{9}$/', $number)) return "WRONG_NUMBER";
?>
```

### Nhận diện tên nhà mạng
Array chứa danh sách các nhà mạng (copy-paste):
```php
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
```
lấy 3 ký tự đầu của số điện thoại nhập vào
 ```php
   $dauso = substr($number, 0, 3);
```

So sánh nếu đúng thì trà về tên nhà mạng, không thì báo "UNKNOW"
```php
   // lấy danh sách dau so theo array
    if($carriers_number[$dauso] ){
        return $carriers_number[$dauso];
    }else{
        return "unknow";
    }
```
Code hoàn chình, dạng function, gọi ở đâu cũng được, một hàm giải quyết tất cả!

```php
/**
 * Detect carrier name by phone number
 *
 * @param string $number The input phone number
 * @return bool Name of the carrier, false if not found
 */
function detect_number ($number) {
    
<?PHP
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
    if (!preg_match('/^0[0-9]{9}$/', $number)) return "WRONG_NUMBER";

    $dauso = substr($number, 0, 3);
   
    // lấy danh sách dau so theo array
    if($carriers_number[$dauso] ){
        return $carriers_number[$dauso];
    }else{
        return "UNKNOW";
    }

}
?>
```

Chạy kiểm:
```php

$number = '0773166707';
$carrier = detect_number($number);
echo $carrier ;// Mobifone

$number = '0987654321';
$carrier = detect_number($number);
echo $carrier ;// Viettel

$wrong_number = '9876543210';
$carrier = detect_number($wrong_number);
echo $carrier; // UNKNOW

```
