function hcBernoulliHesapla() {
    const rho = parseFloat(document.getElementById('hc-ber-rho').value);
    const p1 = parseFloat(document.getElementById('hc-ber-p1').value);
    const v1 = parseFloat(document.getElementById('hc-ber-v1').value);
    const h1 = parseFloat(document.getElementById('hc-ber-h1').value);
    const v2 = parseFloat(document.getElementById('hc-ber-v2').value);
    const h2 = parseFloat(document.getElementById('hc-ber-h2').value);
    const g = 9.80665;

    if ([rho, p1, v1, h1, v2, h2].some(isNaN)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // P2 = P1 + 0.5 * rho * (v1^2 - v2^2) + rho * g * (h1 - h2)
    const kineticPart = 0.5 * rho * (Math.pow(v1, 2) - Math.pow(v2, 2));
    const potentialPart = rho * g * (h1 - h2);
    const p2 = p1 + kineticPart + potentialPart;

    document.getElementById('hc-ber-res-val').innerText = Math.round(p2).toLocaleString('tr-TR') + ' Pa';
    document.getElementById('hc-ber-res-bar').innerText = (p2 / 100000).toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar';
    
    document.getElementById('hc-ber-result').classList.add('visible');
}
