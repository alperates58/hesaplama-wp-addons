function hcMutRateHesapla() {
    const mutants = parseFloat(document.getElementById('hc-mr-mutants').value);
    const total = parseFloat(document.getElementById('hc-mr-total').value);

    if (isNaN(mutants) || !total) {
        alert('Lütfen sayıları giriniz.');
        return;
    }

    const rate = mutants / total;

    const resVal = document.getElementById('hc-mr-res-val');
    const resExp = document.getElementById('hc-mr-res-exp');

    resVal.innerText = rate.toExponential(2).toLocaleString('tr-TR');
    resExp.innerText = "Yüzde: %" + (rate * 100).toFixed(6);

    document.getElementById('hc-mut-rate-result').classList.add('visible');
}
