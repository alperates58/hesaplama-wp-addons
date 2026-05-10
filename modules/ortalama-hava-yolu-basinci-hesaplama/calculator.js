function hcMapHesapla() {
    const pip = parseFloat(document.getElementById('hc-map-pip').value);
    const peep = parseFloat(document.getElementById('hc-map-peep').value);
    const ti = parseFloat(document.getElementById('hc-map-ti').value);
    const te = parseFloat(document.getElementById('hc-map-te').value);

    if (isNaN(pip) || isNaN(peep) || isNaN(ti) || isNaN(te) || (ti + te) === 0) {
        alert('Lütfen tüm değerleri doğru şekilde giriniz.');
        return;
    }

    const tTotal = ti + te;
    const map = ((pip * ti) + (peep * te)) / tTotal;

    document.getElementById('hc-map-res-val').innerText = map.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-map-calc-result').classList.add('visible');
}
