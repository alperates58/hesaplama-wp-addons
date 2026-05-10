function hcMicroKillHesapla() {
    const before = parseFloat(document.getElementById('hc-mk-before').value);
    const after = parseFloat(document.getElementById('hc-mk-after').value);

    if (!before || isNaN(after)) {
        alert('Lütfen sayıları giriniz.');
        return;
    }

    const killRate = ((before - after) / before) * 100;

    const resVal = document.getElementById('hc-mk-res-val');
    resVal.innerText = killRate.toFixed(4).toLocaleString('tr-TR');

    document.getElementById('hc-micro-kill-result').classList.add('visible');
}
