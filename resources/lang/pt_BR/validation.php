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

    'accepted'             => ' :attribute precisa ser aceito.',
    'active_url'           => ' :attribute precisa ser uma URL válida.',
    'after'                => ' :attribute precisa ser uma data após :date.',
    'alpha'                => ' :attribute só pode conter apenas letras.',
    'alpha_dash'           => ' :attribute só pode conter letras, números e traços',
    'alpha_num'            => ' :attribute só pode conter letras e números',
    'array'                => ' :attribute deve ser um array.',
    'before'               => ' :attribute deve ser uma data anterior a :date.',
    'between'              => [
        'numeric' => ' :attribute deve estar entre :min e :max',
        'file'    => ' :attribute deve estar entre :min e :max kilobytes.',
        'string'  => ' :attribute deve estar entre :min e :max caracteres.',
        'array'   => ' :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => ' :attribute campo deve ser verdadeiro ou falso.',
    'confirmed'            => ' :attribute confirmação não corresponde.',
    'date'                 => ' :attribute não é uma data válida.',
    'date_format'          => ' :attribute não coincide com o formato :format.',
    'different'            => ' :attribute e :other devem ser diferentes.',
    'digits'               => ' :attribute deve ter :digits dígitos.',
    'digits_between'       => ' :attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => ' :attribute tem dimensões inválidas de imagem.',
    'distinct'             => ' :attribute tem um valor duplicado.',
    'email'                => ' :attribute deve ser um endereço de e-mail válido.',
    'exists'               => ' :attribute selecionado é inválido.',
    'file'                 => ' :attribute deve ser um arquivo',
    'filled'               => ' :attribute é um campo obrigatório',
    'image'                => ' :attribute deve ser uma imagem.',
    'in'                   => ' :attribute selecionado é inválido',
    'in_array'             => ' :attribute não existe em :other.',
    'integer'              => ' :attribute deve ser um inteiro.',
    'ip'                   => ' :attribute deve ser um endereço IP válido.',
    'json'                 => ' :attribute deve ser um JSON válido.',
    'max'                  => [
        'numeric' => ' :attribute não deve ser maior que :max.',
        'file'    => ' :attribute não deve ter mais que :max kilobytes.',
        'string'  => ' :attribute não deve ter mais que :max caracteres.',
        'array'   => ' :attribute não pode ter mais que :max itens.',
    ],
    'mimes'                => ' :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ' :attribute deve ser no mínimo :min.',
        'file'    => ' :attribute deve ter no mínimo :min kilobytes.',
        'string'  => ' :attribute deve ter no mínimo :min caracteres.',
        'array'   => ' :attribute deve ter no mínimo :min itens.',
    ],
    'not_in'               => ' :attribute selecionado é inválido.',
    'numeric'              => ' O campo :attribute deve ser um número.',
    'present'              => ' O campo :attribute deve estar presente.',
    'regex'                => ' O formato de :attribute é inválido.',
    'required'             => ' O campo :attribute é obrigatório.',
    'required_if'          => ' O campo :attribute é obrigaório quando :other é :value.',
    'required_unless'      => ' O campo :attribute é obrigatório a menos que :other está em :values.',
    'required_with'        => ' O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => ' O campo :attribute é obrigatório quando :values estão presentes.',
    'required_without'     => ' O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => ' O campo :attribute é obrigatório quando nenhum destes estão presentes: :values.',
    'same'                 => ' :attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => ' :attribute deve ser :size.',
        'file'    => ' :attribute deve ter :size kilobytes.',
        'string'  => ' :attribute deve ter :size caracteres.',
        'array'   => ' :attribute deve conter :size itens.',
    ],
    'string'               => ' :attribute deve ser uma string',
    'timezone'             => ' :attribute deve ser uma timezone válida.',
    'unique'               => ' :attribute já está em uso.',
    'url'                  => ' O formato de :attribute é inválido.',

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
