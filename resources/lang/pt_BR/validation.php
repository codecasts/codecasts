<?php

return [

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

    'accepted'             => 'O campo :attribute precisa ser aceito.',
    'active_url'           => 'O campo :attribute precisa ser uma URL válida.',
    'after'                => 'O campo :attribute precisa ser uma data após :date.',
    'alpha'                => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash'           => 'O campo :attribute deve conter apenas letras, números, e traços.',
    'alpha_num'            => 'O campo :attribute deve conter apenas letras e números.',
    'array'                => 'O campo :attribute precisa ser uma matriz.',
    'before'               => 'O campo :attribute precisa ser uma data antes de :date.',
    'between'              => [
        'numeric' => 'O número :attribute precisa ser entre :min e :max.',
        'file'    => 'O arquivo :attribute precisa ter entre :min e :max kilobytes.',
        'string'  => 'O texto :attribute precisa ter entre :min e :max carácteres.',
        'array'   => 'A matriz :attribute precisa ter itens entre :min e :max.',
    ],
    'boolean'              => 'O campo :attribute precisa ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação :attribute não é válida.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_format'          => 'O campo :attribute não está no formato :format.',
    'different'            => 'Os campos :attribute e :other precisam ser diferentes.',
    'digits'               => 'O campo :attribute precisa ter :digits dígitos.',
    'digits_between'       => 'O campo :attribute precisa ter entre :min e :max dígitos.',
    'dimensions'           => 'Os valores de :attribute tem dimensões de imagem inválidas.',
    'distinct'             => 'O campo :attribute tem um valor duplicado.',
    'email'                => 'O campo :attribute precisa ser um endereço de email válido.',
    'exists'               => 'O item selecionado :attribute é inválido.',
    'file'                 => ':attribute precisa ser um arquivo.',
    'filled'               => 'O campo :attribute é obrigatório.',
    'image'                => ':attribute precisa ser uma imagem.',
    'in'                   => 'O item selecionado :attribute é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute precisa ser um inteiro.',
    'ip'                   => 'O campo :attribute precisa ser um endereço IP válido.',
    'json'                 => ':attribute precisa ser uma string JSON válida.',
    'max'                  => [
        'numeric' => ':attribute não deve ser maior que :max.',
        'file'    => ':attribute não deve ter mais que :max kilobytes.',
        'string'  => ':attribute não deve ser maior que :max carácteres.',
        'array'   => ':attribute não deve ter mais que :max itens.',
    ],
    'mimes'                => 'O arquivo :attribute precisa ser do tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute precisa ser pelo menos :min.',
        'file'    => 'O arquivo :attribute precisa ter pelo menos :min kilobytes.',
        'string'  => ':attribute precisa ter pelo menos :min carácteres.',
        'array'   => 'A matriz :attribute precisa ter pelo menos :min itens.',
    ],
    'not_in'               => 'O item selecionado :attribute é inválido.',
    'numeric'              => ':attribute precisa ser um número.',
    'present'              => 'O campo :attribute é obrigatório.',
    'regex'                => 'O formato de :attribute é inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute é obrigatório a menos que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values estiver(em) presente(s).',
    'required_with_all'    => 'O campo :attribute é obrigatório quando todos :values estiver(em) presente(s).',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não estiverem presentes.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values estiverem presentes.',
    'same'                 => ':attribute e :other precisam ser iguais.',
    'size'                 => [
        'numeric' => ':attribute precisa ter :size.',
        'file'    => 'O arquivo :attribute precisa ter :size kilobytes.',
        'string'  => ':attribute precisa ter :size carácteres.',
        'array'   => ':attribute precisa conter :size itens.',
    ],
    'string'               => ':attribute precisa ser um string.',
    'timezone'             => ':attribute precisa ser uma zona válida.',
    'unique'               => ':attribute já está em uso.',
    'url'                  => 'O formato de :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
