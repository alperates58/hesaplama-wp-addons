function hcStopBangHesapla() {
    const ids = ['hc-sb-s', 'hc-sb-t', 'hc-sb-o', 'hc-sb-p', 'hc-sb-b', 'hc-sb-a', 'hc-sb-n', 'hc-sb-g'];
    let score = 0;
    ids.forEach(id => { if (document.getElementById(id).checked) score++; });

    const resVal = document.getElementById('hc-sb-res-val');
    const resDesc = document.getElementById('hc-sb-res-desc');

    resVal.innerText = score;

    if (score <= 2) {
        resDesc.innerText = 'Düşük Risk';
        resDesc.style.color = '#27ae60';
    } else if (score <= 4) {
        resDesc.innerText = 'Orta Risk';
        resDesc.style.color = '#f39c12';
    } else {
        resDesc.innerText = 'Yüksek Risk (Uzman muayenesi önerilir)';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-stop-bang-result').classList.add('visible');
}
