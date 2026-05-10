function hcSaladDressingHesapla() {
    const total = parseFloat(document.getElementById('hc-dressing-total').value);
    const oilRatio = parseFloat(document.getElementById('hc-dressing-type').value);

    if (isNaN(total) || total <= 0) {
        alert('Lütfen toplam sos miktarını giriniz.');
        return;
    }

    // Toplam parça sayısı = Yağ oranı + 1 (asit için)
    const totalParts = oilRatio + 1;
    const onePart = total / totalParts;

    const oil = onePart * oilRatio;
    const acid = onePart;

    document.getElementById('hc-dressing-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Zeytinyağı:</strong> ${Math.round(oil)} ml</li>
            <li><strong>Limon / Sirke:</strong> ${Math.round(acid)} ml</li>
            <li><strong>Tuz / Baharat:</strong> Damak tadına göre</li>
        </ul>
    `;
    
    document.getElementById('hc-salad-dressing-result').classList.add('visible');
}
