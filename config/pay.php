<?php

return [
    'alipay' => [
        'app_id' => '2016092500591604',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2oZ+L72AzoJ0AhvbMOcdVLFRtJRQV3v9rqTi69/og/cbkF2o9bvEbsY10r5PEoGrJsebB4NIdE41Q8B1X/YxJsQjt73YF8PpBEAhHCF/MZKqRd2SJEHzWjGTM9XAFiuk5CbHi5yQziJ0Bce2zpPEKZA6zZaaAdGrQRHwKYVVwWfPDMQ9tK9XEkrw3VUwOh/sblst+G5MEPlf8uQVMjrxLJW1KAMD6FTq3FEU8fiizDXWDs2X55bYjT8pQFcHeOahx2TQIgTSJKcFsAi2OAsMyBmymvs8OdOOUydFVH35mHdK7eO+h8fm9hxAxGOmNshWoZTHNn3PpyETV8ewzPBuAQIDAQAB',
        'private_key' => 'MIIEowIBAAKCAQEAlb+gRyiQ6/byU+4aZ2oU/JqNrztItt1xsMBGtbixemPk92ZMpMpmof1Mu3+G7S7UbMVeG9aNbBEQ1AIql11QOorBAP4pW8/uQjofuZSlPwuncCnzAMa/3qVUBKnaQSEbt30q2dJLF4wpT8OYgFB3qJryMGWQWC49cpuOx+CvyqhyvExjoSHPImxuP2WS8eN//QWisIL/yYzjzR34tWIAK6QqUA3HmcCi+x0T6sXDSrwibBEKNbEzJYCq6F4ABIR+n4/aTrNUTZ7+f+pnNgFdy8tbfv+anr2aov2sxPFT41wqDcwIoiYkQAnxtNii3F2Ux82y+UIQtp6LzSCqbuKZ2QIDAQABAoIBADgiYDusej7qEEbkD6PKgVl7ujcA2y4pbq/aM+d095qwjaksAPkZIkYBBN2YXYTVtC2eArwevl7POuaudTbOdP+s+dKcc/aFyIOs9C2GCjfK75Y9M2mMF2qnwQoKfdVCSviKhCCpExsdoHLVGHqpL2HVy4nW2LglhUVMCMbmdB9cWERoqueishLC5B6IQe9v5zN0xr2P1fVv2lA272VPkWqGVPf0RhWtjQke0blH86Mikl5PfRPTd/bXcL1YOXztf1sbexWxpAM4TXDGmgNT4mkY8qWhFnv/lgfBFQWUUaHBu4WPtaiudYoUqbX8K+iirErHP644czUjCWX0amSMVXECgYEA15+Dv/iy72KtzMpoWKgALQXtHTX2x+QFU6d38jboEAffrTgmOPF7S2G8bIII+FgixoZXYjee+rzmZ0xSx7bIhsuJBhLg9HnwhfgNF6uqOAwdK+X/amLeFn/l6OAjXL1bVKpdov6zpO9JJD2zhAvL09+1oBKiDGEblySRDSxXdLUCgYEAsco7vZy5gjBr9LD/Lo7vj76AnAvC9k6nQR4PUWeCjFd/V/ZTw11XSguma7LfRmXw8sQu5J2VDTu6T7sWOcgiJfwTBN0/ktjWHScWytNrmwgOrqi1COKe9gIxtux9xxFLQPS7Zu/cA0kE3xG77TxvpecGiAha1LTQkoIMgAqRSxUCgYEAo83XrfAGJ1ukww4FRUyjjZCR+H31cxdjgJCZy5UwqHUC1LnyN5Ij4zllhl0m6VszV/PY0JGGod79ff36aSQPpG9dMhMHeFJmia/OamwMDTYOtzmr1qszIo6ZH1efJaXoiyI9rkSmPqdVvkVtaeP4PYYWmXtuRc9DwYeS9hn4en0CgYA+wXC27EQ65RamJ3fbmk6LQaYp7qjhwj+dZ5vmkw/ss9HaXbORaTgvhc83gsr3EXKsbn1S6yC6rBOGozYkLTWIjOK1u9b94ZYqcirEaz43We+8zQYh3cRYd8vOksmO49bZVcl0e0QA0NxsVNkt00BhohuXFsPhAvYAUPFSnOhORQKBgEbXbEZ/MFz7z1jAYtwuhZe0sYRvY57kWZ5yCVfW/TU0cpfhmNUkS7Pki8T/u18s2LCoc9vioQfUTmsmoPl98ncGD2ldQCloUXapqwMM4yI/ZVjNsN4VuM8iBCD7OXFK1i7kU4QtDhSTBOEFiOoV/QWSXHJpq5FaZqXnYqTez88B',
        'log' => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'appid' => '',
        'mch_id' => '',
        'key' => '',
        'cert_client' => '',
        'cert_key' => '',
        'log' => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
