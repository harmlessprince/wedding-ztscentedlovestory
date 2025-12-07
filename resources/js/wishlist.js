export const wishlistItems = [
    {
        id: 1,
        name: "Buchimix Juicer",
        price: 270000,
        buyOnlineUrl: "https://buchymix.com.ng/products/batch-juicer-with-high-torque-motor-stainless-steel-blades-high-stbj40",
        status: true,
    },
    {
        id: 2,
        name: "Utility shelf",
        price: 68000,
        buyOnlineUrl: "https://www.tiktok.com/@simpleyemi/video/7439292669597060408?q=kitchen%20shelf&t=1765036349927",
        status: true,
    },
    {
        id: 3,
        name: "Oraimo Steamer",
        price: 41900,
        buyOnlineUrl: "https://ng.oraimo.com/product/oraimo-smartsteamer-1500w-rapid-heating-led-indicator-portable-handheld-garment-steamer?srsltid=AfmBOorUhfxwA7LvQIAT_P4_zec7ju172PFmHqOFu_wAC-nFQyH2iCeL",
        status: true,
    },
    {
        id: 4,
        name: "Induction cooker",
        price: 44000,
        buyOnlineUrl: "https://fouanistore.com/product/971?maxi-induction-cooker-2100-watts-led-display-wt2103c",
        status: true,
    },
    {
        id: 5,
        name: "LG TV UHD 55 Inch UA73 4K Smart TV",
        price: 644000,
        buyOnlineUrl: "https://fouanistore.com/product/943?lg-tv-uhd-55-inch-ua73-4k-smart-tv-ready-hdr10-webos25",
        status: true,
    },
    {
        id: 5,
        name: "Maxi Air Cooler Fan",
        price: 209000,
        buyOnlineUrl: "https://fouanistore.com/product/814?maxi-air-cooler-fan-200w-53l-200-17jr",
        status: true,
    }
];

export function formatPrice(price) {
    if (!price || isNaN(price)) {
        price = 0
        return `₦ ${price.toLocaleString('en-NG')}`
    }
    return `₦ ${price.toLocaleString('en-NG')}`;
}
