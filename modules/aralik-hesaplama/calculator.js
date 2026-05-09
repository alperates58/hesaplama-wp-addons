function hcAralikHesapla() {
    const raw = document.getElementById('hc-r-data').value;
    const data = raw.split(/[,\s]+/).map(x => parseFloat(x.trim())).filter(x => !isNaN(x));

    if (data.length < 2) {
        alert('Lütfen en az iki sayı girin.');
        return;
    }

    const min = Math.min(...data);
    const max = Math.max(...data);
    const range = max - min;

    document.getElementById('hc-res-r-val').innerText = range.toLocaleString('tr-TR');
    document.getElementById('hc-res-r-min').innerText = min.toLocaleString('tr-TR');
    document.getElementById('hc-res-r-max').innerText = max.toLocaleString('tr-TR');

    document.getElementById('hc-r-result').classList.add('visible');
}
