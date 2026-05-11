function hcVo2Hesapla() {
    const weight = parseFloat(document.getElementById('hc-vo2-weight').value);
    const met = parseFloat(document.getElementById('hc-vo2-met').value);

    if (isNaN(weight) || isNaN(met) || weight <= 0 || met <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // VO2 (ml/min) = MET * 3.5 * weight
    const vo2_min = met * 3.5 * weight;
    const vo2_lh = (vo2_min * 60) / 1000;

    document.getElementById('hc-vo2-res-total').innerText = vo2_min.toLocaleString('tr-TR', { maximumFractionDigits: 0 });
    document.getElementById('hc-vo2-res-lh').innerText = vo2_lh.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-vo2-result').classList.add('visible');
}
