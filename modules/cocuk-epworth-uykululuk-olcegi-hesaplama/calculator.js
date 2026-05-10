function hcPessHesapla() {
    let total = 0;
    const selects = document.querySelectorAll('.hc-pess-score');
    selects.forEach(s => total += parseInt(s.value));

    const resVal = document.getElementById('hc-pess-res-val');
    const resDesc = document.getElementById('hc-pess-res-desc');

    resVal.innerText = total;

    if (total <= 10) {
        resDesc.innerText = 'Normal uykululuk düzeyi.';
        resDesc.style.color = '#27ae60';
    } else {
        resDesc.innerText = 'Aşırı gündüz uykululuğu. Bir pediatriste danışılması önerilir.';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-pess-result').classList.add('visible');
}
