function hcCalDensityHesapla() {
    const cal = parseFloat(document.getElementById('hc-cd-cal').value);
    const weight = parseFloat(document.getElementById('hc-cd-weight').value);

    if (isNaN(cal) || isNaN(weight) || weight <= 0) {
        alert('Lütfen geçerli kalori ve ağırlık değerleri girin.');
        return;
    }

    const density = cal / weight;

    document.getElementById('hc-cd-res-val').innerText = density.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kcal/g';
    
    let desc = "";
    if (density < 0.6) desc = "<span style='color:green;'>Çok Düşük Yoğunluk (Serbest Tüketim)</span>";
    else if (density < 1.5) desc = "<span style='color:#f1c40f;'>Düşük Yoğunluk</span>";
    else if (density < 4.0) desc = "<span style='color:#e67e22;'>Orta Yoğunluk</span>";
    else desc = "<span style='color:red;'>Yüksek Yoğunluk (Kontrollü Tüketim)</span>";

    document.getElementById('hc-cd-res-desc').innerHTML = desc;
    document.getElementById('hc-cd-result').classList.add('visible');
}
