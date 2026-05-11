function hcRafOmruHesapla() {
    const sl1 = parseFloat(document.getElementById('hc-ro-life1').value);
    const t1 = parseFloat(document.getElementById('hc-ro-temp1').value);
    const t2 = parseFloat(document.getElementById('hc-ro-temp2').value);
    const q10 = parseFloat(document.getElementById('hc-ro-q10').value);

    if (isNaN(sl1) || isNaN(t1) || isNaN(t2) || isNaN(q10) || q10 <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // SL(T2) = SL(T1) / Q10^((T2-T1)/10)
    const power = (t2 - t1) / 10;
    const factor = Math.pow(q10, power);
    const sl2 = sl1 / factor;

    document.getElementById('hc-ro-res-total').innerText = Math.floor(sl2).toLocaleString('tr-TR');
    document.getElementById('hc-ro-result').classList.add('visible');
}
