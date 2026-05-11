function hcMtv2026Hesapla() {
    const age = document.getElementById('hc-mtv-age').value;
    const engine = document.getElementById('hc-mtv-engine').value;

    // MTV 2026 Tahmini Tablosu (Örnek değerler)
    const mtvData = {
        "0-1300": { "1-3": 6200, "4-6": 4320, "7-11": 2420, "12-15": 1830, "16": 640 },
        "1301-1600": { "1-3": 10790, "4-6": 8090, "7-11": 4690, "12-15": 3310, "16": 1270 },
        "1601-1800": { "1-3": 19060, "4-6": 14900, "7-11": 8770, "12-15": 5350, "16": 2070 },
        "1801-2000": { "1-3": 30040, "4-6": 23140, "7-11": 13600, "12-15": 8110, "16": 3210 },
        "2001-2500": { "1-3": 45060, "4-6": 32710, "7-11": 20450, "12-15": 12240, "16": 4850 },
        "2501-3000": { "1-3": 62800, "4-6": 54640, "7-11": 34150, "12-15": 18450, "16": 6800 },
        "3001-3500": { "1-3": 95660, "4-6": 86080, "7-11": 51630, "12-15": 25790, "16": 9430 },
        "3501-4000": { "1-3": 150390, "4-6": 129860, "7-11": 76540, "12-15": 34260, "16": 13540 },
        "4001": { "1-3": 246130, "4-6": 184590, "7-11": 109270, "12-15": 49170, "16": 19120 }
    };

    const annualMtv = mtvData[engine][age];
    const installment = annualMtv / 2;

    document.getElementById('hc-mtv-res-annual').innerText = annualMtv.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-mtv-res-jan').innerText = installment.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-mtv-res-jul').innerText = installment.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-mtv-result').classList.add('visible');
}
