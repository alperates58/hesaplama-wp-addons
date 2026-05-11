function hcCapTimeHesapla() {
    const r = parseFloat(document.getElementById('hc-ctt-r').value);
    const cUf = parseFloat(document.getElementById('hc-ctt-c').value);
    const vin = parseFloat(document.getElementById('hc-ctt-vin').value);
    const vc = parseFloat(document.getElementById('hc-ctt-vc').value);

    if (isNaN(r) || isNaN(cUf) || isNaN(vin) || isNaN(vc) || r <= 0 || cUf <= 0 || vin <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (vc >= vin) {
        alert('Hedef gerilim, kaynak geriliminden küçük olmalıdır.');
        return;
    }

    const cF = cUf * 1e-6;
    const tau = r * cF;

    // t = R * C * ln(Vin / (Vin - Vc))
    const time = r * cF * Math.log(vin / (vin - vc));

    document.getElementById('hc-ctt-res-val').innerText = time.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' Saniye';
    document.getElementById('hc-ctt-res-tau').innerText = 'Zaman Sabiti (τ = RC): ' + (tau * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ms';
    
    document.getElementById('hc-ctt-result').classList.add('visible');
}
