<?php

return [
    'alipay' => [
        'app_id' => '2016092500591604',
        'ali_public_key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB',
        'private_key' => 'MIIEowIBAAKCAQEAxkhKC7DVndse6m6zeRRLR1T9UMNidq2WZQL1XEIhOn3xQH5tSB27Deim2jwedirHelr0sx4buu7kDviI/eMUeqZ2RL33rlQ5fHm6gAv4kp/fvjhG0PGfAP8ZKl1uzlroqPSXscfTwnFFG8SIdT+X0pgzf9Jk1J45cJ2WeFcdyZCRfrNxLbNXjICtxb8PtduVmcnq+j03gfVoOSsbSgRdCxpXHjh0gw3Dzy7YC8jBuOgX67bhXwxLA4sKt9Gb93krdx0wLrpnlih8hls8NcjuO+gdbqvWZp8rKx+3zSXzzqNAMvnqQFC+35Ex4wkj5Dg+qij9u0ZQzKbWwWBfEiNqPQIDAQABAoIBAQCO4Fg6xFmpPdOxKcO5Y5468Er4f1HcIolUkCUtLZm0BDxrNK6aYJIBG7vfVaK9k2XaDOB2kSN6N9mtz/kmuRJwrrJaJmjq/VXPFAgHbJjZTspyzyp4NSNWHHuNw3WszGUKGfWU7WDxo50gvSV3FzPXVEUHvhtZ+gl51JQwctXL/1ORte2jvmpuxX5gOCCVPWyHxE9XdS15E8fXjy1gHClzjZicpXvUkTK4i1MlwfX90DIx5GyV3S/70kOnOkUa82ngbYKKXlwPuJVboRmg8+GL8ICFQ5KBrOafCTcdLn3JolkV7HEj9TN5xKJM3Da4vLjFKHrW2yoZ8z+oy0Yz4aoBAoGBAOZahQ+LBH1CQc/+9kzfMqsJzmuZPrsIJXEsDLMYyhOEmWqcJS6nha7OBpbgGCAarvIF0cLjof+tqHollcoaiwCo4uT4y2wqCEeGl1Om7ETTZKxv34D5sq4eRjNCzU4TCI9Sq1l8uvlbI4XCyK/tI3NIRGyS8vzOKxUU4FhYEpttAoGBANxbrw6e2DxF6MDc0rs4Vbot4UPQgvK0svJvp9sqBTJTP4CvA76gLVxKrR0KGHoRX+Abopnk9nh50yDvObbyWejz1LXaSuMPYVx7+pwtH95GSQA1M9qUWSqhTGi0/WKvgQCgyVhA7Upx9ADx/IUGdUeT2ILDVTAOzdfQFtJMvHgRAoGAMZrypos4V0UKaSEtpxY1khGViyRAFwTFE176CSNgeN2IMCYZ97cJmcAyORFfAKLeY64PItnkS+v4qP0pCZG3t1enLMnK/Kr8h3Kbad87aALh3iRlTB/5c3d/hJBxJ8v/fuW9kpLCrOoMd0Sf9QqrJKs+WOc4PmqjanHJchzdPO0CgYBSlgIL5riADmtnLNvF0x0+A8fzVIhfUh3nArXUS/FapRydq/opTXrypgIvagM2bKCUK4dLSiadjHr2UvI8gKP1zLyh00hRxQfmU4jfU4IoGgtuCoJ+ny6z7XPnoj186O3eQGR1sQ+94OtkF01excbapqx0haS9uC6pfZGwC5ZvIQKBgBQG5mBI3sxeGeJTpj1q1X+pGksZAnx2QAyESJIVkxVmKxZDHvwL5BRjDiFQoM3HKRb62hNuadgl6oeYtVVjCod0EJlEg7ujnCaQ2rWEbwZF/R9WKO7q7/A5S+Rt1dCg4ELptFtbatrDzWwS5U7SQUhrtu9iv48Pw8CODsG265GN',
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
