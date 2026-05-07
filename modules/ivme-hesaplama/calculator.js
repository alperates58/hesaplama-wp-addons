function hcIvmeHesapla() {
    const unit = document.getElementById('hc-acc-unit').value;
    let v0 = parseFloat(document.getElementById('hc-acc-v0').value);
    let v1 = parseFloat(document.getElementById('hc-acc-v1').value);
    const t = parseFloat(document.getElementById('hc-acc-time').value);

    if (isNaN(v0)) v0 = 0;
    if (isNaN(v1) || isNaN(t) || t <= 0) {
        alert('Lütfen son hızı ve zamanı doğru giriniz.');
        return;
    }

    // km/h -> m/s dönüşümü (1 km/h = 1/3.6 m/s)
    let v0_ms = (unit === 'kmh') ? v0 / 3.6 : v0;
    let v1_ms = (unit === 'kmh') ? v1 / 3.6 : v1;

    // a = (v - v0) / t
    const acc = (v1_ms - v0_ms) / t;

    document.getElementById('hc-res-acc-val').innerText = acc.toLocaleString('tr-TR', { 
        minimumFractionDigits: 2,
        maximumFractionDigits: 4 
    });

    document.getElementById('hc-acc-result').classList.add('visible');
    document.getElementById('hc-acc-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
