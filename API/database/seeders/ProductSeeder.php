<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $specifications = [
            [
                "spec_name" => "Mic",
                "spec_value" => "Yes"
            ],
            [
                "spec_name" => "Size",
                "spec_value" => "52mm * 150mm"
            ],
            [
                "spec_name" => "Weight",
                "spec_value" => "244 (g)"
            ],
            [
                "spec_name" => "Battery life (Hrs)",
                "spec_value" => "399"
            ],
            [
                "spec_name" => "Colors",
                "spec_value" => "Red, Green, Black"
            ]
        ];

        // "specification" => json_encode($specifications),

        $products = [
            [
                "name" => "SlimFit Matte Phone Case",
                "price" => 19.99,
                "description" => "The SlimFit Matte Phone Case is designed to fit perfectly with iPhone X and XS, providing a sleek and stylish look.",
                "rating" => 4.7,
                "inStock" => 20,
                "imagePaths" => json_encode([
                    "https://i5.walmartimages.com/asr/da0597fe-bd56-494f-bc36-52c9decc4d05.f08e247507471326b4b61acbb360ca58.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF",
                    "https://i5.walmartimages.com/asr/da0597fe-bd56-494f-bc36-52c9decc4d05.f08e247507471326b4b61acbb360ca58.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF",
                    "https://i5.walmartimages.com/asr/da0597fe-bd56-494f-bc36-52c9decc4d05.f08e247507471326b4b61acbb360ca58.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF",
                    "https://i5.walmartimages.com/asr/da0597fe-bd56-494f-bc36-52c9decc4d05.f08e247507471326b4b61acbb360ca58.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Rugged Armor Phone Case",
                "price" => 24.99,
                "description" => "The Rugged Armor Phone Case is built tough for Samsung Galaxy S20, providing military-grade protection and a stylish look.",
                "rating" => 4.9,
                "inStock" => 15,
                "imagePaths" => json_encode([
                    "https://www.spigen.com/cdn/shop/products/title_ipxi_ra_03_1200x1200.jpg?v=1620839336",
                    "https://www.spigen.com/cdn/shop/products/title_ipxi_ra_03_1200x1200.jpg?v=1620839336",
                    "https://www.spigen.com/cdn/shop/products/title_ipxi_ra_03_1200x1200.jpg?v=1620839336",
                    "https://www.spigen.com/cdn/shop/products/title_ipxi_ra_03_1200x1200.jpg?v=1620839336",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Clear Transparent Phone Case",
                "price" => 14.99,
                "description" => "The Clear Transparent Phone Case offers a minimalist design, showcasing the natural beauty of your iPhone 11 Pro.",
                "rating" => 4.5,
                "inStock" => 30,
                "imagePaths" => json_encode([
                    "https://media-ik.croma.com/prod/https://media.croma.com/image/upload/v1638264206/Croma%20Assets/Communication/Cases%20and%20Covers/Images/244540_emm1jm.png?tr=w-600",
                    "https://media-ik.croma.com/prod/https://media.croma.com/image/upload/v1638264206/Croma%20Assets/Communication/Cases%20and%20Covers/Images/244540_emm1jm.png?tr=w-600",
                    "https://media-ik.croma.com/prod/https://media.croma.com/image/upload/v1638264206/Croma%20Assets/Communication/Cases%20and%20Covers/Images/244540_emm1jm.png?tr=w-600",
                    "https://media-ik.croma.com/prod/https://media.croma.com/image/upload/v1638264206/Croma%20Assets/Communication/Cases%20and%20Covers/Images/244540_emm1jm.png?tr=w-600",
                
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Leather Wallet Folio Case",
                "price" => 29.99,
                "description" => "The Leather Wallet Folio Case provides all-around protection and convenience with card slots for your iPhone 12.",
                "rating" => 4.8,
                "inStock" => 25,
                "imagePaths" => json_encode([
                    "https://i5.walmartimages.com/asr/281f7ec2-06cc-4b06-95bc-b157df1e46a6.9d9226dbb17824b5c1c2c886fd3a42aa.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF",
                    "https://i5.walmartimages.com/asr/281f7ec2-06cc-4b06-95bc-b157df1e46a6.9d9226dbb17824b5c1c2c886fd3a42aa.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF",
                    "https://i5.walmartimages.com/asr/281f7ec2-06cc-4b06-95bc-b157df1e46a6.9d9226dbb17824b5c1c2c886fd3a42aa.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF",
                    "https://i5.walmartimages.com/asr/281f7ec2-06cc-4b06-95bc-b157df1e46a6.9d9226dbb17824b5c1c2c886fd3a42aa.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Glow-in-the-Dark Phone Case",
                "price" => 17.99,
                "description" => "Stand out from the crowd with the Glow-in-the-Dark Phone Case, providing a vibrant and unique look for your Samsung Galaxy S10.",
                "rating" => 4.6,
                "inStock" => 18,
                "imagePaths" => json_encode([
                    "https://case-face.co.uk/wp-content/uploads/neon-green-silicone-iphone-13-pro-cover.png",
                    "https://case-face.co.uk/wp-content/uploads/neon-green-silicone-iphone-13-pro-cover.png",
                    "https://case-face.co.uk/wp-content/uploads/neon-green-silicone-iphone-13-pro-cover.png",
                    "https://case-face.co.uk/wp-content/uploads/neon-green-silicone-iphone-13-pro-cover.png",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Tempered Glass Screen Protector",
                "price" => 9.99,
                "description" => "Protect your iPhone 12 Pro with a durable and ultra-clear Tempered Glass Screen Protector.",
                "rating" => 4.7,
                "inStock" => 50,
                "imagePaths" => json_encode([
                    "https://m.media-amazon.com/images/I/71NqqWOm7FL.jpg",
                    "https://m.media-amazon.com/images/I/71NqqWOm7FL.jpg",
                    "https://m.media-amazon.com/images/I/71NqqWOm7FL.jpg",
                    "https://m.media-amazon.com/images/I/71NqqWOm7FL.jpg",
                 
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Privacy Anti-Spy Screen Protector",
                "price" => 14.99,
                "description" => "Keep your conversations and data private with the Privacy Anti-Spy Screen Protector for Samsung Galaxy S21.",
                "rating" => 4.8,
                "inStock" => 40,
                "imagePaths" => json_encode([
                    "https://m.media-amazon.com/images/I/61o-SlzHxlL.jpg",
                    "https://m.media-amazon.com/images/I/61o-SlzHxlL.jpg",
                    "https://m.media-amazon.com/images/I/61o-SlzHxlL.jpg",
                    "https://m.media-amazon.com/images/I/61o-SlzHxlL.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Liquid Screen Protector",
                "price" => 12.99,
                "description" => "Apply the Liquid Screen Protector easily on any device for invisible and strong protection.",
                "rating" => 4.5,
                "inStock" => 60,
                "imagePaths" => json_encode([
                    "https://luvvitt.com/pub/media/catalog/product/cache/e4d64343b1bc593f1c5348fe05efa4a6/u/l/ultra-armor-liquid-screen-protector-glass-vial-2.jpg",
                    "https://luvvitt.com/pub/media/catalog/product/cache/e4d64343b1bc593f1c5348fe05efa4a6/u/l/ultra-armor-liquid-screen-protector-glass-vial-2.jpg",
                    "https://luvvitt.com/pub/media/catalog/product/cache/e4d64343b1bc593f1c5348fe05efa4a6/u/l/ultra-armor-liquid-screen-protector-glass-vial-2.jpg",
                    "https://luvvitt.com/pub/media/catalog/product/cache/e4d64343b1bc593f1c5348fe05efa4a6/u/l/ultra-armor-liquid-screen-protector-glass-vial-2.jpg",

                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2,
                "discount" => rand(0, 50)
            ],  [
                "name" => "Ultra-Slim 10000mAh Power Bank",
                "price" => 29.99,
                "description" => "Stay charged all day with the Ultra-Slim 10000mAh Power Bank, designed for fast and reliable charging on the go.",
                "rating" => 4.6,
                "inStock" => 25,
                "imagePaths" => json_encode([
                    "https://st1.informatica-barata.com/182531-large_default/powerbank-10000mah-xiaomi-mi-power-bank-3-ultra-compac-negra.jpg",
                    "https://st1.informatica-barata.com/182531-large_default/powerbank-10000mah-xiaomi-mi-power-bank-3-ultra-compac-negra.jpg",
                    "https://st1.informatica-barata.com/182531-large_default/powerbank-10000mah-xiaomi-mi-power-bank-3-ultra-compac-negra.jpg",
                    "https://st1.informatica-barata.com/182531-large_default/powerbank-10000mah-xiaomi-mi-power-bank-3-ultra-compac-negra.jpg",

                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "High-Capacity Solar Power Bank",
                "price" => 39.99,
                "description" => "Harness the power of the sun with the High-Capacity Solar Power Bank - your reliable companion for outdoor adventures.",
                "rating" => 4.8,
                "inStock" => 20,
                "imagePaths" => json_encode([
                    "https://images-cdn.ubuy.co.in/634179054dab21131b4d7c50-solar-power-bank-36800mah-portable-solar.jpg",
                    "https://images-cdn.ubuy.co.in/634179054dab21131b4d7c50-solar-power-bank-36800mah-portable-solar.jpg",
                    "https://images-cdn.ubuy.co.in/634179054dab21131b4d7c50-solar-power-bank-36800mah-portable-solar.jpg",
                    "https://images-cdn.ubuy.co.in/634179054dab21131b4d7c50-solar-power-bank-36800mah-portable-solar.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Compact 5000mAh Power Bank",
                "price" => 19.99,
                "description" => "The Compact 5000mAh Power Bank fits in your pocket and provides quick charging for your essential devices.",
                "rating" => 4.5,
                "inStock" => 15,
                "imagePaths" => json_encode([
                    "https://www.tradeinn.com/f/13981/139811553/natec-trevi-compact-5000mah-power-bank.jpg",
                    "https://www.tradeinn.com/f/13981/139811553/natec-trevi-compact-5000mah-power-bank.jpg",
                    "https://www.tradeinn.com/f/13981/139811553/natec-trevi-compact-5000mah-power-bank.jpg",
                    "https://www.tradeinn.com/f/13981/139811553/natec-trevi-compact-5000mah-power-bank.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Wireless Charging Power Bank",
                "price" => 34.99,
                "description" => "Charge your Qi-enabled devices wirelessly with the versatile Wireless Charging Power Bank.",
                "rating" => 4.7,
                "inStock" => 30,
                "imagePaths" => json_encode([
                    "https://www.sbsmobile.com/deu/204195-thickbox_default/10w-wireless-power-bank.jpg",
                    "https://www.sbsmobile.com/deu/204195-thickbox_default/10w-wireless-power-bank.jpg",
                    "https://www.sbsmobile.com/deu/204195-thickbox_default/10w-wireless-power-bank.jpg",
                    "https://www.sbsmobile.com/deu/204195-thickbox_default/10w-wireless-power-bank.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Rugged 15000mAh Power Bank",
                "price" => 49.99,
                "description" => "Built tough for extreme conditions, the Rugged 15000mAh Power Bank provides long-lasting power for your outdoor adventures.",
                "rating" => 4.9,
                "inStock" => 18,
                "imagePaths" => json_encode([
                    "https://veho-world.com/wp-content/uploads/2017/10/pebble_endurance_2.png",
                    "https://veho-world.com/wp-content/uploads/2017/10/pebble_endurance_2.png",
                    "https://veho-world.com/wp-content/uploads/2017/10/pebble_endurance_2.png",
                    "https://veho-world.com/wp-content/uploads/2017/10/pebble_endurance_2.png",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ], [
                "name" => "Braided Lightning Cable",
                "price" => 12.99,
                "description" => "Experience durability and fast charging with the Braided Lightning Cable, perfect for your iPhone or iPad.",
                "rating" => 4.7,
                "inStock" => 40,
                "imagePaths" => json_encode([
                    "https://www.harborfreight.com/media/catalog/product/cache/9fc4a8332f9638515cd199dd0f9238da/5/7/57489_W3.jpg",
                    "https://www.harborfreight.com/media/catalog/product/cache/9fc4a8332f9638515cd199dd0f9238da/5/7/57489_W3.jpg",
                    "https://www.harborfreight.com/media/catalog/product/cache/9fc4a8332f9638515cd199dd0f9238da/5/7/57489_W3.jpg",
                    "https://www.harborfreight.com/media/catalog/product/cache/9fc4a8332f9638515cd199dd0f9238da/5/7/57489_W3.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "USB-C Fast Charger",
                "price" => 14.99,
                "description" => "Charge your Android smartphones and USB-C devices quickly with the USB-C Fast Charger.",
                "rating" => 4.8,
                "inStock" => 30,
                "imagePaths" => json_encode([
                    "https://smartworldkenya.com/public/uploads/products/meta/fv5f8bz3Lol4ll1qN55gwqrSZhCwXoadcHenhpcc.jpeg",
                    "https://smartworldkenya.com/public/uploads/products/meta/fv5f8bz3Lol4ll1qN55gwqrSZhCwXoadcHenhpcc.jpeg",
                    "https://smartworldkenya.com/public/uploads/products/meta/fv5f8bz3Lol4ll1qN55gwqrSZhCwXoadcHenhpcc.jpeg",
                    "https://smartworldkenya.com/public/uploads/products/meta/fv5f8bz3Lol4ll1qN55gwqrSZhCwXoadcHenhpcc.jpeg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Magnetic Micro USB Cable",
                "price" => 14.99,
                "description" => "Connect and charge your devices with ease using the Magnetic Micro USB Cable, equipped with a strong magnetic connection.",
                "rating" => 4.5,
                "inStock" => 25,
                "imagePaths" => json_encode([
                    "https://www.sbsmobile.com/eir/190747-thickbox_default/magnetic-micro-usb-charging-cable.jpg",
                    "https://www.sbsmobile.com/eir/190747-thickbox_default/magnetic-micro-usb-charging-cable.jpg",
                    "https://www.sbsmobile.com/eir/190747-thickbox_default/magnetic-micro-usb-charging-cable.jpg",
                    "https://www.sbsmobile.com/eir/190747-thickbox_default/magnetic-micro-usb-charging-cable.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Multi-Port Charging Station",
                "price" => 34.99,
                "description" => "Charge multiple devices simultaneously with the Multi-Port Charging Station, an essential accessory for your home or office.",
                "rating" => 4.9,
                "inStock" => 20,
                "imagePaths" => json_encode([
                    "https://www.zdnet.com/a/img/resize/96172dbff4eedcf8c2e6b276bc259e966ccfd3b4/2021/12/20/e05ee468-a613-457f-b347-c14d3b5cef61/wotobeus-pd-100w-charger-eileen-brown-zdnet.png?auto=webp&fit=crop&height=900&width=1200",
                    "https://www.zdnet.com/a/img/resize/96172dbff4eedcf8c2e6b276bc259e966ccfd3b4/2021/12/20/e05ee468-a613-457f-b347-c14d3b5cef61/wotobeus-pd-100w-charger-eileen-brown-zdnet.png?auto=webp&fit=crop&height=900&width=1200",
                    "https://www.zdnet.com/a/img/resize/96172dbff4eedcf8c2e6b276bc259e966ccfd3b4/2021/12/20/e05ee468-a613-457f-b347-c14d3b5cef61/wotobeus-pd-100w-charger-eileen-brown-zdnet.png?auto=webp&fit=crop&height=900&width=1200",
                    "https://www.zdnet.com/a/img/resize/96172dbff4eedcf8c2e6b276bc259e966ccfd3b4/2021/12/20/e05ee468-a613-457f-b347-c14d3b5cef61/wotobeus-pd-100w-charger-eileen-brown-zdnet.png?auto=webp&fit=crop&height=900&width=1200",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "USB-A to USB-C Adapter",
                "price" => 9.99,
                "description" => "Connect your USB-C devices to standard USB-A ports with the USB-A to USB-C Adapter for seamless compatibility.",
                "rating" => 4.6,
                "inStock" => 35,
                "imagePaths" => json_encode([
                    "https://images-cdn.ubuy.co.in/633e6a52186502397b77feef-cablecreation-usb-3-1-usb-c-female-to.jpg",
                    "https://images-cdn.ubuy.co.in/633e6a52186502397b77feef-cablecreation-usb-3-1-usb-c-female-to.jpg",
                    "https://images-cdn.ubuy.co.in/633e6a52186502397b77feef-cablecreation-usb-3-1-usb-c-female-to.jpg",
                    "https://images-cdn.ubuy.co.in/633e6a52186502397b77feef-cablecreation-usb-3-1-usb-c-female-to.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Glamorous Glitter Phone Case",
                "price" => 16.99,
                "description" => "Add a touch of sparkle to your iPhone 13 with the Glamorous Glitter Phone Case, shining bright day and night.",
                "rating" => 4.7,
                "inStock" => 20,
                "imagePaths" => json_encode([
                    "https://artwow-images.s3.amazonaws.com/emerald-green-marble-agate-gold-glitter-glam-1-faux-glitter-decor-art-stylish-phone-case-by-anita-bella-jantz-rubberphonecase-62ead4a5bd47f2.94069813.png",
                    "https://artwow-images.s3.amazonaws.com/emerald-green-marble-agate-gold-glitter-glam-1-faux-glitter-decor-art-stylish-phone-case-by-anita-bella-jantz-rubberphonecase-62ead4a5bd47f2.94069813.png",
                    "https://artwow-images.s3.amazonaws.com/emerald-green-marble-agate-gold-glitter-glam-1-faux-glitter-decor-art-stylish-phone-case-by-anita-bella-jantz-rubberphonecase-62ead4a5bd47f2.94069813.png",
                    "https://artwow-images.s3.amazonaws.com/emerald-green-marble-agate-gold-glitter-glam-1-faux-glitter-decor-art-stylish-phone-case-by-anita-bella-jantz-rubberphonecase-62ead4a5bd47f2.94069813.png",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "ToughGuard Camo Phone Case",
                "price" => 22.99,
                "description" => "Embrace the wilderness with the ToughGuard Camo Phone Case, providing rugged protection for your Google Pixel 6 Pro.",
                "rating" => 4.8,
                "inStock" => 15,
                "imagePaths" => json_encode([
                    "https://i0.wp.com/tamfamgram.com/wp-content/uploads/2022/10/tough-iphone-case-matte-iphone-14-pro-max-front-635c349be6097-1.jpg?fit=2000%2C2000&ssl=1",
                    "https://i0.wp.com/tamfamgram.com/wp-content/uploads/2022/10/tough-iphone-case-matte-iphone-14-pro-max-front-635c349be6097-1.jpg?fit=2000%2C2000&ssl=1",
                    "https://i0.wp.com/tamfamgram.com/wp-content/uploads/2022/10/tough-iphone-case-matte-iphone-14-pro-max-front-635c349be6097-1.jpg?fit=2000%2C2000&ssl=1",
                    "https://i0.wp.com/tamfamgram.com/wp-content/uploads/2022/10/tough-iphone-case-matte-iphone-14-pro-max-front-635c349be6097-1.jpg?fit=2000%2C2000&ssl=1",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Eco-Friendly Cork Phone Case",
                "price" => 19.99,
                "description" => "Go eco-friendly with the Cork Phone Case, showcasing a unique and sustainable design for your Samsung Galaxy S21+.",
                "rating" => 4.6,
                "inStock" => 18,
                "imagePaths" => json_encode([
                    "https://example.com/usb_a_to_usb_c_adapter_1.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_2.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_3.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],  [
                "name" => "Glamorous Glitter Phone Case",
                "price" => 16.99,
                "description" => "Add a touch of sparkle to your iPhone 13 with the Glamorous Glitter Phone Case, shining bright day and night.",
                "rating" => 4.7,
                "inStock" => 20,
                "imagePaths" => json_encode([
                    "https://example.com/usb_a_to_usb_c_adapter_1.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_2.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_3.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "ToughGuard Camo Phone Case",
                "price" => 22.99,
                "description" => "Embrace the wilderness with the ToughGuard Camo Phone Case, providing rugged protection for your Google Pixel 6 Pro.",
                "rating" => 4.8,
                "inStock" => 15,
                "imagePaths" => json_encode([
                    "https://example.com/usb_a_to_usb_c_adapter_1.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_2.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_3.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Eco-Friendly Cork Phone Case",
                "price" => 19.99,
                "description" => "Go eco-friendly with the Cork Phone Case, showcasing a unique and sustainable design for your Samsung Galaxy S21+.",
                "rating" => 4.6,
                "inStock" => 18,
                "imagePaths" => json_encode([
                    "https://cdn.webshopapp.com/shops/310193/files/348288656/1600x2048x2/kurq-cork-phone-case-for-iphone-11-pro-max.jpg",
                    "https://cdn.webshopapp.com/shops/310193/files/348288656/1600x2048x2/kurq-cork-phone-case-for-iphone-11-pro-max.jpg",
                    "https://cdn.webshopapp.com/shops/310193/files/348288656/1600x2048x2/kurq-cork-phone-case-for-iphone-11-pro-max.jpg",
                    "https://cdn.webshopapp.com/shops/310193/files/348288656/1600x2048x2/kurq-cork-phone-case-for-iphone-11-pro-max.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1,
                "discount" => rand(0, 50)
            ], [
                "name" => "HD Clear Anti-Glare Screen Protector",
                "price" => 8.99,
                "description" => "Enjoy crystal-clear visuals without glare with the HD Clear Anti-Glare Screen Protector for iPad Air 4.",
                "rating" => 4.5,
                "inStock" => 30,
                "imagePaths" => json_encode([
                    "https://ng.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/15/8809802/1.jpg?2289",
                    "https://ng.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/15/8809802/1.jpg?2289",
                    "https://ng.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/15/8809802/1.jpg?2289",
                    "https://ng.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/15/8809802/1.jpg?2289",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "IPhone 14 Tempered Glass Screen Protector",
                "price" => 12.99,
                "description" => "Safeguard your iPhone 14's sensitive data from prying eyes with the Privacy Tempered Glass Screen Protector.",
                "rating" => 4.9,
                "inStock" => 25,
                "imagePaths" => json_encode([
                    "https://images.mobilefun.co.uk/graphics/450pixelp/82802.jpg",
                    "https://images.mobilefun.co.uk/graphics/450pixelp/82802.jpg",
                    "https://images.mobilefun.co.uk/graphics/450pixelp/82802.jpg",
                    "https://images.mobilefun.co.uk/graphics/450pixelp/82802.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Liquid Nano Screen Protector",
                "price" => 14.99,
                "description" => "Invisible protection for any device with the Liquid Nano Screen Protector, making your screen scratch-resistant without compromising touch sensitivity.",
                "rating" => 4.7,
                "inStock" => 20,
                "imagePaths" => json_encode([
                    "https://media.takealot.com/covers_images/751cffbd50754174b5a88a4217a734da/s-pdpxl.file",
                    "https://media.takealot.com/covers_images/751cffbd50754174b5a88a4217a734da/s-pdpxl.file",
                    "https://media.takealot.com/covers_images/751cffbd50754174b5a88a4217a734da/s-pdpxl.file",
                    "https://media.takealot.com/covers_images/751cffbd50754174b5a88a4217a734da/s-pdpxl.file",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2,
                "discount" => rand(0, 50)
            ],  [
                "name" => "Compact 20000mAh Power Bank",
                "price" => 39.99,
                "description" => "Power up your devices on the go with the Compact 20000mAh Power Bank, featuring high capacity in a sleek package.",
                "rating" => 4.8,
                "inStock" => 35,
                "imagePaths" => json_encode([
                    "https://example.com/usb_a_to_usb_c_adapter_1.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_2.jpg",
                    "https://example.com/usb_a_to_usb_c_adapter_3.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Solar Power Bank with Wireless Charging",
                "price" => 49.99,
                "description" => "Harness the sun's energy and charge wirelessly with the Solar Power Bank, a must-have for outdoor enthusiasts.",
                "rating" => 4.9,
                "inStock" => 28,
                "imagePaths" => json_encode([
                    "https://m.media-amazon.com/images/I/51BVZOnWCGL.jpg",
                    "https://m.media-amazon.com/images/I/51BVZOnWCGL.jpg",
                    "https://m.media-amazon.com/images/I/51BVZOnWCGL.jpg",
                    "https://m.media-amazon.com/images/I/51BVZOnWCGL.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ],
            [
                "name" => "Ultra-Portable 10000mAh Power Bank",
                "price" => 29.99,
                "description" => "Travel light and stay powered with the Ultra-Portable 10000mAh Power Bank, the perfect companion for your adventures.",
                "rating" => 4.6,
                "inStock" => 40,
                "imagePaths" => json_encode([
                    "https://images-na.ssl-images-amazon.com/images/I/61xCX6JCubL._SS400_.jpg",
                    "https://images-na.ssl-images-amazon.com/images/I/61xCX6JCubL._SS400_.jpg",
                    "https://images-na.ssl-images-amazon.com/images/I/61xCX6JCubL._SS400_.jpg",
                    "https://images-na.ssl-images-amazon.com/images/I/61xCX6JCubL._SS400_.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3,
                "discount" => rand(0, 50)
            ]
        ];

        DB::table('products')->insert($products);
    }
}
