function hcSensibleHeatHesapla() {
    const m = parseFloat(document.getElementById('hc-sh-m').value);
    const c = parseFloat(document.getElementById('hc-sh-c').value);
    const dt = parseFloat(document.getElementById('hc-sh-dt').value);

    if (isNaN(m) || isNaN(c) || isNaN(dt)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Q = m * c * dt (Joule)
    const Q = m * c * dt;
    const Qkj = Q / 1000;
    const Qkcal = Q / 4186.8;

    document.getElementById('hc-sh-res-kj').innerText = Qkj.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kJ';
    document.getElementById('hc-sh-res-kcal').innerText = Qkcal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kcal';
    document.getElementById('hc-sh-res-j').innerText = Math.round(Q).toLocaleString('tr-TR') + ' Joule';
    
    document.getElementById('hc-sh-result').classList.add('visible');
}
