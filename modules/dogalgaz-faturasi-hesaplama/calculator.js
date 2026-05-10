function hcDoğalgazFaturasıHesapla() {
    const m3 = parseFloat(document.getElementById('hc-gb-m3').value);

    if (!m3) return;

    // 2026 Tahmini: 12.50 TL/m3 (Vergiler dahil yaklaşık birim fiyat)
    const unitPrice = 12.50;
    const total = m3 * unitPrice;

    document.getElementById('hc-gb-val').innerText = total.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-gb-result').classList.add('visible');
}
