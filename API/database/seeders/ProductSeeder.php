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
        

        $products = [
            [
                "name" => "IPhone 12 Pro max",
                "price" => 999.00,
                "description" => "The iPhone 12 is Apple's flagship smartphone featuring a Super Retina XDR display, A14 Bionic chip, and a dual-camera system.",
                "rating" => 4.5,
                "inStock" => 10,
                "imagePaths" =>json_encode([
                    "https://img.freepik.com/free-vector/realistic-smartphone-device_52683-29765.jpg?w=740&t=st=1687777701~exp=1687778301~hmac=a88d69ad91c25b21b8d9d41f649236409f997b48ff5b416b4acf6518a3d119e9",
                    "https://img.freepik.com/free-vector/realistic-smartphone-device_52683-29765.jpg?w=740&t=st=1687777701~exp=1687778301~hmac=a88d69ad91c25b21b8d9d41f649236409f997b48ff5b416b4acf6518a3d119e9",
                    "https://img.freepik.com/free-vector/realistic-smartphone-device_52683-29765.jpg?w=740&t=st=1687777701~exp=1687778301~hmac=a88d69ad91c25b21b8d9d41f649236409f997b48ff5b416b4acf6518a3d119e9",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2
            ],
            [
                "name" => "iPad Pro",
                "price" => 1099.00,
                "description" => "The iPad Pro is a powerful tablet with a Liquid Retina display, M1 chip, and support for the Apple Pencil and Magic Keyboard.",
                "rating" => 4.7,
                "inStock" => 5,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777718~exp=1687778318~hmac=532077492f7cd3ee4fcc5be44ed9359d6e15ac1b0256776edea36320cd697675",
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777718~exp=1687778318~hmac=532077492f7cd3ee4fcc5be44ed9359d6e15ac1b0256776edea36320cd697675", "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777718~exp=1687778318~hmac=532077492f7cd3ee4fcc5be44ed9359d6e15ac1b0256776edea36320cd697675", "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777718~exp=1687778318~hmac=532077492f7cd3ee4fcc5be44ed9359d6e15ac1b0256776edea36320cd697675",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1
            ],
            [
                "name" => "Dell UltraSharp U2720Q",
                "price" => 649.00,
                "description" => "The Dell UltraSharp U2720Q is a 27-inch 4K UHD monitor with an IPS panel, USB-C connectivity, and VESA DisplayHDR 400 support.",
                "rating" => 4.6,
                "inStock" => 8,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-89360.jpg?w=740&t=st=1687777756~exp=1687778356~hmac=1bd469a222d08ddef2896e1048b26b1d9fd5d8ca53deedbb78dfc85cd1cfc5f0", "https://img.freepik.com/free-vector/digital-device-mockup_53876-89360.jpg?w=740&t=st=1687777756~exp=1687778356~hmac=1bd469a222d08ddef2896e1048b26b1d9fd5d8ca53deedbb78dfc85cd1cfc5f0", "https://img.freepik.com/free-vector/digital-device-mockup_53876-89360.jpg?w=740&t=st=1687777756~exp=1687778356~hmac=1bd469a222d08ddef2896e1048b26b1d9fd5d8ca53deedbb78dfc85cd1cfc5f0", "https://img.freepik.com/free-vector/digital-device-mockup_53876-89360.jpg?w=740&t=st=1687777756~exp=1687778356~hmac=1bd469a222d08ddef2896e1048b26b1d9fd5d8ca53deedbb78dfc85cd1cfc5f0",
                ]),
                
                "specification" => json_encode($specifications),
                "category_id" => 4
            ],
            [
                "name" => "Logitech MX Keys",
                "price" => 99.00,
                "description" => "The Logitech MX Keys is a wireless keyboard with backlit keys, comfortable typing experience, and easy switching between devices.",
                "rating" => 4.3,
                "inStock" => 15,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777823~exp=1687778423~hmac=afc4047f3a43b84c14a02aff2ee1ae1e596b106726f4c975b05e83a00918fc6b", "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777823~exp=1687778423~hmac=afc4047f3a43b84c14a02aff2ee1ae1e596b106726f4c975b05e83a00918fc6b", "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777823~exp=1687778423~hmac=afc4047f3a43b84c14a02aff2ee1ae1e596b106726f4c975b05e83a00918fc6b", "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777823~exp=1687778423~hmac=afc4047f3a43b84c14a02aff2ee1ae1e596b106726f4c975b05e83a00918fc6b",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2
            ],
            [
                "name" => "Samsung Galaxy S21",
                "price" => 799.00,
                "description" => "The Samsung Galaxy S21 is a flagship smartphone with a Dynamic AMOLED display, Exynos 2100 / Snapdragon 888 chipset, and a triple-camera system.",
                "rating" => 4.4,
                "inStock" => 7,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/realistic-smartphone-with-three-cameras-different-views_23-2148324135.jpg?w=826&t=st=1687777852~exp=1687778452~hmac=4233297d533e5c297f89bca6674b1e2e6902746835ce1dc78ce10707e693504f", "https://img.freepik.com/free-vector/realistic-smartphone-with-three-cameras-different-views_23-2148324135.jpg?w=826&t=st=1687777852~exp=1687778452~hmac=4233297d533e5c297f89bca6674b1e2e6902746835ce1dc78ce10707e693504f", "https://img.freepik.com/free-vector/realistic-smartphone-with-three-cameras-different-views_23-2148324135.jpg?w=826&t=st=1687777852~exp=1687778452~hmac=4233297d533e5c297f89bca6674b1e2e6902746835ce1dc78ce10707e693504f", "https://img.freepik.com/free-vector/realistic-smartphone-with-three-cameras-different-views_23-2148324135.jpg?w=826&t=st=1687777852~exp=1687778452~hmac=4233297d533e5c297f89bca6674b1e2e6902746835ce1dc78ce10707e693504f",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 2
            ],
            [
                "name" => "Microsoft Surface Pro 7",
                "price" => 1199.00,
                "description" => "The Microsoft Surface Pro 7 is a versatile tablet with a detachable keyboard, powerful Intel Core processors, and Windows 10 operating system.",
                "rating" => 4.2,
                "inStock" => 3,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777889~exp=1687778489~hmac=e55b8e44bf15658d0cded6b27c8011f32ef8f7710b3afc2ef7d994f4a0e0d072",
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777889~exp=1687778489~hmac=e55b8e44bf15658d0cded6b27c8011f32ef8f7710b3afc2ef7d994f4a0e0d072",
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777889~exp=1687778489~hmac=e55b8e44bf15658d0cded6b27c8011f32ef8f7710b3afc2ef7d994f4a0e0d072",
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-89356.jpg?w=740&t=st=1687777889~exp=1687778489~hmac=e55b8e44bf15658d0cded6b27c8011f32ef8f7710b3afc2ef7d994f4a0e0d072"
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1
            ],
            [
                "name" => "LG UltraGear 27GN950-B",
                "price" => 999.00,
                "description" => "The LG UltraGear 27GN950-B is a 27-inch gaming monitor with a 4K Nano IPS display, 144Hz refresh rate, and NVIDIA G-SYNC compatibility.",
                "rating" => 4.8,
                "inStock" => 6,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/laptop-computer-with-white-screen-keyboard_107791-1185.jpg?w=826&t=st=1687777922~exp=1687778522~hmac=f70d624d544227bbe3c647e4d3e843221682578c371def1a1746a01b945c7eb2", "https://img.freepik.com/free-vector/laptop-computer-with-white-screen-keyboard_107791-1185.jpg?w=826&t=st=1687777922~exp=1687778522~hmac=f70d624d544227bbe3c647e4d3e843221682578c371def1a1746a01b945c7eb2", "https://img.freepik.com/free-vector/laptop-computer-with-white-screen-keyboard_107791-1185.jpg?w=826&t=st=1687777922~exp=1687778522~hmac=f70d624d544227bbe3c647e4d3e843221682578c371def1a1746a01b945c7eb2", "https://img.freepik.com/free-vector/laptop-computer-with-white-screen-keyboard_107791-1185.jpg?w=826&t=st=1687777922~exp=1687778522~hmac=f70d624d544227bbe3c647e4d3e843221682578c371def1a1746a01b945c7eb2",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1
            ],
            [
                "name" => "Razer BlackWidow Elite",
                "price" => 169.00,
                "description" => "The Razer BlackWidow Elite is a mechanical gaming keyboard with customizable Chroma RGB lighting, programmable macros, and dedicated media controls.",
                "rating" => 4.6,
                "inStock" => 9,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777971~exp=1687778571~hmac=7bfa6a0add5b3467e92338809284140d1e7423b796c89f9e04b6ba6c87e93185", "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777971~exp=1687778571~hmac=7bfa6a0add5b3467e92338809284140d1e7423b796c89f9e04b6ba6c87e93185", "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777971~exp=1687778571~hmac=7bfa6a0add5b3467e92338809284140d1e7423b796c89f9e04b6ba6c87e93185", "https://img.freepik.com/free-vector/technology-white_24877-49405.jpg?w=826&t=st=1687777971~exp=1687778571~hmac=7bfa6a0add5b3467e92338809284140d1e7423b796c89f9e04b6ba6c87e93185",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 1
            ],
            [
                "name" => "Sony WH-1000XM4",
                "price" => 349.00,
                "description" => "The Sony WH-1000XM4 is a wireless noise-canceling headphone with industry-leading noise cancellation, adaptive sound control, and long battery life.",
                "rating" => 4.7,
                "inStock" => 12,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/wireless-headphones-set_1284-20423.jpg?w=826&t=st=1687777988~exp=1687778588~hmac=fafdf1ab906c2711489532d8334c34a3a51fd96c1ead56806b5d8cf0ca49f313", "https://img.freepik.com/free-vector/wireless-headphones-set_1284-20423.jpg?w=826&t=st=1687777988~exp=1687778588~hmac=fafdf1ab906c2711489532d8334c34a3a51fd96c1ead56806b5d8cf0ca49f313", "https://img.freepik.com/free-vector/wireless-headphones-set_1284-20423.jpg?w=826&t=st=1687777988~exp=1687778588~hmac=fafdf1ab906c2711489532d8334c34a3a51fd96c1ead56806b5d8cf0ca49f313", "https://img.freepik.com/free-vector/wireless-headphones-set_1284-20423.jpg?w=826&t=st=1687777988~exp=1687778588~hmac=fafdf1ab906c2711489532d8334c34a3a51fd96c1ead56806b5d8cf0ca49f313",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4
            ],
            [
                "name" => "Google Pixel 5",
                "price" => 699.00,
                "description" => "The Google Pixel 5 is a smartphone with a 6.0-inch OLED display, Snapdragon 765G chipset, and an excellent camera system powered by Google's computational photography.",
                "rating" => 4.4,
                "inStock" => 2,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/digital-device-mockup_53876-90973.jpg?w=740&t=st=1687778007~exp=1687778607~hmac=50158d0bff3fca34de3233e8b3d0f587c49555b203215978461aec0a72f0f0e9", "https://img.freepik.com/free-vector/digital-device-mockup_53876-90973.jpg?w=740&t=st=1687778007~exp=1687778607~hmac=50158d0bff3fca34de3233e8b3d0f587c49555b203215978461aec0a72f0f0e9", "https://img.freepik.com/free-vector/digital-device-mockup_53876-90973.jpg?w=740&t=st=1687778007~exp=1687778607~hmac=50158d0bff3fca34de3233e8b3d0f587c49555b203215978461aec0a72f0f0e9", "https://img.freepik.com/free-vector/digital-device-mockup_53876-90973.jpg?w=740&t=st=1687778007~exp=1687778607~hmac=50158d0bff3fca34de3233e8b3d0f587c49555b203215978461aec0a72f0f0e9",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4
            ],
            [
                "name" => "Acer Predator X27",
                "price" => 1799.00,
                "description" => "The Acer Predator X27 is a 27-inch gaming monitor with a 4K UHD display, 144Hz refresh rate, G-SYNC HDR, and Quantum Dot technology.",
                "rating" => 4.9,
                "inStock" => 4,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/computer-design_1156-101.jpg?w=740&t=st=1687778044~exp=1687778644~hmac=6430b5cc5eda87d8638480462a57318dbe159557f5bdbfd5654887ee84d9c4e7", "https://img.freepik.com/free-vector/computer-design_1156-101.jpg?w=740&t=st=1687778044~exp=1687778644~hmac=6430b5cc5eda87d8638480462a57318dbe159557f5bdbfd5654887ee84d9c4e7", "https://img.freepik.com/free-vector/computer-design_1156-101.jpg?w=740&t=st=1687778044~exp=1687778644~hmac=6430b5cc5eda87d8638480462a57318dbe159557f5bdbfd5654887ee84d9c4e7", "https://img.freepik.com/free-vector/computer-design_1156-101.jpg?w=740&t=st=1687778044~exp=1687778644~hmac=6430b5cc5eda87d8638480462a57318dbe159557f5bdbfd5654887ee84d9c4e7",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 4
            ],
            [
                "name" => "Corsair K70 RGB",
                "price" => 159.00,
                "description" => "The Corsair K70 RGB is a mechanical gaming keyboard with per-key RGB backlighting, Cherry MX switches, and durable aluminum construction.",
                "rating" => 4.5,
                "inStock" => 11,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/keyboard_53876-35115.jpg?w=740&t=st=1687778089~exp=1687778689~hmac=50ae96d0e2633d6077a5d4b3c3adde919aae74123e404a315e637025e9ba4c2e", "https://img.freepik.com/free-vector/keyboard_53876-35115.jpg?w=740&t=st=1687778089~exp=1687778689~hmac=50ae96d0e2633d6077a5d4b3c3adde919aae74123e404a315e637025e9ba4c2e", "https://img.freepik.com/free-vector/keyboard_53876-35115.jpg?w=740&t=st=1687778089~exp=1687778689~hmac=50ae96d0e2633d6077a5d4b3c3adde919aae74123e404a315e637025e9ba4c2e", "https://img.freepik.com/free-vector/keyboard_53876-35115.jpg?w=740&t=st=1687778089~exp=1687778689~hmac=50ae96d0e2633d6077a5d4b3c3adde919aae74123e404a315e637025e9ba4c2e",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3
            ],
            [
                "name" => "Bose QuietComfort 35 II",
                "price" => 299.00,
                "description" => "The Bose QuietComfort 35 II is a wireless noise-canceling headphone with balanced audio performance, comfortable design, and built-in Google Assistant/Alexa.",
                "rating" => 4.6,
                "inStock" => 18,
                "imagePaths" =>json_encode( [
                    "https://img.freepik.com/free-vector/headphones-soundwaves_98292-4130.jpg?w=740&t=st=1687778116~exp=1687778716~hmac=4b18012068abd91b04b65016849f4abca4adeb4a516238ee604c129ba8bd9c4b", "https://img.freepik.com/free-vector/headphones-soundwaves_98292-4130.jpg?w=740&t=st=1687778116~exp=1687778716~hmac=4b18012068abd91b04b65016849f4abca4adeb4a516238ee604c129ba8bd9c4b", "https://img.freepik.com/free-vector/headphones-soundwaves_98292-4130.jpg?w=740&t=st=1687778116~exp=1687778716~hmac=4b18012068abd91b04b65016849f4abca4adeb4a516238ee604c129ba8bd9c4b", "https://img.freepik.com/free-vector/headphones-soundwaves_98292-4130.jpg?w=740&t=st=1687778116~exp=1687778716~hmac=4b18012068abd91b04b65016849f4abca4adeb4a516238ee604c129ba8bd9c4b",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3
            ],
            [
                "name" => "Samsung Odyssey G7",
                "price" => 799.00,
                "description" => "The Samsung Odyssey G7 is a curved gaming monitor with a 32-inch QLED display, 240Hz refresh rate, and 1000R curvature.",
                "rating" => 4.8,
                "inStock" => 3,
                "imagePaths" =>json_encode( [
                    "https://m.media-amazon.com/images/I/61SQz8S+fEL._AC_UF894,1000_QL80_.jpg", "https://m.media-amazon.com/images/I/61SQz8S+fEL._AC_UF894,1000_QL80_.jpg", "https://m.media-amazon.com/images/I/61SQz8S+fEL._AC_UF894,1000_QL80_.jpg", "https://m.media-amazon.com/images/I/61SQz8S+fEL._AC_UF894,1000_QL80_.jpg",
                ]),
                "specification" => json_encode($specifications),
                "category_id" => 3
            ]
        ];

        DB::table('products')->insert($products);
    }
}
