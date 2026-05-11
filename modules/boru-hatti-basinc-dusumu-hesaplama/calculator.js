function hcBoruBasincKaybiHesapla() {
    const L = parseFloat(document.getElementById('hc-bhb-uzunluk').value);
    const Dmm = parseFloat(document.getElementById('hc-bhb-cap').value);
    const v = parseFloat(document.getElementById('hc-bhb-hiz').value);
    const f = parseFloat(document.getElementById('hc-bhb-f').value);
    const rho = parseFloat(document.getElementById('hc-bhb-rho').value);

    if ([L, Dmm, v, f, rho].some(isNaN) || Dmm <= 0) {
        alert('Lütfen tüm alanları geçerli sayılarla doldurun.');
        return;
    }

    const D = Dmm / 1000;
    // deltaP = f * (L/D) * (rho * v^2 / 2)
    const deltaP = f * (L / D) * (rho * Math.pow(v, 2) / 2);

    document.getElementById('hc-bhb-res-pa').innerText = Math.round(deltaP).toLocaleString('tr-TR') + ' Pa';
    document.getElementById('hc-bhb-res-bar').innerText = (deltaP / 100000).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar';
    document.getElementById('hc-bhb-res-mh2o').innerText = (deltaP / 9806.65).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mSS';
    
    document.getElementById('hc-bhb-result').classList.add('visible');
}
