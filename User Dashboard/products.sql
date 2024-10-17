-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 07:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(25) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Quantity` int(11) NOT NULL,
  `Product_Description` varchar(1000) NOT NULL,
  `Product_Image` varchar(50) NOT NULL,
  `Product_CatId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Price`, `Product_Quantity`, `Product_Description`, `Product_Image`, `Product_CatId`) VALUES
(1, 'MSI Katana 17 Gaming Lapt', 126800, 2, 'Supercharged Process: The 13th Gen. Intel Core i7 processor delivers the ultimate immersive experience in gameplay, multi-task work and productivity.\r\nBeyond Fast: The NVIDIA GeForce RTX 4060 powered by the Ada architecture unleashes the full glory of ray tracing, which simulates how light behaves in the real world.\r\nFHD Display: The 17.3” 144Hz FHD display delivers smooth refresh rate for seamless and vibrant gameplay.\r\nSimplistic Design: Enjoy the latest generation of Windows 11 Home for your everyday needs. *MSI recommends Windows 11 Pro for business use.', 'image_1.jpg', 1),
(2, 'ASUS ROG Strix G17 (2022)', 895, 2, 'NVIDIA GeForce RTX 3050 4GB GDDR6 - ROG Boost up to 1550MHz at 95W (80W plus 15W with Dynamic Boost) MUX switch - GPU MUX switch lets the GPU communicate directly with the display, increasing performance and decreasing latency AMD Ryzen 7 6800H Processor - 20M Cache, up to 4.7 GHz, 8 cores 16 thread 144Hz 3ms 17.3” FHD (1920 x 1080) IPS Type Display 16GB DDR5 4800MHz RAM | 512GB PCIe 4.0 NVMe M.2 SSD | Windows 11 Home', 'image_2.jpg', 1),
(3, 'ASUS TUF Gaming A15 (2023', 1077, 2, 'READY FOR ANYTHING - Jump right into the action with Windows 11, an AMD Ryzen 9 7940HS CPU, and NVIDIA GeForce RTX 4070 Laptop GPU at 140W Max TGP. SWIFT MEMORY AND STORAGE – Multitask faster with 16GB of DDR5-4800MHz memory and speed up loading times with 1TB of PCIe 4x4. NEVER MISS A MOMENT – Keep up with the pros thanks to its fast FHD 144Hz display with 100% sRGB color. Adaptive sync tech reduces lag, minimizes stuttering, and eliminates visual tearing for ultra-smooth and lifelike gameplay. BLOW AWAY THE COMPETITION – The TUF is equipped to handle its high-power CPU with a pair of 84-blade Arc Flow Fans which improves cooling performance without extra noise. MUX SWITCH WITH ADVANCED OPTIMUS - A MUX Switch increases laptop gaming performance by 5-10% by routing frames directly from the dGPU to the display bypassing the iGPU. With Advanced Optimus the switch between iGPU and dGPU becomes automatic based on the task, optimizing battery life.', 'image_3.jpg', 1),
(4, 'ASUS ROG Strix G16 (2023)', 1600, 3, 'POWER UP YOUR PLAY - Draw more frames and win more games with Windows 11, a 13th Gen Intel Core i9-13980HX processor, and an NVIDIA GeForce RTX 4070 Laptop GPU at 140W Max TGP..Anti-glare display, Refresh Rate: 240Hz, Response Time: 3ms, 720P HD camera. BLAZING FAST MEMORY AND STORAGE – Multitask swiftly with 16GB of DDR5-4800MHz memory and speed up loading times with 1TB of PCIe 4x4. ROG INTELLIGENT COOLING – To put this amount of power in a gaming laptop, you need an even better cooling solution. The Strix features Thermal Grizzly’s Conductonaut Extreme liquid metal on the CPU, and a third intake fan among other premium features, to allow for better sustained performance over long gaming sessions. SWIFT VISUALS – The Strix G16 has a fast FHD 165Hz panel to make sure you never miss a moment. It also covers 100% of the sRGB color space and feature Dolby Vision, Adaptive-Sync support, and an 90% screen-to-body ratio for a stellar gaming and viewing experience.', 'image_4.jpg', 1),
(7, 'Meta Quest 3 128GB', 531, 2, 'Dive into extraordinary experiences with a mixed reality headset that transforms your home into an exciting new playground, where virtual elements blend into your actual surroundings. It’s the most powerful Quest yet*, featuring next-level performance with more than double the graphic processing power of Quest 2. (*Based on the graphic performance of the Snapdragon XR2 Gen 2 vs Meta Quest 2.) Experience more immersion with dazzling visuals with the 4K+ Infinite Display (a nearly 30% leap in resolution from Quest 2) and rich 3D audio with enhanced sound clarity, bass performance and a 40% louder volume range than Quest 2 Reach out and touch virtual worlds with Touch Plus controllers that give you fine-tuned precision, realistic sensations and more intuitive interactions. You can even navigate without controllers with Direct Touch that follows your gestures, so you can use just your hands to find your way. Explore the world’s best library of 500+ immersive apps and find your favorite con', 'image_5.jpg', 1),
(8, 'Xbox Elite Series 2 Core ', 140, 2, 'Experience the Xbox Elite Wireless Controller Series 2 featuring adjustable-tension thumbsticks, wrap-around rubberized grip, and shorter hair trigger locks. Enjoy limitless customization with interchangeable components and exclusive button mapping options in the Xbox Accessories app.* Save up to 3 custom profiles on the controller and switch between them on the fly. Swap thumbstick toppers, D-pads, and paddles to tailor your controller to your preferred gaming style. Stay in the game with up to 40 hours of rechargeable battery life and refined components that are built to last.* Use Xbox Wireless, Bluetooth, or the included USB-C cable to play across Xbox Series X|S, Xbox One, and Windows. What’s in the box: Xbox Elite Wireless Controller Series 2; carrying case; set of 6 thumbsticks: standard (2), classic (2), tall (1), and wide dome (1); set of 4 paddles: medium (2) and mini (2); set of 2 D-pads: standard and faceted; thumbstick-adjustment tool; charging dock; and USB-C cable.', 'image_6.jpg', 1),
(9, 'Amazon Essentials Women\'s', 27, 2, 'SKINNY FIT: Snug fit through hip, thigh, and leg. High rise, sits above the natural waist. HIGH STRETCH DENIM: Cut from cotton-blend denim with added stretch for all-day comfort and better fit. ESSENTIAL SKINNY JEAN: These high-rise skinny jeans will be your go-to wardrobe essential. The slim and flattering silhouette allows for endless styling options. High rise waist allows for easy pairing with cropped silhouettes. DETAILS: Authentic five-pocket styling, zip fly, shank button closure, and skinny leg. Available in short, regular, and tall inseam lengths. All denim is unique and will vary in color due to wash, finish, and dye. INSEAM: Offered in 3 lengths - Short 27\", Regular 29\", & Long 31\" each with a 5\" leg opening on US size 6.', 'image_8.jpg', 2),
(10, 'Levi\'s Women\'s New Boyfri', 42, 2, 'Mid Rise: Sits at waist Relaxed fit through hip and thigh Inseam: 25inch Rolled, 27inch Unrolled Front Rise: 9inch; Back Rise: 13 7/8inch; Leg Opening: 13inch', 'image_9.jpg', 2),
(11, 'Lee Womens Legendary Mid ', 24, 1, 'REGULAR FIT. With a regular fit and a mid rise, these straight leg jeans sit comfortably on the hips and have a skimming fit through the seat and thigh. Designed for everyday comfort, these jeans have a straight-leg cut, great for pairing with your favorite pair of sneakers or flats. WARDROBE CLASSIC. A great pair of straight leg jeans is a staple for any woman\'s wardrobe. With a flattering silhouette for any shape, this style pairs perfectly with your favorite tee. SIGNATURE LOOK. These jeans feature the seven iconic Lee design elements: S-Curve pocket stitching, logo patch, X-stitched tacks, logo button and rivet, hip pocket label and Spade pocket. A LIFETIME OF QUALITY. For over 100 years, Lee has produced quality apparel with durability and long-lasting construction in mind. Lee is committed to designing clothing that conforms to your body, allowing you to move through life freely. SPECIFICATIONS. Zipper fly with button closure, leg opening: Missy 15\", inseam: 28\" = Short, 30\" = Me', 'image_10.jpg', 2),
(12, 'Blooming Jelly Womens Sum', 14, 1, 'Materials: The blouses for women dressy casual made of 95% Polyester, 5% Spandex, lightweight and breathable, skin-friendly and soft to wear. Design: This tank tops for women are featured with a round neck with key hole detail, pleated front adds a hint of uniquenes and delicate feeling. This womens business casual tops with its loose fit and sophisticated silhouette, simple and classic, a stylish must-have item for your closet. Easy to Pair: Pair it with tailored pants, blazers and heels for a dressy and professional look. It can also be worn with shorts, skinny jeans, sandals or flats for a casual yet stylish look. Occasion: The sleeveless summer tank tops for women are suitable for casual, going out, date night, work, school, office, business, vacation, and daily wear. Note: We strongly suggest that you have your body measurements taken first, and then refer to our size chart before order, S=US 2-4, M=US 6-8, L=US 10, XL=US 12.', 'image_11.jpg', 2),
(13, 'Comfort Colors Adult Tank', 11, 1, 'Soft-washed garment-dyed fabric Bound self-fabric neck and armholes Single-needle left chest pocket with double-needle hem Double-needle neck, armhole and bottom hems We recommend washing these garments in cold water with like-colored garments, as some of the pigment dyes may stain light or white colored garments', 'image_12.jpg', 2),
(14, 'PUMA Men\'s Voltaic Evo Ru', 40, 2, 'REVAMPED DESIGN: The Voltaic EVO represents a fresh take on PUMA’s fast Viz Tech design language. ENHANCED TECHNOLOGY: Utilizes PUMA\'s SoftFoam+, a step-in comfort sockliner designed to provide soft cushioning thanks to its extra thick heel. PEROFMANCE-DRIVEN: Features PUMA\'s 10CELL tech that provides maximum comfort as well as a TPU shank that supplies stability. CONTROLLED GRIP: The outsole is designed with full length rubber coverage for ultimate traction. COMFORT AND SUPPORT: The upper features a TPU toe cap for supreme durability and a cage overlay detail that supplies a unique lacing construction.', 'image_13.jpg', 2),
(15, 'Skechers Men\'s Afterburn ', 47, 2, 'Lace-up Skechers Memory Foam comfort insole Flexible rubber traction outsole Articu-Lyte shock-absorbing supportive flexible midsole Skechers logo detail 1 1/2 inch heel', 'image_14.jpg', 2),
(16, 'Hanes Men\'s Hoodie', 14, 1, 'FLEECE TO FEEL GOOD ABOUT - Hanes EcoSmart men\'s hoodie is made with cotton sourced from American farms. HOODED DESIGN - Classic hoodie styling featuring a dyed-to-match drawstring for the perfect fit. KANGAROO POCKET - Front kangaroo pocket keeps hands warm and holds small, everyday essentials. COMFY COZY - Midweight fleece keeps you warm without the bulk. HANES QUALITY - Sporty ribbed cuffs and hem hold its shape. MADE TO LAST - Double-needle stitching at the neck and armholes for added sturdiness.', 'mens.jpg', 3),
(17, 'Venum Men\'s UFC Adrenalin', 43, 1, '90% Polyester, 10% Elastane Imported Regular fit Short sleeves Round crew neck Dry-Tech Technology Badge of authenticity', 'men.jpg', 3),
(18, 'Robert Graham Men\'s Benne', 109, 1, 'MEN’S DRESS SHIRT: This lightweight solid-colored shirt offers the best of form and function and will make a stylish addition to your closet. It has a classic fit and is essential for casual or dress wear. QUALITY MATERIALS: Our elegant shirt for men is constructed from high-quality fabric for maximum style and comfort. Available in a variety of sizes, it flatters any shape and always creates the right look. VERSATILE STYLE: This solid shirt men love features a soft design that complements the woven texture and completes any formal or casual outfit. Perfect for year-round wear, it can be layered or worn on its own. SIMPLE & EASY CARE: Caring for this oxford button-up shirt is easy. Simply machine wash it in cold water and it will be ready to wear again in no time. The shirt will remain fitted and the colors will stay vivid. ROBERT GRAHAM: Since 2001, we’ve created unique and bold clothing featuring unparalleled craftsmanship and original style. Make a fashion statement with our one-of-', 'image_15.jpg', 3),
(19, 'Hanes Men’s X-Temp Short ', 12, 2, 'SO SOFT - Midweight pique fabric feels super-soft up against your skin. KEEPS YOU COMFORTABLE - X-Temp technology is designed to keep you cool and dry, no matter what the day brings. ODOR CONTROL - FreshIQ advanced odor protection technology attacks the odor-causing bacteria in your clothing. STAY-FLAT COLLAR - Classic polo style featuring a ribbed stay-flat collar. FRONT BUTTON PLACKET – Men’s shirts are accented with a tailored 3-button placket. TEARAWAY TAG - Simply remove the tearaway tag for itch-free comfort.', 'image_16.jpg', 3),
(20, 'VTech Sit-To-Stand Learni', 39, 1, 'Removable Tray: The activity-packed, detachable panel is perfect for babies who can sit up; it can also re-attach to the walker for on-the-run fun on both carpet and bare floors Auditory Training: The activity center for baby boys & girls includes five piano keys that play musical notes and a telephone handset to encourage creativity and role-play fun Motor Development: 3 shape sorters, light-up buttons, and colorful spinning rollers are featured on the baby rolling walker to help define motor skills Balance Development: The toddler walker activity center helps the development of stability & movement skills as well as fine motor skills & hand-eye coordination Adjustable: Two-speed control switch on the walker allows growth along with your little one\'s changing speeds; the perfect baby walker for boys and girls alike. Helps with Sensory Development', 'image_17.jpg', 4),
(21, 'Fisher-Price Portable Bab', 40, 1, 'Portable and comfy infant chair that helps your baby sit up ​Supports your baby in an upright position with wide, sturdy base and cushy seat ​Folds compactly for space-saving storage or travel ​Comes with a clacker and flower teether for playtime ​Soft, cozy seat pad is removable and machine washable', 'image_18.jpg', 4),
(22, 'Infantino Foldable Soft F', 24, 1, 'LAY FLAT OR USE THE 4 FOLD-UP WALLS TO CREATE A PLAY ARENA: The Infantino Foldable Soft Foam Mat makes it easy to create a secure and fun area for your little one. Whether you choose to lay it flat or secure toys with its pop-up sides, your baby will be safe and sound! GREAT FOR TUMMY TIME, SIT & PLAY, BALL PLAY BOOK TIME and More: Explore all the possibilities this versatile mat has to offer. Let your little one get creative with their activities while giving them ample support during new milestones like rolling, crawling, and sitting up REVERSIBLE DESIGN FOR HIGH VIBRANCY OR SOMETHING MORE SUBTLE: Put some pep in your playtime with bright, colorful bohemian patterns on one side and a subtle print on the other. You can easily switch it up when the mood strikes! EASY TO WIPE CLEAN: No worries when spills and messes happen! A quick wipe down will take care of everything so your baby can keep playing FOLDS COMPACTLY FOR EASY MOVING, TAKING ON-THE-GO, AND STORING: With its compact fold-an', 'image_19.jpg', 4),
(23, 'Graco Slim Spaces Compact', 94, 2, 'Compact baby swing designed to save space in the home, making it ideal for any room Carry handle makes it easy to move from room to room Easy, compact fold to store between uses or when extra space is needed in the home Adjustable swinging speeds allow you to find the right pace Overhead toy bar with 2 soft toys to keep baby entertained Infant head support keeps baby cozy and can be removed as baby grows 5-point harness with fabric covers keeps your child secure Battery operated for ultimate portability', 'image_20.jpg', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `product_catId` (`Product_CatId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_catId` FOREIGN KEY (`Product_CatId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
