function hcYoğunlukHesapla() {
    var mVal = parseFloat(document.getElementById('hc-ygh-mass-val').value);
    var mUnit = document.getElementById('hc-ygh-mass-unit').value;
    var vVal = parseFloat(document.getElementById('hc-ygh-volume-val').value);
    var vUnit = document.getElementById('hc-ygh-volume-unit').value;

    if (isNaN(mVal) || mVal < 0) {
        alert('Lütfen geçerli bir kütle değeri girin.');
        return;
    }
    if (isNaN(vVal) || vVal <= 0) {
        alert('Lütfen geçerli ve pozitif bir hacim değeri girin.');
        return;
    }

    // Convert mass to kg
    var kg = mVal;
    if (mUnit === 'g') kg = mVal / 1000;
    else if (mUnit === 'ton') kg = mVal * 1000;

    // Convert volume to m3
    var m3 = vVal;
    if (vUnit === 'l') m3 = vVal / 1000;
    else if (vUnit === 'cm3' || vUnit === 'ml') m3 = vVal / 1e6;

    // Calculate density in kg/m3
    var d_kgm3 = kg / m3;

    // g/cm3 is same as kg/L
    var d_gcm3 = d_kgm3 / 1000;
    var d_kgl = d_gcm3;

    document.getElementById('hc-ygh-res-kgm3').innerText = d_kgm3.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/m³';
    document.getElementById('hc-ygh-res-gcm3').innerText = d_gcm3.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' g/cm³';
    document.getElementById('hc-ygh-res-kgl').innerText = d_kgl.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' kg/L';

    var desc = mVal.toLocaleString('tr-TR') + ' ' + mUnit + ' kütleye sahip ve ' + vVal.toLocaleString('tr-TR') + ' ' + vUnit + ' hacim kaplayan cismin yoğunluğu (özkütlesi) ' + d_kgm3.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg/m³ olarak hesaplanmıştır. Bu yoğunluk değeri, malzemenin her bir santimetreküpünün ' + d_gcm3.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' gram kütleye sahip olduğunu gösterir.';
    document.getElementById('hc-ygh-desc').innerText = desc;

    document.getElementById('hc-yogunluk-hesaplama-result').classList.add('visible');
}
