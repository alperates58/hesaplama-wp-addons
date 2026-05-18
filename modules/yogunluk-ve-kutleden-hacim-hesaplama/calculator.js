function hcYkvPresetDegisti() {
    var val = document.getElementById('hc-ykv-preset').value;
    if (val !== '') {
        document.getElementById('hc-ykv-density').value = parseFloat(val);
    }
}

function hcYoğunlukKütledenHacimHesapla() {
    var d = parseFloat(document.getElementById('hc-ykv-density').value);
    var mVal = parseFloat(document.getElementById('hc-ykv-mass-val').value);
    var mUnit = document.getElementById('hc-ykv-mass-unit').value;

    if (isNaN(d) || d <= 0) {
        alert('Lütfen geçerli ve pozitif bir yoğunluk değeri (kg/m³) girin.');
        return;
    }
    if (isNaN(mVal) || mVal <= 0) {
        alert('Lütfen geçerli ve pozitif bir kütle değeri girin.');
        return;
    }

    // Convert mass to kg
    var kg = mVal;
    if (mUnit === 'g') kg = mVal / 1000;

    // V = m / d
    var m3 = kg / d;
    var liters = m3 * 1000;
    var cm3 = m3 * 1e6;

    document.getElementById('hc-ykv-res-m3').innerText = m3.toLocaleString('tr-TR', { maximumFractionDigits: 8 }) + ' m³';
    document.getElementById('hc-ykv-res-l').innerText = liters.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' L';
    document.getElementById('hc-ykv-res-cm3').innerText = cm3.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm³';

    var desc = d.toLocaleString('tr-TR') + ' kg/m³ yoğunluğa sahip bir malzemeden yapılan ' + mVal.toLocaleString('tr-TR') + ' ' + mUnit + ' kütleli cismin kapladığı toplam hacim ' + m3.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' metreküp (m³) veya ' + liters.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Litre\'dir.';
    document.getElementById('hc-ykv-desc').innerText = desc;

    document.getElementById('hc-yogunluk-ve-kutleden-hacim-hesaplama-result').classList.add('visible');
}
