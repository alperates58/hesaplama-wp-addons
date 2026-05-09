function hcADMHesapla() {
    const speedKmh = parseFloat(document.getElementById('hc-adm-speed').value);
    const reactionTime = parseFloat(document.getElementById('hc-adm-reaction').value);
    const mu = parseFloat(document.getElementById('hc-adm-road').value);

    if (isNaN(speedKmh) || isNaN(reactionTime) || speedKmh < 0 || reactionTime < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const v = speedKmh / 3.6; // to m/s
    const reactionDist = v * reactionTime;
    const brakingDist = Math.pow(v, 2) / (2 * mu * 9.81);
    const totalDist = reactionDist + brakingDist;

    document.getElementById('hc-adm-react-val').innerText = reactionDist.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    document.getElementById('hc-adm-brake-val').innerText = brakingDist.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    document.getElementById('hc-adm-total-val').innerText = totalDist.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    
    document.getElementById('hc-adm-result').classList.add('visible');
}
