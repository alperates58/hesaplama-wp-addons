function hcAttPctHesapla() {
    const present = parseFloat(document.getElementById('hc-ap-present').value);
    const total = parseFloat(document.getElementById('hc-ap-total').value);

    if (isNaN(present) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const pct = (present / total) * 100;
    const absentPct = 100 - pct;

    document.getElementById('hc-ap-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 1 })}`;
    document.getElementById('hc-ap-status').innerText = `Devamsızlık: % ${absentPct.toLocaleString('tr-TR', { maximumFractionDigits: 1 })}`;
    document.getElementById('hc-yoklama-yuzdesi-result').classList.add('visible');
}
