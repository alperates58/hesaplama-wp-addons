function hcEndpointHesapla() {
    const x1 = parseFloat(document.getElementById('hc-e-x1').value);
    const y1 = parseFloat(document.getElementById('hc-e-y1').value);
    const xm = parseFloat(document.getElementById('hc-e-xm').value);
    const ym = parseFloat(document.getElementById('hc-e-ym').value);

    if (isNaN(x1) || isNaN(y1) || isNaN(xm) || isNaN(ym)) {
        alert('Lütfen tüm koordinatları giriniz.');
        return;
    }

    // xm = (x1 + x2)/2 => x2 = 2*xm - x1
    const x2 = 2 * xm - x1;
    const y2 = 2 * ym - y1;

    document.getElementById('hc-e-res-val').innerText = `(${x2.toLocaleString('tr-TR')}, ${y2.toLocaleString('tr-TR')})`;
    document.getElementById('hc-uc-nokta-result').classList.add('visible');
}
