function hcInvPropHesapla() {
    const a = parseFloat(document.getElementById('hc-ip-a').value);
    const b = parseFloat(document.getElementById('hc-ip-b').value);
    const c = parseFloat(document.getElementById('hc-ip-c').value);

    if (isNaN(a) || isNaN(b) || isNaN(c)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    if (c === 0) { alert('c değeri 0 olamaz.'); return; }

    // a * b = c * x => x = (a * b) / c
    const x = (a * b) / c;

    document.getElementById('hc-ip-res-val').innerText = x.toLocaleString('tr-TR');
    document.getElementById('hc-ters-oranti-result').classList.add('visible');
}
