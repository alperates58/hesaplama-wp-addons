function hcHizGuncelleArayuz() {
    const mode = document.getElementById('hc-calc-mode').value;
    document.getElementById('group-hiz').style.display = (mode === 'hiz') ? 'none' : 'block';
    document.getElementById('group-mesafe').style.display = (mode === 'mesafe') ? 'none' : 'block';
    document.getElementById('group-zaman').style.display = (mode === 'zaman') ? 'none' : 'block';
}

function hcHizHesapla() {
    const mode = document.getElementById('hc-calc-mode').value;
    const resVal = document.getElementById('hc-res-val');
    const resUnit = document.getElementById('hc-res-unit');
    const extraRes = document.getElementById('hc-extra-res');

    const hiz = parseFloat(document.getElementById('hc-hiz-val').value);
    const mesafe = parseFloat(document.getElementById('hc-mesafe-val').value);
    const h = parseFloat(document.getElementById('hc-time-h').value) || 0;
    const m = parseFloat(document.getElementById('hc-time-m').value) || 0;
    const toplamSaat = h + (m / 60);

    let result, unit, extra = "";

    if (mode === 'hiz') {
        if (!mesafe || !toplamSaat) { alert('Lütfen mesafe ve zamanı giriniz.'); return; }
        result = mesafe / toplamSaat;
        unit = "km/h";
        extra = `<p>${(result / 3.6).toFixed(2)} m/s</p><p>${(result * 0.62137).toFixed(2)} mph</p>`;
    } else if (mode === 'mesafe') {
        if (!hiz || !toplamSaat) { alert('Lütfen hız ve zamanı giriniz.'); return; }
        result = hiz * toplamSaat;
        unit = "km";
        extra = `<p>${(result * 1000).toLocaleString()} metre</p><p>${(result * 0.62137).toFixed(2)} mil</p>`;
    } else if (mode === 'zaman') {
        if (!hiz || !mesafe) { alert('Lütfen hız ve mesafeyi giriniz.'); return; }
        result = mesafe / hiz; // Saat cinsinden
        const resH = Math.floor(result);
        const resM = Math.round((result - resH) * 60);
        resVal.innerText = `${resH} sa, ${resM} dk`;
        resUnit.innerText = "";
        extra = `<p>Toplam: ${(result * 60).toFixed(0)} dakika</p><p>Toplam: ${(result * 3600).toFixed(0)} saniye</p>`;
    }

    if (mode !== 'zaman') {
        resVal.innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
        resUnit.innerText = unit;
    }
    
    extraRes.innerHTML = extra;
    document.getElementById('hc-hiz-result').classList.add('visible');
    document.getElementById('hc-hiz-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
