function hcWlpHesapla() {
    const start = parseFloat(document.getElementById('hc-wlp-start').value);
    const current = parseFloat(document.getElementById('hc-wlp-current').value);

    if (!start || !current) return;

    const diff = start - current;
    const percent = (diff / start) * 100;

    const resVal = document.getElementById('hc-wlp-res-val');
    const resDiff = document.getElementById('hc-wlp-res-diff');

    resVal.innerText = percent.toFixed(1).toLocaleString('tr-TR');
    resDiff.innerText = `Toplam ${diff.toFixed(1)} kg verdiniz.`;

    document.getElementById('hc-wl-percent-result').classList.add('visible');
}
