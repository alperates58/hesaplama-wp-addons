function hcADHesapla() {
    const mirror = document.getElementById('hc-ad-mirror').value;
    let f = parseFloat(document.getElementById('hc-ad-f').value);
    const doVal = parseFloat(document.getElementById('hc-ad-do').value);

    if (isNaN(f) || isNaN(doVal) || doVal <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (mirror === 'convex') {
        f = -Math.abs(f);
    } else {
        f = Math.abs(f);
    }

    // 1/di = 1/f - 1/do
    const di = 1 / ( (1/f) - (1/doVal) );
    const m = -di / doVal;

    document.getElementById('hc-ad-di').innerText = di.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
    document.getElementById('hc-ad-m').innerText = Math.abs(m).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + 'x' + (m < 0 ? ' (Ters)' : ' (Düz)');
    
    document.getElementById('hc-ad-result').classList.add('visible');
}
