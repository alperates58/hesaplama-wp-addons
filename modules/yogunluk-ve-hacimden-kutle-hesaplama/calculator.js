function hcYhk2PresetDegisti() {
    var val = document.getElementById('hc-yhk2-preset').value;
    if (val !== '') {
        document.getElementById('hc-yhk2-density').value = parseFloat(val);
    }
}

function hcYoğunlukHacimdenKütleHesapla() {
    var d = parseFloat(document.getElementById('hc-yhk2-density').value);
    var vVal = parseFloat(document.getElementById('hc-yhk2-volume-val').value);
    var vUnit = document.getElementById('hc-yhk2-volume-unit').value;

    if (isNaN(d) || d <= 0) {
        alert('Lütfen geçerli ve pozitif bir yoğunluk değeri (kg/m³) girin.');
        return;
    }
    if (isNaN(vVal) || vVal <= 0) {
        alert('Lütfen geçerli ve pozitif bir hacim değeri girin.');
        return;
    }

    // Convert volume to m3
    var m3 = vVal;
    if (vUnit === 'l') m3 = vVal / 1000;
    else if (vUnit === 'cm3') m3 = vVal / 1e6;

    // m = d * V
    var kg = d * m3;
    var grams = kg * 1000;
    var tons = kg / 1000;

    document.getElementById('hc-yhk2-res-kg').innerText = kg.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg';
    document.getElementById('hc-yhk2-res-g').innerText = grams.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-yhk2-res-ton').innerText = tons.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' t';

    var desc = d.toLocaleString('tr-TR') + ' kg/m³ yoğunluğuna sahip malzemeden imal edilen, ' + vVal.toLocaleString('tr-TR') + ' ' + vUnit + ' hacmindeki cismin toplam kütlesi ' + kg.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Kilogram (kg) olarak hesaplanmıştır.';
    document.getElementById('hc-yhk2-desc').innerText = desc;

    document.getElementById('hc-yogunluk-ve-hacimden-kutle-hesaplama-result').classList.add('visible');
}
