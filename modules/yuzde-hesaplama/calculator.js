function hcYuzdeTip1() {
    const val = parseFloat(document.getElementById('hc-y1-val').value);
    const perc = parseFloat(document.getElementById('hc-y1-perc').value);

    if (isNaN(val) || isNaN(perc)) { alert('Lütfen değerleri giriniz.'); return; }

    const result = (val * perc) / 100;
    const resDiv = document.getElementById('hc-y1-res');
    resDiv.innerHTML = `Sonuç: <strong>${result.toLocaleString('tr-TR')}</strong>`;
    resDiv.classList.add('visible');
}

function hcYuzdeTip2() {
    const v1 = parseFloat(document.getElementById('hc-y2-val1').value);
    const v2 = parseFloat(document.getElementById('hc-y2-val2').value);

    if (isNaN(v1) || isNaN(v2) || v2 === 0) { alert('Lütfen değerleri giriniz.'); return; }

    const result = (v1 / v2) * 100;
    const resDiv = document.getElementById('hc-y2-res');
    resDiv.innerHTML = `Sonuç: <strong>%${result.toLocaleString('tr-TR', { maximumFractionDigits: 4 })}</strong>`;
    resDiv.classList.add('visible');
}
