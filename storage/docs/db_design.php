
----------   JSON Document   ----------
"users": {
    "uid": "UID00000000",
    "name": "administrator",
    "email": "administrator@gmail.com",
    "password": "admin000",
    "remember_token": "cQpZmioxjX",
    "roles": {
        "name": "admin",
        "permissions": "all",
    },
    "logs": {
        "01-01-2024 00:00:00": "login",
        "01-01-2024 01:07:46": "change password",
        "01-01-2024 06:35:08": "logout",
    },
    "settings": {}
}

"accounts": {
    "acc_id": "AID80018901",
    "qr_code": "",
    "display_name": "Account Test",
    "name": "accounttest",
    "email": "accounttest@gmail.com",
    "pasword": "accounttest",
    "remember_token": "28FOhm2g9w",
    "address": "Ho Chi Minh City",
    "phone": "0123456789",
    "status": "active",       //  [active, inactive, block]
    "descr": "This is an account test",
    "points": {
        "total": 1000,
        "remaining": 876,
        "rank": "diamond",
        "histories": {
            "03-01-2024 10:10:28": {
                "point_change": 76,
                "point_before": 800,
                "point_after": 876,
                "content": "Sell product"
            }
        }
    },
    logs: {
        "03-01-2024 09:00:00": "login",
        "03-01-2024 11:35:08": "logout",
    },
    settings: {}
}

"contacts": {
    "cid": "CID00008001",
    "name": "Contact Test",
    "email": "contacttest@gmail.com",
    "address": "Ho Chi Minh City",
    "phone": "0947859367",
    "status": "active",   //  [active, inactive, pause]
    "type": "potential_customers",    //  [potential-customers, visitors]
    "source": "youtube",      //  [facebook, youtube, tiktok, ...]
    "descr": "This is a contact test",
    "points": {
        "total": 1000,
        "remaining": 876,
        "rank": "diamond",
        "histories": {
            "03-01-2024 10:10:28": {
                "point_change": 76,
                "point_before": 800,
                "point_after": 876,
                "content": "Sell product"
            }
        }
    },
    "settings": {}
}

"products": {
    "pid": "PID00000001",
    "qr_code": "",
    "name": "Box of Hao Hao instant noodles",
    "type": "single",     //  [single, combo, variable]
    "category": "dry_food",   //  [dry_food, canned_food, drink, cold_type, houseware, disposable_items]
    "brand": 'AECook',    //  [...]
    "unit": "box",        //  [pcs, pair, box, bottle, kg]
    "point_trans": 200,
    "quantities": {
        "total": 150,
        "remaining": 48,
        "warning": 5
    },
    "prices": {
        "purchase": 105000,
        "sell": 135000,
        "discount": 120000,
        "currency_unit": "VND",   //  [VND, USD, EURO, YEN, RUP, ...]
    },
    "promotions": {
        "value": 20000,
        "currency_unit": "VND",   //  [VND, USD, EURO, YEN, RUP, ...]
        "type": "fixed",  //  [fixed, percent, gift]
    }
    media: {
        {
            path: "storage/public/products/thung-mi-tom-hao-hao.jpg",
            storage: ""
        },
        {
            path: "storage/public/products/thung-mi-tom-hao-hao-1.jpg",
            storage: ""
        }
    },
    rates: {
        star: 4.5,
        point: 9.1
    },
    setting: {}
}

"transactions": {
    "trans_id": "TID00005001",
    "name": "Sel product",
    "type": "purchase",
    "status": "done",
    "total_amount": 270000,
    "currency_unit": "VND"
    "tran_date": "2024-04-14 10:15:28"
    "products": {
        "pid": "PID00000001",
        "name": "Thùng mì tôm Hảo Hảo",
        "price_purchase": 105000,
        "price_sell": 135000,
        "currency_unit": "VND"
        "quantity": 2,
    },
    "setting": {}
}

"systems": {
    "domain": "https://localhost/foodtravel.test",
    "app_name": "FOOD TRAVEL",
    "app_title": "sells camping and travel food",
    "favicon": "",
    logo; "",
    "language": "vi",
    "styles": {
        "bg_color": "bg-cyan-600",
        "text_color": "text-black-600",
        "font_family": "Vetical, Time new roman",
        "font_size": "18px"
    }
}

----------   List Document   ----------
users {
    uid, name, email, password, remember_token
    roles; {name, permissions}
    logs: {date: content},
    settings: {}
}

accounts{
    acc_id, qr_code, display_name, address, phone, status, descr,
    auth: {name, email, pasword, remember_token},
    points: {
        total, remaining, rank,
        history: {
            date: {point_change, point_before, point_after, date, content}
        }
    }
    logs: {date: content},
    settings: {}
}

contacts {
    cid, name, email, address, phone, status, type, source, descr,
    settings: {}
}

products {
    pid, qr_code, name, type, category, brand, unit, point_trans
    quantities: {total, remaining, warning},
    prices: {purchase, sell, tax, currency_unit},
    media: {path, storage}
    rates: {star, point},
    settings: {}
}

transactions {
    trans_id, name, type, status,
    products: {
        pid, name, purchase, sell, quantity,
        promotions: {name, value, type}
    },
    setting: {}
}

systems {
    domain, app_name, app_title,favicon, logo, language,
    styles: {
        bg_color, text_color, font_family, font-size
    }
}
