function hcRelErrorHesapla() {
    const trueVal = parseFloat(document.getElementById('hc-re-true').value);
    const measuredVal = parseFloat(document.getElementById('hc-re-measured').value);

    if (isNaN(trueVal) || isNaN(measuredVal) || trueVal === 0) {
        alert('Lütfen geçerli değerler girin (Gerçek değer 0 olamaz).');
        return;
    }

    const absErr = Math.abs(measuredVal - trueVal);
    const relErr = (absErr / Math.abs(trueVal)) * 100;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-abs-err').innerText = fmt(absErr);
    document.getElementById('hc-res-rel-err').innerText = '%' + fmt(relErr);
    document.getElementById('hc-bagil-hata-hesaplama-result').classList.add('visible');
}
