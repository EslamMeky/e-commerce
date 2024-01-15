const API='ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T1RRM056ZzVMQ0p1WVcxbElqb2lNVGN3TXpJMk56SXdOQzQzTXpJd01qVWlmUS40SWdRenI0dEhBajBlRXVlYy1jdC1LdGk0dDNkSmc4YkY0c2hhY3RZbzhsN2wxeEZGUmtGVS1WTkdVX3l2ZThiM2NDWjJQY2RnLXFPaV9GVWFnX0RIUQ=='

async function firstStep(){
    let data={
        "api_key": API
    }

    let request = await fetch(' https://accept.paymob.com/api/auth/tokens',{
        method : 'post',
        headers : {'content-Type' : 'application/json'},
        body : JSON.stringify(data)
    } )

    let response  = await request.json()
    let token  = response.token
    secondStep(token)
}

async function secondStep(token)
{
    let data={  "auth_token": token,
        "delivery_needed": "false",
        "amount_cents": "1000",
        "currency": "EGP",

        "items": [  ],

    }
    let request = await fetch('https://accept.paymob.com/api/ecommerce/orders',{
        method : 'post',
        headers : {'content-Type' : 'application/json'},
        body : JSON.stringify(data)
    } )

    let response = await request.json()
    let id = response.id
    thirdStep(token ,id)
}

async function thirdStep(token ,id){
    let data={ "auth_token":token,
        "amount_cents": "1000",
        "expiration": 3600,
        "order_id": id,
        "billing_data": {
            "apartment": "803",
            "email": "claudette09@exa.com",
            "floor": "42",
            "first_name": "Clifford",
            "street": "Ethan Land",
            "building": "8028",
            "phone_number": "+86(8)9135210487",
            "shipping_method": "PKG",
            "postal_code": "01898",
            "city": "Jaskolskiburgh",
            "country": "CR",
            "last_name": "Nicolas",
            "state": "Utah"
        },
        "currency": "EGP",
        "integration_id": 4420612
    }
    let request = await fetch(' https://accept.paymob.com/api/acceptance/payment_keys',{
        method : 'post',
        headers : {'content-Type' : 'application/json'},
        body : JSON.stringify(data)
    })
    let response = await request.json()
    let thetoken =response.token
    cardPayment(thetoken)

}

async function cardPayment(token)
{
    let iframeURL=`https://accept.paymob.com/api/acceptance/iframes/810252?payment_token=${token}`
    location.href = iframeURL
}

