function hcRsbiHesapla() {
    const f = parseFloat(document.getElementById('hc-rsbi-f').value);
    const vt_ml = parseFloat(document.getElementById('hc-rsbi-vt').value);

    if (isNaN(f) || isNaN(vt_ml) || vt_ml === 0) {
        alert('Lütfen geçerli solunum sayısı ve tidal volüm giriniz.');
        return;
    }

    const vt_l = vt_ml / 1000;
    const rsbi = f / vt_l;
    const resVal = document.getElementById('hc-rsbi-res-val');
    const resDesc = document.getElementById('hc-rsbi-res-desc');

    resVal.innerText = Math.round(rsbi).toLocaleString('tr-TR');

    if (rsbi < 105) {
        resDesc.innerText = 'Başarılı ekstübasyon ihtimali yüksek (RSBI < 105).';
        resDesc.style.color = '#27ae60';
    } else {
        resDesc.innerText = 'Ekstübasyon başarısızlık riski yüksek (RSBI > 105).';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-rsbi-result').classList.add('visible');
}
