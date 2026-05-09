function hcTextToNumHesapla() {
    const text = document.getElementById('hc-text-input').value.toLowerCase().trim();
    if (!text) return;

    const units = { "sıfır": 0, "bir": 1, "iki": 2, "üç": 3, "dört": 4, "beş": 5, "altı": 6, "yedi": 7, "sekiz": 8, "dokuz": 9 };
    const tens = { "on": 10, "yirmi": 20, "otuz": 30, "kırk": 40, "elli": 50, "altmış": 60, "yetmiş": 70, "seksen": 80, "doksan": 90 };
    const scales = { "yüz": 100, "bin": 1000, "milyon": 1000000, "milyar": 1000000000 };

    const words = text.split(/\s+/);
    let total = 0;
    let current = 0;

    words.forEach(word => {
        if (units[word] !== undefined) {
            current += units[word];
        } else if (tens[word] !== undefined) {
            current += tens[word];
        } else if (scales[word] !== undefined) {
            const scale = scales[word];
            if (scale === 100) {
                if (current === 0) current = 1;
                current *= 100;
            } else {
                if (current === 0 && scale === 1000) current = 1;
                total += current * scale;
                current = 0;
            }
        }
    });

    total += current;

    document.getElementById('hc-res-num-val').innerText = total.toLocaleString('tr-TR');
    document.getElementById('hc-text-to-num-result').classList.add('visible');
}
