function hcDersGecmeGuncelle() {
    var tur = document.getElementById('hc-dgn-tur').value;
    document.getElementById('hc-dgn-lise-grup').style.display = (tur === 'lise') ? 'block' : 'none';
    document.getElementById('hc-dgn-uni-grup').style.display = (tur === 'universite') ? 'block' : 'none';
}
function hcDersGecmeNotuHesapla() {
    var tur = document.getElementById('hc-dgn-tur').value;
    var sonuc = document.getElementById('hc-ders-gecme-notu-hesaplama-result');
    if (tur === 'lise') {
        var d1 = parseFloat(document.getElementById('hc-dgn-donem1').value);
        var d2 = parseFloat(document.getElementById('hc-dgn-donem2').value);
        if (isNaN(d1) || isNaN(d2)) { alert('Her iki dönem notunu girin.'); return; }
        var ort = (d1 + d2) / 2;
        var gecti = ort >= 50 || d2 >= 70;
        sonuc.innerHTML =
            '<p><strong>1. Dönem:</strong> ' + d1.toLocaleString('tr-TR',{maximumFractionDigits:1}) + ' &nbsp; <strong>2. Dönem:</strong> ' + d2.toLocaleString('tr-TR',{maximumFractionDigits:1}) + '</p>' +
            '<p><strong>Yıl Sonu Ortalaması:</strong> ' + ort.toLocaleString('tr-TR',{maximumFractionDigits:1}) + '</p>' +
            '<p class="hc-result-value">' + (gecti ? '✅ Dersi geçti' : '❌ Dersi geçemedi') + '</p>' +
            '<p><strong>Kural:</strong> Ortalama ≥ 50 VEYA 2. dönem ≥ 70</p>';
    } else {
        var vize = parseFloat(document.getElementById('hc-dgn-vize').value);
        var final = parseFloat(document.getElementById('hc-dgn-final').value);
        var vizeOran = parseFloat(document.getElementById('hc-dgn-vize-oran').value) || 40;
        if (isNaN(vize) || isNaN(final)) { alert('Vize ve final notlarını girin.'); return; }
        var finalOran = 100 - vizeOran;
        var ort2 = vize * (vizeOran / 100) + final * (finalOran / 100);
        var gecti2 = ort2 >= 50;
        sonuc.innerHTML =
            '<p><strong>Vize:</strong> ' + vize + ' × %' + vizeOran + ' = ' + (vize*vizeOran/100).toLocaleString('tr-TR',{maximumFractionDigits:1}) + '</p>' +
            '<p><strong>Final:</strong> ' + final + ' × %' + finalOran + ' = ' + (final*finalOran/100).toLocaleString('tr-TR',{maximumFractionDigits:1}) + '</p>' +
            '<p><strong>Dönem Notu:</strong> ' + ort2.toLocaleString('tr-TR',{maximumFractionDigits:2}) + '</p>' +
            '<p class="hc-result-value">' + (gecti2 ? '✅ Dersi geçti (≥ 50)' : '❌ Dersi geçemedi (< 50)') + '</p>';
    }
    sonuc.classList.add('visible');
}
