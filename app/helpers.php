<?php 

function validateError($endpoint, $errors)
{
    return [
        "success"=> 0,
        "code"=> 400,
        "meta"=> [
            "method"=> "POST",
            "endpoint"=> $endpoint
        ],
        "data" => [],
        "errors" => [
            "message"=> "The request parameters are incorrect, please make sure to follow the documentation about request parameters of the resource.",
            "code"=> 400002,
            "validation" => [
                [
                    "attribute"=> "name",
                    "errors"=> [
                      [
                        "key"=> "max",
                        "message"=> "The name may not be greater than 64 characters."
                      ]
                    ]
                ],
                [
                    "attribute"=> "query",
                    "errors"=> [
                      [
                        "key"=> "max",
                        "message"=> "The name may not be greater than 64 characters."
                      ]
                    ]
                ],
                [
                    "attribute"=> "latitude",
                    "errors"=> [
                      [
                        "key"=> "integer",
                        "message"=> "The latitude must be integer."
                      ]
                    ]
                ],
                [
                    "attribute"=> "longitude",
                    "errors"=> [
                      [
                        "key"=> "integer",
                        "message"=> "The longitude must be integer."
                      ]
                    ]
                ],
                [
                    "attribute"=> "zoom",
                    "errors"=> [
                      [
                        "key"=> "integer",
                        "message"=> "The longitude must be integer."
                      ]
                    ]
                ],
            ]
        ],
        "duration" => microtime(true) - LARAVEL_START
    ];
}

function getResource($endpoint,$data)
{
  return [
    "success"=> 1,
    "code"=> 200,
    "meta"=> [
        "method"=> "GET",
        "endpoint"=> $endpoint,
        "limit"=> 30,
        "offset"=> 0,
        "total"=> $data->count()
    ],
    "data"=> $data,
    "errors"=> [],
    "duration"=> microtime(true) - LARAVEL_START

];
}

function showResource($endpoint,$data)
{
  return [
    "success"=> 1,
    "code"=> 200,
    "meta"=> [
      "method"=> "GET",
      "endpoint"=> $endpoint
    ],
    "data"=> $data,
    "errors"=> [],
    "duration"=> microtime(true) - LARAVEL_START
  ];
}
function dataNotFound($endpoint)
{
  return [
    "success"=> 0,
    "code"=> 404,
    "meta"=> [
      "method"=> "GET",
      "endpoint"=> $endpoint
    ],
    "data"=> [],
    "errors"=> [
      "message"=> "The resource that matches the request ID does not found.",
      "code"=> 404002
    ],
    "duration"=> microtime(true) - LARAVEL_START
  ];
}

function deleteResource($endpoint){
  return [
    "success"=> 1,
    "code"=> 200,
    "meta"=> [
      "method"=> "DELETE",
      "endpoint"=> $endpoint
    ],
    "data"=> [
      "deleted"=> 1
    ],
    "errors"=> [],
    "duration"=> microtime(true) - LARAVEL_START
  ];
}

function postResource($endpoint, $data)
{
  
    return [
      'success' => '1', 'code' => '201', 
      'meta' => ['method' => 'POST', 'endpoint' => $endpoint],
      'data' => ['id' => $data->id],
      "errors" => [],
      "duration" => microtime(true) - LARAVEL_START
  ];
}

function updateResource($endpoint){
  return [
    "success"=> 1,
    "code"=> 200,
    "meta"=> [
      "method"=> "PUT",
      "endpoint"=> $endpoint
    ],
    "data"=> [
      "updated"=> 1
    ],
    "errors"=> [],
    "duration"=> microtime(true) - LARAVEL_START
  ];
}

function shopCouponError($endpoint, $data)
{
  return [
    "success"=> 1,
    "code"=> 400,
    "meta"=> [
      "method"=> "POST",
      "endpoint"=> $endpoint
    ],
    "data"=> [],
    "errors"=> [
      "attribute"=> "shop_id",
      "errors"=> [
        [
          "key"=> "required",
          "message"=> "The shop id field is required."
        ],
        [
          "key"=> "integer",
          "message"=> "The shop id must be integer."
        ]
      ]
    ],
    "duration"=> microtime(true) - LARAVEL_START
  ];
}

function couponValidation($endpoint)
{
    return [
      "success" => 0,
      "code" => 400,
      "meta" => [
        "method" => "POST",
        "endpoint" => $endpoint
      ],
      "data" => [], 
      "erorrs" => [
        "message"=> "The request parameters are incorrect, please make sure to follow the documentation about request parameters of the resource.",
        "code"=> 400002,
        "validation" => [
          [
            "attribute"=> "name",
            "errors"=> [
              [
                "key"=> "required",
                "message"=> "The name field is required."
              ],
              [
                "key"=> "max",
                "message"=> "The name may not be greater than 128 characters."
              ]
            ]
          ],

          [
            "attribute"=> "discount_type",
            "errors"=> [
              [
                "key"=> "required",
                "message"=> "The discount_type field is required."
              ],
              [
                "key"=> "max",
                "message"=> "The selected discount type is invalid."
              ]
            ]
          ],


          [
            "attribute"=> "amount",
            "errors"=> [
              [
                "key"=> "required",
                "message"=> "The amount field is required."
              ],
              [
                "key"=> "max",
                "message"=> "The amount may not be greater than 128 characters."
              ]
            ]
          ],

          [
            "attribute"=> "amount",
            "errors"=> [
              
              [
                "key"=> "max",
                "message"=> "The amount must be integer."
              ]
            ]
          ],

          [
            "attribute"=> "code",
            "errors"=> [
              
              [
                "key"=> "integer",
                "message"=> "The code must be integer."
              ]
            ]
          ],

          [
            "attribute"=> "start_datetime",
            "errors"=> [
              
              [
                "key"=> "invalid",
                "message"=> "The start datetime must be datetime format"
              ]
            ]
          ],

          [
            "attribute"=> "start_endtime",
            "errors"=> [
              
              [
                "key"=> "invalid",
                "message"=> "The start datetime must be datetime format"
              ]
            ]
          ],

          [
            "attribute"=> "coupon_type",
            "errors"=> [
              
              [
                "key"=> "invalid",
                "message"=> "The selected coupon type is invalid."
              ]
            ]
          ],

          [
            "attribute"=> "used_count",
            "errors"=> [
              
              [
                "key"=> "integer",
                "message"=> "The used count must be integer."
              ]
            ]
          ],


        ]
        ],
      "duration" => microtime(true) - LARAVEL_START
    ];
}

function duplicateKey($endpoint){
  return [
    "success"=> 0,
    "code"=> 409,
    "meta"=> [
      "method"=> "POST",
      "endpoint"=> "1/coupons/1/shops"
    ],
    "data"=> [],
    "errors"=> [
      "message"=> "The inserting resource was already registered.",
      "code"=> 409001
  ],
  "duration" => microtime(true) - LARAVEL_START

  ];
}