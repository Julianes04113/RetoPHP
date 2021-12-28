<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted'             => 'Acest câmp trebuie acceptat.',
    'accepted_if'          => 'This field must be accepted when :other is :value.',
    'active_url'           => 'Aceasta nu este o adresă URL validă.',
    'after'                => 'Aceasta trebuie să fie o dată după :date.',
    'after_or_equal'       => 'Aceasta trebuie să fie o dată după sau egală cu :date.',
    'alpha'                => 'Acest câmp poate conține numai litere.',
    'alpha_dash'           => 'Acest câmp poate conține numai litere, numere, liniuțe și sublinieri.',
    'alpha_num'            => 'Acest câmp poate conține numai litere și numere.',
    'array'                => 'Acest câmp trebuie să fie o matrice.',
    'attached'             => 'Acest câmp este deja atașat.',
    'before'               => 'Aceasta trebuie să fie o dată înainte de :date.',
    'before_or_equal'      => 'Aceasta trebuie să fie o dată înainte sau egală cu :date.',
    'between'              => [
        'array'   => 'This content must have between :min and :max items.',
        'file'    => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string'  => 'This string must be between :min and :max characters.',
    ],
    'boolean'              => 'Acest câmp trebuie să fie adevărat sau fals.',
    'confirmed'            => 'Confirmarea nu se potrivește.',
    'current_password'     => 'The password is incorrect.',
    'date'                 => 'Aceasta nu este o dată validă.',
    'date_equals'          => 'Aceasta trebuie să fie o dată egală cu :date.',
    'date_format'          => 'Acest lucru nu se potrivește cu formatul :format.',
    'declined'             => 'This value must be declined.',
    'declined_if'          => 'This value must be declined when :other is :value.',
    'different'            => 'Această valoare trebuie să fie diferită de :other.',
    'digits'               => 'Acest lucru trebuie să fie :digits cifre.',
    'digits_between'       => 'Aceasta trebuie să fie între :min și :max de cifre.',
    'dimensions'           => 'Această imagine are dimensiuni nevalide.',
    'distinct'             => 'Acest câmp are o valoare duplicată.',
    'email'                => 'Aceasta trebuie să fie o adresă de e-mail validă.',
    'ends_with'            => 'Aceasta trebuie să se încheie cu una dintre următoarele: :values.',
    'exists'               => 'Valoarea selectată este nevalidă.',
    'file'                 => 'Conținutul trebuie să fie un fișier.',
    'filled'               => 'Acest câmp trebuie să aibă o valoare.',
    'gt'                   => [
        'array'   => 'The content must have more than :value items.',
        'file'    => 'The file size must be greater than :value kilobytes.',
        'numeric' => 'The value must be greater than :value.',
        'string'  => 'The string must be greater than :value characters.',
    ],
    'gte'                  => [
        'array'   => 'The content must have :value items or more.',
        'file'    => 'The file size must be greater than or equal :value kilobytes.',
        'numeric' => 'The value must be greater than or equal :value.',
        'string'  => 'The string must be greater than or equal :value characters.',
    ],
    'image'                => 'Asta trebuie să fie o imagine.',
    'in'                   => 'Valoarea selectată este nevalidă.',
    'in_array'             => 'Această valoare nu există în :other.',
    'integer'              => 'Acesta trebuie să fie un număr întreg.',
    'ip'                   => 'Aceasta trebuie să fie o adresă IP validă.',
    'ipv4'                 => 'Aceasta trebuie să fie o adresă IPv4 validă.',
    'ipv6'                 => 'Aceasta trebuie să fie o adresă IPv6 validă.',
    'json'                 => 'Acesta trebuie să fie un șir JSON valid.',
    'lt'                   => [
        'array'   => 'The content must have less than :value items.',
        'file'    => 'The file size must be less than :value kilobytes.',
        'numeric' => 'The value must be less than :value.',
        'string'  => 'The string must be less than :value characters.',
    ],
    'lte'                  => [
        'array'   => 'The content must not have more than :value items.',
        'file'    => 'The file size must be less than or equal :value kilobytes.',
        'numeric' => 'The value must be less than or equal :value.',
        'string'  => 'The string must be less than or equal :value characters.',
    ],
    'max'                  => [
        'array'   => 'The content may not have more than :max items.',
        'file'    => 'The file size may not be greater than :max kilobytes.',
        'numeric' => 'The value may not be greater than :max.',
        'string'  => 'The string may not be greater than :max characters.',
    ],
    'mimes'                => 'Acesta trebuie să fie un fișier de tip: :values.',
    'mimetypes'            => 'Acesta trebuie să fie un fișier de tip: :values.',
    'min'                  => [
        'array'   => 'The value must have at least :min items.',
        'file'    => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string'  => 'The string must be at least :min characters.',
    ],
    'multiple_of'          => 'Valoarea trebuie să fie un multiplu de :value',
    'not_in'               => 'Valoarea selectată este nevalidă.',
    'not_regex'            => 'Acest format este nevalid.',
    'numeric'              => 'Acesta trebuie să fie un număr.',
    'password'             => 'Parola este incorectă.',
    'present'              => 'Acest câmp trebuie să fie prezent.',
    'prohibited'           => 'Acest câmp este interzis.',
    'prohibited_if'        => 'Acest câmp este interzis atunci când :other este :value.',
    'prohibited_unless'    => 'Acest câmp este interzis, cu excepția cazului în care :other este în :values.',
    'prohibits'            => 'This field prohibits :other from being present.',
    'regex'                => 'Acest format este nevalid.',
    'relatable'            => 'Este posibil ca acest câmp să nu fie asociat cu această resursă.',
    'required'             => 'Acest câmp este obligatoriu.',
    'required_if'          => 'Acest câmp este necesar atunci când :other este :value.',
    'required_unless'      => 'Acest câmp este necesar, cu excepția cazului în :other este în :values.',
    'required_with'        => 'Acest câmp este necesar atunci când :values este prezent.',
    'required_with_all'    => 'Acest câmp este necesar atunci când :values sunt prezente.',
    'required_without'     => 'Acest câmp este necesar atunci când :values nu este prezent.',
    'required_without_all' => 'Acest câmp este necesar atunci când nici unul dintre :values sunt prezente.',
    'same'                 => 'Valoarea acestui câmp trebuie să se potrivească cu cea de la :other.',
    'size'                 => [
        'array'   => 'The content must contain :size items.',
        'file'    => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string'  => 'The string must be :size characters.',
    ],
    'starts_with'          => 'Aceasta trebuie să înceapă cu una dintre următoarele: :values.',
    'string'               => 'Asta trebuie să fie o sfoară.',
    'timezone'             => 'Aceasta trebuie să fie o zonă validă.',
    'unique'               => 'Acest lucru a fost deja luat.',
    'uploaded'             => 'Acest lucru nu a reușit să încarce.',
    'url'                  => 'Acest format este nevalid.',
    'uuid'                 => 'Acesta trebuie să fie un UUID valid.',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
